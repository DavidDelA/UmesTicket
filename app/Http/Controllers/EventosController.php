<?php

namespace App\Http\Controllers;
use App\Eventos;
use App\TiposTicket;
use App\Tickets;
use App\User;
use Illuminate\Http\Request;


class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $eventos = Eventos :: orderBy ('id','DESC') ->paginate(3); //solo estoy ordenando el ingreso de los libros
        return view ('Eventos.index',compact ('eventos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(TiposTicket::all()->count() != 0){
        $tiposTicket = TiposTicket::all();
        return view ('Eventos.create', compact('tiposTicket'));
        }else{
        $mensaje = "No hay ningún tipo de ticket creado aún.";
        $link = "/tiposTicket";
        return view('Error', compact('$mensaje','link'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $eventoNuevo = Eventos:: create($request->all());
        self::crearTickets($request,$eventoNuevo);
        return redirect('AdmiEventos');
    }

    /**
    * Creación de los tickets para el evento
    *
    * @param Request,Evento
    * @return Void 
    */
    private function crearTickets($request, Eventos $evento){
        $totalTickets = 0;
        foreach(TiposTicket::all() as $tipo){
            for($i = 0; $i < $request->input($tipo->nombre); $i++)
            {
                $ticket = new Tickets;
                $ticket->tipo = $tipo->id;
                $ticket->evento = $evento->id;
                $ticket->save();
                $totalTickets++;
            }
        }
        $evento->tickets = $totalTickets;
        $evento->save();

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        self::DevolverDinero($id);
        self::EliminarTickets($id);
        $evento = Eventos::find($id);
        $evento->delete();
        return redirect('AdmiEventos');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventos = Eventos :: find ($id);
        $ticketsEvento = self::tickets($id);
        return view ('Eventos.edit',compact ('eventos', 'id', 'ticketsEvento'));

    }

    //busca la cantidad de tickets por tipo
    private function tickets($id){
        $tiposTicket = TiposTicket::all();
        $ticketsTotales = array();
        foreach($tiposTicket as $tipo){
        $tipoId = $tipo->id;
        $tickets = Tickets::where('evento',$id)
            ->where('tipo',$tipoId)
            ->where('comprador', 0)
            ->count();
        if($tickets > 0){
        array_push($ticketsTotales, $tipo, $tickets );
        }
        }
        return $ticketsTotales;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $eventos = Eventos :: find ($id);
        $eventos->evento = $request->get('evento');
        $eventos->fecha = $request->get('fecha');
      
        $eventos->horarioinicio =$request->get('horarioinicio');
        $eventos->horariofinal =$request->get('horariofinal');
        $eventos->lugar =$request->get('lugar');
        $eventos->save();
        
       return redirect('AdmiEventos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
       
    }

    private function DevolverDinero($id){
        $ticketsEvento = Tickets::where('evento',$id)
            ->where('comprador', '!=', 0 )->get();
        
        foreach($ticketsEvento as $ticket){
            $tipo = TiposTicket::find($ticket->tipo);
            $user = User::find($ticket->comprador);
            $user->saldo = $user->saldo + $tipo->precio;
            $user->save();
        }
    }

    private function EliminarTickets($id){
        $ticketsEvento = Tickets::where(
            'evento',$id
        );
        $ticketsEvento->delete();

    }
}
