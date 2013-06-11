function crear_respuesta(id_mensaje, enlace)
{   
    if ($('#form_res_'+id_mensaje+'').length) {
        $(".form").remove();
    }
    else{
        $(".form").remove();
        $("#"+id_mensaje+"").html('<br/><form id="form_res_'+id_mensaje+'" class="form" name="form_res"><textarea></textarea><br/><button class= "btn btn-danger">Enviar</button></form>');
        $("#"+enlace+"").replaceWith('<a title="Responder este mensaje" rel="tooltip" onClick="borrar_respuesta('+id_mensaje+', '+enlace+')" href="#" class="pull-right" id="'+enlace+'"><i class="icon-share-alt" ></i></a>');	
    }
}