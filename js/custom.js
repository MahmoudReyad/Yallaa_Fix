$(document).ready(function(){
  $('.main-header').height($(window).height());
  $(window).on('resize' ,function(){
    $('.main-header').height($(window).height());
  });
$('#global-modal').modal('show');

  $('.iphone , .btn_faild').on('click' , function(){
    $('.request-order').fadeIn(200 , function(){
      $('html,body').animate({
            scrollTop : $( $('.iphone').data('value')).offset().top-50
          },1000);
    });
  });
  // $('.contact').on('click' , function(){
  //   $('body , html').animate({
  //     scrollTop : $($(this).data('value')).offset().top
  //   }, 1000)
  // });
  $('.order').on('click' , function(){
    $('body , html').animate({
      scrollTop : $($(this).data('value')).offset().top-50
    }, 1000)
  });
  // Start Form Validation
  var name = $('#choosing_form input[name = name] ');
  var email = $('#choosing_form input[name = email] ');
  var phone = $('#choosing_form input[name = phone] ');
  var address = $('#choosing_form input[name = address] ');
  var problem = $('#choosing_form textarea ');
  var name_ed = true;
  var email_ed = true;
  var phone_ed  = true;
  var address_ed = true;
  var problem_ed = true;
  function check(){
    if(name_ed || email_ed || phone_ed || address_ed || problem_ed){
      return 1;
    }
    else {
      return 0;
    }
  }
  $('#choosing_form input[name = name] ,#choosing_form input[name = email],#choosing_form input[name = phone],#choosing_form input[name = address] , textarea').on('blur' , function(){
    if($(this).val() =="" || $(this).val() ==" " ){
      $(this).parent().find('.custom-alert').empty().append('<p>This Field Can\'t be empty</p>').fadeIn(300);
    }
    else {
      $(this).parent().find('.custom-alert').fadeOut(400);
    }
  });
   $(name).on('blur' , function(){
      if(name.val().length <= 3){
        name.parent().find('.custom-alert').empty().append('<p>Your Name Should Be More Than 3 Characters</p>').fadeIn(300);
        name.css("border" , "1px solid #f91d1d");
          name_ed = true;
      }
      else {
        name.parent().find('.custom-alert').fadeOut(400);
        name.css("border" , "2px solid #61ff00");
          name_ed = false;
      }
    });
      $(phone).on('blur' , function(){
         if($(this).val().length < 11 || $(this).val().length > 11 ){
           $(this).parent().find('.custom-alert').empty().append('<p>Your Phone Numbers should be 11 numbers only</p>').fadeIn(300);
           $(this).css("border" , "1px solid #f91d1d");
         }
         else {
           $(this).parent().find('.custom-alert').fadeOut(400);
           $(this).css("border" , "2px solid #61ff00");
           phone_ed = false;
         }
       });
         $(problem).on('blur' , function(){
            if($(this).val().length < 10){
              $(this).parent().find('.custom-alert').empty().append('<p>Your problem should be mote than 10 Characters</p>').fadeIn(300);
              $(this).css("border" , "1px solid #f91d1d");
              problem_ed = true;
            }
            else {
              $(this).parent().find('.custom-alert').fadeOut(400);
              $(this).css("border" , "2px solid #61ff00");
              problem_ed = false;
            }
          });
            $(address).on('blur' , function(){
               if($(this).val().length < 20){
                 $(this).parent().find('.custom-alert').empty().append('<p>Your address should contain 20 Characters</p>').fadeIn(300);
                 $(this).css("border" , "1px solid #f91d1d");
                 address_ed = true;
               }
               else {
                 $(this).parent().find('.custom-alert').fadeOut(400);
                 $(this).css("border" , "2px solid #61ff00");
                 address_ed = false;
               }
             });
               $(email).on('blur' , function(){
                  if($(this).val().length < 3){
                    $(this).parent().find('.custom-alert').empty().append('<p>Your email should be more than 3 Characters and contain @ symbol</p>').fadeIn(300);
                    $(this).css("border" , "1px solid #f91d1d");
                    email_ed = true;
                  }
                  else {
                    $(this).parent().find('.custom-alert').fadeOut(400);
                    $(this).css("border" , "2px solid #61ff00");
                    email_ed = false;
                  }
                });
            $('#choosing_form').on('submit' , function(e){
              if(check() == 1){
                e.preventDefault();
              }
              else{
                $('.loading-page').css("display" , "none");

              }
            });
            // $(window).on('load' ,function(){
            //   $('.loading-page i , .loading-page h3').delay(1000).fadeOut(5000 , function(){
            //     $('.loading-page').fadeOut(2000);
            //     $('body').css("overflow" , "auto");
            //   });
            // });

    });
