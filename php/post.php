<?php

$conexion = mysql_connect ("localhost","proyecto","proyecto");

mysql_select_db("proyecto",$conexion);

$fecha=strftime( "%Y-%m-%d-%H-%M-%S", time() );


mysql_query("INSERT INTO mensajes (texto, fecha, nombre, nom_grup) VALUES('{$_POST['upost']}','$fecha','{$_POST['n_usu']}','{$_POST['n_grup']}')");

mysql_close($conexion);
header("Location: grupo.php?grupo={$_POST['n_grup']}");
?>