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
	$conexion = mysql_connect ("localhost","proyecto","proyecto");        
	mysql_select_db("proyecto", $conexion);
	$amigos = mysql_query("SELECT amigo1 FROM amigos WHERE amigo2 = '{$_SESSION["usuario"]}'UNION SELECT amigo2 FROM amigos WHERE amigo1 = '{$_SESSION["usuario"]}'");
?>
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/validar.js"></script>
    <script src="../js/muestra_errores.js"></script> 
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
		$( "#amigos" ).combobox();
		$( "#toggle" ).click(function() {
			$( "#combobox" ).toggle();
		});
	});
	
	function validar(form)
	{
		var errores= "";
		var sw=0;
		
		if(esBlanco(form.amigos.value))
		{
			errores=errores+"<p>El destinatario no puede estar en blanco</p>";
			sw=1;
			var x;
			x=$(document);
			x.ready(imagen_errores("i_amigos", "El destinatario no puede estar en blanco"));
		}
		
		if(esBlanco(form.mensaje.value))
		{
			errores=errores+"<p>Es necesario escribir un mensaje</p>";
			sw=1;
			var x;
			x=$(document);
			x.ready(imagen_errores("i_mensaje", "Es necesario escribir un mensaje"));
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
					
        </div>
      </div>
    </div>
    
    
    <h2>Enviar un mensaje nuevo</h2>
    
    <div class="ui-widget">
    <form id="enviar_msj" action="envio_privado.php" method="POST">
        <div id="errores"></div>
        <p>Para: 
            <select id="amigos" name="amigos">
            <option value=""></option>
            <?php
				while ($registro = mysql_fetch_array($amigos)){
			?>
            	<option value="<?php echo $registro['amigo1']; ?>"><?php echo $registro['amigo1']; ?></option>
			<?php
				}
			?>
            </select><i id="i_amigos"></i>
        </p>
        
        <p>Escribe tu mensaje</p>
        <input type="hidden" name="responder" value="2" />
        <p><textarea id="mensaje" name="mensaje" style="width:400px;height:100px;border: 2px" ></textarea><i id="i_mensaje"></i></p>
		
        <input class="btn btn-success" type="button" onClick="validar(this.form)" value="Enviar"></input>
        <button class="btn btn-inverse" type="button" onClick="window.close();" >Cancelar</button>
     </form>   
    </div>
    
  </body>
</html>