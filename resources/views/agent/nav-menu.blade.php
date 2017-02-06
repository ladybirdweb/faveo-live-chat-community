    <aside class="main-sidebar" >
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar" >
        <!-- Sidebar user panel -->
        <!-- search form -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu"  >
          <section class="sidebar">
            <!-- Sidebar user panel -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" >
              <li class="header" style="color:white; font-size:14px;" ><strong>Online users</strong></li>
              <div id="chat-box">
                <div id="inner-content-div" class="chat-div">
                  @if(count($client) == 0)
                    <div class="user-panel">
                      <div class="pull-left info no-user">
                        <p>No User is online</p> 
                      </div>
                    </div>
                  @else
                    @foreach($client as $clt)
                      <div class="user-panel">
                        <div class="pull-left image">
                          <img src="{{ asset('asset/images/user4-128x128.jpg') }}" class="img-circle" alt="User Image">
                          <a href="#"><i class="fa fa-circle text-success" id="online"></i></a>
                        </div>
                        <div class="pull-left info">
                          <p> 
                            @if($clt->name != "")
                              {{$clt->name}}
                            @endif
                          </p>
                          <a href="#"><img src="{{ asset('asset/images/indian.png') }}">{{$clt->ip}}</a>
                        </div>
                      <!-- <span  class="badge bg-green pull-right" style="margin-top:6%;">3</span> -->
                      </div>
                    @endforeach
                  @endif
                </div>
                <div id="inner-content-div" class="result"></div>
              </div>
              <!-- /.tab-pane -->
              <li class="header" style="color:white; font-size:14px;"><strong>Online Agents</strong></li>
              <div id="chat-box">
                <div id="inner-content-div" class="agent-div">
                  @if(count($agent) == 0)
                    <div class="user-panel">
                      <div class="pull-left info no-user">
                        <p>No Agent is online</p> 
                      </div>
                    </div>
                  @else
                    @foreach($agent as $agt)
                      <div class="user-panel">
                        <div class="pull-left image">
                          <img src="{{ asset('asset/images/user4-128x128.jpg') }}" class="img-circle" alt="User Image">
                          <a href="#"><i class="fa fa-circle text-success" id="online"></i></a>
                        </div>
                        <div class="pull-left info">
                          <p> 
                            {{$agt->name}}
                          </p>
                          <a href="#"><img src="{{ asset('asset/images/indian.png') }}">{{$agt->ip}}</a>
                        </div>
                      <!-- <span  class="badge bg-green pull-right" style="margin-top:6%;">3</span> -->
                      </div>
                    @endforeach
                  @endif
                </div>
                <div id="inner-content-div" class="result-div"></div>
              </div>
            </ul>
          </section>
        </ul>
      </section>
        <!-- /.sidebar -->
    </aside>