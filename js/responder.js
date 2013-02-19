function crear_respuesta(id_mensaje, enlace)
{
		$("#form_res").remove();
		$("#"+id_mensaje+"").html('<form id="form_res"><textarea></textarea><button class= "btn btn-danger">Enviar</button></form>');
		$("#"+enlace+"").replaceWith('<a title="Responder este mensaje" rel="tooltip" onClick="borrar_respuesta('+id_mensaje+', '+enlace+')" href="#" class="pull-right" id="'+enlace+'"><i class="icon-share-alt" ></i></a>');	

		
		}

function borrar_respuesta(id_mensaje, enlace)
{
	
	$("#form_res").remove();
	
	alert(''+id_mensaje+'');
	
		$("#"+enlace+"").replaceWith('<a title="Responder este mensaje" rel="tooltip" onClick="crear_respuesta('+id_mensaje+', '+enlace+')" href="#" class="pull-right" id="'+enlace+'"><i class="icon-share-alt" ></i></a>');	
	
}

