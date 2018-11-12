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
        $total = self::TotalCompra($request);
        if(self::VerificacionFondos($total)){
            self::Debitar($total);
            self::AsignacionTickets($request);
            return redirect('MiCuenta/Tickets')->with('alert','Tickets adquiridos con éxito');
        }else{
            $mensaje = "No goza del saldo suficiente para realizar la transacción.";
            $link = "/Eventos";
            return view('Error', compact('mensaje','link'));
        }
        
    }

    //Verificación de fondos
    private function VerificacionFondos($total){
        $user = Auth::user();
        if ($user->saldo > $total){
            return (true);
        }
        else{
            return(false);
        }
    }

    //Obtener el total de la transacción
    private function TotalCompra($request){
        $total = 0;
        $tickets = $request->except('idEvento','_token');
        foreach($tickets as $tipo => $cantidad)
        {
            $precioTicket = TiposTicket::find($tipo)->precio;
            $total += $precioTicket * $cantidad;
        }
        return ($total);
    }


    //Asignar Tickets a cliente
    private function AsignacionTickets($request){
        $id = $request->idEvento;
        $tickets = $request->except('idEvento','_token');
        $evento = Eventos::find($request->idEvento);
        
        foreach($tickets as $tipo => $cantidad)
        {
            $compra = Tickets::where('evento',$id)
                ->where('tipo',$tipo) 
                ->where('comprador',0)
                ->take($cantidad)
                ->update(['comprador'=>  Auth::id()]);
                $evento->tickets = (($evento->tickets)-$cantidad);
                $evento->save();
        }
        
    }

    //debitación a la cuenta del cliente
    private function Debitar($total){
        $user = Auth::user();
        $user->saldo = $user->saldo - $total;
        $user->save();
    }





}
