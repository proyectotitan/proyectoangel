<?php
	session_start();
	$usuario = $_SESSION["usuario"];
	$conexion = mysql_connect ("mysql.hostinger.es","u155657675_proye","proyecto");

mysql_select_db("u155657675_proye",$conexion);
    mysql_query ("UPDATE usuario SET sesion = '0' WHERE nombre = '$usuario'");
	session_destroy();
	$_SESSION["usuario"]="";

	header("Location: index.php");
?>