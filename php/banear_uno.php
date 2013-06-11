<?php
    session_start();
    if ($_SESSION["usuario"]=="")
	header("Location: index.php");
	$conexion = mysql_connect ("mysql.hostinger.es","u155657675_proye","proyecto");

mysql_select_db("u155657675_proye",$conexion);
    mysql_query("INSERT INTO baneados (nom_ban, grup_ban) VALUES('{$_GET["id"]}','{$_GET["gnombre"]}')");
    mysql_close($conexion); 
    header("Location: gestionar.php?grupo={$_GET["gnombre"]}");