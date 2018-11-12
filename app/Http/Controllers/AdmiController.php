<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AdmiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $adms = User::where('type',"admin")->get();
        return view('admi.index',compact('adms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        //
        $nuevoAdmin = User::create($data->all());
        $nuevoAdmin->type=('admin');
        $nuevoAdmin -> save();

        return redirect ('admi');
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
        //
        $adms = User::Find($id);
        return view('admi.edit',compact('adms','id'));
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
        $adms = User :: find ($id);
        $adms->name = $request->get('name');
        $adms->email =$request->get('email');
        $adms->password = $request->get('password');
        
        
        $adms->save();
        
        $adms = User::orderBy('id','DESC')->get();
        
        return redirect('admi');
      
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
