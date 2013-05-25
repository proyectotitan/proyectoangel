<?php
    session_start();
    if ($_SESSION["usuario"]=="")
	header("Location: index.php");

    $conexion = mysql_connect ("localhost","proyecto","proyecto");        
    mysql_select_db("proyecto", $conexion);

    mysql_query("INSERT INTO peticiones (texto, env, rec) VALUES('{$_POST["mensaje"]}', '{$_SESSION["usuario"]}', '{$_POST["nombre"]}')");
    $error= mysql_error();
    
    $c_peticiones=mysql_query("SELECT peticiones FROM usuario WHERE nombre='{$_POST["nombre"]}'");
    $g_peticiones = mysql_fetch_array($c_peticiones);
    $n_peticiones=$g_peticiones['peticiones']+1; 
    mysql_query("UPDATE `usuario` SET `peticiones`= {$n_peticiones} WHERE nombre='{$_POST["nombre"]}'");
    
    if ($error=="")
        $mensaje_ventana="Petición enviada correctamente";
    else
        $mensaje_ventana="Se ha producido un error, puede ser que la invitacion ya haya sido enviada con anterioridad";
    
    mysql_close($conexion); 

    header("Location: mensajes_info.php?mensaje_ventana=$mensaje_ventana&error=$error");
?>