
<center>
<H2>CREAR USUARIO</H2> <br>
<hr>

<form method="post" action="{{route ('admi.store')}}" action="" name="f1">
	{{csrf_field()}}
    
    Nombres:<input type="text" id ="name" name="name"/><br>
    Apellidos:<input type="text" id ="surname" name="surname"/><br>
    Correo:<input type="text" id ="email" name="email"/><br>
    Usuario:<input type="text" id ="user" name="user"/> <br>
    Telefono:<input type="text" id ="phone" name="phone"/> <br>
    Contraseña: <input type="password" name="password" id="password">
    <hr><input type="submit" value="Guardar"/>
</form>
