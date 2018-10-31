@extends('layouts.app')
@section('content')
<h1>Editar Administrador </h1>

<form method="post" action="{{action('AdmiController@update',$id)}}">
<table>
<input type="hidden" name="_method" value="PATCH"/>
 {{csrf_field()}}
<tr>
<td><p>Nombres:</td><td><input type="get" value="{{$adms->name}}" name="name"> 
</tr>
<tr>
<td><p>Correo:</td><td><input type="get" value="{{$adms->email}}" name="email"> 
</tr>
<tr>
<td><p>Contraseña:</td><td><input type="password" value="{{$adms->password}}"  name ="password"> 
</tr>
</table>
<center><input type="submit" value="Modificar"/>
</form>
@endsection
