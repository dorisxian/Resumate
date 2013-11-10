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

  $('input[type="text"]').addClass("idleField");
  $('input[type="text"]').focus(function() {
      $(this).data('holder',$(this).attr('placeholder'));
      $(this).removeClass("idleField").addClass("focusField");
      $(this).attr('placeholder','');
  });
  $('input[type="text"]').blur(function() {
      $(this).removeClass("focusField").addClass("idleField");
      $(this).attr('placeholder',$(this).data('holder'));
  });
});