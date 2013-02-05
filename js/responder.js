function crear_respuesta(id_mensaje)
{
	if ($("#form_res").length)
	{ 
		$("#form_res").remove();
	}
	else
	{
		$("#form_res").remove();
		$("#"+id_mensaje+"").html('<form id="form_res"><textarea></textarea><button class= "btn btn-danger">Enviar</button></form>');	
	}
}