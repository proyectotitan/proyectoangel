<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Grupo</title>
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
		
		<!-- Carga de scripts -->
		
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
	
	
    
<?php
	session_start();
	if ($_SESSION["usuario"]=="")
		header("Location: index.php");
?>

    <link href="../css/bootstrap.css" rel="stylesheet">
    
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
		<link href="../css/bordes.css" rel="stylesheet">
    
	<script type="text/javascript"  src="../js	/validar.js"> </script>
		<script type="text/javascript">
		
		function validar_post(form)
			{
				var errores= "";
				var sw=0;
				
				if(esBlanco(form.upost.value))
				{
					errores=errores+"No se puede subir un comentario en blanco";
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
                     <ul role="navigation" class="nav">
                   <li class="dropdown, active">
                      <a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop2" href="#"><i class="icon-th-large"></i>&nbsp;Grupos<b class="caret"></b></a>
                      <ul aria-labelledby="drop2" role="menu" class="dropdown-menu">
                        <li><a href="#" tabindex="-1"></a></li>
                        <li><a href="mis_grupos.php" tabindex="-1">Mis grupos</a></li>
                        <li><a href="nuevo_grupo.php" tabindex="-1">Nuevo grupo</a></li>
                      </ul>
                      </ul>
                    </li>
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
          </div>
        </div>
      </div>
    </div>
	
		
		<!-- Html del body  -->
		
		<div class="container-fluid" style="margin-top:60px;">
      <div class="row-fluid">
				<div class="span10">
    <?php
        $cadena = "SELECT nom_grup, imagen, descripcion_g FROM grupos where nom_grup='{$_GET["grupo"]}'";
        $cadena2 = "SELECT nom_grup FROM pertenecen where nom_grup='{$_GET["grupo"]}' and nombre='{$_SESSION["usuario"]}'";
		$cadenaban = "SELECT grup_ban FROM baneados where grup_ban='{$_GET["grupo"]}' and nom_ban='{$_SESSION["usuario"]}'";
		$cadena3 = "SELECT nom_grup FROM `grupos` WHERE seccion in (select seccion from grupos where nom_grup='{$_GET["grupo"]}')";
		$cadena4 = "SELECT nombre FROM `pertenecen` WHERE nom_grup='{$_GET["grupo"]}'";
		$cadena5 = "SELECT usuario.avatar, usuario.estado, mensajes.texto, mensajes.fecha, mensajes.nombre FROM usuario, mensajes WHERE mensajes.nom_grup='{$_GET["grupo"]}' AND usuario.nombre= mensajes.nombre GROUP BY mensajes.texto ORDER BY mensajes.cod_men DESC";
        
        $conexion = mysql_connect ("localhost","proyecto","proyecto");
        
        mysql_select_db("proyecto", $conexion);
    
        $peticion = mysql_query($cadena);
		$c_peticiones = mysql_query($cadena2);
		$t_grupos = mysql_query($cadena3);
		$t_usuarios = mysql_query($cadena4);
		$l_mensajes = mysql_query($cadena5);
		$x_ban = mysql_query($cadenaban);
		mysql_query("UPDATE grupos SET visitas=visitas+1 WHERE nom_grup='{$_GET["grupo"]}'");
      	mysql_close($conexion);  
      ?>
		<?php
          	 $registro = mysql_fetch_array($peticion);
        ?>
					<div class="span2">
						<img src="<?php echo $registro['imagen']; ?>" style="width: 60px"; height="60px"/>
					</div>
					<div class="span8">
						<h1 align="center"><p align="center"><?php echo $registro['nom_grup']; ?></p></h1><br/>
                                                <img src="../img/fondo_sombra_crear_cuenta_basica.png" class="sombra_titulos">
					</div>
        
					<div class="span2">
        <?php
			$registro2 = mysql_fetch_array($c_peticiones);
				if ($registro2=="")
				{
		?>
						<a href="unir_grupo.php?ng=<?php echo $_GET["grupo"]; ?>"><h5><img src="../img/iconos/glyphicons_043_group.png" style="width: 20px"; height="20px"/> &nbsp;Unirse al grupo</h5></a>
        <?php
				}		else{	
		$registroban = mysql_fetch_array($x_ban);
		if ($registroban!=""){
		?>	
		<p>Estas baneado y mientras dure el bloque no podras escribir mensajes.</p>
				
        <?php		
		}
			else{			
		?>
				
		
			<a href="salir_grupo.php?ng=<?php echo $_GET["grupo"]; ?>"><h5><img src="../img/iconos/glyphicons_197_remove.png" style="width: 20px"; height="20px"/> &nbsp;Salirse del grupo</h5></a>
		
		 <?php
				}}
		?>
		
					</div>
					<div class="span12">
						<h4 align="center"><p align="center"><?php echo $registro['descripcion_g']; ?></p></h4>
          
					</div>
					<!-- Aqui va un bucle por cada mensaje de la base de datos  -->
					<div class="span12">
							<table width="0%" class="table">
								<tbody>
    <?php
        while ($registro5 = mysql_fetch_array($l_mensajes)){
    ?>
									<tr>
										<td style="background:#CCCCCC">
											<div class="span1">
												<img src="<?php echo $registro5['avatar'];?>" style="width: 60px"; height="60px">
											</div>
											<div class="span4">
												<h5><?php echo $registro5['nombre'];?></h5>
											</div>
											<div class="span5">
												<h6><i><?php echo $registro5['estado'];?></i></h6>
											</div>
                                            <div class="span2">
												 <h6><i>Enviado el: <?php echo $registro5['fecha'];?></i></h6>
											</div>
											<div class="span12">
												<h6><?php echo $registro5['texto'];?></h6>
                                               
											</div>
										</td>
									</tr>
        <?php
			}
		?>
								</tbody>
							</table>
					</div>
					<div class="span4"></div>
					<div class="span4">
         <?php			
				
				if ($registro2!="" )
			{      
				   if ($registroban!=""){}else{
			
		?>
		
		
		
						<form id="comment" name="comment"  method="post" action="post.php">
							<textarea id="upost" name="upost" ></textarea><br>
							<input type="hidden" id="n_grup" name="n_grup" value="<?php echo $_GET["grupo"]?>"/>
							<input type="hidden" id="n_usu" name="n_usu" value="<?php echo $_SESSION["usuario"]?>"/>
							<input type="button" onClick="validar_post(this.form)"  value="Enviar comentario" class="btn btn-danger">
							
						</form>
         <?php
			}}
		 ?>
					</div>
					<div class="span4"></div>
				</div>
				<div class="span2">
					<table width="0%" class="table table-hover">
             <thead>
                <tr>
                  <th>Grupos relacionados</th>
                </tr>
              </thead>
              <tbody>
	<?php
        while ($registro3 = mysql_fetch_array($t_grupos)){
    ?>
                <tr>
                  <td><a href="grupo.php?grupo=<?php echo $registro3['nom_grup']; ?>"> <?php echo $registro3['nom_grup']; ?> </a></td>
                </tr>
	<?php
			}
	?>
                
              </tbody>
      </table>
			<div class="span12">
					<table width="0%" class="table table-hover">
             <thead>
                <tr>
                  <th>Personas unidas</th>
                </tr>
              </thead>
              <tbody>
    <?php
        while ($registro4 = mysql_fetch_array($t_usuarios)){
    ?>
                <tr>
                 <?php if ($registro4['nombre'] != $_SESSION["usuario"]){?>   
                  <td><a href="javascript:Abrir_ventana('v_amigo.php?usuario=<?php echo $registro4['nombre']; ?>')"><?php echo $registro4['nombre']; ?></a></td>
                 <?php }else { ?>
                  <td><?php echo $registro4['nombre']; ?></td>
                 <?php } ?>
                </tr>
    <?php
		}
	?>
              </tbody>
      </table>
				</div>
				</div>
			</div>
		</div>
	

  </body>
</html>
