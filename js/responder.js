function crear_respuesta(id_mensaje, emisor)
{   
    if ($('#form_res_'+id_mensaje+'').length) {
        $(".form").remove();
    }
    else{
        $(".form").remove();
        $("#"+id_mensaje+"").html('<br/><form id="form_res_'+id_mensaje+'" class="form" action="envio_privado.php" method="POST"><input type="hidden" name="amigos" value="'+emisor+'" /><input type="hidden" name="amigos" value="'+emisor+'" /><input type="hidden" name="responder" value="1" /><textarea name="mensaje"></textarea><br/><button class= "btn btn-danger">Enviar</button></form>');
    }
}