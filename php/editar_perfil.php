<!DOCTYPE html>
<html lang="en">
  <head>
   <?php
	session_start();
	if ($_SESSION["usuario"]=="")
		header("Location: index.php");
	?>
    <meta charset="utf-8">
    <title>Editar perfil</title>
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
	<script type="text/javascript">
		
		function validar(form)
			{
				var errores= "";
				var sw=0;
				
				if(esBlanco(form.u_pass.value))
				{
					errores=errores+"<p>Es necesario introducir una contraseña</p>";
					sw=1;
					var x;
					x=$(document);
					x.ready(imagen_errores("i_pass", "Es necesario introducir una contraseña"));
				}
				
				if(esBlanco(form.u_conf_pass.value))
				{
					errores=errores+"<p>Es necesario confirmar la contraseña</p>";
					sw=1;
					var x;
					x=$(document);
					x.ready(imagen_errores("i_conf_pass", "Es necesario confirmar la contraseña"));
				}
				
				if(form.u_pass.value!=form.u_conf_pass.value)
				{
					errores=errores+"<p>Las contraseñas deben coincidir</p>";
					sw=1;
					x=$(document);
					x.ready(imagen_errores("i_conf_pass", "Las contraseñas no coinciden"));
				}
				
				if(!esEmail(form.u_email.value))
				{
					errores=errores+"<p>Es necesario introducir un email válido</p>";
					sw=1;
					var x;
					x=$(document);
					x.ready(imagen_errores("i_email", "Es necesario introducir un email válido"));
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
                    <li class="dropdown active" id="fat-menu" >
                      <a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop3" href="#"><i class="icon-asterisk"></i>&nbsp;Cuenta de (<?php echo $_SESSION["usuario"];?>)<b class="caret"></b></a>
                      <ul aria-labelledby="drop3" role="menu" class="dropdown-menu">
                        <li><a href="editar_perfil.php" tabindex="-1">Editar perfil</a></li>
                        <li class="divider"></li>
                        <li><a href="cerrar_sesion.php" tabindex="-1"><i class="icon-off"></i>&nbsp;Cerrar sesi&oacute;n</a></li>
                      </ul>
                    </li>
                  </ul>
          </div>
        </div>
      </div>
    </div>
		
		<?php
        $cadena = "SELECT nombre, pass, correo, telefono, provincia, municipio, avatar, gustos, estado,fecna, sexo FROM usuario where nombre='{$_SESSION["usuario"]}'";
        
        
        $conexion = mysql_connect ("localhost","proyecto","proyecto");
        
        mysql_select_db("proyecto", $conexion);
    
        $peticion = mysql_query($cadena);
    
      ?>
	  
		
    <div class="container-fluid" style="margin-top:60px;">
        <div class="row-fluid">
            <div class="span4"></div>
            <div class="span1">
                   <?php
      	while ($registro = mysql_fetch_array($peticion)){
      ?>
       	   		<img src="<?php echo $registro['avatar']; ?>" style="width: 60px"; height="60px" style="align:center">
            </div>
            <div class="span7">
       	   		<h2><?php echo $_SESSION["usuario"];?>.</h2>
            </div>
          <div class="span12">  
              <div class="span3" style="margin-top:17px;">  
                  <div class="bs-docs-sidebar">
                    <ul class="nav nav-list bs-docs-sidenav affix">
                        <li id="i_datos" class="active" onClick="marcar_celda('i_datos')"><a href="#datos"><i class="icon-chevron-right"></i> Datos Usuario</a></li>
                        <li id="i_estado"><a href="#estado" onClick="marcar_celda('i_estado')"><i class="icon-chevron-right"></i> Estado y Avatar</a></li>
                        <li id="i_resi"><a href="#resi" onClick="marcar_celda('i_resi')"><i class="icon-chevron-right"></i> Datos De Residencia</a></li>
                        <li id="i_otros"><a href="#otros" onClick="marcar_celda('i_otros')"><i class="icon-chevron-right"></i> Otros Datos</a></li>				
                        <li id="i_eliminar"><a href="#eliminar" onClick="marcar_celda('i_eliminar')"><i class="icon-chevron-right"></i> Eliminar Cuenta</a></li>
                    </ul>
                  </div>
              </div>
       	      
              <form id="form" name="form" enctype="multipart/form-data" method="post" action="update_cuenta.php">
                  <div class="span9">
                        <p id="datos"><h3>Datos De Usuario</h3></p>
                        <div id="errores"></div>
                        <p>Nombre: </p><p><input readonly="true" type="text" id="u_nombre" name="u_nombre" value="<?php echo $registro['nombre']; ?>" ></input><i id="i_nombre"></i></p>
                        <p>Contraseña: </p><p><input type="password" id="u_pass" name="u_pass" value="<?php echo $registro['pass']; ?>"></input><i id="i_pass"></i></p>
                        <p>Confirmar Contraseña: </p><p><input type="password" id="u_conf_pass" name="u_conf_pass" value="<?php echo $registro['pass']; ?>"></input><i id="i_conf_pass"></i></p>
                        <p>E-mail: </p><p><input type="text" id="u_email" name="u_email" value="<?php echo $registro['correo']; ?>"></input><i id="i_email"></i></p>
                        
                        <hr align="LEFT" size="1" width="100%" color="White" noshade>
                        
                        <p id="estado"><h3>Estado y Avatar</h3></p>
                        <p>Estado: </p><p><input type="text" id="u_estado" name="u_estado" value="<?php echo $registro['estado']; ?>"></input></p>
                        <p><h4>Imagen de Avatar:</h4> 
                        	
                        </p>
                        <p>Subir Imagen:</p><p><input id="uploadImage" name="uploadImage" type="file" onChange="ver(newg.uploadImage.value)"/>
                        
                        <hr align="LEFT" size="1" width="100%" color="White" noshade>
                        
                        <p id="resi"><h3>Datos De Residencia</h3></p>
                        <p>Provincia: </p><p><input type="text" id="u_prov" name="u_prov" value="<?php echo $registro['provincia']; ?>"></input></p>
                        <p>Municipio: </p><p><input type="text" id="u_muni" name="u_muni" value="<?php echo $registro['municipio']; ?>"></input></p>
                        
                        <hr align="LEFT" size="1" width="100%" color="White" noshade>
                        
                        <p id="otros"><h3>Otros Datos</h3></p>
                        <p>Telefono: </p><p><input type="text" id="u_telefono" name="u_telefono" value="<?php echo $registro['telefono']; ?>"></input></p>
                        <p>Fecha de nacimiento: </p><p><input type="text" id="u_fecna" name="u_fecna" value="<?php echo $registro['fecna']; ?>"></input></p>
                        <p>Sexo: </p>
                        <p>
                        	<input type="radio"  value="H" name="sexo" style="margin-left:50px;"></input>
                        	Hombre:
                            <input type="radio" value="M" name="sexo" style="margin-left:50px;"></input>
                            Mujer:
                        </p>
                        <p>Gustos: </p><p><textarea id="gustos" name="gustos" rows="3"><?php echo $registro['gustos']; ?></textarea></p>
                        
                        <p class="pull-right"><input class="btn btn-danger" type="button" onClick="validar(this.form)" value="Guardar"></input></p>
                  
                     </form>
                     <br>
     				<p><hr align="LEFT" size="1" width="100%" color="White" noshade></p>
                      <p id="eliminar"><h3>Eliminar Cuenta</h3></p>
                        <p>Eliminar la cuenta implicara tambien borrar todos los mensajes relacionados con la cuenta, grupos, mensajes privados y el avatar.</p>
                        <p>Si aun estas seguro de borrar completamente la cuenta y todos tu grupos puedes hacerlo pulsando el siguiente boton</p>	
                        <a class="btn btn-inverse" data-toggle="modal" role="button" href="#myModal">Eliminar Cuenta</a>
                      <p><hr align="LEFT" size="1" width="100%" color="White" noshade></p>    
                  </div>  
          </div>         
	  </div>
	</div>
  
   <?php
                 
	}
	  mysql_close($conexion);
		 
    ?>
  <!------------------------------------------------------------------------------------------------------------------------------------- -->
	
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:auto;">
    <div class="modal-header" >
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i><img src="../img/iconos/glyphicons_197_remove.png" width="17" height="25"></i></button>
    <h3 id="myModalLabel">Eliminacion de usuario</h3>
    <img src="../img/fondo_sombra_crear_cuenta_basica.png" class="sombra_titulos_pupop"></img>
    </div>
		<form id="elimform">
			<div class="modal-body">
				<p>¿Estas completamente seguro de querer eliminar la cuenta por completo?</p>
                <p>Se eliminaran todos los datos y nunca se podran volver a recuperar.</p>
			</div>
			<div class="modal-footer">
			<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">NO</button>
				<a href="eliminar_cuenta.php?nombre=<?php echo $registro['nombre']; ?>" title="Eliminar">
            <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">SI</button>
			</a>
            </div>
		</form>
    </div>
    </div> <!-- /container -->
  
  <script>
	function ver(image){
document.getElementById('image').innerHTML = "<img src='"+image+"'>" 
}	
	</script>
  
  </body>
</html>