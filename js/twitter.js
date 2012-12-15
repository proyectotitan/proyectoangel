function twitear()
{
	var mensaje_tw;
	var mensaje_tw = $("#mensaje_t").val();
	$('#twt').attr({
		 'href': 'https://twitter.com/intent/tweet?text='+mensaje_tw+'&amp"'
	}); 
}