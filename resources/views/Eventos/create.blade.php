

<form method= "post" action="{{route('Eventos.store')}}">
{{ csrf_field() }}
	<label><DIV ALIGN="center"><P><h1> EVENTO</h1></DIV> </label><br>
    <table>
    <tr>
	 <td><label>Nombre de el Evento:</label></td><td><input type="text" id="evento" name="evento" ><br></td>
	 </tr>
     <tr>
     <td><label>Fecha:</label></td><td><input type="text" id="fecha" name="fecha" ><br></td>
	 </tr>
     <tr>
     <td><label>Total de Publico(personas):</label></td><td><input type="int" id="publico" name="publico" ><br></td>
     </tr>
     <tr>
     <td> <label>Tickets totales:</label></td><td><input type="text" id="tickets" name="tickets" ><br></td>
	 </tr>
     <tr>
     <td><label>Horario Inicio:</label></td><td><input type="text" id="horarioinicio" name="horarioinicio" ><br></td>
	 </tr>
     <tr>
     <td><label>Horario Final:</label></td><td><input type="text" id="horariofinal" name="horariofinal" ><br></td>
	 </tr>
     <tr>
     <td><label>Lugar:</label></td><td><input type="text" id="lugar" name="lugar" ><br></td>
     </tr>
        </table>

	 <input type ="submit" value="Guardar">
</form> 



	 

