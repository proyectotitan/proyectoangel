function muestra_errores(errores)
{
	var x;
	x=$("#errores");
	x.css("alert alert-error");
	x.html('<div class="alert alert-error">'+errores+'</div>');
}
function imagen_errores(campo, mensaje)
{
	var x;
	x=$("#"+campo+"");
	x.html('&nbsp; <a title="'+mensaje+'" rel="tooltip" href="#"><img src="../img/iconos/glyphicons_207_remove_2.png" width="14" height="14"></a>');
}

function imagen_correcto(campo, input)
{
	var x;
	x=$("#"+campo+"");
	x.html('&nbsp; <img src="../img/iconos/glyphicons_206_ok_2.png" width="14" height="14">');
	alert("este es el campo "+input.value+"");
	x=$("#"+input+"");
	x.html('style="background-color:555555;"');
}