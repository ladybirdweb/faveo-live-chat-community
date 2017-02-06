<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Faveo Chat</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  @include('style')
  <style>
    .error{
      border: 1px solid #ff0000;
    }
    .icon-error{
      color: #ff0000 !important;
    }
    .text{
      border-left: 1px solid red !important;
    }
    .error-div{
      padding-left: 2px;
      color: #ff0000 !important;
    }
    .accordion-toggle {
      cursor: pointer;
    }
    .accordion-content.default {
      display: none;
    }
    .accordion-toggle{
      color: #ffffff;
      line-height: 30px;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 20px;
      text-align: center;
      background: white;
      width:100%;
      padding: 10px;
      margin-bottom: 1px;
      border:none;
    }
    i.fa.fa-angle-up, i.fa.fa-angle-down{
      float:right;
      font-size: 25px;
    }
    #box{
      border: 1px solid rgb(200, 200, 200);
      box-shadow: rgba(0, 0, 0, 0.1) 0px 5px 5px 2px;
      background: rgba(200, 200, 200, 0.1);
      border-radius: 4px;
      position: absolute;
      border-color: #337ab7;
      bottom: 0; 
      left:4%;
    }
    h2{
      text-align:center;
      color:#fff;
    }
  </style>
</head>  
<body>
  <div class="accordion">
    <div class="col-md-offset-8 col-md-3 pull-right" id="box" style="background-color:white; padding:0px; ">
      <div class="accordion-toggle" style="color:white; background-color:#337ab7;">Talk To Us!<i class="fa fa-angle-down"></i></div>
      <div class="accordion-content default login-box">
        <hr>
        <form class="form-horizontal" action="{{URL::route('/chat/contact')}}" method="POST" id="contact_form" style="margin: 0 auto; width:80%;" >
          <input type="hidden" name="_token" value="{{ Session::token() }}">
          <fieldset>
            <!-- Form Name -->
            <!-- Text input-->
            <div class="form-group">
              <div class="col-md-12">
                <div class="input-group user_name">
                  <span class="input-group-addon name_icon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="name" placeholder="Your Name" class="form-control name" id="name" type="text">
                </div>
              </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
              <div class="col-md-12">
                <div class="input-group user_email">
                  <span class="input-group-addon email_icon"><i class="glyphicon glyphicon-envelope"></i></span>
                  <input name="email" placeholder="Your E-Mail" class="form-control email" id="email" type="text">
                </div>
                <div class="email_error"></div>
              </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
              <div class="col-md-12">
                <div class="input-group user_phone">
                  <span class="input-group-addon phone_icon"><i class="glyphicon glyphicon-earphone"></i></span>
                  <input name="phone" placeholder="(005)501-120101" class="form-control phone" id="phone" type="text">
                </div>
                <div class="phone_error"></div>
              </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
              <div class="col-md-12">
                <button type="submit" class="btn  pull-right" style="background-color:#86C953; color:white;">Send <span class="glyphicon glyphicon-send"></span></button>
              </div>
            </div>
            <input type="hidden" name="ip" id="ip">
          </fieldset>
        </form>
      </div>  
      <div class="accordion-content default chat-box" style="display: none;">
        <hr>
        <div class="box-body chat">
          <!-- chat item -->
          <div class="item">
            <img src="images/user4-128x128.jpg" alt="user image" class="online">
            <p class="message">
              <a href="#" class="name">
                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                Mike Doe
              </a>
              I would like to meet you to discuss the latest news about
              I would like to meet you to discuss the latest news about
              I would like to meet you to discuss the latest news  news about
            </p>
            <!-- /.attachment -->
          </div>
          <!-- /.item -->
          <!-- chat item -->
          <div class="item">
            <img src="images/user3-128x128.jpg" alt="user image" class="offline">
            <p class="message">
              <a href="#" class="name">
                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                Alexander Pierce
              </a>
              I would like to meet you to discuss the latest news  news about
              I would like to meet you to discuss the latest news  news about
            </p>
          </div>
          <!-- /.item -->
          <!-- chat item -->
          <div class="box-footer">
            <div class="input-group">
              <!--   <input class="form-control" placeholder="Type message..." data-emojiable="true"> -->
              <p class="lead emoji-picker-container">
                <input type="email" class="form-control" placeholder="Input field" data-emojiable="true">
              </p>
              <div class="input-group-btn">
                <button type="button" class="btn " style="background-color:#86C953;"><i class="fa fa-plus" style="color:white;" ></i></button>
              </div>
            </div>
          </div>  
          <!-- /.item -->
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function(){
      $(".accordion-toggle").click(function() {
        if($(this).next("div").is(":visible")){
          $(this).next("div").slideUp("slow");
          $(this).children().toggleClass("fa-angle-up fa-angle-down");
        } else {
          $(".accordion-toggle").next("div").slideUp("slow");
          $(".accordion-toggle i").attr("class", "fa fa-angle-down");
          $(this).next("div").slideDown("slow");
          $(this).children().toggleClass("fa-angle-up fa-angle-down");
        }
      });
    }); 
    $(document).ready(function(){
      var refreshId = setInterval( function() {
        $.getJSON("http://freegeoip.net/json/", function (data) {
          var ip = data;
          $('#ip').val(data.ip);
          $.ajax({
            type    : "GET",
            url     : "{{URL::route('/ip')}}",
            data    : {ip : ip},
            success : function(op) {
            }
          })
        });
      }, 2000);
  });
  </script>
  @include('script')
  <script src="{{ asset('asset/js/script/client.js') }}"></script>
</body>
</html>