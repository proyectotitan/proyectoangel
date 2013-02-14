<?php

$conexion = mysql_connect ("localhost","proyecto","proyecto");

mysql_select_db("proyecto",$conexion);

$usuario = $_POST['s_usuario'];

$password = $_POST['s_pass'];

$query = sprintf("SELECT nombre FROM usuario WHERE nombre='%s'&& pass = '%s'", $usuario, $password);

$result=mysql_query($query,$conexion);
if(mysql_num_rows($result)){
$array=mysql_fetch_array($result);

session_start(); 
$_SESSION["usuario"]= $array["nombre"];

header("Location: inicio.php");
}
else
{
$error= "Usuario y contraseña no coinciden";
header("Location: index.php?varerror=$error");
}
mysql_close($conexion);


?>