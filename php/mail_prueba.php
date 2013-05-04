<?php
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
?>