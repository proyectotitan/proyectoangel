<?php
    session_start();
    if ($_SESSION["usuario"]=="")
	header("Location: index.php");
	
	$conexion = mysql_connect ("localhost","proyecto","proyecto");        
    mysql_select_db("proyecto", $conexion);
    
	mysql_query("UPDATE usuario SET pass='{$_GET["pass"]}', correo='{$_GET["correo"]}', telefono='{$_GET["telefono"]}', provincia='{$_GET["provincia"]}', municipio='{$_GET["municipio"]}', avatar='{$_GET["avatar"]}', gustos='{$_GET["gustos"]}', estado='{$_GET["estado"]}', fecna='{$_GET["fecna"]}', sexo='{$_GET["sexo"]}'  WHERE nombre ='{$_GET["nombre"]}'");
   
    mysql_close($conexion); 
    header("Location: inicio.php");