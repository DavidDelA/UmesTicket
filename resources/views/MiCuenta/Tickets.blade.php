@extends('layouts.app')

@section('content')
<script>
  var msg = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';
  if(exist){
    alert(msg);
  }
</script>
<h1>Mis Tickets</h1>
<table class ="table table-border table-striped" >
     <tr>
     <td><label>Evento</label></td>
     <td><label>Tipo</label></td>
     <td><label>Costo</label></td>
     <td><label></label></td>
     </tr>
     <tr>
     @for($i =0; $i< count($tickets); $i= $i+5)
         <th> {{$tickets[$i+1]}}</th>
         <th> {{$tickets[$i+3]}}</th>
         <th> Q {{$tickets[$i+4]}}</th> 
         <th><a href="{{URL::to('MiCuenta/'.$tickets[$i].'/Devolver')}}">Devolver</a></th>
        </tr>
        @endfor
     
     </tr>
</table>
@endsection