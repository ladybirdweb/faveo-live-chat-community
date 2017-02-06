    {{--*/ 
      $session = DB::table('faveo_login')->where('email',Session::get('admin'))->first();
    /*--}}
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class = "row">
            <div class="col-xs-3"></div>
            <div class="col-xs-2" style="width:50%;">
              <a href="{{ URL::route('/profile') }}">
                <img src="{{ asset('asset/images/avatar7.png') }}" class="img-circle" alt="User Image" />
              </a>
            </div>
          </div>
          <div class="info" style="text-align:center;">
            <p>{{ucfirst($session->username)}} {{ucfirst($session->role)}}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>


        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">Settings</li>
          <li class="treeview  @if($page == 'operators') active @endif">
            <a href="{{ URL::route('/operators') }}">
              <i class="glyphicon glyphicon-user "></i> 
              <span style="margin-left:-2%;">Agents</span> 
            </a>
          </li>
          <li class="treeview  @if($page == 'canned-message') active @endif">
            <a href="{{ URL::route('/canned-message') }}">
              <i class="fa fa-envelope"></i> 
              <span style="margin-left:-2%;">Canned Messages</span> 
            </a>
          </li>
          <li class="treeview  @if($page == 'logs') active @endif">
            <a href="{{ URL::route('/logs') }}">
              <i class="glyphicon glyphicon-file"></i> 
              <span style="margin-left:-2%;">Logs</span> 
            </a>
          </li>
          <li class="treeview  @if($page == 'message-history') active @endif">
            <a href="{{ URL::route('/message-history') }}">
              <i class="fa fa-history"></i> 
              <span style="margin-left:-2%;">Messages History</span> 
            </a>
          </li>
          <li class="treeview  @if($page == 'setting') active @endif">
            <a href="{{ URL::route('/setting') }}">
              <i class="glyphicon glyphicon-wrench "></i> 
              <span style="margin-left:-2%;">Settings</span> 
            </a>
          </li>
          <li class="treeview  @if($page == 'widget-theme') active @endif">
            <a href="{{ URL::route('/widget-theme') }}">
              <i class="fa fa-cog"></i> 
              <span style="margin-left:-2%;">Widget Theme</span> 
            </a>
          </li>
        </ul>	
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>