	{{--*/ 
    $session = DB::table('faveo_login')->where('email',Session::get('agent'))->first();
    $session_info = DB::table('faveo_users')->where('login_id',$session->id)->first(); 
  /*--}}
  <header class="main-header">
      <!-- Logo -->
      <a href="{{ URL::route('/') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <img src="{{ asset('asset/images/logo.png') }}" width="100px;">
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <ul class="nav navbar-nav navbar-left">
          <!-- <li><a href="{{ URL::route('/agent-profile') }}">Agent Panel</a></li> -->
        </ul>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <!-- <li><a href="{{ URL::route('/') }}">Admin Panel</a></li> -->
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('asset/images/avatar7.png') }}"class="user-image" alt="User Image"/>
                <span class="hidden-xs">{{ucfirst($session_info->first_name)}} {{ucfirst($session_info->last_name)}}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header"  style="background-color:#343F44;">
                  <img src="{{ asset('asset/images/avatar7.png') }}" class="img-circle" alt="User Image" />
                  <p>
                    {{ucfirst($session_info->first_name)}} {{ucfirst($session_info->last_name)}} - {{ucfirst($session->role)}}
                    <small></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer" style="background-color:#1a2226;">
                  <!-- <div class="pull-left">
                    <a href="{{ URL::route('/profile') }}" class="btn btn-info btn-sm"><b>Profile</b></a>
                  </div> -->
                  <div class="pull-right">
                    <a href="{{ URL::route('/logout') }}" class="btn btn-danger btn-sm"><b>Sign Out</b></a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
            </li>
          </ul>
        </div>
      </nav>
    </header> }
  }
