 <?php
 
     session_start();
    if ($_SESSION["usuario"]=="")
	header("Location: index.php");
 
 	
	$conexion = mysql_connect ("mysql.hostinger.es","u155657675_proye","proyecto");
        mysql_select_db("u155657675_proye",$conexion);
 
 
if (isset($_POST['chk_groupr'])) {
    $optionArray = $_POST['chk_groupr'];
    for ($i=0; $i<count($optionArray); $i++) {	
      
		mysql_query("DELETE FROM baneados WHERE nom_ban ='{$optionArray[$i]}' AND grup_ban ='{$_POST['nombregr']}'");  	
		
    }
	}
	    mysql_close($conexion); 
    header("Location: gestionar.php?grupo={$_POST['nombregr']}");
	
	
	
	

?>