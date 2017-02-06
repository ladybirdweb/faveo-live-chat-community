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
        <h1>View Profile</h1>
        <ol class="breadcrumb breadcrumb-custom">
          <li class="text"> You are here :</li>
          <li><a href="{{ URL::route('/agent-profile') }}">Agent panel</a></li>
          <li class="text">Profile</li>
        </ol>

      </section>
      <!-- Main content -->
      <section class="content">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><b>Profile</b>&nbsp;&nbsp;<a href="{{URL::route('/profile-edit')}}"><i class="fa fa-fw fa-edit"> </i></a></h3>
            <!-- fail message -->
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="box-header  with-border">
                <h3 class="box-title"><b>User Information</b></h3>
              </div>
              <div class="box-body">
                <div class="form-group row">
                  <div class='col-xs-4'><label>Gender:</label></div> <div class='col-xs-7'>Female</div>
                </div>
                <div class="form-group  row">
                  <div class='col-xs-4'><label>Department:</label></div> <div class='col-xs-7'> Support</div>
                </div>
                <div class="form-group  row">
                  <div class='col-xs-4'><label>Group:</label></div> <div class='col-xs-7'> Group A</div>
                </div>
                <div class="form-group  row">
                  <div class='col-xs-4'><label>Company:</label></div> <div class='col-xs-7'> </div>
                </div>
                <div class="form-group  row">
                  <div class='col-xs-4'><label>Role:</label></div> <div class='col-xs-7'>  admin</div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="box-header  with-border">
                <h3 class="box-title"><b>Contact Information</b></h3>
              </div>
              <div class="box-body">
                <div class="form-group row">
                  <div class='col-xs-4'><label>Email:</label></div> <div class='col-xs-7'> demo@admin.com</div>
                </div>
                <div class="form-group row">
                  <div class='col-xs-4'><label>Phone Number:</label></div> <div class='col-xs-7'> </div>
                </div>
                <div class="form-group row">
                  <div class='col-xs-4'><label>Mobile:</label></div> <div class='col-xs-7'> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section><!-- /.content -->

    </div>
    @include('footer')
    @include('script')
  </body>
  </html>
