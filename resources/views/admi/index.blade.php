@extends('layouts.app')
@section('content')
<center><h1>Administradores</h1>
<table id="mytable" class="table table.borderd table-striped">


    @foreach($adms as $User)
 
    <tr>
        <td><p><B>Nombres:</B> {{$User->name}} </td>
        
        <td><p><B>Correo: </B>{{$User->email}} </td>

        
        <td><input type="submit" onClick="location='admi/{{$User->id}}/edit'" value="Editar Administrador"/> </td>
        

@endforeach

        
        
        </table>
        
    
       <center> <input type="submit" onClick="location='admi/create'" value="Crear Administrador"/>
        

<div>
</div>
@endsection
