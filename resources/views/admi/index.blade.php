<center>
<H2>USUARIOS</H2>
<hr>
<table id="mytable" class="table table.borderd table-striped">

<tbody>

    @foreach($adms as $Admi)
   
    
   <tr> 
        
       <td><B>Nombres:</B> {{$Admi->name}}</td>

       <td><B>Apellidos:</B> {{$Admi->surname}}</td>
        
        <td><B>Correo: </B>{{$Admi->email}}</td>
        
        <td><B>Usuario: </B>{{$Admi->user}}</td>
        
        <td><B>Telefono: </B>{{$Admi->phone}}</td>
        
        <td><input type="submit" onClick="location='admi/{{$Admi->id}}/edit'" value="Editar Usuario"/> </td>
        
        </tr>

@endforeach
        </tbody>
        </table>
        <hr>
        <input type="submit" onClick="location='admi/create'" value="Crear Usuario"/>
        

<div>
</div>