<?php

session_start();
if ($_SESSION["usuario"]=="")
	header("Location: index.php");

$conexion = mysql_connect ("mysql.hostinger.es","u155657675_proye","proyecto");
mysql_select_db("u155657675_proye",$conexion);

mysql_query("DELETE FROM `peticiones` WHERE env = '{$_GET["peticion"]}' and rec = '{$_SESSION["usuario"]}'");
echo mysql_error();
$c_peticiones=mysql_query("SELECT peticiones FROM usuario WHERE nombre='{$_SESSION["usuario"]}'");
$g_peticiones = mysql_fetch_array($c_peticiones);
$n_peticiones=$g_peticiones['peticiones']-1; 
mysql_query("UPDATE `usuario` SET `peticiones`= {$n_peticiones} WHERE nombre='{$_SESSION["usuario"]}'");

mysql_close($conexion);

header("Location: peticiones.php");
?>