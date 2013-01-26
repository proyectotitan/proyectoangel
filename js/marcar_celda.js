function marcar_celda (enlace)
{
	$('ul.bs-docs-sidenav li.active').removeClass('active');
	$("#"+enlace+"").addClass('active');
}
