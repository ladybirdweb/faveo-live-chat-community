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
    @include('nav-menu')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <section class="content-header">

        <ol class="breadcrumb breadcrumb-custom">
          <li class="text"> You are here :</li>
          <li><a href="#">Admin Panel</a></li>

        </ol>
      </section>
      <p> &nbsp; </p>
      <section class="content">
        <div class="box box-primary">
          <div class="box-header with-border">
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <!--/.col-md-2-->
                <div class="col-md-2 col-sm-6">
                  <div class="settingiconblue">
                    <div class="settingdivblue">
                      <a href="{{ URL::route('/setting') }}"><span class="fa-stack fa-2x">
                        <i class=" glyphicon glyphicon-wrench fa-stack-1x" ></i>
                      </span></a>
                    </div>
                    <center class="box-title">Settings</center>
                  </div>
                </div>
                <div class="col-md-2 col-sm-6">
                  <div class="settingiconblue">
                    <div class="settingdivblue">
                      <a href="{{ URL::route('/operators') }}"><span class="fa-stack fa-2x">
                        <i class="glyphicon glyphicon-user fa-stack-1x"></i>
                      </span></a>
                    </div>
                    <center class="box-title">Agents</center>
                  </div>
                </div>
                <!--/.col-md-2-->
                <!--/.col-md-2-->
                <div class="col-md-2 col-sm-6">
                  <div class="settingiconblue">
                    <div class="settingdivblue">
                      <a href="{{ URL::route('/widget-theme') }}"><span class="fa-stack fa-2x">
                        <i class="fa fa-cog fa-stack-1x"></i>
                      </span></a>
                    </div>
                    <center class="box-title">Widget theme</center>
                  </div>
                </div>
                <!--/.col-md-2-->
                <!--/.col-md-2-->

                <!--/.col-md-2-->
                <!--/.col-md-2-->
                <div class="col-md-2 col-sm-6">
                  <div class="settingiconblue">
                    <div class="settingdivblue">
                      <a href="{{ URL::route('/canned-message') }}"><span class="fa-stack fa-2x">

                        <i class="fa fa-envelope fa-stack-1x"></i>
                      </span></a>
                    </div>
                    <center class="box-title">Canned messages</center>
                  </div>
                </div>
                <div class="col-md-2 col-sm-6">
                  <div class="settingiconblue">
                    <div class="settingdivblue">
                      <a href="{{ URL::route('/message-history') }}"><span class="fa-stack fa-2x">

                        <i class="fa fa-history fa-stack-1x"></i>
                      </span></a>
                    </div>
                    <center class="box-title">History</center>
                  </div>
                </div>
                <!--/.col-md-2-->
                <!--/.col-md-2-->
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- ./box-body -->
        </div>
        <div class="box box-primary">
          <div class="box-header with-border">
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <!--/.col-md-2-->
                <div class="col-md-2 col-sm-6">
                  <div class="settingiconblue">
                    <div class="settingdivblue">
                      <a href="{{ URL::route('/logs') }}"><span class="fa-stack fa-2x">

                        <i class="glyphicon glyphicon-file fa-stack-1x"></i>
                      </span></a>
                    </div>
                    <center class="box-title">Logs</center>
                  </div>
                </div>
                <!--/.col-md-2-->
                <!--/.col-md-2-->
                <!--/.col-md-2-->
                <!--/.col-md-2-->
                <!--/.col-md-2-->
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- ./box-body -->
        </div>
      </section>
    </div>
    @include('footer')
  </div>
    @include('script')
  </body>
  </html>