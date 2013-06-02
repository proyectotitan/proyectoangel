<?php

$conexion = mysql_connect ("localhost","proyecto","proyecto");

mysql_select_db("proyecto",$conexion);

$usuario = $_POST['s_usuario'];

$password = $_POST['s_pass'];

$query = sprintf("SELECT nombre FROM usuario WHERE nombre='%s' && pass = '%s'", $usuario, $password);
$query2 = sprintf("SELECT nombre FROM usuario WHERE nombre = '%s' && sesion = '1'", $usuario);

$result=mysql_query($query,$conexion);
$conectado = mysql_query($query2, $conexion); 


if (mysql_num_rows($conectado)){

$error= "Ese usuario ya ha iniciado sesion en otro lugar";
header("Location: index.php?varerror=$error");

}

else if(mysql_num_rows($result)){
$array=mysql_fetch_array($result);

session_start(); 
$_SESSION["usuario"]= $array["nombre"];
$_SESSION["inicio"]=1;
mysql_query ("UPDATE usuario SET sesion = '1' WHERE nombre = '{$_POST['s_usuario']}'" );


header("Location: inicio.php");
}


else
{
$error= "Usuario y contraseña no coinciden";
header("Location: index.php?varerror=$error");
}
mysql_close($conexion);


?>