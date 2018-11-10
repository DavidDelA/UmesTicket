<?php

namespace App\Http\Controllers;
use App\Eventos;
use App\TiposTicket;
use App\Tickets;
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
        $tiposTicket = TiposTicket::all();
        return view ('Eventos.create', compact('tiposTicket'));
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
        return redirect('Eventos');
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
        return view ('Eventos.edit',compact ('eventos', 'id'));

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
        
       return redirect('Eventos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        self::DevolverDinero($id);
        self::EliminarTickets($id);
    }

    private function DevolverDinero(){


    }

    private function EliminarTickets($id){
        $ticketsEvento = Tickets::where(
            'evento',$id
        );
        $ticketsEvento->delete();

    }
}
