<?php
    session_start();
    if ($_SESSION["usuario"]=="")
	header("Location: index.php");
	
	$conexion = mysql_connect ("mysql.hostinger.es","u155657675_proye","proyecto");

mysql_select_db("u155657675_proye",$conexion);
    mysql_query("DELETE FROM mensajes WHERE nom_grup ='{$_GET["gnombre"]}' AND cod_men='{$_GET["id"]}'");    
    mysql_close($conexion); 
    header("Location: gestionar.php?grupo={$_GET["gnombre"]}");
	
	?>