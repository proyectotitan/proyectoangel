<?php

$conexion = mysql_connect ("mysql.hostinger.es","u155657675_proye","proyecto");
mysql_select_db("u155657675_proye",$conexion);

$insertado=mysql_query("INSERT INTO usuario (nombre,pass,correo, peticiones, privados, avatar) VALUES ('{$_POST['r_usuario']}','{$_POST['r_pass']}','{$_POST['r_email']}', '0', '0', '../img/avatar.jpg')");

if(!$insertado){
$x=mysql_errno();
}


if($x==1062){
$error="El usuario ya existe, debes registrarte con otro nombre";
}
else
{
$error="";

 $headers = "MIME-Version: 1.0\r\n";
 $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
 $headers .= "From: oscar <osquitarbs@gmail.com>\r\n"; 
$mail = 'osquitarbs@gmail.com';
$asunto = 'El título';
$mensaje = 'Hola';
if(mail($mail,$asunto,$mensaje,$headers))
 echo "Mensaje enviado correctamente";
 else
 echo "Error al enviar el mensaje";


}
//mysql_error muestra el error producido

mysql_close($conexion);

header("Location: index.php?varerror=$error");
?>