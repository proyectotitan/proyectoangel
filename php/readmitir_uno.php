<?php
    session_start();
    if ($_SESSION["usuario"]=="")
	header("Location: index.php");
	
	$conexion = mysql_connect ("mysql.hostinger.es","u155657675_proye","proyecto");
        mysql_select_db("u155657675_proye",$conexion);
    mysql_query("DELETE FROM baneados WHERE nom_ban ='{$_GET["id"]}' AND grup_ban ='{$_GET["gnombre"]}'");   
    mysql_close($conexion); 
    header("Location: gestionar.php?grupo={$_GET["gnombre"]}");
	
	?>