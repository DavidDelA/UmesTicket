@extends('layouts.app')

@section('content')
<div align="center">
<h1>{{$mensaje}}</h1>
<div class ="links">
    <a href= "{{$link}}">Retornar</a>
</div>
</div>
@endsection