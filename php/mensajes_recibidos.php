<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Mensajes recibidos</title>
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

<?php
	session_start();
	if ($_SESSION["usuario"]=="")
		header("Location: index.php");
        $conf=$_GET['mensaje_conf'];
?>

    <link href="../css/bootstrap.css" rel="stylesheet">
    
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
		<link href="../css/bordes.css" rel="stylesheet">
    
  </head>
<?php	
    $conexion = mysql_connect ("localhost","proyecto","proyecto");        
	mysql_select_db("proyecto", $conexion);
	$mensajes=mysql_query("SELECT cod_rec, emisor, fechen, contenido FROM mens_recibido WHERE receptor='{$_SESSION["usuario"]}' order by fechen desc");
        $codigos=mysql_query("SELECT cod_rec, fechen FROM mens_recibido WHERE receptor='{$_SESSION["usuario"]}' order by cod_rec desc");
	
?>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#" style="margin-top: 2px"><img src="../img/mundo_blanco.png" width="20" height="20"> Hoy en el mundo</a>
          <div class="nav-collapse collapse">
		  
			   	<ul class="nav">
						<li>
							<a href="inicio.php"><i class="icon-home"></i>&nbsp;Inicio</a>
						</li>
					</ul>
		     <ul role="navigation" class="nav">
                    <li class="dropdown, active" >
                      <a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#" id="drop1"><i class="icon-envelope"></i>&nbsp;Mensajes <b class="caret"></b></a>
                      <ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
                        <li><a href="javascript:Abrir_ventana('mensaje_nuevo.php')" tabindex="-1">Enviar mensaje nuevo</a></li>
												<li class="dropdown-submenu">
                        <a href="#" tabindex="-1">Buz&oacute;n</a>
                        <ul class="dropdown-menu">
													<li><a href="mensajes_recibidos.php" tabindex="-1">Mensajes recibidos</a></li>
													<li><a href="mensajes_enviados.php" tabindex="-1">Mensajes enviados</a></li>
                    		</ul>
                 		 </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop2" href="#"><i class="icon-th-large"></i>&nbsp;Grupos<b class="caret"></b></a>
                      <ul aria-labelledby="drop2" role="menu" class="dropdown-menu">
                        <li><a href="#" tabindex="-1"></a></li>
                        <li><a href="mis_grupos.php" tabindex="-1">Mis grupos</a></li>
                        <li><a href="nuevo_grupo.php" tabindex="-1">Nuevo grupo</a></li>
                      </ul>
                    </li>
                  </ul>
                  </li>
									<ul class="nav pull-right">
                    <li class="dropdown" id="fat-menu">
                      <a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop3" href="#"><i class="icon-asterisk"></i>&nbsp;Cuenta de (<?php echo $_SESSION["usuario"];?>)<b class="caret"></b></a>
                      <ul aria-labelledby="drop3" role="menu" class="dropdown-menu">
                        <li><a href="editar_perfil.php" tabindex="-1">Editar perfil</a></li>
                        <li class="divider"></li>
                        <li><a href="cerrar_sesion.php" tabindex="-1"><i class="icon-off"></i>&nbsp;Cerrar sesi&oacute;n</a></li>
                      </ul>
                    </li>
                  </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
		
		
<div class="container-fluid" style="margin-top:60px;">
    <?php if ($conf!=""){ ?>
            <div class="alert alert-block">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Mensaje respondido correctamente</h4>
            </div>
        <?php } ?>
	<div class="row-fluid">
        
    	<div class="span3">  
                  <div class="bs-docs-sidebar">
                    <ul class="nav nav-list bs-docs-sidenav affix">
                        <li><a href="javascript:Abrir_ventana('mensaje_nuevo.php')"><i class="icon-chevron-right"></i>Enviar mensaje</a></li>
                        <li class="active"><a href="mensajes_recibidos.php"><i class="icon-chevron-right"></i>Mensajes recibidos</a></li>
                        <li><a href="mensajes_enviados.php"><i class="icon-chevron-right"></i>Mensajes enviados</a></li>
                    </ul>
                      
                  </div>
            
              </div>	
        
        <div class="span9">
		<div class="accordion" id="accordion2">
		<table class="table"> 
		<thead>
			<tr>
				<th><div align="center">Lista de mensajes recibidos</div></th>
			</tr>
		</thead>
		<tbody>
         <?php
		 mysql_query("UPDATE usuario SET privados=0 WHERE nombre='{$_SESSION["usuario"]}'");
		 mysql_close($conexion);
		 if( $mensajes!="")
		  	while ($registro = mysql_fetch_array($mensajes)){
          ?>
			<tr>
				<td>
					<div class="accordion-group">
					<div class="accordion-heading accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse_<?php echo $registro['cod_rec']; ?>">
					<a  style="display:inline-block; text-decoration:none; color: white;">
					Mensaje recibido de <?php echo $registro['emisor']; ?> el <?php  echo $registro['fechen'];?>
					
					</a>
					
					
					</div>
					<div id="collapse_<?php echo $registro['cod_rec']; ?>" class="accordion-body collapse" >
					<div class="accordion-inner">
                                            <a href="#eliminar_<?php echo $registro['cod_rec']; ?>" data-toggle="modal" role="button" title="Eliminar mensaje" rel="tooltip" class="pull-right" style="vertical-align:middle;">
                                                <img src="../img/iconos/glyphicons_016_bin.png" style="width: 12px; margin-left: 15px;"/>
                                            </a>
                                            
					<a title="Responder este mensaje" rel="tooltip" onClick="crear_respuesta('id_<?php echo $registro['cod_rec']; ?>', '<?php echo $registro['emisor']; ?>')" href="#" class="pull-right" id="e_<?php echo $registro['cod_rec']; ?>">
                                            <img src="../img/iconos/glyphicons_152_new_window.png" style="width: 17px;">
                                        </a>
					<?php echo $registro['contenido']; ?>
					<div id="id_<?php echo $registro['cod_rec']; ?>"></div>
					</div>
					</div>
					</div>
				</td>
			</tr>
            <?php } ?>
		</table>
	</div>
	</div>
</div>  
    <?php while ($registro = mysql_fetch_array($codigos)){ ?>
<div id="eliminar_<?php echo $registro['cod_rec']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:auto; height:auto;">
        <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i><img src="../img/iconos/glyphicons_197_remove.png" width="17" height="25"></i></button>
        <h3 id="myModalLabel">Eliminar mensaje.</h3>
        <img src="../img/fondo_sombra_crear_cuenta_basica.png" class="sombra_titulos_pupop"></img>
        </div>
        <div class="modal-body">
            <p>¿Estas seguro de eliminar el mensaje?</p>
            <div class="modal-footer" id="mod">
                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                <a href="eliminar_mensaje.php?cod_mensaje=<?php echo $registro['cod_rec']; ?> &cod_p=1" class="btn btn-success" data-loading-text="Eliminando...">Eliminar mensaje</a>
            </div>
        </div>
    </div>
   <?php } ?>
    <script src="../js/jquery.js"></script>
	  <script src="../js/responder.js"></script>
    <script src="../js/bootstrap-transition.js"></script>
    <script src="../js/bootstrap-alert.js"></script>
	  <script src="../js/abrir_ventana.js"></script>
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



  </body>
</html>
