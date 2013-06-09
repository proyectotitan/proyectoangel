<?php
    session_start();
    if ($_SESSION["usuario"]=="")
	header("Location: index.php");
	
	$conexion = mysql_connect ("localhost","proyecto","proyecto");        
    mysql_select_db("proyecto", $conexion);
    mysql_query("DELETE FROM mensajes WHERE nom_grup ='{$_GET["gnombre"]}' AND cod_men='{$_GET["id"]}'");    
    mysql_close($conexion); 
    header("Location: gestionar.php?grupo={$_GET["gnombre"]}");
	
	?>