<?php
    session_start();
    if ($_SESSION["usuario"]=="")
	header("Location: index.php");
	
	$conexion = mysql_connect ("localhost","proyecto","proyecto");        
    mysql_select_db("proyecto", $conexion);
    
	mysql_query("DELETE FROM usuario WHERE nombre ='{$_GET["nombre"]}'");
   
    mysql_close($conexion); 
    header("Location: index.php");