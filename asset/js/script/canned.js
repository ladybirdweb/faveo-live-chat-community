$('.faveo_canned_add').submit(function(e) {
	e.preventDefault();
	$('.button').attr("disabled", true);
	fd = new FormData($(this)[0]);
	url = $(this).attr('action');
	title = $('#title').val();
	message = $('#message').val();
	urls = $('#url').val();
	$.ajax({
		type    : 'POST',
		url     : url,
		data    : fd,
		headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
		cache       : false,
		contentType : false,
		processData : false,
		beforeSend: function(){
			if((title == "") || (message == "")){
				$('.button').attr("disabled", false);		
				if(title == ""){ $('.title').addClass('error'); }					
				else { $('.title').removeClass('error'); }
				if(message == ""){ $('.message').addClass('error');}					
				else { $('.message').removeClass('error');}
				return false;
			}
			else{
				$('.button').attr("disabled", false);
				if(title == ""){ $('.title').addClass('error'); }					
				else { $('.title').removeClass('error'); }
				if(message == ""){ $('.message').addClass('error');}					
				else { $('.message').removeClass('error');}
			}
		},
		success : function(op) {
			console.log(op);
			var res = $.parseJSON(op);
			if(res.res == 1){
				$('.button').attr("disabled", false);		
				window.location.href= urls;
			}
		}
	})
})
$('.faveo_canned_edit').submit(function(e) {
	e.preventDefault();
	$('.button').attr("disabled", true);
	fd = new FormData($(this)[0]);
	url = $(this).attr('action');
	title = $('#title').val();
	message = $('#message').val();
	urls = $('#url').val();
	$.ajax({
		type    : 'POST',
		url     : url,
		data    : fd,
		headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
		cache       : false,
		contentType : false,
		processData : false,
		beforeSend: function(){
			if((title == "") || (message == "")){
				$('.button').attr("disabled", false);		
				if(title == ""){ $('.title').addClass('error'); }					
				else { $('.title').removeClass('error'); }
				if(message == ""){ $('.message').addClass('error');}					
				else { $('.message').removeClass('error');}
				return false;
			}
			else{
				$('.button').attr("disabled", false);
				if(title == ""){ $('.title').addClass('error'); }					
				else { $('.title').removeClass('error'); }
				if(message == ""){ $('.message').addClass('error');}					
				else { $('.message').removeClass('error');}
			}
		},
		success : function(op) {
			console.log(op);
			var res = $.parseJSON(op);
			if(res.res == 1){
				$('.button').attr("disabled", false);		
				window.location.href= urls;
			}
		}
	})
})
$(document).on("click",".delete",function(e){
    e.preventDefault();
    if(confirm("Do you really want to delete ?? ")){
      url = $('#url').val();
      id = $(this).attr('data-id');
      if(id!=''){
        $.ajax({
          url:url,
          type:"GET",
          data:{id : id},
          success:function(op){
            console.log(op);
            var res = $.parseJSON(op);
			if(res.res == 1){
				window.location.reload();
			}
          }
        });
      }
    }
});