<?php

$conexion = mysql_connect ("localhost","proyecto","proyecto");

mysql_select_db("proyecto",$conexion);
try{
mysql_query("INSERT INTO usuario (nombre,pass,correo) VALUES ('{$_POST['r_usuario']}','{$_POST['r_usuario']}','{$_POST['r_usuario']}')");

}catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}
mysql_close($conexion);
header('Location: index.php');
?>