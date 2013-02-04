var x;
x=$(document);
x.ready(inicializar);

function inicializar()
{
	var enlace_respuesta;
	enlace_respuesta=$("#responder");
	enlace_respuesta.click(crear_respuesta);
}

function crear_respuesta ()
{
	var resp;
	resp=$("#resp");
	resp.html('<form id="res"><textarea></textarea><button class= "btn btn-danger">Enviar</button></form>');
}