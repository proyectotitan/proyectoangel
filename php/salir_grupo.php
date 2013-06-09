<?php
    session_start();
    if ($_SESSION["usuario"]=="")
	header("Location: index.php");
	
	$conexion = mysql_connect ("localhost","proyecto","proyecto");        
    mysql_select_db("proyecto", $conexion);
   mysql_query("DELETE FROM pertenecen WHERE nom_grup ='{$_GET["ng"]}' AND nombre = '{$_SESSION["usuario"]}' ");
    
    mysql_close($conexion); 
    header("Location: inicio.php");