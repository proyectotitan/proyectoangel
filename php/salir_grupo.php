<?php
    session_start();
    if ($_SESSION["usuario"]=="")
	header("Location: index.php");
	
	$conexion = mysql_connect ("mysql.hostinger.es","u155657675_proye","proyecto");
        mysql_select_db("u155657675_proye",$conexion);
   mysql_query("DELETE FROM pertenecen WHERE nom_grup ='{$_GET["ng"]}' AND nombre = '{$_SESSION["usuario"]}' ");
    
    mysql_close($conexion); 
    header("Location: inicio.php");