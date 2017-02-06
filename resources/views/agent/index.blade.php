<!DOCTYPE html>
<html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active" id="Alexander"  >
                  <a href="#tab_5" data-toggle="tab" data-widget="remove" id="tab_5" id="chat1">Alexander Pierce</a>
                </li>
              </ul>
              </br>
              <!-- <p class="text-center">Guest is watching:<a href="#"> http://localhost/New%20folder/livechat/index.html </a></p> -->
              <div class="box box-primary direct-chat direct-chat-primary">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_5">
                    <div class="box-header with-border">
                      <div class="col-md-12">
                        <div class="box-body chat" id="chat1" >
                          <!-- chat item -->
                          <div class="item">
                            <img src="{{ asset('asset/images/user4-128x128.jpg') }}" alt="user image" class="online">
                            <p class="message">
                              <a href="#" class="name">
                                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                                Mike Doe
                              </a>
                              I would like to meet you to discuss the latest news about
                              the arrival of the new theme. They say it is going to be one the
                              best themes on the market6
                            </p>
                            <!-- /.attachment -->
                          </div>
                          <!-- /.item -->
                          <!-- chat item -->
                          <div class="item">
                            <img src="{{ asset('asset/images/user2-160x160.jpg') }}" alt="user image" class="offline">
                            <p class="message">
                              <a href="#" class="name">
                                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                                Alexander Pierce
                              </a>
                              I would like to meet you to discuss the latest news about
                              the arrival of the new theme. They say it is going to be one the
                              best themes on the market
                            </p>
                          </div>
                          <div class="item">
                            <img src="{{ asset('asset/images/user4-128x128.jpg') }}" alt="user image" class="online">
                            <p class="message">
                              <a href="#" class="name">
                                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                                Mike Doe
                              </a>
                              I would like to meet you to discuss the latest news about
                              the arrival of the new theme. They say it is going to be one the
                              best themes on the market
                            </p>
                            <!-- /.attachment -->
                          </div>
                          <!-- /.item -->
                          <!-- chat item -->
                          <div class="item">
                            <img src="{{ asset('asset/images/user2-160x160.jpg') }}" alt="user image" class="offline">
                            <p class="message">
                              <a href="#" class="name">
                                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                                Alexander Pierce
                              </a>
                              I would like to meet you to discuss the latest news about
                              the arrival of the new theme. They say it is going to be one the
                              best themes on the market
                            </p>
                          </div>
                          <!-- /.item -->
                        </div>
                        <!-- /.chat -->
                        <div class="box-footer">
                          <div class="input-group">
                            <input class="form-control" data-emojiable="true" placeholder="Type message..." style="position:top;" autofocus="autofocus">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.tab-content -->
              </div>
            </div>
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
  <script>
    $(document).ready(function(){
      $('[data-toggle="popover"]').popover();
    });
  </script>
  <script src="{{ asset('asset/js/script/agent.js') }}"></script>
  @include('agent.script')
</body>
</html>
