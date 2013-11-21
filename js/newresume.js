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

  $('input:not([type=image],[type=button],[type=submit]),textarea').addClass("idleField");
  $('input:not([type=image],[type=button],[type=submit]),textarea').focus(function() {
      $(this).data('holder',$(this).attr('placeholder'));
      $(this).removeClass("idleField").addClass("focusField");
      $(this).attr('placeholder','');
  });
  $('input:not([type=image],[type=button],[type=submit]),textarea').blur(function() {
      $(this).removeClass("focusField").addClass("idleField");
      $(this).attr('placeholder',$(this).data('holder'));
  });
  
  
   $("#startDatepicker,#endDatepicker").datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: 'MM yy'
  });


 $('#deleteSchool').hide(); 

  $('#addSchool').click(function(e) {
    $("#deleteSchool").show();
    $("#education-form").append($("#education-form div.ed_fields:eq(0)").clone(true));
    $("#education-form").append($("#addSchool").clone(true));
    $("#education-form").append($("#deleteSchool").clone(true));
    $("#education-form div.ed_fields").eq(-1).find("input[type=text], textarea").val('');
    $("#addSchool").remove();
    $("#deleteSchool").remove();
    e.preventDefault();
  });

  $('#deleteSchool').click(function() {
    $("#education-form div.ed_fields:last").remove();
    if ($("#education-form").children("div").length ==1) {
       $("#deleteSchool").hide();
    };
  });
  
  
$('#deleteWork').hide(); 
  $('#addWork').click(function(w) {
    $("#deleteWork").show();
    $("#work-form").append($("#work-form div.w_fields:eq(0)").clone(true));
    $("#work-form").append($("#addWork").clone(true));
    $("#work-form").append($("#deleteWork").clone(true));
    $("#work-form div.w_fields").eq(-1).find("input[type=text], textarea").val('');
    $("#addWork").remove();
    $("#deleteWork").remove();
    w.preventDefault();
  });

  $('#deleteWork').click(function() {
    $("#work-form div.w_fields:last").remove();
    $("#deleteWork").hide();
  });
  

});
