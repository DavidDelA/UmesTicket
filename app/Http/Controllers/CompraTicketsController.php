<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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



}
