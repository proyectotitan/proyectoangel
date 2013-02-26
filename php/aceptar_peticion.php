<?php

session_start();
if ($_SESSION["usuario"]=="")
	header("Location: index.php");

$conexion = mysql_connect ("localhost","proyecto","proyecto");

mysql_select_db("proyecto",$conexion);

$insertado=mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('{$_GET["peticion"]}', '{$_SESSION["usuario"]}')");

$insertado=mysql_query("DELETE FROM `peticiones` WHERE env = '{$_GET["peticion"]}' and rec = '{$_SESSION["usuario"]}'");

mysql_close($conexion);

header("Location: peticiones.php");
?>