<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Gestionar grupo</title>
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<?php
	session_start();
	if ($_SESSION["usuario"]=="")
		header("Location: index.php");
?>

	<script type="text/javascript">
		
		function validar(form)
			{
				var errores= "";
				var sw=0;
				
				if(esBlanco(form.g_descripcion.value))
				{
					errores=errores+"<p>Es necesario introducir una descipcion del grupo</p>";
					sw=1;
					var x;
					x=$(document);
					x.ready(imagen_errores("i_descripcion", "Es necesario la descripcion del grupo"));
				}
					
				if (sw==1)
				{
					var x;
					x=$(document);
					x.ready(muestra_errores(errores));
				}
				else
				form.submit();
			}
	</script>


    <!-- Le styles -->

    <script src="../js/jquery.js"></script>
	<script src="../js/abrir_ventana.js"></script>
    <script src="../js/validar.js"></script>
    <script src="../js/muestra_errores.js"></script> 
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
    <script src="../js/marcar_celda.js"></script>
    
	<link href="../css/bootstrap.css" rel="stylesheet"/>
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <link href="../css/bootstrap-responsive.css" rel="stylesheet"/>
	<link href="../css/bordes.css" rel="stylesheet"/>
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
          <a class="brand" href="#" style="margin-top: 2px"><img src="../img/mundo_blanco.png" width="25" height="25"> Hoy en el mundo</a>
          <div class="nav-collapse collapse">
		  		<ul class="nav">
						<li>
							<a href="inicio.php"><i class="icon-home"></i>&nbsp;Inicio</a>
						</li>
					</ul>
			   	
		     <ul role="navigation" class="nav">
                    <li class="dropdown">
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
												<li><a href="busca_grupos.html" tabindex="-1">Busca grupos</a></li>
                      </ul>
                    </li>

                    <li><a href="javascript:Abrir_ventana('chat.html')"><i class="icon-comment"></i>&nbsp;Chat</a></li>
            </ul>
                  </li>
									<ul class="nav pull-right">
                    <li class="dropdown" id="fat-menu" >
                      <a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop3" href="#"><i class="icon-asterisk"></i>&nbsp;Cuenta de (Nombre de usuario)<b class="caret"></b></a>
                      <ul aria-labelledby="drop3" role="menu" class="dropdown-menu">
                        <li><a href="editar_perfil.php" tabindex="-1">Editar perfil</a></li>
                        <li class="divider"></li>
                        <li><a href="#" tabindex="-1"><i class="icon-off"></i>&nbsp;Cerrar sesi&oacute;n</a></li>
                      </ul>
                    </li>
                  </ul>
          </div>
        </div>
      </div>
    </div>
			
      <div class="container-fluid" style="margin-top:60px;">
        <div class="row-fluid">
            <div class="span4"></div>
            <div class="span1">
       	   		<img src="../img/agt_announcements.png" style="width: 60px"; height="60px" style="align:center">
            </div>
			
			<?php
						$cadena = "SELECT nom_sec FROM sections";
						$cadena1="SELECT nom_grup, descripcion_g FROM grupos where nom_grup='{$_GET["grupo"]}'";
						
						 $conexion = mysql_connect ("localhost","proyecto","proyecto");
        
                         mysql_select_db("proyecto", $conexion);
    
                         $peticion = mysql_query($cadena);
						 $datos_g= mysql_query($cadena1);
                         mysql_close($conexion);	
						$registro1 = mysql_fetch_array($datos_g);
						?>
			
			
            <div class="span7">
       	   		<h2><?php echo $registro1['nom_grup']; ?></h2>
            </div>
          <div class="span12">  
              <div class="span3" style="margin-top:17px;">  
                  <div class="bs-docs-sidebar">
                    <ul class="nav nav-list bs-docs-sidenav affix">
                        <li id="i_datos" class="active" onClick="marcar_celda('i_datos')"><a href="#datos"><i class="icon-chevron-right"></i> Modificar grupo</a></li>
                        <li id="i_estado"><a href="#mensajes" onClick="marcar_celda('i_estado')"><i class="icon-chevron-right"></i> Mensajes</a></li>
                        <li id="i_resi"><a href="#banear" onClick="marcar_celda('i_resi')"><i class="icon-chevron-right"></i> Banear</a></li>
                        <li id="i_otros"><a href="#readmitir" onClick="marcar_celda('i_otros')"><i class="icon-chevron-right"></i> Readmitir</a></li>
                    </ul>
                  </div>
              </div>
              
   <!---+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-          FORMULARIO DATOS DE GRUPO           +-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-->
   
              <form id="form_datos" name="form_datos" enctype="multipart/form-data" method="post" action="upload_grupo.php">
                  <div class="span9">
				  
				  
                        <p id="datos"><h3>Datos de Grupo</h3></p>
                        <div id="errores"></div>
						<input type="hidden" value="<?php echo $registro1['nom_grup']; ?>" name="n_hiden" id="n_hiden"></input>
                        <p>Descripci&oacute;n: </p><p><textarea   name="g_descripcion" id="g_descripcion"><?php echo $registro1['descripcion_g']; ?></textarea><i id="i_descripcion"></i></p>
                        <p>Secci&oacute;n: </p>
                        <p>
											
                         <select name="g_secciones" id="g_secciones">
                              <?php
                           while ($registro = mysql_fetch_array($peticion)){
			 
        ?>
                            <option value="<?php echo $registro['nom_sec']; ?>"><?php echo $registro['nom_sec']; ?></option>  
							 <?php 
						    }
						?>
                         </select>
                        </p>                        
                       
                        <p>Subir Imagen:</p><p><input id="uploadImage" name="uploadImage" type="file" onChange="ver(newg.uploadImage.value)"/>

                        <p><input type="button" class="btn btn-danger" onClick="validar(this.form)" value="Guardar datos"></input></p>
                     </form>   
                       

<script>
function ver(image){
document.getElementById('image').innerHTML = "<img src='"+image+"'>" 
}
	
	</script>
					   
   <!-- ----------------------------------------------------------------------------------------------------------------------------------- -->
   
   <!---+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-          FORMULARIO DE MENSAJES           +-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-->
                        
                        <hr align="LEFT" size="1" width="100%" color="White" noshade>
                    <form id="form_mensajes" name="form_mensajes">    
                        <p id="mensajes"><h3>Mensajes</h3></p>
                        <p><a class="btn btn-inverse" data-toggle="modal" role="button" href="#myModal">Eliminar todos los mensajes</a></p>
						
						<?php
						$cadenamen = "SELECT cod_men, texto, nombre, fecha  FROM mensajes WHERE nom_grup='{$_GET["grupo"]}'";					
						
						 $conexion = mysql_connect ("localhost","proyecto","proyecto");        
                         mysql_select_db("proyecto", $conexion);    
                         
						 $datos_m= mysql_query($cadenamen);                         	
												
						mysql_close($conexion);
						?>
						
						
                        
                        <table class="table table-hover">
							 <thead>
									<tr>
										<th>Mensaje</th>
                                        <th>Usuario</th>
                                        <th>Fecha</th>
                                        <th></th>
                                        <th></th>
									</tr>
								</thead>
								<tbody>
								<?php
								while ($registromen = mysql_fetch_array($datos_m)){
								?>
									<tr>
										<td><?php echo $registromen['texto']; ?></td>
                                        <td><?php echo $registromen['nombre']; ?></td>
                                        <td><?php echo $registromen['fecha']; ?></td>
                                        <td><input  value="<?php echo $registromen['cod_men']; ?>" type="checkbox"></td>
                                        <td><a href="eliminar_un_men.php"><img src="../img/iconos/glyphicons_207_remove_2.png" style="width:14px; height:14px"></a></td>
									</tr>
									<?php
								}
								?>
								</tbody>
							</table>
                            <p><a class="btn btn-danger" data-toggle="modal" role="button" href="#myModal2">Eliminar mensajes seleccionados</a></p>
                         </form>   
                            
  <!-- ----------------------------------------------------------------------------------------------------------------------------------- -->
   
   <!---+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-          FORMULARIO DE BANEAR           +-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-->                          
                             <hr align="LEFT" size="1" width="100%" color="White" noshade>
                     <form id="form_ban" name="form_ban">        
                        <p id="banear"><h3>Banear</h3></p>
                        <p><a class="btn btn-inverse" data-toggle="modal" role="button" href="#myModal3">Banear todos los usuarios</a></p>
                        <table class="table table-hover">
							 <thead>
									<tr>
										<th>Avatar</th>
                                        <th>Nombre</th>
                                        <th></th>
                                        <th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><img src="../img/avatar.jpg" style="width:40px; height:40px"></td>
                                        <td>Usuario 001</td>
                                        <td><input type="checkbox"></td>
                                        <td><a href="#"><img src="../img/iconos/glyphicons_207_remove_2.png" style="width:14px; height:14px"></a></td>
									</tr>
									<tr>
										<td><img src="../img/avatar.jpg" style="width:40px; height:40px"></td>
                                        <td>Usuario 002</td>
                                        <td><input type="checkbox"></td>
                                        <td><a href="#"><img src="../img/iconos/glyphicons_207_remove_2.png" style="width:14px; height:14px"></a></td>
									</tr>
								</tbody>
							</table>
                            <p><a class="btn btn-danger" data-toggle="modal" role="button" href="#myModal4">Banear usuarios seleccionados</a></p>
                         </form>   
                            
  <!-- ----------------------------------------------------------------------------------------------------------------------------------- -->
   
   <!---+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-          FORMULARIO DE READMITIR         +-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-->                          
                            <hr align="LEFT" size="1" width="100%" color="White" noshade>
                        <form id="form_readmitir" name="form_readmitir">    
                        <p id="readmitir"><h3>Readmitir</h3></p>
                        <p><a class="btn btn-inverse" data-toggle="modal" role="button" href="#myModal5">Readmitir todos los usuarios</a></p>
                        <table class="table table-hover">
							 <thead>
									<tr>
										<th>Avatar</th>
                                        <th>Nombre</th>
                                        <th></th>
                                        <th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><img src="../img/avatar.jpg" style="width:40px; height:40px"></td>
                                        <td>Usuario 001</td>
                                        <td><input type="checkbox"></td>
                                        <td><a href="#"><img src="../img/iconos/glyphicons_207_remove_2.png" style="width:14px; height:14px"></a></td>
									</tr>
									<tr>
										<td><img src="../img/avatar.jpg" style="width:40px; height:40px"></td>
                                        <td>Usuario 002</td>
                                        <td><input type="checkbox"></td>
                                        <td><a href="#"><img src="../img/iconos/glyphicons_207_remove_2.png" style="width:14px; height:14px"></a></td>
									</tr>
								</tbody>
							</table>
                            <p><a class="btn btn-danger" data-toggle="modal" role="button" href="#myModal6">Readmitir usuarios seleccionados</a></p>
                        </form>    
            
		</div>
	</div>
    
   
      
      <!-------------------------------------------   MYMODAL ELIMINAR TODOS LOS MENSAJES  -------------------------------------------------- -->
	
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:auto; height:240px;">
    <div class="modal-header" >
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i><img src="../img/iconos/glyphicons_197_remove.png" width="17" height="25"></i></button>
    <h3 id="myModalLabel">Eliminar todos los mensajes</h3>
    </div>
		<form id="elimform">
			<div class="modal-body">
				<p>¿Estas completamente seguro de querer eliminar todos los mensajes de este grupo?</p>
                <p>Se eliminaran todos los mensajes y nunca se podran volver a recuperar.</p>
			</div>
			<div class="modal-footer">
			<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">NO</button>
			<a href="borrar_todos_mensajes.php?gnombre=<?php echo $_GET["grupo"]; ?>" title="Eliminar">
			<button class="btn btn-success" data-dismiss="modal" aria-hidden="true">SI</button>
			</a>
			</div>
		</form>
    </div>
    </div> <!-- /container -->
    
    <!-------------------------------------------   MYMODAL2 ELIMINAR MENSAJES SELECCIONADOS  -------------------------------------------------- -->
	
    <div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:auto; height:240px;">
    <div class="modal-header" >
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i><img src="../img/iconos/glyphicons_197_remove.png" width="17" height="25"></i></button>
    <h3 id="myModalLabel">Eliminar mensajes seleccionados</h3>
    </div>
		<form id="elimform">
			<div class="modal-body">
				<p>¿Estas completamente seguro de querer eliminar los mensajes seleccionados de este grupo?</p>
                <p>Se eliminaran los mensajes seleccionados y nunca se podran volver a recuperar.</p>
			</div>
			<div class="modal-footer">
			<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">NO</button>
			<button class="btn btn-success" data-dismiss="modal" aria-hidden="true">SI</button>
			</div>
		</form>
    </div>
    </div> <!-- /container -->
    
    <!----------------------------------------------   MYMODAL3 BANEAR TODOS LOS USUARIOS  ----------------------------------------------------- -->
	
    <div id="myModal3" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:auto; height:240px;">
    <div class="modal-header" >
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i><img src="../img/iconos/glyphicons_197_remove.png" width="17" height="25"></i></button>
    <h3 id="myModalLabel">Banear todos los usuarios</h3>
    </div>
		<form id="elimform">
			<div class="modal-body">
				<p>¿Estas completamente seguro de querer bloquear el acceso a todos los usuarios de este grupo?</p>
                <p>Se bloqueara el acceso todos los usuarios y no podran acceder a tu grupo.</p>
			</div>
			<div class="modal-footer">
			<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">NO</button>
			<button class="btn btn-success" data-dismiss="modal" aria-hidden="true">SI</button>
			</div>
		</form>
    </div>
    </div> <!-- /container -->
    
    <!---------------------------------------------   MYMODAL4 BANEAR USUARIOS SELECCIONADOS  -------------------------------------------------- -->
	
    <div id="myModal4" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:auto; height:260px;">
    <div class="modal-header" >
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i><img src="../img/iconos/glyphicons_197_remove.png" width="17" height="25"></i></button>
    <h3 id="myModalLabel">Banear usuarios seleccionados</h3>
    </div>
		<form id="elimform">
			<div class="modal-body">
				<p>¿Estas completamente seguro de querer bloquear el acceso a los usuarios seleccionados de este grupo?</p>
                <p>Se bloqueara el acceso a los usuarios seleccionados y no podran acceder a tu grupo.</p>
			</div>
			<div class="modal-footer">
			<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">NO</button>
			<button class="btn btn-success" data-dismiss="modal" aria-hidden="true">SI</button>
			</div>
		</form>
    </div>
    </div> <!-- /container -->
    
    <!-------------------------------------------------   MYMODAL5 READMITIR TODOS LOS USUARIOS  -------------------------------------------------- -->
	
    <div id="myModal5" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:auto; height:240px;">
    <div class="modal-header" >
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i><img src="../img/iconos/glyphicons_197_remove.png" width="17" height="25"></i></button>
    <h3 id="myModalLabel">Readmitir a todos los usuarios</h3>
    </div>
		<form id="elimform">
			<div class="modal-body">
				<p>¿Estas completamente seguro de querer readmitir a todos los usuarios en tu grupo?</p>
                <p>Todos los usuarios volveran a poder escribir mensajes en tu grupo.</p>
			</div>
			<div class="modal-footer">
			<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">NO</button>
			<button class="btn btn-success" data-dismiss="modal" aria-hidden="true">SI</button>
			</div>
		</form>
    </div>
    </div> <!-- /container -->
    
    <!-------------------------------------------   MYMODAL6 READMITIR USUARIOS SELECCIONADOS  -------------------------------------------------- -->
	
    <div id="myModal6" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:auto; height:240px;">
    <div class="modal-header" >
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i><img src="../img/iconos/glyphicons_197_remove.png" width="17" height="25"></i></button>
    <h3 id="myModalLabel">Readmitir a los usuarios seleccionados</h3>
    </div>
		<form id="elimform">
			<div class="modal-body">
				<p>¿Estas completamente seguro de querer readmitir a los usuarios seleccionados en tu grupo?</p>
                <p>Los usuarios seleccionados volveran a poder escribir mensajes en tu grupo.</p>
			</div>
			<div class="modal-footer">
			<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">NO</button>
			<button class="btn btn-success" data-dismiss="modal" aria-hidden="true">SI</button>
			</div>
		</form>
    </div>
    </div> <!-- /container -->
    	
  </body>
</html>
