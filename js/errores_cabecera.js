
function errores_cabecera(errores)
{
	var x;
	x=$("#errores_cab");
	x.css("alert alert-error");
	x.html('<div class="alert alert-error" style="width:500px;">'+errores+'</div>');
}