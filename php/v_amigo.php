<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Hoy en el Mundo</title>
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
<?php
	session_start();
	if ($_SESSION["usuario"]=="")
	header("Location: index.php");
?>
	
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-ui.js"></script>
	<script src="../js/interface.js"></script>   
    <script src="../js/bootstrap-alert.js"></script>
    <script src="../js/bootstrap-transition.js"></script>
    <script src="../js/bootstrap-modal.js"></script>
    <script src="../js/bootstrap-dropdown.js"></script>
    <script src="../js/bootstrap-scrollspy.js"></script>
    <script src="../js/bootstrap-tab.js"></script>
    <script src="../js/bootstrap-tooltip.js"></script>
    <script src="../js/bootstrap-popover.js"></script>
    <script src="../js/bootstrap-button.js"></script>
    <script src="../js/bootstrap-collapse.js"></script>
    <script src="../js/bootstrap-carousel.js"></script>
    <script src="../js/bootstrap-typeahead.js"></script>
            
     <?php
      $cadena = "SELECT amigo1 FROM amigos WHERE (amigo1='{$_GET["usuario"]}' or amigo2='{$_GET["usuario"]}') and (amigo1='{$_SESSION["usuario"]}' or amigo2='{$_SESSION["usuario"]}')"; 
      $cadena2 = "SELECT nombre, correo, telefono, provincia, municipio, avatar, gustos, estado, fecna, peticiones  FROM usuario WHERE nombre='{$_GET["usuario"]}'";    
      $conexion = mysql_connect ("localhost","proyecto","proyecto");        
      mysql_select_db("proyecto", $conexion);    
      $c_amigo = mysql_query($cadena);
	  $datos_usuario = mysql_query($cadena2);
	  $registro2 = mysql_fetch_array($datos_usuario);	
    ?>
    
    
    
	<link href="../css/bootstrap.css" rel="stylesheet"/>
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <link href="../css/bootstrap-responsive.css" rel="stylesheet"/>
	<link href="../css/bordes.css" rel="stylesheet"/>
	<link href="../css/blitzer/jquery-ui-css.css" rel="stylesheet"/>
	<link href="../css/chat/chat.css" rel="stylesheet"/>


  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" style="margin-top: 2px"><img src="../img/mundo_blanco.PNG" width="25" height="25"> Hoy en el mundo</a>
          
          <ul class="nav pull-right">
            <li>
            <?php
				$registro = mysql_fetch_array($c_amigo);
				if ($registro['amigo1']!="")
				{			
			?>
                <a href="#eliminar" data-toggle="modal" role="button" title="Ver usuario"><i class="icon-minus-sign"></i>&nbsp;&nbsp;Eliminar amigo</a>
             <?php
				}
				else	
				{		
			?>
            	<a href="#agregar" data-toggle="modal" role="button" title="Peticion amistad"><i class=" icon-plus-sign"></i>&nbsp;&nbsp;Enviar peticion de amistad</a>
             <?php } ?>
            </li>
		  </ul>
					
        </div>
      </div>
    </div>
    <?php    
      
    ?>
    <div class="container-fluid">
    	<div class="row-fluid">
            
     <h3><img src="<?php echo $registro2['avatar']; ?>" style="width: 40px"; height="40px">&nbsp;&nbsp;<?php echo $registro2['nombre'];?>
     
	<?php
		if ($registro['amigo1']!="")
			echo "(Amigo)";
		else	
			echo "(No amigo)";
	?>
     
     </h3>
        <p><b>Estado: </b><?php echo $registro2['estado'];?></p>
        <p><b>Email: </b><?php echo $registro2['correo'];?></p>
        <p><b>Fecha de nacimiento: </b><?php echo $registro2['fecna'];?></p>
        <p><b>Provincia: </b><?php echo $registro2['provincia'];?></p>
        <p><b>Municipio: </b><?php echo $registro2['municipio'];?></p>
        <p><b>Telefono: </b><?php echo $registro2['telefono'];?></p>
        <p><b>Gustos: </b><?php echo $registro2['gustos'];?></p>           
        </div>
    </div>

    <div id="agregar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:auto; height:auto;">
        <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i><img src="../img/iconos/glyphicons_197_remove.png" width="17" height="25"></i></button>
        <h3 id="myModalLabel">Enviar petici&oacute;n de amistad.</h3>
        </div>
        <div class="modal-body">
                <p>¿Estas completamente seguro de querer agregar a <?php echo $registro2['nombre'];?> a tus amigos?</p>
                <p>Mensaje de petici&oacute;n de amistad:</p>
                <form name="frm_agregar_amigo" action="agregar_amigo.php" method="POST">
                    <input type="hidden" name="nombre" value="<?php echo $registro2['nombre']; ?>">
                    <textarea rows="3" style="resize:none;" id="mensaje" name="mensaje"></textarea>
                    <div class="modal-footer" id="mod">
                        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                        <input type="submit" class="btn btn-success" value="Enviar petici&oacute;n">
                    </div>
                </form>
        </div>
    </div>
    <div id="eliminar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:auto; height:auto;">
        <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i><img src="../img/iconos/glyphicons_197_remove.png" width="17" height="25"></i></button>
        <h3 id="myModalLabel">Eliminar amigo.</h3>
        </div>
        <div class="modal-body">
            <p>¿Estas completamente seguro de querer eliminar a <?php echo $registro2['nombre'];?> de tu lista de amigos?</p>
            <div class="modal-footer" id="mod">
                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                <a href="eliminar_amigo.php?usuario=<?php echo $registro2['nombre'];?>" class="btn btn-success">Eliminar amigo</a>
            </div>
        </div>
    </div>  
      
  </body>
</html>