<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
        @if(Session::has('cookie'))
          @if($online == 0)
            <form class="form-horizontal" action="{{URL::route('/chat/contact')}}" method="POST" id="contact_form" style="margin: 0 auto; width:80%;" >
              <input type="hidden" name="_token" value="{{ Session::token() }}">
              <fieldset>
                <div class="form-group">
                  <div class="col-md-12">
                    <div class="input-group user_name">
                      <span class="input-group-addon name_icon"><i class="glyphicon glyphicon-user"></i></span>
                      <input name="name" placeholder="Your Name" class="form-control name" id="name" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12">
                    <div class="input-group user_email">
                      <span class="input-group-addon email_icon"><i class="glyphicon glyphicon-envelope"></i></span>
                      <input name="email" placeholder="Your E-Mail" class="form-control email" id="email" type="text">
                    </div>
                    <div class="email_error"></div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12">
                    <div class="input-group user_phone">
                      <span class="input-group-addon phone_icon"><i class="glyphicon glyphicon-earphone"></i></span>
                      <input name="phone" placeholder="(005)501-120101" class="form-control phone" id="phone" type="text">
                    </div>
                    <div class="phone_error"></div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12">
                    <button type="submit" class="btn  pull-right" style="background-color:#86C953; color:white;">Send <span class="glyphicon glyphicon-send"></span></button>
                  </div>
                </div>
                <input type="hidden" name="ip" id="ip">
              </fieldset>
            </form>
          @else
            <div class="box-body chat chat-box">
              <input type="hidden" id="uniq_id" value="{{Session::get('cookie')}}">
              <input type="hidden" id="convo" value="{{$conversation->conversation_id}}">
              <div class="session_chat" style="min-height:220px; max-height:220px;overflow-y:auto;padding-right:10px;">
                @foreach($message as $mess)
                  @if($mess->message == 'Start a new Conversation')
                    <div class="new_conversation" style="text-align: center;padding-bottom:10px;"><b>Start a new Conversation</b></div>
                  @elseif($mess->message == 'joined the conversation')
                    {{--*/ $agent = DB::table('faveo_users')->where('uniq_id',$mess->reply_id)->first(); /*--}}
                    <div class="new_conversation" style="text-align: center;padding-bottom:10px;"><b>{{$agent->first_name}} {{$agent->last_name}} {{$mess->message}}</b></div>
                  @else
                    {{--*/ 
                      $img = url().'/asset/images/user3-128x128.jpg';
                      $time = date('h:i a', strtotime($mess->created_at)); 
                      $client = DB::table('faveo_client')->where('uniq_id',$mess->reply_id)->first();
                    /*--}}
                    @if(count($client) == 0)
                      {{--*/ $agent = DB::table('faveo_users')->where('uniq_id',$mess->reply_id)->first(); /*--}}
                      <div class="item"><img src="{{$img}}" alt="user image" class="offline"><p class="message"><a href="#" class="name"><small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{$time}}</small>{{$agent->first_name}} {{$agent->last_name}}</a>{{$mess->message}}</p></div>
                    @else
                      @if($client->name == '')
                        {{--*/ $name = $client->ip; /*--}}
                      @else
                        {{--*/ $name = $client->name; /*--}}
                      @endif
                      <div class="item"><img src="{{$img}}" alt="user image" class="offline"><p class="message"><a href="#" class="name"><small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{$time}}</small>{{$name}}</a>{{$mess->message}}</p></div>
                    @endif
                  @endif
                @endforeach
              </div>
              <div class="box-footer">
                <div class="input-group">
                  <div class="end_conversation" style="cursor: pointer;color: #3ca9df;">End Conversation</div>
                </div>
                <div class="input-group">
                  <p class="lead emoji-picker-container">
                    <input type="text" class="form-control message" id="message" placeholder="Type Your Message" data-emojiable="true">
                  </p>
                  <div class="input-group-btn">
                    <button type="button" class="btn send_message" style="background-color:#86C953;"><i class="fa fa-plus" style="color:white;" ></i></button>
                  </div>
                </div>
              </div>  
            </div>
          @endif
        @else
          <form class="form-horizontal" action="{{URL::route('/chat/contact')}}" method="POST" id="contact_form" style="margin: 0 auto; width:80%;" >
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <fieldset>
              <div class="form-group">
                <div class="col-md-12">
                  <div class="input-group user_name">
                    <span class="input-group-addon name_icon"><i class="glyphicon glyphicon-user"></i></span>
                    <input name="name" placeholder="Your Name" class="form-control name" id="name" type="text">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <div class="input-group user_email">
                    <span class="input-group-addon email_icon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input name="email" placeholder="Your E-Mail" class="form-control email" id="email" type="text">
                  </div>
                  <div class="email_error"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <div class="input-group user_phone">
                    <span class="input-group-addon phone_icon"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input name="phone" placeholder="(005)501-120101" class="form-control phone" id="phone" type="text">
                  </div>
                  <div class="phone_error"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <button type="submit" class="btn  pull-right" style="background-color:#86C953; color:white;">Send <span class="glyphicon glyphicon-send"></span></button>
                </div>
              </div>
              <input type="hidden" name="ip" id="ip">
            </fieldset>
          </form>
          <div class="box-body chat chat-box" style="display: none;">
            <div class="session_chats" style="min-height:220px; max-height:220px;overflow-y:auto;padding-right:10px;">
              
            </div>
            <div class="box-footer">
              <div class="input-group">
                <div class="end_conversation" style="cursor: pointer;color: #3ca9df;">End Conversation</div>
              </div>
              <div class="input-group">
                <p class="lead emoji-picker-container">
                  <input type="text" class="form-control messages" placeholder="Type Your Message" data-emojiable="true">
                </p>
                <div class="input-group-btn">
                  <button type="button" class="btn send_messages" style="background-color:#86C953;"><i class="fa fa-plus" style="color:white;" ></i></button>
                </div>
              </div>
            </div>  
          </div>
        @endif
        <input type="hidden" name="conversation_id" id="conversation">
        <input type="hidden" name="ids" id="uniq_ids"> 
        <input type="hidden" id="total">
      </div>  
    </div>
  </div>
  <script>
    function getCookie(e){for(var n=e+"=",t=decodeURIComponent(document.cookie),o=t.split(";"),a=0;a<o.length;a++){for(var i=o[a];" "==i.charAt(0);)i=i.substring(1);if(0==i.indexOf(n))return i.substring(n.length,i.length)}return""}function setCookie(e,n,t){var o=new Date;o.setTime(o.getTime()+24*t*60*60*1e3);var a="expires="+o.toGMTString();document.cookie=e+"="+n+";"+a+";path=/"}function getInsertId(){$.getJSON("http://freegeoip.net/json/",function(e){for(var n in navigator){var t="Unknown OS";-1!=navigator.appVersion.indexOf("Win")&&(t="Windows"),-1!=navigator.appVersion.indexOf("Mac")&&(t="MacOS"),-1!=navigator.appVersion.indexOf("X11")&&(t="UNIX"),-1!=navigator.appVersion.indexOf("Linux")&&(t="Linux"),os=t}var o=e;$.ajax({type:"POST",url:"{{URL::route('/insert/id')}}",headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")},data:{ip:o,os:os},success:function(e){var n=$.parseJSON(e);1==n.res&&(setCookie("id",n.id),$("#ip").val(n.id),$("#uniq_ids").val(n.id))}})})}function getMessage(e){$.ajax({type:"POST",url:'{{ URL::route("/chat/refreshMessage") }}',data:{conversation:e},headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")},success:function(e){res=$.parseJSON(e),1==res.res&&$(".session_chats").html(res.come)}})}$(document).ready(function(){$(".accordion-toggle").click(function(){$(this).next("div").is(":visible")?($(this).next("div").slideUp("slow"),$(this).children().toggleClass("fa-angle-up fa-angle-down")):($(".accordion-toggle").next("div").slideUp("slow"),$(".accordion-toggle i").attr("class","fa fa-angle-down"),$(this).next("div").slideDown("slow"),$(this).children().toggleClass("fa-angle-up fa-angle-down"))})}),$(document).ready(function(){setInterval(function(){var e=getCookie("id");""!=e?($("#uniq_ids").val(e),getUpdateId(e)):getInsertId()},2e3)}),$(".end_conversation").click(function(){id=$("#uniq_ids").val(),$.ajax({type:"GET",url:'{{ URL::route("/chat/end") }}',data:{id:id},headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")},success:function(e){res=$.parseJSON(e),1==res.res&&(window.location.href='{{ URL::route("/chat") }}')}})}),$(document).ready(function(){setInterval(function(){return url='{{ URL::route("/chat/check/conversation") }}',conversation=$("#conversation").val(),id=$("#uniq_ids").val(),""==conversation?!1:void $.ajax({type:"POST",url:url,data:{conversation:conversation,id:id},headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")},success:function(e){res=$.parseJSON(e),1==res.res&&(window.location.href='{{ URL::route("/chat") }}')}})},3e3)});
  </script>
  @if(Session::has('cookie'))
    <script>
      function getUpdateId(e){$("#ip").val(e),$.ajax({type:"POST",url:"{{URL::route('/update/id')}}",headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")},data:{e:e},success:function(e){res=$.parseJSON(e),1==res.res&&($("#contact_form").hide(),$("#uniq_id").val(res.id),$("#conversation").val(res.conversation),$(".session_chats").html(res.come),getMessage(res.conversation))}})}$(document).ready(function(){setInterval(function(){return url='{{ URL::route("/chat/refreshMessage") }}',conversation=$("#convo").val(),total=$("#total").val(),""==conversation?!1:void $.ajax({type:"POST",url:url,data:{conversation:conversation},headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")},success:function(e){if(res=$.parseJSON(e),1==res.res){if($(".session_chat").html(res.come),$("#total").val(res.total),total==res.total)return!1;$(".session_chat").scrollTop($(".session_chat")[0].scrollHeight)}}})},5e3)}),$(".send_message").click(function(){conversation=$("#convo").val(),message=$("#message").val(),reply=$("#uniq_id").val(),$.ajax({type:"POST",url:"{{URL::route('/chat/sendMessage')}}",data:{conversation:conversation,message:message,reply:reply},headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")},success:function(e){res=$.parseJSON(e),1==res.res&&($(".session_chat").html(res.come),$(".message").val(""),$(".session_chat").scrollTop($(".session_chat")[0].scrollHeight))}})});
    </script>
  @else
  <script>
    function getUpdateId(e){$("#ip").val(e),$.ajax({type:"POST",url:"{{URL::route('/update/id')}}",headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")},data:{e:e},success:function(e){res=$.parseJSON(e),1==res.res&&($("#contact_form").hide(),$(".chat-box").show(),$("#uniq_id").val(res.id),$("#conversation").val(res.conversation),$(".session_chats").html(res.come),getMessage(res.conversation))}})}$(document).ready(function(){setInterval(function(){return url='{{ URL::route("/chat/refreshMessage") }}',conversation=$("#conversation").val(),total=$("#total").val(),""==conversation?!1:void $.ajax({type:"POST",url:url,data:{conversation:conversation},headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")},success:function(e){res=$.parseJSON(e),1==res.res&&($(".session_chats").html(res.come),$("#total").val(res.total),total==res.total||$(".session_chat").scrollTop($(".session_chat")[0].scrollHeight))}})},5e3)}),$(".send_messages").click(function(e){conversation=$("#conversation").val(),message=$(".messages").val(),reply=$("#uniq_ids").val(),$.ajax({type:"POST",url:"{{URL::route('/chat/sendMessage')}}",data:{conversation:conversation,message:message,reply:reply},headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")},success:function(e){res=$.parseJSON(e),1==res.res&&($(".session_chats").html(res.come),$(".messages").val(""),$(".session_chats").scrollTop($(".session_chats")[0].scrollHeight))}})});
  </script>
  @endif

  @include('script')
  <script src="{{ asset('asset/js/script/client.js') }}"></script>
</body>
</html>