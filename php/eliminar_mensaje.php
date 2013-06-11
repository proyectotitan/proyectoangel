<?php
$conexion = mysql_connect ("mysql.hostinger.es","u155657675_proye","proyecto");

mysql_select_db("u155657675_proye",$conexion);
$cod_pag=$_GET["cod_p"];
if($cod_pag==1)
{  
    $tabla='mens_recibido';
    $cod='cod_rec';
    
}
else 
{
    $tabla='mens_enviado';
    $cod='cod_env';
}
 mysql_query("DELETE FROM $tabla WHERE ".$cod."='{$_GET["cod_mensaje"]}'");
 mysql_close($conexion);
 if($cod_pag==1)
    header("Location: mensajes_recibidos.php"); 
 else 
     header("Location: mensajes_enviados.php");  
?>
