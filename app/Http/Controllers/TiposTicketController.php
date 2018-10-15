<?php

namespace App\Http\Controllers;

use App\TiposTicket;
use Illuminate\Http\Request;

class TiposTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tickets = TiposTicket::orderby('id','asc')->paginate(10);
        return view('TiposTicket.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
        return view('TiposTicket.crear');
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
        $nuevoTicket = $request->input('nombre');
       
        if($nuevoTicket!="")
        {
            TiposTicket::create(['nombre'=>$nuevoTicket]);
        }
        $tickets = TiposTicket::orderby('id','asc')->paginate(10);
        
        return view('TiposTicket.index', compact('tickets'));
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
        return("hola");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ticket = TiposTicket::find($id);
        return view('TiposTicket.edit',compact('ticket', 'id'));
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
        $ticket = Tiposticket::find($id);
        $ticket->nombre = $request->input('nombre');
        $ticket->save();

        $tickets = TiposTicket::orderby('id','asc')->paginate(10);
        return view('TiposTicket.index', compact('tickets'));
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
        
    }
}
