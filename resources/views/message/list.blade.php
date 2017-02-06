<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Faveo Chat</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @include('style')
</head>


<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    @include('header')
    <!-- Left side column. contains the logo and sidebar -->
    <!-- Left side column. contains the logo and sidebar -->
    @include('nav-menu')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h3>Messages</h3>
        <ol class="breadcrumb breadcrumb-custom">
          <li class="text"> You are here :</li>
          <li><a href="{{ URL::route('/') }}">Admin Panel</a></li>
          <li><a href="{{ URL::route('/message-history') }}">Messages History</a></li>
          <li class="text">Alexander Pierce/Sarah Bullock</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- TO DO List -->
        <div class="box box-primary">
          <!--box header-->
          <div class="box-header with-border">
            <h5 style="text-align:center;"> 2016-11-09 &nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i> 05:55:13 — 2016-11-09 &nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i> 05:54:39 </h5>
          </div>
          <!-- /.box-header -->
          <!--box body-->
          <div class="box-body">
            <div class="box-body chat" id="chat-box">
              <!-- chat item -->
              <div class="item">
                <img src="{{ asset('asset/images/user2-160x160.jpg') }}" alt="user image" class="online">
                <p class="message">
                  <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                    Alexander Pierce
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
                <img src="{{ asset('asset/images/user4-128x128.jpg') }}" alt="user image" class="offline">
                <p class="message">
                  <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                    Sarah Bullock
                  </a>
                  I would like to meet you to discuss the latest news about
                  the arrival of the new theme. They say it is going to be one the
                  best themes on the market
                </p>
              </div>
              <div class="item">
                <img src="{{ asset('asset/images/user2-160x160.jpg') }}" alt="user image" class="online">
                <p class="message">
                  <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                    Alexander Pierce
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
                <img src="{{ asset('asset/images/user4-128x128.jpg') }}" alt="user image" class="offline">
                <p class="message">
                  <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                    Sarah Bullock
                  </a>
                  I would like to meet you to discuss the latest news about
                  the arrival of the new theme. They say it is going to be one the
                  best themes on the market
                </p>
              </div>
              <!-- /.item -->
            </div>
            <!-- /.chat -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('footer')
  </div>



  @include('script')
  <!-- Page script -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
</body>
</html>