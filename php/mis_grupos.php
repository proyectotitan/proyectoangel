<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Mensajes enviados</title>
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	
			<!-- Carga de scripts -->
		
	<script src="../js/jquery.js"></script>
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
	
	

    <!-- Le styles -->

    <link href="../css/bootstrap.css" rel="stylesheet">
    
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
	<link href="../css/bordes.css" rel="stylesheet">
	
	
	<?php
	session_start();
	if ($_SESSION["usuario"]=="")
		header("Location: index.php");
?>
	
    
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
          <a class="brand" href="#" style="margin-top: 2px"><img src="../img/mundo_blanco.png" width="20" height="20"> Hoy en el mundo</a>
          <div class="nav-collapse collapse">
		  
			   	<ul class="nav">
						<li>
							<a href="inicio.php"><i class="icon-home"></i>&nbsp;Inicio</a>
						</li>
					</ul>
		     <ul role="navigation" class="nav">
                    <li class="dropdown" >
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
                    <li class="dropdown active">
                      <a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop2" href="#"><i class="icon-th-large"></i>&nbsp;Grupos<b class="caret"></b></a>
                      <ul aria-labelledby="drop2" role="menu" class="dropdown-menu">
                        <li><a href="#" tabindex="-1"></a></li>
                        <li><a href="mis_grupos.php" tabindex="-1">Mis grupos</a></li>
                        <li><a href="nuevo_grupo.php" tabindex="-1">Nuevo grupo</a></li>
												<li><a href="busca_grupos.php" tabindex="-1">Busca grupos</a></li>
                      </ul>
                    </li>
                     <li><a href="javascript:Abrir_ventana('chat.html')"><i class="icon-comment"></i>&nbsp;Chat</a></li>
                  </ul>
                  </li>
									<ul class="nav pull-right">
                    <li class="dropdown" id="fat-menu">

                      <a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop3" href="#"><i class="icon-asterisk"></i>&nbsp;Cuenta de <?php echo $_SESSION["usuario"]?><b class="caret"></b></a>

                   

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
      <div class="row-fluid">
	
	
	<?php
	$moderador=$_SESSION["usuario"];
	$cadena = "SELECT  nom_grup, descripcion_g FROM grupos  where nombre_mod='$moderador'";
	$conexion = mysql_connect ("localhost","proyecto","proyecto");
	mysql_select_db("proyecto", $conexion);
	$peticion = mysql_query($cadena);
	
	?>
		
	
	
				<div class="span12">
					<table width="0%" class="table table-hover">
             <thead>
                <tr>
                  <th>Nombre del grupo</th>
                
                  <th>Descripci&oacute;n</th>
                
                  <th>N&deg; Integrantes</th>
                
                  <th>N&deg; Mensajes</th>
                
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
			  <?php
        while ($registro5 = mysql_fetch_array($peticion)){
		?>
                <tr>
                  <td><?php echo $registro5['nom_grup'];?></td>
                  <td><?php echo $registro5['descripcion_g'];?></td>
				  <?php
				  $aux1=$registro5['nom_grup'];
				  $integrantes=mysql_query("SELECT count(distinct(nombre)) AS cuenta FROM pertenecen WHERE nom_grup='$aux1'");
				  $registrointe = mysql_fetch_array($integrantes)
				  ?>
                  <td><?php echo $registrointe['cuenta'];?></td>
				  <?php
				  $aux2=$registro5['nom_grup'];
				  $num_mensajes=mysql_query("SELECT count(distinct(cod_men)) AS cuenta FROM mensajes WHERE nom_grup='$aux2'");
				  $num_men = mysql_fetch_array($num_mensajes)
				  ?>
                  <td><?php echo $num_men['cuenta'];  $aux=$registro5['nom_grup']; ?></td>
                  <td><a href="grupo.php?grupo=<?php echo $registro5['nom_grup'];?>" title="Ver"><img src="../img/iconos/glyphicons_027_search.png" style="width:15px; height:15px;"/></a>  &nbsp; <a href="gestionar.php?grupo=<?php echo $registro5['nom_grup'];?>" title="Gestionar"><img src="../img/iconos/glyphicons_030_pencil.png" style="width:15px; height:15px;"/></a> &nbsp; <a class="btn btn-danger" data-toggle="modal" role="button" href="#myModal"> <img src="../img/iconos/glyphicons_207_remove_2.png" style="width:13px; height:13px;"/></a></td>
				  
                </tr>
				<?php
				}
				mysql_close($conexion); 
				?>
              </tbody>
      </table>
				</div>
	  
	  	</div>
	</div>
		

	
	      <!-------------------------------------------   MYMODAL ELIMINAR GRUPO  -------------------------------------------------- -->
	
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:auto; height:240px;">
    <div class="modal-header" >
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i><img src="../img/iconos/glyphicons_197_remove.png" width="17" height="25"></i></button>
    <h3 id="myModalLabel">Eliminar todos los mensajes</h3>
    </div>
		
			<div class="modal-body">
				<p>¿Estas completamente seguro de querer eliminar este grupo?</p>
                <p>Se eliminaran todos los datos y nunca se podran volver a recuperar.</p>
			</div>
			<div class="modal-footer">			
			<a href="eliminar_grupo.php?grupo=<?php echo $aux;?>"  class="btn btn-success" > Si, borrar.			
			</a>
			</div>
		
    </div>
    </div> <!-- /container -->
	
	
	

  </body>
</html>