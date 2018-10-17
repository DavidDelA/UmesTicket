<center>
<H2> EDITAR USUARIO </H2><hr>
<form method="post" action="{{action('AdmiController@update',$id)}}" action="" name="f1">
    {{csrf_field()}}

<input type="hidden" name="_method" value="PATCH"/>
Nombres:<input type="get" value="{{$adms->name}}" name="name"> <br>
Apellidos:<input type="get" value="{{$adms->surname}}" name="surname"> <br>
Correo:<input type="get" value="{{$adms->email}}" name="email"> <br>
Usuario:<input type="get" value="{{$adms->user}}" name="user"><br>
Telefono:<input type="get" value="{{$adms->phone}}" name ="phone"> <br>
Contraseña Actual:<input type="password" value="{{$adms->password}}"  name ="password"> <br>
Contraseña Nueva: <input type="password" name="password" id="password">

<hr><input type="submit" value="Modificar" />
</form>



