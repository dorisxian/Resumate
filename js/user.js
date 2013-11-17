$(document).ready(function() {
	$('.change_link a').on('click', function(e){
		e.preventDefault();
		var oldcontent;
		var newcontent = $(this).attr('href');
		if($(this).hasClass('toregister')) {
			oldcontent = $('#login');
		}
		else if($(this).hasClass('tologin')) {
			oldcontent = $('#register');
		}
		$(oldcontent).fadeOut('fast', function(){
			$(newcontent).fadeIn().removeClass('hidden');
			$(oldcontent).addClass('hidden');
		});
	});

	$('input:not([type=image],[type=button],[type=submit])').focus(function() {
		$(this).data('holder',$(this).attr('placeholder'));
		$(this).attr('placeholder','');
	});
	$('input:not([type=image],[type=button],[type=submit])').blur(function() {
		$(this).attr('placeholder',$(this).data('holder'));
	});
});