<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Eventos;
use App\Tickets;
use App\TiposTicket;

class CompraTicketsController extends Controller
{
    //
    Public function index(){
        $eventos = Eventos::all();
       return view('Compras.Eventos', compact('eventos'));

    }
    Public function detalle($id){
        $evento = Eventos::find($id);
        $ticketsEvento = self::tickets($id);
        //return($ticketsEvento);
        return view('Compras.Detalle', compact('evento', 'ticketsEvento'));
    }

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

    public function Comprar(Request $request){
        if(self::VerificacionFondos()){
            self::Debitar();
            self::AsignacionTickets($request);
        }

       
        return (Tickets::where('comprador',1))->get();
    }

    //Verificación de fondos
    private function VerificacionFondos(){
        return (true);

    }

    //Cálculo de transacción
    private function CalculoTransaccion(){

    }

    //Asignar Tickets a cliente
    private function AsignacionTickets($request){
        $id = $request->idEvento;
        $tickets = $request->except('idEvento','_token');
        
        foreach($tickets as $tipo => $cantidad)
        {
            $compra = Tickets::where('evento',$id)
                ->where('tipo',$tipo) 
                ->where('comprador',0)
                ->take($cantidad)
                ->update(['comprador'=> 1 /* Auth::id()*/]);
            
        }
        
    }

    //debitación a la cuenta del cliente
    private function Debitar(){

    }





}
