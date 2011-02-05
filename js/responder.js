function crear_respuesta(id_mensaje, enlace, span)
{
		$("#form_res").remove();
		$("#"+id_mensaje+"").html('<form id="form_res"><textarea></textarea><button class= "btn btn-danger">Enviar</button></form>');
		$("#"+enlace).remove();
		$("#"+span).html('<a title="Responder este mensaje" rel="tooltip" onClick="borrar_respuesta("id_1", "e_1", "e_borrar_1")" href="#" class="pull-right" id="responder"><i class="icon-share-alt" ></i></a>');	
}
function crear_respuesta(id_mensaje, enlace, span)
{
	$("#form_res").remove();
	$("#"+span).html('<a title="Responder este mensaje" rel="tooltip" onClick="crear_respuesta("id_1", "e_1", "e_borrar_1")" href="#" class="pull-right" id="responder"><i class="icon-share-alt" ></i></a>');
}

