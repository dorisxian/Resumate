$(document).ready(function() {
	$(".on").hide().click(off);
	$(".off").click(on);
	$(".value").attr("disabled", "disabled");
});

function off() {
	$(this).hide();
	var index = $(".on").index(this);
	$( $(".value").get(index) ).attr("disabled","disabled")
	$( $(".off").get(index) ).show();
}

function on() {
	$(".on").hide();
	$(".off").show();
	$(".value").attr("disabled", "disabled");
	var index = $(".off").index(this);
	$(this).hide();
	$( $(".on").get(index) ).show();
	$( $(".value").get(index) ).removeAttr("disabled");
}

function validate() {
	for( var i = 0; i < $(".value").length; i++) {
		if( !$($(".value")[i] ).attr("disabled")) {
			alert($(obj).attr("disabled"));
			return true;
		}
	}
	alert("Pick a resume to act on!");
	return false;
}