<?php
	session_start();
	if ($_SESSION["usuario"]=="")
		header("Location: index.php");
		
	$conexion = mysql_connect ("localhost","proyecto","proyecto");        
	mysql_select_db("proyecto", $conexion);
	mysql_query("INSERT INTO `mens_enviado`(`contenido`, `fechen`, `emisor`, `receptor`) 
	VALUES ('{$_POST['mensaje']}', sysdate(), '{$_SESSION["usuario"]}', '{$_POST['amigos']}');");
	mysql_query("INSERT INTO `mens_recibido`(`contenido`, `fechen`, `emisor`, `receptor`) 
	VALUES ('{$_POST['mensaje']}', sysdate(), '{$_SESSION["usuario"]}', '{$_POST['amigos']}');");
	$n_privados = mysql_query("SELECT privados FROM usuario where nombre='{$_POST['amigos']}';");
        $nu_privados = mysql_fetch_array($n_privados);
	mysql_query("UPDATE `usuario` SET `privados`='{$nu_privados['privados']}'+1 where nombre='{$_POST['amigos']}';");
        echo $error = mysql_error();
        if($_POST['responder']==1)
            header("Location: mensajes_recibidos.php?mensaje_conf='Mensaje respondido correctamente'");
        else{
        if ($error==""){
        $mensaje_ventana="Mensaje enviado correctamente";}
        else{
            $mensaje_ventana="Se ha producido un error, intentelo mas tarde";
        }
        mysql_close($conexion); 

        header("Location: mensajes_info.php?mensaje_ventana=$mensaje_ventana&error=$error");}
?>      
