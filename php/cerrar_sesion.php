<?php
	session_start();
	$usuario = $_SESSION["usuario"];
	$conexion = mysql_connect ("localhost","proyecto","proyecto");
	mysql_select_db("proyecto",$conexion);
    mysql_query ("UPDATE usuario SET sesion = '0' WHERE nombre = '$usuario'");
	session_destroy();
	$_SESSION["usuario"]="";

	header("Location: index.php");
?>