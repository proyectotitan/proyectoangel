<?php
    session_start();
    if ($_SESSION["usuario"]=="")
	header("Location: index.php");
	
	$conexion = mysql_connect ("localhost","proyecto","proyecto");        
    mysql_select_db("proyecto", $conexion);
    mysql_query("DELETE FROM mensajes WHERE nom_grup ='{$_GET["gnombre"]}'");    
    mysql_close($conexion); 
    header("Location: inicio.php");