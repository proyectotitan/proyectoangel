  <?php

 	session_start();
	if ($_SESSION["usuario"]=="")
		header("Location: index.php");
		
$conexion = mysql_connect ("localhost","proyecto","proyecto");

mysql_select_db("proyecto",$conexion);

mysql_query("INSERT INTO pertenecen (nombre, nom_grup) VALUES('{$_SESSION["usuario"]}','{$_GET["ng"]}')");
mysql_close($conexion);
header("Location: grupo.php?grupo={$_GET["ng"]}");