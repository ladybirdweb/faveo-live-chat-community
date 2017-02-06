$('.faveo_agent_add').submit(function(e) {
	e.preventDefault();
	// $('.button').attr("disabled", true);
	fd = new FormData($(this)[0]);
	url = $(this).attr('action');
	username = $('#user_name').val();
	firstname = $('#first_name').val();
	lastname = $('#last_name').val();
	email = $('#email').val();
	mobile = $('#mobile').val();
	urls = $('#url').val();
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
			if((username == "") || (firstname == "") || (lastname == "") || (email == "")){
				$('.button').attr("disabled", false);		
				if(username == ""){ $('.user_name').addClass('error'); }					
				else { $('.user_name').removeClass('error'); }
				if(firstname == ""){ $('.first_name').addClass('error');}					
				else { $('.first_name').removeClass('error');}
				if(lastname == ""){ $('.last_name').addClass('error');}					
				else { $('.last_name').removeClass('error');}
				if(email == ""){ $('.email').addClass('error');}					
				else { $('.email').removeClass('error');}
				$('.email_error').hide();
				$('.mobile_error').hide();
				$('.user_error').hide();
				return false;
			}
			else if(!emailReg.test(email)){
				$('.button').attr("disabled", false);		
				if(username == ""){ $('.user_name').addClass('error'); }					
				else { $('.user_name').removeClass('error'); }
				if(firstname == ""){ $('.first_name').addClass('error');}					
				else { $('.first_name').removeClass('error');}
				if(lastname == ""){ $('.last_name').addClass('error');}					
				else { $('.last_name').removeClass('error');}
				if(email == ""){ $('.email').addClass('error');}					
				else { $('.email').removeClass('error');}
				$('.email_error').show();
				$('.email_error').addClass('error-div');
				$('.email_error').text('Invalid Email!');
				$('.mobile_error').hide();
				$('.user_error').hide();
				return false;
			}
			else if(mobile != ""){
				if(/^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/.test(mobile)){
					if(mobile.length != 10){
						$('.button').attr("disabled", false);		
						if(username == ""){ $('.user_name').addClass('error'); }					
						else { $('.user_name').removeClass('error'); }
						if(firstname == ""){ $('.first_name').addClass('error');}					
						else { $('.first_name').removeClass('error');}
						if(lastname == ""){ $('.last_name').addClass('error');}					
						else { $('.last_name').removeClass('error');}
						if(email == ""){ $('.email').addClass('error');}					
						else { $('.email').removeClass('error');}
						$('.mobile_error').show();
						$('.mobile_error').addClass('error-div');
						$('.mobile_error').text('Mobile number must be 10 digit!');
						$('.email_error').hide();
						$('.user_error').hide();
						return false;			
					}
				}
				else{
					$('.button').attr("disabled", false);		
						if(username == ""){ $('.user_name').addClass('error'); }					
						else { $('.user_name').removeClass('error'); }
						if(firstname == ""){ $('.first_name').addClass('error');}					
						else { $('.first_name').removeClass('error');}
						if(lastname == ""){ $('.last_name').addClass('error');}					
						else { $('.last_name').removeClass('error');}
						if(email == ""){ $('.email').addClass('error');}					
						else { $('.email').removeClass('error');}
						$('.mobile_error').show();
						$('.mobile_error').addClass('error-div');
						$('.mobile_error').text('Mobile number must be in digit!');
						$('.email_error').hide();
						$('.user_error').hide();
						return false;
				}
			}
			else{
				$('.button').attr("disabled", false);		
				if(username == ""){ $('.user_name').addClass('error'); }					
				else { $('.user_name').removeClass('error'); }
				if(firstname == ""){ $('.first_name').addClass('error');}					
				else { $('.first_name').removeClass('error');}
				if(lastname == ""){ $('.last_name').addClass('error');}					
				else { $('.last_name').removeClass('error');}
				if(email == ""){ $('.email').addClass('error');}					
				else { $('.email').removeClass('error');}
				$('.email_error').hide();
				$('.mobile_error').hide();
				$('.user_error').hide();
				return false;
			}
		},
		success : function(op) {
			console.log(op);
			var res = $.parseJSON(op);
			if(res.res == 1){
				$('.button').attr("disabled", false);		
				window.location.href= urls;
			}
			else if(res.res == 2){
				$('.button').attr("disabled", false);		
				if(username == ""){ $('.user_name').addClass('error'); }					
				else { $('.user_name').removeClass('error'); }
				if(firstname == ""){ $('.first_name').addClass('error');}					
				else { $('.first_name').removeClass('error');}
				if(lastname == ""){ $('.last_name').addClass('error');}					
				else { $('.last_name').removeClass('error');}
				if(email == ""){ $('.email').addClass('error');}					
				else { $('.email').removeClass('error');}
				$('.user_error').show();
				$('.user_error').addClass('error-div');
				$('.user_error').text('Username is already taken!');
				$('.mobile_error').hide();
				$('.email_error').hide();
				return false;
			}
			else{
				$('.button').attr("disabled", false);		
				if(username == ""){ $('.user_name').addClass('error'); }					
				else { $('.user_name').removeClass('error'); }
				if(firstname == ""){ $('.first_name').addClass('error');}					
				else { $('.first_name').removeClass('error');}
				if(lastname == ""){ $('.last_name').addClass('error');}					
				else { $('.last_name').removeClass('error');}
				if(email == ""){ $('.email').addClass('error');}					
				else { $('.email').removeClass('error');}
				$('.email_error').show();
				$('.email_error').addClass('error-div');
				$('.email_error').text('Email is already taken!');
				$('.mobile_error').hide();
				$('.user_error').hide();
				return false;
			}
		}
	})
})
$('.faveo_agent_edit').submit(function(e) {
	e.preventDefault();
	// $('.button').attr("disabled", true);
	fd = new FormData($(this)[0]);
	url = $(this).attr('action');
	username = $('#user_name').val();
	firstname = $('#first_name').val();
	lastname = $('#last_name').val();
	email = $('#email').val();
	mobile = $('#mobile').val();
	urls = $('#url').val();
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
			if((username == "") || (firstname == "") || (lastname == "") || (email == "")){
				$('.button').attr("disabled", false);		
				if(username == ""){ $('.user_name').addClass('error'); }					
				else { $('.user_name').removeClass('error'); }
				if(firstname == ""){ $('.first_name').addClass('error');}					
				else { $('.first_name').removeClass('error');}
				if(lastname == ""){ $('.last_name').addClass('error');}					
				else { $('.last_name').removeClass('error');}
				if(email == ""){ $('.email').addClass('error');}					
				else { $('.email').removeClass('error');}
				$('.email_error').hide();
				$('.mobile_error').hide();
				$('.user_error').hide();
				return false;
			}
			else if(!emailReg.test(email)){
				$('.button').attr("disabled", false);		
				if(username == ""){ $('.user_name').addClass('error'); }					
				else { $('.user_name').removeClass('error'); }
				if(firstname == ""){ $('.first_name').addClass('error');}					
				else { $('.first_name').removeClass('error');}
				if(lastname == ""){ $('.last_name').addClass('error');}					
				else { $('.last_name').removeClass('error');}
				if(email == ""){ $('.email').addClass('error');}					
				else { $('.email').removeClass('error');}
				$('.email_error').show();
				$('.email_error').addClass('error-div');
				$('.email_error').text('Invalid Email!');
				$('.mobile_error').hide();
				$('.user_error').hide();
				return false;
			}
			else if(mobile != ""){
				if(/^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/.test(mobile)){
					if(mobile.length != 10){
						$('.button').attr("disabled", false);		
						if(username == ""){ $('.user_name').addClass('error'); }					
						else { $('.user_name').removeClass('error'); }
						if(firstname == ""){ $('.first_name').addClass('error');}					
						else { $('.first_name').removeClass('error');}
						if(lastname == ""){ $('.last_name').addClass('error');}					
						else { $('.last_name').removeClass('error');}
						if(email == ""){ $('.email').addClass('error');}					
						else { $('.email').removeClass('error');}
						$('.mobile_error').show();
						$('.mobile_error').addClass('error-div');
						$('.mobile_error').text('Mobile number must be 10 digit!');
						$('.email_error').hide();
						$('.user_error').hide();
						return false;			
					}
				}
				else{
					$('.button').attr("disabled", false);		
						if(username == ""){ $('.user_name').addClass('error'); }					
						else { $('.user_name').removeClass('error'); }
						if(firstname == ""){ $('.first_name').addClass('error');}					
						else { $('.first_name').removeClass('error');}
						if(lastname == ""){ $('.last_name').addClass('error');}					
						else { $('.last_name').removeClass('error');}
						if(email == ""){ $('.email').addClass('error');}					
						else { $('.email').removeClass('error');}
						$('.mobile_error').show();
						$('.mobile_error').addClass('error-div');
						$('.mobile_error').text('Mobile number must be in digit!');
						$('.email_error').hide();
						$('.user_error').hide();
						return false;
				}
			}
			else{
				$('.button').attr("disabled", false);		
				if(username == ""){ $('.user_name').addClass('error'); }					
				else { $('.user_name').removeClass('error'); }
				if(firstname == ""){ $('.first_name').addClass('error');}					
				else { $('.first_name').removeClass('error');}
				if(lastname == ""){ $('.last_name').addClass('error');}					
				else { $('.last_name').removeClass('error');}
				if(email == ""){ $('.email').addClass('error');}					
				else { $('.email').removeClass('error');}
				$('.email_error').hide();
				$('.mobile_error').hide();
				$('.user_error').hide();
				return false;
			}
		},
		success : function(op) {
			console.log(op);
			var res = $.parseJSON(op);
			if(res.res == 1){
				$('.button').attr("disabled", false);		
				window.location.href= urls;
			}
			else if(res.res == 2){
				$('.button').attr("disabled", false);		
				if(username == ""){ $('.user_name').addClass('error'); }					
				else { $('.user_name').removeClass('error'); }
				if(firstname == ""){ $('.first_name').addClass('error');}					
				else { $('.first_name').removeClass('error');}
				if(lastname == ""){ $('.last_name').addClass('error');}					
				else { $('.last_name').removeClass('error');}
				if(email == ""){ $('.email').addClass('error');}					
				else { $('.email').removeClass('error');}
				$('.user_error').show();
				$('.user_error').addClass('error-div');
				$('.user_error').text('Username is already taken!');
				$('.mobile_error').hide();
				$('.email_error').hide();
				return false;
			}
			else{
				$('.button').attr("disabled", false);		
				if(username == ""){ $('.user_name').addClass('error'); }					
				else { $('.user_name').removeClass('error'); }
				if(firstname == ""){ $('.first_name').addClass('error');}					
				else { $('.first_name').removeClass('error');}
				if(lastname == ""){ $('.last_name').addClass('error');}					
				else { $('.last_name').removeClass('error');}
				if(email == ""){ $('.email').addClass('error');}					
				else { $('.email').removeClass('error');}
				$('.email_error').show();
				$('.email_error').addClass('error-div');
				$('.email_error').text('Email is already taken!');
				$('.mobile_error').hide();
				$('.user_error').hide();
				return false;
			}
		}
	})
})
$(document).ready(function(){
	var refreshId = setInterval( function() {
		urla = $('#urla').val();
		urlb = $('#urlb').val();
		urlc = $('#urlc').val();
		$.ajax({
			type    : "POST",
			url     : urla,
			headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
			success : function(op) {
				console.log(op);
				res = $.parseJSON(op);
				if (res.res == 1) {
					$(".chat-div").hide();
					$(".result").html(res.come);
				}
			}
		})
		$.ajax({
			type    : "GET",
			url     : urlb,
			success : function(op) {
			}
		})
		$.ajax({
			type    : "POST",
			url     : urlc,
			headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
			success : function(op) {
				console.log(op);
				res = $.parseJSON(op);
				if (res.res == 1) {
					$(".agent-div").hide();
					$(".result-div").html(res.come);
				}
			}
		})
	}, 2000);
});