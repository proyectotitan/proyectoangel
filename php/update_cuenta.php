<?php
    session_start();
    if ($_SESSION["usuario"]=="")
	header("Location: index.php");
	
	if($_FILES ['uploadImage'][ 'size' ]){

$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; 
$cad = ""; 
for($i=0;$i<12;$i++) { 
$cad .= substr($str,rand(0,62),1); 
} 
// Fin de la creacion de la cadena aletoria 
$tamano = $_FILES ['uploadImage'][ 'size' ]; // Leemos el tamaño del fichero 
$tamaño_max="50000000000"; // Tamaño maximo permitido 
if( $tamano < $tamaño_max){ // Comprovamos el tamaño  
$destino = '../img' ; // Carpeta donde se guardata 
$sep=explode('image/',$_FILES['uploadImage']["type"]); // Separamos image/ 
$tipo=$sep[1]; // Optenemos el tipo de imagen que es 
if($tipo == "gif" || $tipo == "jpeg" || $tipo == "png"){ // Si el tipo de imagen a subir es el mismo de los permitidos, segimos. Puedes agregar mas tipos de imagen 
move_uploaded_file ( $_FILES ['uploadImage'][ 'tmp_name' ], $destino . '/' .$cad.'.'.$tipo);  // Subimos el archivo 
}
}
$nom_img=$destino . '/' .$cad.'.'.$tipo;

}

else{

$nom_img="../img/avatar.jpg";

}
	
	$conexion = mysql_connect ("mysql.hostinger.es","u155657675_proye","proyecto");
        mysql_select_db("u155657675_proye",$conexion);
    
	mysql_query("UPDATE usuario SET pass='{$_POST['u_pass']}', correo='{$_POST['u_email']}', telefono='{$_POST['u_telefono']}', provincia='{$_POST['u_prov']}', municipio='{$_POST['u_muni']}', avatar='$nom_img', gustos='{$_POST['gustos']}', estado='{$_POST['u_estado']}', fecna='{$_POST['u_fecna']}', sexo='{$_POST['sexo']}'  WHERE nombre ='{$_POST['u_nombre']}'");
   
    mysql_close($conexion); 
    header("Location: inicio.php");