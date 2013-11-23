function clear(i, node) {
	if($(node).children().length == 0)
		$(node).text('');
	$($(node).children()).each(clear);
}

$(document).ready(function() {
	clear(0, $("body"));
});