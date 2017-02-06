$('#contact_form').submit(function(e) {
  e.preventDefault();
  // $('.button').attr("disabled", true);
  fd = new FormData($(this)[0]);
  url = $(this).attr('action');
  $('.login-box').show();
  $('.chat-box').hide();
  name = $('#name').val();
  email = $('#email').val();
  phone = $('#phone').val();
  emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  $.ajax({
    type    : 'POST',
    url     : url,
    data    : fd,
    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
    cache       : false,
    contentType : false,
    processData : false,
    beforeSend: function(){
      if((name == "") || (email == "") || (phone == "")){
        $('.button').attr("disabled", false);   
        if(name == ""){ $('.name').addClass('text');$('.user_name').addClass('error');$('.name_icon').addClass('icon-error'); }          
        else { $('.name').removeClass('text');$('.user_name').removeClass('error');$('.name_icon').removeClass('icon-error'); }
        if(email == ""){ $('.email').addClass('text');$('.user_email').addClass('error');$('.email_icon').addClass('icon-error');}         
        else { $('.email').removeClass('text');$('.user_email').removeClass('error');$('.email_icon').removeClass('icon-error');}
        if(phone == ""){ $('.phone').addClass('text');$('.user_phone').addClass('error');$('.phone_icon').addClass('icon-error');}         
        else { $('.phone').removeClass('text');$('.user_phone').removeClass('error');$('.phone_icon').removeClass('icon-error');}
        $('.email_error').hide();
        $('.phone_error').hide();
        return false;
      }
      else if(!emailReg.test(email)){
        $('.button').attr("disabled", false);   
        if(name == ""){ $('.name').addClass('text');$('.user_name').addClass('error');$('.name_icon').addClass('icon-error'); }          
        else { $('.name').removeClass('text');$('.user_name').removeClass('error');$('.name_icon').removeClass('icon-error'); }
        if(email == ""){ $('.email').addClass('text');$('.user_email').addClass('error');$('.email_icon').addClass('icon-error');}         
        else { $('.email').removeClass('text');$('.user_email').removeClass('error');$('.email_icon').removeClass('icon-error');}
        if(phone == ""){ $('.phone').addClass('text');$('.user_phone').addClass('error');$('.phone_icon').addClass('icon-error');}         
        else { $('.phone').removeClass('text');$('.user_phone').removeClass('error');$('.phone_icon').removeClass('icon-error');}
        $('.email').addClass('text');$('.user_email').addClass('error');$('.email_icon').addClass('icon-error');
        $('.email_error').show();
        $('.email_error').addClass('error-div');
        $('.email_error').text('Invalid Email!');
        $('.phone_error').hide();
        return false;
      }
      else if(phone != ""){
        if(/^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/.test(phone)){
          if(phone.length != 10){
            $('.button').attr("disabled", false);   
            if(name == ""){ $('.name').addClass('text');$('.user_name').addClass('error');$('.name_icon').addClass('icon-error'); }          
            else { $('.name').removeClass('text');$('.user_name').removeClass('error');$('.name_icon').removeClass('icon-error'); }
            if(email == ""){ $('.email').addClass('text');$('.user_email').addClass('error');$('.email_icon').addClass('icon-error');}         
            else { $('.email').removeClass('text');$('.user_email').removeClass('error');$('.email_icon').removeClass('icon-error');}
            if(phone == ""){ $('.phone').addClass('text');$('.user_phone').addClass('error');$('.phone_icon').addClass('icon-error');}         
            else { $('.phone').removeClass('text');$('.user_phone').removeClass('error');$('.phone_icon').removeClass('icon-error');}
            $('.phone').addClass('text');$('.user_phone').addClass('error');$('.phone_icon').addClass('icon-error');
            $('.phone_error').show();
            $('.phone_error').addClass('error-div');
            $('.phone_error').text('Mobile number must be 10 digit!');
            $('.email_error').hide();
            return false;     
          }
        }
        else{
          $('.button').attr("disabled", false);   
          if(name == ""){ $('.name').addClass('text');$('.user_name').addClass('error');$('.name_icon').addClass('icon-error'); }          
          else { $('.name').removeClass('text');$('.user_name').removeClass('error');$('.name_icon').removeClass('icon-error'); }
          if(email == ""){ $('.email').addClass('text');$('.user_email').addClass('error');$('.email_icon').addClass('icon-error');}         
          else { $('.email').removeClass('text');$('.user_email').removeClass('error');$('.email_icon').removeClass('icon-error');}
          if(phone == ""){ $('.phone').addClass('text');$('.user_phone').addClass('error');$('.phone_icon').addClass('icon-error');}         
          else { $('.phone').removeClass('text');$('.user_phone').removeClass('error');$('.phone_icon').removeClass('icon-error');}
          $('.phone').addClass('text');$('.user_phone').addClass('error');$('.phone_icon').addClass('icon-error');
          $('.phone_error').show();
          $('.phone_error').addClass('error-div');
          $('.phone_error').text('Mobile number must be in digit!');
          $('.email_error').hide();
          return false;
        }
      }
      else{
        $('.button').attr("disabled", false);   
        if(name == ""){ $('.name').addClass('text');$('.user_name').addClass('error');$('.name_icon').addClass('icon-error'); }          
        else { $('.name').removeClass('text');$('.user_name').removeClass('error');$('.name_icon').removeClass('icon-error'); }
        if(email == ""){ $('.email').addClass('text');$('.user_email').addClass('error');$('.email_icon').addClass('icon-error');}         
        else { $('.email').removeClass('text');$('.user_email').removeClass('error');$('.email_icon').removeClass('icon-error');}
        if(phone == ""){ $('.phone').addClass('text');$('.user_phone').addClass('error');$('.phone_icon').addClass('icon-error');}         
        else { $('.phone').removeClass('text');$('.user_phone').removeClass('error');$('.phone_icon').removeClass('icon-error');}
        $('.email_error').hide();
        $('.phone_error').hide();
        return false;
      }
    },
    success : function(op) {
      console.log(op);
      var res = $.parseJSON(op);
      if(res.res == 1){
        $('.login-box').hide();
        $('.chat-box').show();
      }
    }
  })
})