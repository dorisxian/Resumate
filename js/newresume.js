$(document).ready(function() {

  $(document).on('click', "#sidemenu a", function() {
    $('.active').removeClass('active');
    $(this).addClass('active');
  });

  $('#sidemenu a').on('click', function(e){
    e.preventDefault();

    if($(this).hasClass('open')) {}
    else {
      var oldcontent = $('#sidemenu li a.open').attr('href');
      var newcontent = $(this).attr('href');
      
      $(oldcontent).fadeOut('fast', function(){
        $(newcontent).fadeIn().removeClass('hidden');
        $(oldcontent).addClass('hidden');
      });
      
      $('#sidemenu a').removeClass('open');
      $(this).addClass('open');
    }
  });

  $('input:not([type=image],[type=button],[type=submit])').addClass("idleField");
  $('input:not([type=image],[type=button],[type=submit])').focus(function() {
      $(this).data('holder',$(this).attr('placeholder'));
      $(this).removeClass("idleField").addClass("focusField");
      $(this).attr('placeholder','');
  });
  $('input:not([type=image],[type=button],[type=submit])').blur(function() {
      $(this).removeClass("focusField").addClass("idleField");
      $(this).attr('placeholder',$(this).data('holder'));
  });
  $('#addSchool').click(function(e) {
    $("#education-form").append('<br>');
    $("#education-form").append($("#education-form div.ed_fields:eq(0)").clone(true));
    $("#education-form div.ed_fields").eq(-1).find("ed_fields").val('');
    e.preventDefault();
  })
});
