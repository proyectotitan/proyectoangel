<?php

$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
$longitudCadena=strlen($cadena);
$pass = "";
$longitudPass=10;
for($i=1 ; $i<=$longitudPass ; $i++){
$pos=rand(0,$longitudCadena-1);
$pass .= substr($cadena,$pos,1);}

$conexion = mysql_connect ("mysql.hostinger.es","u155657675_proye","proyecto");
mysql_select_db("u155657675_proye",$conexion);

$insertado=mysql_query("INSERT INTO usuario (nombre,pass,correo, peticiones, privados, avatar) VALUES ('{$_POST['r_usuario']}','$pass','{$_POST['r_email']}', '0', '0', '../img/avatar.jpg')");

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
 $headers .= "From: Hoy en el Mundo <hoyenelmundoweb1@gmail.com>\r\n"; 
$mail = $_POST['r_email'];
$asunto = 'Bienvenido a hoy en el mundo';
$mensaje = '
<p style="background-color:#d10a0d;background-image:-moz-linear-gradient(center top,#d10a0d,#650506);background:-moz-linear-gradient(top,#d10a0d,#650506);background:-o-linear-gradient(top,#d10a0d,#650506);border:1px solid #6e6e6e;color:white;font-size:1.8em;font-weight:bold;text-align:center;padding-bottom:1%;padding-top:1%;border-radius:1em">
            Bienvenido a hoy en el mundo '.$_POST['r_usuario'].'</p>
  <p><strong>Usuario: </strong>'.$_POST['r_usuario'].' 
  </p><p><strong>Clave: </strong>'.$pass.' 
      <p>
  Se le ha asignado una clave aleatoria para que nadie pueda registrarse con su correo sin permiso, <br>
  Le recomendamos que una vez ingrese en la web vaya a su perfil de usuario y cambie la clave,<br>
  de esta manera le sera mas sencilla de recordar.
  Si no sabe  a que hacer referencia este correo ignorele.</p>   
';
if(mail($mail,$asunto,$mensaje,$headers))
 $error="Se ha enviado un correo a su cuenta reviselo para acceder a la web";
 else
 echo "Error al enviar correo, intentelo en unos minutos, gracas";


}
//mysql_error muestra el error producido

mysql_close($conexion);

header("Location: index.php?varerror=$error");
?>