$('.faveo_login').submit(function(e) {
	e.preventDefault();
	// $('#sign_in').attr("disabled", true);
	fd = new FormData($(this)[0]);
	url = $(this).attr('action');
	email = $('#email').val();
	password = $('#password').val();
	urls = $('#url').val();
	url1s = $('#url1').val();
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
			if((email == "") || (password == "")){
				// $('#sign_in').attr("disabled", false);		
				if(email == ""){ $('.user_email').addClass('error');$('.email_icon').addClass('icon-error'); }					
				else { $('.user_email').removeClass('error');$('.email_icon').removeClass('icon-error'); }
				if(password == ""){ $('.user_password').addClass('error');$('.password_icon').addClass('icon-error'); }					
				else { $('.user_password').removeClass('error');$('.password_icon').removeClass('icon-error'); }
				$('.email_error').hide();
				$('.password_error').hide();
				return false;
			}
			else if(!emailReg.test(email)){
				// $('#sign_in').attr("disabled", false);		
				if(email == ""){ $('.user_email').addClass('error');$('.email_icon').addClass('icon-error'); }					
				else { $('.user_email').removeClass('error');$('.email_icon').removeClass('icon-error'); }
				if(password == ""){ $('.user_password').addClass('error');$('.password_icon').addClass('icon-error'); }					
				else { $('.user_password').removeClass('error');$('.password_icon').removeClass('icon-error'); }
				$('.email_error').show();
				$('.email_error').addClass('error-div');
				$('.email_error').text('Invalid Email!');
				$('.password_error').hide();
				return false;
			}
			else{
				// $('#sign_in').attr("disabled", false);
				if(email == ""){ $('.user_email').addClass('error');$('.email_icon').addClass('icon-error'); }					
				else { $('.user_email').removeClass('error');$('.email_icon').removeClass('icon-error'); }
				if(password == ""){ $('.user_password').addClass('error');$('.password_icon').addClass('icon-error'); }					
				else { $('.user_password').removeClass('error');$('.password_icon').removeClass('icon-error'); }
				$('.email_error').hide();
				$('.password_error').hide();
			}
		},
		success : function(op) {
			console.log(op);
			var res = $.parseJSON(op);
			if (res.res == 0) {
				// $('#sign_in').attr("disabled", false);		
				$('.user_email').addClass('error');
				$('.email_icon').addClass('icon-error');
				$('.user_password').removeClass('error');
				$('.password_icon').removeClass('icon-error');
				$('.email_error').show();
				$('.email_error').addClass('error-div');
				$('.email_error').text('Please check your email');
				$('.password_error').hide();
				return false;
			}
			else if(res.res == 1){
				// $('#sign_in').attr("disabled", false);		
				$('.user_password').addClass('error');
				$('.password_icon').addClass('icon-error');
				$('.user_email').removeClass('error');
				$('.email_icon').removeClass('icon-error');
				$('.password_error').show();
				$('.password_error').addClass('error-div');
				$('.password_error').text('Please enter correct password');
				$('.email_error').hide();
				return false;
			}
			else if(res.res == 2){
				window.location.href = urls;
			}
			else if(res.res == 3){
				window.location.href = url1s;
			}
		}
	})
})