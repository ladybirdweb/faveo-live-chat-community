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
	$(document).ready(function(){setInterval(function(){$.ajax({type:"GET",url:"{{URL::route('/online/update')}}",success:function(e){console.log(e),res=$.parseJSON(e),1==res.res&&$(".online").html(res.come)}})},5e3)});
</script>
</body>
</html>