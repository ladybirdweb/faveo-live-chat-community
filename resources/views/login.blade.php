<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Faveo Chat | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="http://www.faveohelpdesk.com/demo/helpdesk/lb-faveo/media/images/favicon.ico" rel="shortcut icon">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('asset/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('asset/css/AdminLTE.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('asset/css/blue.css') }}">
  <style>
    .error{
      border: 1px solid #ff0000;
    }
    .icon-error{
      color: #ff0000 !important;
    }
    .error-div{
      padding-left: 2px;
      color: #ff0000 !important;
    }
  </style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="" style="background-image:url('asset/img/logofaveo.png')"></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <div align="center">
        <a href="http://www.faveohelpdesk.com" class="logo"><img src="asset/img/logofaveo.png" width="100px;"></a>
      </div>
      <p class="login-box-msg">Sign in to start your session</p>
      <form action="{{URL::route('/login')}}" method="post" class="faveo_login">
        <input type="hidden" name="_token" value="{{ Session::token() }}">
        <div class="email_error"></div>
        <div class="form-group has-feedback user_email">
          <input type="email" class="form-control email" placeholder="Email" id="email" name="email" autofocus="autofocus">
          <span class="glyphicon glyphicon-envelope form-control-feedback email_icon"></span>
        </div>
        <div class="password_error"></div>
        <div class="form-group has-feedback user_password">
          <input type="password" class="form-control password" placeholder="Password" name="password" id="password">
          <span class="glyphicon glyphicon-lock form-control-feedback password_icon"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" id="sign_in">Sign In</button>
          </div>
          <input type="hidden" id="ip" name="ip">
          <!-- /.col -->
        </div>
      </form>
      <input type="hidden" id="url" value="{{URL::route($url)}}">
      <input type="hidden" id="url1" value="{{URL::route('/')}}">
      <!-- /.social-auth-links -->
      <a href="forgetpassword.html">I forgot my password</a><br>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 2.2.3 -->
  <script src="{{ asset('asset/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="{{ asset('asset/bootstrap/js/bootstrap.min.js') }}"></script>
  <!-- iCheck -->
  <script src="{{ asset('asset/plugins/iCheck/icheck.min.js') }}"></script>
  <script src="{{ asset('asset/js/script/login.js') }}"></script>
  <script>
    $(function(){$("input").iCheck({checkboxClass:"icheckbox_square-blue",radioClass:"iradio_square-blue",increaseArea:"20%"})}),$(document).ready(function(){$.getJSON("http://freegeoip.net/json/",function(e){$("#ip").val(e.ip)})});
  </script>
</body>
</html>
