<?php
    session_start();
    if ($_SESSION["usuario"]=="")
	header("Location: index.php");
	
	$conexion = mysql_connect ("localhost","proyecto","proyecto");        
    mysql_select_db("proyecto", $conexion);
	
	$h_b=mysql_query("SELECT nombre  FROM pertenecen WHERE nom_grup='{$_GET["gnombre"]}' AND nombre <> '{$_SESSION["usuario"]}' AND nombre NOT IN (SELECT nom_ban FROM baneados)");
	
	while ($hban = mysql_fetch_array($h_b)){
	
	
    mysql_query("INSERT INTO baneados (nom_ban, grup_ban) VALUES('{$hban[nombre]}','{$_GET["gnombre"]}')");	
	
	}
	
    mysql_close($conexion); 
    header("Location: gestionar.php?grupo={$_GET["gnombre"]}");