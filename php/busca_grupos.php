<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Gestionar grupo</title>
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->

   

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
												<li><a href="busca_grupos.php" tabindex="-1">Busca grupos</a></li>
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
      <div class="span12"><h3>Busqueda de grupos</h3></div>
      <div class="span3"></div> 
      <div class="span6">
      	
      	<p>Nombre de grupo:</p>
      	<input type="text" id="g_nombre" name="g_nombre">
        <p>Creador de grupo:</p>
      	<input type="text" id="g_creador" name="g_creador"> 
        <p>Secci&oacute;n:</p>
      	<select id="g_seccion" name="g_seccion">
            <option value=""></option>
            <option value="seccion_1">Seccion_1</option>
            <option value="seccion_2">Seccion_2</option>
            <option value="seccion_3">Seccion_3</option>
            <option value="seccion_4">Seccion_4</option>
            <option value="seccion_5">Seccion_5</option>
            <option value="seccion_6">Seccion_6</option>
            <option value="seccion_7">Seccion_7</option>
            <option value="seccion_8">Seccion_8</option>
        </select>
      	<p><input type="button" class="btn btn-danger" value="Buscar"></p>
       </div>
       <div class="span3"></div>
       <div class="span12">
       <div class="alert-info"> Esto solo se muestra cuando se ha realizado la busqueda.</div>
       <p><h4>Resultados de busqueda:</h4></p>
           <table class="table table-hover">
               <thead>
                   <tr>
                       <th>Imagen grupo</th>
                       <th>Nombre</th>
                       <th>Creador</th>
                       <th>Descripci&oacute;n</th>
                       <th>Fecha creaci&oacute;n</th>
                   </tr>
               </thead>
               <tbody>
                   <tr>
                       <td><img src="../img/agt_announcements.png" style="width:40px; height:40px;"></td>
                       <td>Nombre de grupo 001</td>
                       <td>Nombre del creador 001</td>
                       <td>descripcion del grupo</td>
                       <td>12/09/2012</td>
                   </tr>
                   <tr>
                       <td><img src="../img/agt_announcements.png" style="width:40px; height:40px;"></td>
                       <td>Nombre de grupo 002</td>
                       <td>Nombre del creador 002</td>
                       <td>descripcion del grupo</td>
                       <td>02/11/2011</td>
                   </tr>
               </tbody>
           </table>
       </div>
    </div>
  </div>	
  </body>
</html>
