<?php
    session_start();
    if ($_SESSION["usuario"]=="")
	header("Location: index.php");

    $conexion = mysql_connect ("localhost","proyecto","proyecto");        
    mysql_select_db("proyecto", $conexion);

    mysql_query("DELETE FROM `amigos` WHERE (amigo1='{$_GET["usuario"]}' or amigo2='{$_GET["usuario"]}') and (amigo1='{$_SESSION["usuario"]}' or amigo2='{$_SESSION["usuario"]}')"); 
                $error= mysql_error();
                mysql_close($conexion);
                if ($error=="")
                    $mensaje_ventana="Amigo eliminado correctamente";
                else
                    $mensaje_ventana="Se ha producido un error, puede ser que el amigo haya sido eliminado ya";
                mysql_close($conexion); 
                header("Location: mensajes_info.php?mensaje_ventana=$mensaje_ventana&error=$error");
    mysql_close($conexion); 
    header("Location: mensajes_info.php?mensaje_ventana=$mensaje_ventana&error=$error");
?>