<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Gestionar grupo</title>
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<script type="text/javascript"  src="../js	/validar.js"> </script>
		<script type="text/javascript">
		
		function validar_grupo(form)
			{
				var errores= "";
				var sw=0;
				
				if(esBlanco(form.g_nombre.value))
				{
					errores=errores+"El nombre es obligatorio\n";
					sw=1;					
				}
				
				if(esBlanco(form.g_descripcion.value))
				{
					errores=errores+"La descripcion es obligatorio";
					sw=1;					
				}
				
				if (sw==1)
				{
					alert(errores);
				}		
				else
				form.submit();
				
	}
	</script>
	

    <!-- Le styles -->
<?php
	session_start();
	if ($_SESSION["usuario"]=="")
		header("Location: index.php");
?>
   

    <script src="../js/jquery.js"></script>
	<script src="../js/abrir_ventana.js"></script> 
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
          <a class="brand" href="#" style="margin-top: 2px"><img src="../img/mundo_blanco.PNG" width="25" height="25"> Hoy en el mundo</a>
          <div class="nav-collapse collapse">
		  		<ul class="nav">
						<li>
							<a href="inicio.html"><i class="icon-home"></i>&nbsp;Inicio</a>
						</li>
					</ul>
			   	
		     <ul role="navigation" class="nav">
                    <li class="dropdown">
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
                    <li class="dropdown active">
                      <a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop2" href="#"><i class="icon-th-large"></i>&nbsp;Grupos<b class="caret"></b></a>
                      <ul aria-labelledby="drop2" role="menu" class="dropdown-menu">
                        <li><a href="#" tabindex="-1"></a></li>
                        <li><a href="mis_grupos.html" tabindex="-1">Mis grupos</a></li>
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
                        <li><a href="editar_perfil.html" tabindex="-1">Editar perfil</a></li>
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
             <form id="newg" name="newg" enctype="multipart/form-data" method="post" action="insertar_grupo.php">
             	  <div class="span2"></div>
                  <div class="span8">
                        <p id="datos"><h3>Datos de Grupo</h3></p>
                        <p>Nombre: </p><p><input type="text" id="g_nombre"></input></p>
                        <p>Descripci&oacute;n: </p><p><textarea id="g_descripcion"></textarea></p>
						
						<?php
						$cadena = "SELECT nom_sec FROM sections";
						
						 $conexion = mysql_connect ("localhost","proyecto","proyecto");
        
                         mysql_select_db("proyecto", $conexion);
    
                         $peticion = mysql_query($cadena);	
                         mysql_close($conexion);						 
						?>
                        <p>Secci&oacute;n: </p>
                        <p>
                         <select id="g_secciones">
                         	<option value="">Selecciona seccion</option>
							<?php
          	  while ($registro = mysql_fetch_array($peticion)){
			 
        ?>
                            <option value="<?php echo $registro['nom_sec']; ?>"><?php echo $registro['nom_sec']; ?></option>  
							 <?php 
						    }
						?>
                         </select>
                        </p>      					
												
                        <p><h4>Imagen de Grupo:</h4> 
                        	<input type="radio"  id="img_pre" style="margin-left:50px;"></input>
                        	<img src="../img/agt_announcements.png" style="width:60px; height:60px;">
                            <input type="radio" value="../img/grupo_01.jpg" id="img_avatar2" style="margin-left:50px;"></input>
                            <img src="../img/grupo_01.jpg">;
                            <input type="radio" value="../img/grupo_02.jpg" id="img_avatar3" style="margin-left:50px;"></input>
                            <img src="../img/grupo_02.jpg">
                            <input type="radio" value="../img/grupo_03.jpg" id="img_avatar4" style="margin-left:50px;"></input>
                            <img src="../img/grupo_03.jpg">
                            <input type="radio" value="../img/grupo_04.jpg" id="img_avatar5" style="margin-left:50px;"></input>
                            <img src="../img/grupo_04.jpg">
                        </p>
                        <p>Subir Imagen:</p><p><input id="uploadImage" name="uploadImage" type="file" onChange="ver(newg.uploadImage.value)"/>
                        <p><input type="button" onClick="validar_grupo(this.form)" class="btn btn-danger" value="Guardar datos"></p>
                        <div class="span2"></div>
		</div>
	</div>	
	
	<script>
function ver(image){
document.getElementById('image').innerHTML = "<img src='"+image+"'>" 
}
	
	</script>
  </body>
</html>
