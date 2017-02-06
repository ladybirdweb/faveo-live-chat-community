<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<h1>Online User</h1>
<div class="online"></div>
<script>
	$(document).ready(function(){
	    var refreshId = setInterval( function() {
	    	$.ajax({
				type    : "GET",
				url     : "{{URL::route('/online/update')}}",
				success : function(op) {
					console.log(op);
					res = $.parseJSON(op);
					if (res.res == 1) {
						$(".online").html(res.come);
					}
				}
			})
	    }, 5000);
	});
</script>
</body>
</html>