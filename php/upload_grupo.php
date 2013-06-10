 <?php

 	session_start();
	if ($_SESSION["usuario"]==""){
		header("Location: index.php");  }
		

		
$conexion = mysql_connect ("localhost","proyecto","proyecto");		
mysql_select_db("proyecto",$conexion);

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
mysql_query("UPDATE grupos SET descripcion_g='{$_POST['g_descripcion']}',imagen='$nom_img',seccion='{$_POST['g_secciones']}' WHERE nom_grup='{$_POST['n_hiden']}'");

}

else{
mysql_query("UPDATE grupos SET descripcion_g='{$_POST['g_descripcion']}',seccion='{$_POST['g_secciones']}' WHERE nom_grup='{$_POST['n_hiden']}'");
}

mysql_close($conexion);
header("Location: gestionar.php?grupo={$_POST['n_hiden']}");

?>