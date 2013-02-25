<!DOCTYPE html>
<html lang="en">
  <head>
<?php
	session_start();
	if ($_SESSION["usuario"]=="")
		header("Location: index.php");
?>
  
    <meta charset="utf-8">
    <title>Inicio</title>
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->

   

    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-ui.js"></script>
	<script src="../js/interface.js"></script>   
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
    <script src="../js/chat.js"></script>
    <script src="../js/twitter.js"></script>

    
	<link href="../css/bootstrap.css" rel="stylesheet"/>
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <link href="../css/bootstrap-responsive.css" rel="stylesheet"/>
	<link href="../css/bordes.css" rel="stylesheet"/>
	<link href="../css/blitzer/jquery-ui-css.css" rel="stylesheet"/>
	<link href="../css/chat/chat.css" rel="stylesheet"/>
   
		

<script type="text/javascript">
	
	$(document).ready(
		function()
		{
			$('#dock2').Fisheye(
				{
					maxWidth: 50,
					items: 'a',
					itemsText: 'span',
					container: '.dock-container2',
					itemWidth: 40,
					proximity: 90,
					halign : 'center'
				}
			)
		}
	);
	
	(function( $ ) {
		$.widget( "ui.combobox", {
			_create: function() {
				var input,
					that = this,
					select = this.element.hide(),
					selected = select.children( ":selected" ),
					value = selected.val() ? selected.text() : "",
					wrapper = this.wrapper = $( "<span>" )
						.addClass( "ui-combobox" )
						.insertAfter( select );

				function removeIfInvalid(element) {
					var value = $( element ).val(),
						matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( value ) + "$", "i" ),
						valid = false;
					select.children( "option" ).each(function() {
						if ( $( this ).text().match( matcher ) ) {
							this.selected = valid = true;
							return false;
						}
					});
					if ( !valid ) {
						// remove invalid value, as it didn't match anything
						$( element )
							.val( "" )
							.attr( "title", value + " didn't match any item" )
							.tooltip( "open" );
						select.val( "" );
						setTimeout(function() {
							input.tooltip( "close" ).attr( "title", "" );
						}, 2500 );
						input.data( "autocomplete" ).term = "";
						return false;
					}
				}

				input = $( "<input>" )
					.appendTo( wrapper )
					.val( value )
					.attr( "title", "" )
					.addClass( "ui-state-default ui-combobox-input" )
					.autocomplete({
						delay: 0,
						minLength: 0,
						source: function( request, response ) {
							var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
							response( select.children( "option" ).map(function() {
								var text = $( this ).text();
								if ( this.value && ( !request.term || matcher.test(text) ) )
									return {
										label: text.replace(
											new RegExp(
												"(?![^&;]+;)(?!<[^<>]*)(" +
												$.ui.autocomplete.escapeRegex(request.term) +
												")(?![^<>]*>)(?![^&;]+;)", "gi"
											), "<strong>$1</strong>" ),
										value: text,
										option: this
									};
							}) );
						},
						select: function( event, ui ) {
							ui.item.option.selected = true;
							that._trigger( "selected", event, {
								item: ui.item.option
							});
						},
						change: function( event, ui ) {
							if ( !ui.item )
								return removeIfInvalid( this );
						}
					})
					.addClass( "ui-widget ui-widget-content ui-corner-left" );

				input.data( "autocomplete" )._renderItem = function( ul, item ) {
					return $( "<li>" )
						.data( "item.autocomplete", item )
						.append( "<a>" + item.label + "</a>" )
						.appendTo( ul );
				};

				$( "<a>" )
					.attr( "tabIndex", -1 )
					.attr( "title", "Show All Items" )
					.tooltip()
					.appendTo( wrapper )
					.button({
						icons: {
							primary: "ui-icon-triangle-1-s"
						},
						text: false
					})
					.removeClass( "ui-corner-all" )
					.addClass( "ui-corner-right ui-combobox-toggle" )
					.click(function() {
						// close if already visible
						if ( input.autocomplete( "widget" ).is( ":visible" ) ) {
							input.autocomplete( "close" );
							removeIfInvalid( input );
							return;
						}

						// work around a bug (likely same cause as #5265)
						$( this ).blur();

						// pass empty string as value to search for, displaying all results
						input.autocomplete( "search", "" );
						input.focus();
					});

					input
						.tooltip({
							position: {
								of: this.button
							},
							tooltipClass: "ui-state-highlight"
						});
			},

			destroy: function() {
				this.wrapper.remove();
				this.element.show();
				$.Widget.prototype.destroy.call( this );
			}
		});
	})( jQuery );

	$(function() {
		$( "#b_grupos" ).combobox();
		$( "#b_amigos" ).combobox();
		$( "#toggle" ).click(function() {
			$( "#combobox" ).toggle();
		});
	});

</script>
<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
	</script>
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
						<li class="active">
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
        $cadena = "SELECT privados, peticiones, avatar FROM usuario where nombre='{$_SESSION["usuario"]}'";
        
        
        $conexion = mysql_connect ("localhost","proyecto","proyecto");
        
        mysql_select_db("proyecto", $conexion);
    
        $peticion = mysql_query($cadena);
    
      ?>
		<?php
          	  while ($registro = mysql_fetch_array($peticion)){
          ?>
		<div class="container-fluid" style="margin-top:60px;">
      <div class="row-fluid">
				<div class="span4">
					<div class="border1" style="margin-left:3px;"> 
						<p><h4><?php echo $_SESSION["usuario"];?></h4></p>
						<p><img src="<?php echo $registro['avatar']; ?>" style="width: 60px"; height="60px"></p>
						<p>Mensajes sin leer: &nbsp;<?php echo $registro['privados']; ?></p>
						<p><a style="text-decoration:none; color:#FFF;" href="peticiones.php">Peticiones de amistad: &nbsp; <?php echo $registro['peticiones']; ?></a></p>
						</div>
        <?php
                 
                }
      		  mysql_close($conexion);
             
            ?>
						<div class="span12">
								<object type="application/x-shockwave-flash" style="outline:none;" data="http://hosting.gmodules.com/ig/gadgets/file/112581010116074801021/hamster.swf?" width="300" height="225"><param name="movie" value="http://hosting.gmodules.com/ig/gadgets/file/112581010116074801021/hamster.swf?"></param><param name="AllowScriptAccess" value="always"></param><param name="wmode" value="opaque"></param></object>
					</div>
             
	
				</div>
				<div class="span4">
           <div class="span12">
					 	<input type="text" id="mensaje_t" value="" onKeyUp="twitear()" style="margin-top:8px;"></input>
						<a target="_blank" id="twt" class="btn btn-primary" href="https://twitter.com/intent/tweet?text=Bienvenido a hoy en el mundo @HoyenelMundo&amp">Twittear</a>
					 </div>
                     
          <?php
			$cadena = "SELECT nom_grup, nombre_mod, fecha_creacion FROM `grupos` ORDER BY visitas, nom_grup LIMIT 10 ";
			
			$conexion = mysql_connect ("localhost","proyecto","proyecto");
			
			mysql_select_db("proyecto", $conexion);
		
			$peticion = mysql_query($cadena);
		
		  ?>
                     
					<div class="span12" style="margin-top:20px;">
						 <table width="0%" class="table table-hover">
							 <thead>
									<tr>
										<th>Top 10</th>
										<th>Nombre de grupo</th>
										<th>Creador</th>
										<th>Fecha</th>
									</tr>
								</thead>
								<tbody>
          <?php
		  		$filas=1;
          	  while ($registro = mysql_fetch_array($peticion)){
          ?>
									<tr>
										<td><?php echo $filas; ?></td>
										<td><?php echo $registro['nom_grup']; ?></td>
										<td><?php echo $registro['nombre_mod']; ?></td>
										<td><?php echo $registro['fecha_creacion']; ?></td>
									</tr> 
                                    
           <?php
                 $filas++;
                }
      		  mysql_close($conexion);
             
            ?>
								</tbody>
      			</table>
					</div>
                    <div class="span12" style="margin-top:20px;">
                    <div class="dock" id="dock2">
  						<div class="dock-container2">
           <?php
        	$cadena = "SELECT nom_grup FROM `grupos` WHERE nom_grup IN (SELECT nom_grup FROM `pertenecen` WHERE nombre='{$_SESSION["usuario"]}')";
        
        
       	 $conexion = mysql_connect ("localhost","proyecto","proyecto");
        
       	 mysql_select_db("proyecto", $conexion);
    
   	     $peticion = mysql_query($cadena);
		  if (mysql_fetch_array($peticion)!="")
				  {
    
      ?>  
                    
          
		  <?php
          	  while ($registro = mysql_fetch_array($peticion)){
				 
          ?>
							<a class="dock-item2" href="grupo.php?grupo=<?php echo $registro['nom_grup']; ?>"><span><?php echo $registro['nom_grup']; ?></span><img src="../img/agt_announcements.png" alt="home" /></a> 
           <?php
				  }
			  }
			  else
			  {
		    ?>
            <a class="dock-item2" href="busca_grupos.php"><span>Buscar grupos</span><img src="../img/iconos/glyphicons_027_search.png" alt="home" /></a>
			<?php  
			  }
      		  mysql_close($conexion);
             
            ?>
							 
								
						</div>
					</div>
                  </div>
				</div>
				<div class="span4">
     			 <div id="datepicker" class="pull-right"></div>
                 
                 <div class="span12" style="margin-top: 15px">
                 <div class="pull-right" style="margin-right:11px;">
                        <div class="ui-widget">
       <?php
			$cadena = "SELECT nom_grup FROM `grupos`";
			
			
			$conexion = mysql_connect ("localhost","proyecto","proyecto");
			
			mysql_select_db("proyecto", $conexion);
		
			$peticion = mysql_query($cadena);
		
		  ?>
                        <form id="bus_grupo">
                            <label>Buscardor de Grupos:</label>
                            <p>
                            	<select id="b_grupos" name="b_gupos">
                                 <option value=""></option>
          <?php
          	  while ($registro = mysql_fetch_array($peticion)){
          ?>
                                   
                <option value="<?php echo $registro['nom_grup']; ?>"><?php echo $registro['nom_grup']; ?></option>
           <?php
                 
                }
      		  mysql_close($conexion);
             
            ?>
                            	</select>
                            </p>
                            <p><input type="button" class="btn-danger" value="Buscar Grupo"></p>
                         </form>   
                        </div>
                      </div>  
                    </div>
                    <div class="span12" style="margin-top: 7px">
                	 <div class="pull-right" style="margin-right:11px;">
                        <div class="ui-widget">
           <?php
			$cadena = "SELECT nombre FROM `usuario` WHERE nombre != '{$_SESSION["usuario"]}'";
			
			
			$conexion = mysql_connect ("localhost","proyecto","proyecto");
			
			mysql_select_db("proyecto", $conexion);
		
			$peticion = mysql_query($cadena);
		
		  ?>
                        <form id="bus_amigos" name="bus_amigos">
                            <label>Buscardor de Amigos:</label>
                            <p>
                                <select id="b_amigos">
                                 <option value=""></option>
          <?php
          	  while ($registro = mysql_fetch_array($peticion)){
          ?>
                                   
                <option value="<?php echo $registro['nombre']; ?>"><?php echo $registro['nombre']; ?></option>
           <?php
                 
                }
      		  mysql_close($conexion);
             
            ?>
                                </select>
                            </p>
                            <input type="button" class="btn-danger" value="Buscar Amigo">
                         </form>   
                        </div>
                       </div> 
                    </div>
                 
                 
					 <div class="span12" style="margin-top:10px;">
					 	<div id="main_container" class="pull-right" style="overflow:auto; height:200px;">
						<table width="0%" class="table" style= "border-top:1px solid #000000; background-color:#FFFFFF; width: 206px; margin-right:11px;">
							 <thead>
									<tr>
										<th>Amigos conectados</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><a href="#" onClick="javascript:chatWith('Amigo_1')">Amigo 1</a></td>
									</tr>
									<tr>
										<td><a href="#" onClick="javascript:chatWith('Amigo_2')">Amigo 2</a></td>
									</tr>
									<tr>
										<td><a href="#" onClick="javascript:chatWith('Amigo_3')">Amigo 3</a></td>
									</tr>
									<tr>
										<td><a href="#" onClick="javascript:chatWith('Amigo_4')">Amigo 4</a></td>
									</tr>
                                    <tr>
										<td><a href="#" onClick="javascript:chatWith('Amigo_5')">Amigo 5</a></td>
									</tr>
								</tbody>
							</table>
						</div>
					 </div>
	 		 </div>
		</div>
	</div>
</div>


  </body>
</html>
