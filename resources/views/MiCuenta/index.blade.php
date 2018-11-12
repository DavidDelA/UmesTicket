@extends('layouts.app')

@section('content')
<h1>{{$user->name}}</h1>
<div class ="links">
<a href="{{ URL::to('MiCuenta/Tickets') }}">Tickets Adquiridos</h3>
<a href="{{ URL::to('MiCuenta/Saldo') }}">Saldo de Cuenta</h3>
</div>


@endsection