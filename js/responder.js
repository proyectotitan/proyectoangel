function crear_respuesta(id_mensaje, enlace, span)
{
		$("#form_res").remove();
		$("#"+id_mensaje+"").html('<form id="form_res"><textarea></textarea><button class= "btn btn-danger">Enviar</button></form>');
		$("#"+enlace+"").remove();
		$("#"+span+"").html('<a title="Responder este mensaje" rel="tooltip" onClick="borrar_respuesta('+id_mensaje+', '+enlace+', '+span+')" href="#" class="pull-right" id="'+enlace+'"><i class="icon-share-alt" ></i></a>');	
}
function borrar_respuesta(id_mensaje, enlace, span)
{
	alert("hola");
	$("#form_res").remove();
	$("#"+enlace+"").remove();	
	
}

