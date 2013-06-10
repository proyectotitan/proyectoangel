 <?php
 
     session_start();
    if ($_SESSION["usuario"]=="")
	header("Location: index.php");
 
 	
	$conexion = mysql_connect ("localhost","proyecto","proyecto");        
    mysql_select_db("proyecto", $conexion);
 
 
if (isset($_POST['chk_groupb'])) {
    $optionArray = $_POST['chk_groupb'];
    for ($i=0; $i<count($optionArray); $i++) {	
      
		mysql_query("INSERT INTO baneados (nom_ban, grup_ban) VALUES('{$optionArray[$i]}','{$_POST['nombregb']}')");	
		
    }
	}
	    mysql_close($conexion); 
    header("Location: gestionar.php?grupo={$_POST['nombregb']}");
	
	
	
	

?>