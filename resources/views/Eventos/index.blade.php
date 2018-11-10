<!DOCTYPE html>
<html>
<head>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

td,th {
    border: 1px solid  #ffffff ;
    text-align: center;
    padding: 8px;
}

tr:nth-child(even) {
    background-color:  #c7c7c7;
}
</style>
</head>
@extends('layouts.app')

@section('content')
<body>


 
<table id = "mytable" class ="table table-border table-striped" >
<thead>
    <DIV ALIGN="center"><P><h1> LISTA DE EVENTOS</h1></DIV> 
    </thead>
    <tbody>
    <tr>
        <th>ID</th><th>Nombre de Evento</th><th>Fecha</th><th>Publico</th><th>Tickets</th>
        <th>Horario de Inicio</th><th>Horario de Finalizacion</th><th>Lugar </th>
        <th> </th>
        </tr>
        
    @foreach ($eventos as $eventocap)
        
        <tr>
        <td>{{$eventocap->id}}</td>
        <td>{{$eventocap->evento}}</td> 
        <td>{{$eventocap->fecha}}</td>
        <td>{{$eventocap->publico}}</td>
        <td>{{$eventocap->tickets}}</td>
        <td>{{$eventocap->horarioinicio}}</td>
        <td>{{$eventocap->horariofinal}}</td>
        <td>{{$eventocap->lugar}}</td>
        <td><form method="get" action="{{route('Eventos.edit', $eventocap->id)}}">
            <button type="submit">Editar Evento</button>
            </form>
            <form method="get" action="{{route('Eventos.destroy', $eventocap->id)}}">
            <input type="Hidden" name="_method" value = "delete">
            <button type="submit">Eliminar Evento</button>
            </form>
        </td>

        </tr>
@endforeach
        </tbody>
        </table>
<br>

<div>
{{$eventos-> links()}}
</div>

<form method="get" action="{{action('EventosController@create')}}">
    <button type="submit">Crear Evento</button>
</form>


@endsection