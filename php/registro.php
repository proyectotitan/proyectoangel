<?php

$conexion = mysql_connect ("localhost","proyecto","proyecto");

mysql_select_db("proyecto",$conexion);

$insertado=mysql_query("INSERT INTO usuario (nombre,pass,correo, peticiones, privados, avatar) VALUES ('{$_POST['r_usuario']}','{$_POST['r_pass']}','{$_POST['r_email']}', '0', '0', '../img/avatar.jpg')");

if(!$insertado){
$x=mysql_errno();
}


if($x==1062){
$error="El usuario ya existe, debes registrarte con otro nombre";
}
else
{
$error="";


$para = 'carloswolf666@gmail.com';
$titulo = 'El título';
$mensaje = 'Hola';

mail($para, $titulo, $mensaje);


}
//mysql_error muestra el error producido

mysql_close($conexion);

header("Location: index.php?varerror=$error");
?>