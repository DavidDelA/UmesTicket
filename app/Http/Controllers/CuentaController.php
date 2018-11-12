<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Eventos;
use App\Tickets;
use App\TiposTicket;


class CuentaController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        //return ($user);
        return view('MiCuenta.index', compact('user'));
    }

    public function Tickets(){
        $tickets = array();
        foreach(Tickets::where('comprador',Auth::id())->get() as $ticket){
            $evento = Eventos::find($ticket->evento);
            $tipo = TiposTicket::find($ticket->tipo);
            array_push($tickets, $ticket->id, $evento->evento, $evento->id, $tipo->nombre, $tipo->precio );
        }
        
       
        return view('MiCuenta.Tickets',compact('tickets'),compact('tiposTicket'),compact('eventos'));
    }

    public function Devolucion($id){
        $user = Auth::user();
        $ticket = Tickets::find($id);
        $tipo = TiposTicket::find($ticket->tipo);
        $user->saldo = $user->saldo + $tipo->precio;
        $user->save();
        $ticket->comprador = 0;
        $ticket->save();
        return redirect('MiCuenta/Tickets');
    }

    public function Saldo(){
        $saldo = Auth::user()->saldo;
        return view('MiCuenta.Saldo',compact('saldo'));
    }

    public function Abonar(){
        return view('MiCuenta.Abonar');
    }

    public function Abono(Request $request){
        $user = Auth::user();
        $user->saldo += $request->abono;
        $user->save();
        return redirect('MiCuenta/Saldo')->with('alert','Saldo abonado con éxito.');
    }
}
