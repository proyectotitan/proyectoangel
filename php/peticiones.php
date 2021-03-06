<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Peticiones</title>
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php
		session_start();
		if ($_SESSION["usuario"]=="")
			header("Location: index.php");
	?>

    <link href="../css/bootstrap.css" rel="stylesheet">
    
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
	<link href="../css/bordes.css" rel="stylesheet">
    
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
          <a class="brand" href="#" style="margin-top: 2px"><img src="../img/mundo_blanco.PNG" width="20" height="20"> Hoy en el mundo</a>
          <div class="nav-collapse collapse">
		  
			   	<ul class="nav">
						<li class="active">
							<a href="inicio.php"><i class="icon-home"></i>&nbsp;Inicio</a>
						</li>
					</ul>
		     <ul role="navigation" class="nav">
                    <li class="dropdown" >
                      <a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#" id="drop1"><i class="icon-envelope"></i>&nbsp;Mensajes <b class="caret"></b></a>
                      <ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
                        <li><a href="javascript:Abrir_ventana('mensaje_nuevo.html')" tabindex="-1">Enviar mensaje nuevo</a></li>
												<li class="dropdown-submenu">
                        <a href="#" tabindex="-1">Buz&oacute;n</a>
                        <ul class="dropdown-menu">
													<li><a href="mensajes_recibidos.html" tabindex="-1">Mensajes recibidos</a></li>
													<li><a href="mensajes_enviados.html" tabindex="-1">Mensajes enviados</a></li>
                    		</ul>
                 		 </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop2" href="#"><i class="icon-th-large"></i>&nbsp;Grupos<b class="caret"></b></a>
                      <ul aria-labelledby="drop2" role="menu" class="dropdown-menu">
                        <li><a href="#" tabindex="-1"></a></li>
                        <li><a href="mis_grupos.html" tabindex="-1">Mis grupos</a></li>
                        <li><a href="nuevo_grupo.html" tabindex="-1">Nuevo grupo</a></li>
												<li><a href="busca_grupos.html" tabindex="-1">Busca grupos</a></li>
                      </ul>
                    </li>
                     <li><a href="javascript:Abrir_ventana('chat.html')"><i class="icon-comment"></i>&nbsp;Chat</a></li>
                  </ul>
                  </li>
									<ul class="nav pull-right">
                    <li class="dropdown" id="fat-menu">
                      <a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop3" href="#"><i class="icon-asterisk"></i>&nbsp;Cuenta de (Nombre de usuario)<b class="caret"></b></a>
                      <ul aria-labelledby="drop3" role="menu" class="dropdown-menu">
                        <li><a href="editar_perfil.html" tabindex="-1">Editar perfil</a></li>
                        <li class="divider"></li>
                        <li><a href="cerrar_sesion.php" tabindex="-1"><i class="icon-off"></i>&nbsp;Cerrar sesi&oacute;n</a></li>
                      </ul>
                    </li>
                  </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
	<?php
		$cadena = "SELECT cod_pet, texto, env FROM peticiones where rec='{$_SESSION["usuario"]}'";
		$conexion = mysql_connect ("localhost","proyecto","proyecto");
		mysql_select_db("proyecto", $conexion);
		$peticion = mysql_query($cadena);
		$peticion2 = mysql_query($cadena);
    	mysql_close($conexion);
    ?>
    
	<div class="container-fluid" style="margin-top:60px;">
      <div class="row-fluid">
	
				<div class="span12">
					<table width="0%" class="table table-hover">
             <thead>
                <tr>
                  <th>Nombre de usuario</th>
                  <th>Texto</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
   <?php
     while ($registro = mysql_fetch_array($peticion)){
   ?>
                <tr>
                  <td><?php echo $registro['env']; ?></td>
                  <td><?php echo $registro['texto']; ?></td>
                  <td><a href="#ver_<?php echo $registro['cod_pet'];?>" data-toggle="modal" role="button" title="Ver usuario"><img src="../img/iconos/glyphicons_027_search.png" style="width:15px; height:15px;"/></a> &nbsp; <a href="#aceptar_<?php echo $registro['cod_pet'];?>" data-toggle="modal" role="button" title="Aceptar petición"> <img src="../img/iconos/glyphicons_190_circle_plus.png" style="width:13px; height:13px;"/></a> &nbsp; <a href="#rechazar_<?php echo $registro['cod_pet'];?>" title="Rechazar petición" data-toggle="modal" role="button"> <img src="../img/iconos/glyphicons_207_remove_2.png" style="width:13px; height:13px;"/></a></td>
				  
                </tr>
   <?php
	 }
   ?>
              </tbody>
      </table>
				</div>
	  
	  	</div>
	</div>
    
   <?php
     while ($registro = mysql_fetch_array($peticion2)){
		$cadena = "SELECT correo, telefono,	provincia, municipio, avatar, gustos, estado, fecna  FROM usuario WHERE nombre='{$registro["env"]}'";
		$conexion = mysql_connect ("localhost","proyecto","proyecto");
		mysql_select_db("proyecto", $conexion);
		$datos = mysql_query($cadena);
    	mysql_close($conexion);
   ?>
   <?php $d_usuario = mysql_fetch_array($datos) ?>
    <div id="ver_<?php echo $registro['cod_pet'];?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:auto; height:370px;">
    <div class="modal-header" >
    <p><button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i><img src="../img/iconos/glyphicons_197_remove.png" width="17" height="25"></i></button></p>
    
    <h3 id="myModalLabel"><img src="<?php echo $d_usuario['avatar']; ?>" style="width: 40px"; height="40px">&nbsp;&nbsp;<?php echo $registro['env'];?></h3>
    </div>
			<div class="modal-body">
                <p><b>Estado: </b><?php echo $d_usuario['estado'];?></p>
                <p><b>Email: </b><?php echo $d_usuario['correo'];?></p>
                <p><b>Fecha de nacimiento: </b><?php echo $d_usuario['fecna'];?></p>
                <p><b>Provincia: </b><?php echo $d_usuario['provincia'];?>
                &nbsp;<b>Municipio: </b><?php echo $d_usuario['municipio'];?></p>
                <p><b>Telefono: </b><?php echo $d_usuario['telefono'];?></p>
                <p><b>Gustos: </b><?php echo $d_usuario['gustos'];?></p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
			</div>
    </div>
    </div>
    
    
    
        <div id="aceptar_<?php echo $registro['cod_pet'];?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:auto; height:230px;">
    <div class="modal-header" >
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i><img src="../img/iconos/glyphicons_197_remove.png" width="17" height="25"></i></button>
    <h3 id="myModalLabel">Aceptar usuario</h3>
    </div>
			<div class="modal-body">
				<p>¿Estas completamente seguro de querer agregar a <?php echo $registro['env'];?> a tus amigos?</p>
                <p>Este usuario podra ver tus datos y ver cuando estas conectado</p>
			</div>
			<div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                <a class="btn btn-success" href="aceptar_peticion.php?peticion=<?php echo $registro['env'];?>">SI</a>
			</div>
    </div>
    </div>
    
        <div id="rechazar_<?php echo $registro['cod_pet'];?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:auto; height:230px;">
    <div class="modal-header" >
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i><img src="../img/iconos/glyphicons_197_remove.png" width="17" height="25"></i></button>
    <h3 id="myModalLabel">Rechazar usuario</h3>
    </div>
			<div class="modal-body">
				<p>¿Estas completamente seguro de querer rechazar la peticion de <?php echo $registro['env'];?>?</p>
                <p>Se rachazara la peticion y no agregaras a este usuario a tus amigos.</p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
				<a class="btn btn-success" href="rechazar_peticion.php?peticion=<?php echo $registro['env'];?>">SI</a>
			</div>
    </div>
    </div>
    
   <?php
	 }
   ?>
		
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

  </body>
</html>