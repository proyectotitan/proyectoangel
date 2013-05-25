<!DOCTYPE html>
<?php
    session_start();
    if ($_SESSION["usuario"]=="")
	header("Location: index.php");
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Hoy en el Mundo</title>
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
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
	function cerrarVentana(){
                  window.opener.document.location.reload();
   	   	  window.close();
   		}
	$(document).ready();
	setTimeout(cerrarVentana,3500);	
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
    <?php if ($_GET["error"]==""){ ?>
        <div class="alert alert-success">
            <strong><?php echo $_GET["mensaje_ventana"]; ?></strong> La ventana se cerrar&aacute; en breves momentos.
        </div>   
   <?php }else{ ?>
        <div class="alert alert-danger">
            <strong><?php echo $_GET["error"]; ?></strong>
            <?php echo $_GET["mensaje_ventana"]; ?> La ventana se cerrar&aacute; en breves momentos.
        </div>
   <?php } ?>
  </body>
</html>