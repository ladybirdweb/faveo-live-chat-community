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
          <li><a href="{{ URL::route('/profile') }}">Profile</a></li>
          <li class="text">Edit Profile</li>
        </ol>

      </section>
      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-md-6">
                  <form method="POST" action="http://www.faveohelpdesk.com/demo/helpdesk/agent-profile" accept-charset="UTF-8" id="agent-profile" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PATCH"><input name="_token" type="hidden" value="UPxQzfk76b0KxNbRF3jvjG3qDHZYce3MZ4vk7kfw">
                      <div class="box box-primary">
                          <div class="box-header with-border">
                              <h3 class="box-title">
                                  Profile
                              </h3>
                          </div>
                          <div class="box-body">
                              <!-- fail message -->
                              <!-- first name -->
                              <div class="form-group ">
                                  <label for="first_name">First Name</label> <span class="text-red"> *</span>
                                  <input class="form-control" name="first_name" type="text" value="demo" id="first_name">
                              </div>
                              <!-- last name -->
                              <div class="form-group ">
                                  <label for="last_name">Last Name</label>
                                  <input class="form-control" name="last_name" type="text" value="admin" id="last_name">
                              </div>
                              <!-- gender -->
                              <div class="form-group">
                                  <label for="gender">Gender</label>
                                  <div class="row">
                                      <div class="col-xs-3">
                                          <input name="gender" type="radio" value="1" id="gender"> Male
                                      </div>
                                      <div class="col-xs-3">
                                          <input checked="checked" name="gender" type="radio" value="0" id="gender"> Female
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <!-- email address -->
                                  <label for="email">Email Address</label>
                                  <div>
                                      demo@admin.com
                                  </div>
                              </div>
                              <div class="form-group ">
                                  <!-- company -->
                                  <label for="company">Company</label>
                                  <input class="form-control" name="company" type="text" value="" id="company">
                              </div>
                              <div class="row">
                                  <!-- phone extension -->
                                  <div class="col-xs-2 form-group ">
                                      <label for="country_code">Code</label>
                                      <input class="form-control" placeholder="91" title="Enter your country&#039;s phone code" id="code" name="country_code" type="text" value="0">
                                  </div>
                                  <div class="col-xs-2 form-group ">
                                      <label for="ext">EXT</label>
                                      <input class="form-control" name="ext" type="text" value="" id="ext">
                                  </div>
                                  <!-- phone number -->
                                  <div class="col-xs-8 form-group ">
                                      <label for="phone_number">Phone</label>
                                      <input class="form-control" name="phone_number" type="text" value="" id="phone_number">
                                  </div>
                              </div>
                              <!-- mobile -->
                              <div class="form-group ">
                                  <label for="mobile">Mobile Number</label>
                                  <input class="form-control" id="mobile" name="mobile" type="text">
                              </div>
                              <div class="form-group ">
                                  <label for="agent_sign">Agent Signature</label>
                                  <textarea class="form-control" name="agent_sign" cols="50" rows="10" id="agent_sign"></textarea>
                              </div>
                              <div class="form-group ">
                                  <!-- profile pic -->
                                  <div type="file" class="btn btn-default btn-file" style="color:orange">
                                      <i class="fa fa-user"> </i>
                                      <label for="profile_pic">Profile Picture</label>
                                      <input class="form-file" name="profile_pic" type="file" id="profile_pic">
                                  </div>  
                              </div>
                              <input name="_token" type="hidden" value="UPxQzfk76b0KxNbRF3jvjG3qDHZYce3MZ4vk7kfw">
                          </form>
                      </div>
                      <div class="box-footer">
                          <input class="form-group btn btn-primary" type="submit" value="Update">
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <form method="POST" action="http://www.faveohelpdesk.com/demo/helpdesk/agent-profile-password/1" accept-charset="UTF-8">
                      <input name="_method" type="hidden" value="PATCH"><input name="_token" type="hidden" value="UPxQzfk76b0KxNbRF3jvjG3qDHZYce3MZ4vk7kfw">
                      <div class="box box-primary">
                          <div class="box-header with-border">
                              <h4 class="box-title">Change Password</h4> 
                          </div>
                          <div class="box-body">
                              <!-- fail message -->
                              <!-- old password -->
                              <div class="form-group has-feedback ">
                                  <label for="old_password">Old Password</label> <span class="text-red"> *</span>
                                  <input placeholder="Old Password" class="form-control" name="old_password" type="password" value="" id="old_password">

                                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                              </div>
                              <!-- new password -->
                              <div class="form-group has-feedback ">
                                  <label for="new_password">New Password</label> <span class="text-red"> *</span>
                                  <input placeholder="New Password" class="form-control" name="new_password" type="password" value="" id="new_password">

                                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                              </div>
                              <!-- confirm password -->
                              <div class="form-group has-feedback ">
                                  <label for="confirm_password">Confirm Password</label> <span class="text-red"> *</span>
                                  <input placeholder="Confirm Password" class="form-control" name="confirm_password" type="password" value="" id="confirm_password">

                                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                              </div>
                          </div>
                          <div class="box-footer">
                              <input class="form-group btn btn-primary" type="submit" value="Update">
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </section>
      <!-- /.content -->

    </div>
    @include('footer')
    @include('script')
  </body>
  </html>
