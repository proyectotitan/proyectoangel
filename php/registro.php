<?php

$conexion = mysql_connect ("localhost","proyecto","proyecto");

mysql_select_db("proyecto",$conexion);

$insertado=mysql_query("INSERT INTO usuario (nombre,pass,correo) VALUES ('{$_POST['r_usuario']}','{$_POST['r_pass']}','{$_POST['r_email']}')");

if(!$insertado){
$x=mysql_errno();
}


if($x==1062){
$error="El usuario ya existe, debes registrarte con otro nombre";
}
else
{
$error="";
}
//mysql_error muestra el error producido

mysql_close($conexion);

header("Location: index.php?varerror=$error");
?>