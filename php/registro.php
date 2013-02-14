<?php

$conexion = mysql_connect ("localhost","proyecto","proyecto");

mysql_select_db("proyecto",$conexion);

$insertado=mysql_query("INSERT INTO usuario (nombre,pass,correo) VALUES ('{$_POST['r_usuario']}','{$_POST['r_usuario']}','{$_POST['r_usuario']}')");

if(!$insertado){
$x=mysql_errno();
}

if($x==1062){
die("cuack!");
}
//mysql_error muestra el error producido

mysql_close($conexion);

header('Location: index.php');
?>