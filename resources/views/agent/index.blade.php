<!DOCTYPE html>
<html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Faveo Chat</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @include('agent.style')
  <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/custom.css') }}">
  <!-- Begin emoji-picker Stylesheets -->
  <!-- Begin emoji-picker Stylesheets -->
  <link href="{{ asset('asset/css/nanoscroller.css') }}" rel="stylesheet">
  <link href="{{ asset('asset/css/emoji.css') }}" rel="stylesheet">
  <style>
    .box{
      border-top:1px solid #d2d6de;
    }
    .popover{
      color:blue;
      width:200px;
      z-index: -1;
    }
    .emoji-picker-icon{
      right:51px;
    }
    .emoji-menu{
      margin-left:-10%;
    }
    .no-user{
      width: 100%;
      text-align: center;
    }
    .error{
      border: 1px solid #ff0000;
    }
    .text{
      border-left: 1px solid red !important;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    @include('agent.header')
    <!-- Left side column. contains the logo and sidebar -->
    @include('agent.nav-menu')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            @if(count($val) == 0)
            <div class="nav-tabs-custom" style="padding: 10px;text-align: center;">
              Click on User to Start a Conversation
            </div>
            @else
            <input type="hidden" id="user_id" value="{{$val}}">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="{{$active}}" id="Alexander">
                  <a href="{{URL::to('/message/'.$val)}}" id="chat1">
                    @if($user_detail->name == '')
                      {{$user_detail->ip}} 
                    @else 
                      {{$user_detail->name}}
                    @endif
                  </a>
                </li>
                <li class="{{$notactive}}">
                  <a href="{{URL::to('/message/history/'.$val)}}">Message Hiistory</a>
                </li>
              </ul>
              </br>
              <div class="box box-primary direct-chat direct-chat-primary">
                <div class="tab-content">
                  <div class="tab-pane {{$active}}" id="tab_5">
                    <div class="box-header with-border">
                      <div class="col-md-8">
                        <input type="hidden" id="convo_id" value="{{$message_conversation}}">
                        <input type="hidden" id="agent_id" value="{{$agent_detail->uniq_id}}">
                        <div class="box-body chat" id="chat12" style="min-height:350px; max-height:350px;overflow-y:auto;padding-right:10px;">
                          @if(count($message) == 0)
                          @else
                            @foreach($message as $mess)
                              @if($mess->message == 'Start a new Conversation')
                                <div class="new_conversation" style="text-align: center;padding-bottom:10px;"><b>Start a new Conversation</b></div>
                              @elseif($mess->message == 'joined the conversation')
                                {{--*/ 
                                  $agent = DB::table('faveo_users')->where('uniq_id',$mess->reply_id)->first(); 
                                  $user = DB::table('faveo_login')->where('email',Session::get('admin'))->first();
                                  $user_id = DB::table('faveo_users')->where('login_id',$user->id)->first(); 
                                /*--}}
                                @if($user_id->uniq_id == $agent->uniq_id)
                                  <div class="new_conversation" style="text-align: center;padding-bottom:10px;"><b>You {{$mess->message}}</b></div>
                                @else
                                  <div class="new_conversation" style="text-align: center;padding-bottom:10px;"><b>{{$agent->first_name}} {{$agent->last_name}} {{$mess->message}}</b></div>
                                @endif
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
                          @endif
                        </div>
                        <!-- /.chat -->
                        <div class="box-footer">
                          @if(count($joined) == 0)
                            <div class="input-group">
                              <button type="button" class="btn btn-success join_conversation">Join Conversation</button>
                            </div>
                          @else
                          <div class="input-group">
                            <div class="end_conversation" style="cursor: pointer;color: #3ca9df;">End Conversation</div>
                          </div>
                          <div class="input-group">
                            <input class="form-control" id="message" data-emojiable="true" placeholder="Type message..." style="position:top;" autofocus="autofocus">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-success send_message"><i class="fa fa-plus"></i></button>
                            </div>
                          </div>
                          @endif
                        </div>
                        <div class="box-footer joined_conversation" style="display:none;">
                          <div class="input-group">
                            <div class="end_conversation" style="cursor: pointer;color: #3ca9df;">End Conversation</div>
                          </div>
                          <div class="input-group">
                            <input class="form-control" id="messages" data-emojiable="true" placeholder="Type message..." style="position:top;" autofocus="autofocus">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-success send_messages"><i class="fa fa-plus"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4" style="border-left : 1px solid #eee;">
                        <h4>Visitor Details</h4>
                        <div class="form-group">
                          <div class="input-group user_name">
                            <span class="input-group-addon name_icon"><i class="glyphicon glyphicon-info-sign"></i></span>
                            <input type="text" name="" class="form-control" value="{{$client_detail->url_id}}" readonly>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group user_name">
                            <span class="input-group-addon name_icon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" id="name" class="form-control" @if($client_detail->name == '') placeholder="Enter Name" @else value="{{$client_detail->name}}" @endif>
                            <span class="input-group-addon name_icon" id="user_name_val" style="background: green;cursor: pointer;color: #fff;">
                              <i class="glyphicon glyphicon-floppy-disk"></i>
                            </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group user_name">
                            <span class="input-group-addon email_icon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input type="text" id="email" class="form-control" @if($client_detail->email == '') placeholder="Enter Email" @else value="{{$client_detail->email}}" @endif>
                            <span class="input-group-addon name_icon" id="user_email_val" style="background: green;cursor: pointer;color: #fff;">
                              <i class="glyphicon glyphicon-floppy-disk"></i>
                            </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group user_name">
                            <span class="input-group-addon phone_icon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input type="text" id="phone" class="form-control" @if($client_detail->phone == '') placeholder="Enter Mobile No." @else value="{{$client_detail->phone}}" @endif>
                            <span class="input-group-addon name_icon" id="user_phone_val" style="background: green;cursor: pointer;color: #fff;">
                              <i class="glyphicon glyphicon-floppy-disk"></i>
                            </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12 form-control form-group">
                            <div class="col-md-6" style="padding: 0px;text-align: left;">
                              {{$client_detail->city}},{{$client_detail->country}}
                            </div>
                            <div class="col-md-6" style="padding: 0px;text-align: right;">
                              {{$client_detail->ip}}
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12 form-control form-group">
                            {{$client_detail->os}}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane {{$notactive}}" id="tab_3">
                    <div class="box-header with-border">
                      <table class="table table-bordered dataTable creative">
                        <tr>
                          <th>Conversation Date</th>
                          <th>Action</th>
                        </tr>
                        @if(count($list) == 0)
                          <tr><td colspan="2" style="text-align: center;">No Conversation</td></tr>
                        @else
                          @foreach($list as $lst)
                          <tr>
                            <td>{{date('M d, Y', strtotime($lst->created_at))}}</td>
                            <td><a href="{{URL::to('/message/pdf/'.$lst->conversation_id)}}" target="_blank">View</a></td>
                          </tr>
                          @endforeach
                        @endif
                      </table>
                      {!! $list->render() !!}
                    </div>
                  </div>
                </div>
                <!-- /.tab-content -->
              </div>
            </div>
            @endif
          </div>
          <!-- /.row -->
          <!--/.direct-chat -->     
        </div>
        <!-- /.col -->
        <!-- /.col -->
      </section>
    </div>
    <input type="hidden" id="urla" value="{{URL::route('/online/update')}}">
    <input type="hidden" id="urlb" value="{{URL::route('/agent/update')}}">
    <input type="hidden" id="urlc" value="{{URL::route('/online/agent/update')}}">
    <input type="hidden" id="urld" value="{{URL::route('/update/name')}}">
    <input type="hidden" id="urle" value="{{URL::route('/update/email')}}">
    <input type="hidden" id="urlf" value="{{URL::route('/update/phone')}}">
    <input type="hidden" id="total">
    @include('agent.footer')
    <div class="control-sidebar-bg"></div>
  </div>
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <!-- Begin emoji-picker JavaScript -->
  <script src="{{ asset('asset/lib/js/nanoscroller.min.js') }}"></script>
  <script src="{{ asset('asset/lib/js/tether.min.js') }}"></script>
  <script src="{{ asset('asset/lib/js/config.js') }}"></script>
  <script src="{{ asset('asset/lib/js/util.js') }}"></script>
  <script src="{{ asset('asset/lib/js/jquery.emojiarea.js') }}"></script>
  <script src="{{ asset('asset/lib/js/emoji-picker.js') }}"></script>
  <script>
    $(function() {
      // Initializes and creates emoji set from sprite sheet
      window.emojiPicker = new EmojiPicker({
        emojiable_selector: '[data-emojiable=true]',
        assetsPath: 'lib/img/',
        popupButtonClasses: 'fa fa-smile-o'
      });
      window.emojiPicker.discover();
    });
    $(function(){
      $('#testDiv3').slimScroll({
        color: '#00f'
      });
    });
  </script>
  <!-- Custom -->
  <script type="text/javascript" src="{{ asset('asset/js/bootstrapx-clickover.js') }}"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="{{ asset('asset/js/bootstrap.js') }}"></script>

  <script type="text/javascript" src="{{ asset('asset/js/prettify.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/jquery.slimscroll.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/libs/jquery.slimscroll.min.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
  <script>
    $(".creative").DataTable({select:!0,order:[[0,"asc"]],scrollCollapse:!0,paging:!0,bProccessing:!0}),$(document).ready(function(){$('[data-toggle="popover"]').popover()}),$(".join_conversation").click(function(){conversation=$("#convo_id").val(),reply=$("#agent_id").val(),user=$("#user_id").val(),$.ajax({type:"POST",url:"{{URL::route('/joined/conversation')}}",headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")},data:{conversation:conversation,reply:reply,user:user},success:function(e){var o=$.parseJSON(e);1==o.res?($(".joined_conversation").show(),$(".join_conversation").hide()):window.location.reload()}})}),$(".end_conversation").click(function(){id=$("#user_id").val(),$.ajax({type:"GET",url:'{{ URL::route("/chat/ends") }}',data:{id:id},headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")},success:function(e){res=$.parseJSON(e),1==res.res&&(window.location.href=res.url)}})});
  </script>
  @if(count($val) > 0)
    $(document).ready(function(){$('[data-toggle="popover"]').popover()}),$(".join_conversation").click(function(){conversation=$("#convo_id").val(),reply=$("#agent_id").val(),user=$("#user_id").val(),$.ajax({type:"POST",url:"{{URL::route('/joined/conversation')}}",headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")},data:{conversation:conversation,reply:reply,user:user},success:function(e){var o=$.parseJSON(e);1==o.res?($(".joined_conversation").show(),$(".join_conversation").hide()):window.location.reload()}})}),$(".end_conversation").click(function(){id=$("#user_id").val(),$.ajax({type:"GET",url:'{{ URL::route("/chat/ends") }}',data:{id:id},headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")},success:function(e){res=$.parseJSON(e),1==res.res&&(window.location.href=res.url)}})});
  @endif
  <script src="{{ asset('asset/js/script/agent.js') }}"></script>
  @include('agent.script')
</body>
</html>
