 <?php
 
     session_start();
    if ($_SESSION["usuario"]=="")
	header("Location: index.php");
 
 	
	$conexion = mysql_connect ("mysql.hostinger.es","u155657675_proye","proyecto");

mysql_select_db("u155657675_proye",$conexion);
 
 
if (isset($_POST['chk_group'])) {
    $optionArray = $_POST['chk_group'];
    for ($i=0; $i<count($optionArray); $i++) {	
      
		mysql_query("DELETE FROM mensajes WHERE nom_grup ='{$_POST['nombreg']}' AND cod_men='{$optionArray[$i]}'");  	
		
    }
	}
	    mysql_close($conexion); 
    header("Location: gestionar.php?grupo={$_POST['nombreg']}");
	
	
	
	

?>