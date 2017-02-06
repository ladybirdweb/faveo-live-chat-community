<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Faveo Chat</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @include('style')
  <style>
    #search1{
      margin: 0 30%;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    @include('header')
    <!-- Left side column. contains the logo and sidebar -->
    @include('nav-menu')


    <!-- Content Wrapper. Contains page content -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content-header">
        <!--<div class="row">-->
        <!--<div class="col-md-6">-->
        <h1>Agents</h1>
        <!--</div>-->
        <ol class="breadcrumb breadcrumb-custom">
          <li class="text"> You are here :</li>
          <li><a href="{{ URL::route('/') }}">Admin</a></li>
          <li class="text">Agents</li>
        </ol>

        <!--</div>-->
      </section>
      <section class="content">


        <div class="box box-primary">
          <div class="box-header">
            <h2 class="box-title">Agents </h2><a href="{{ URL::route('/operators/add') }}" class="btn btn-primary pull-right">Create an Agent</a></div>
            <div class="box-body table-responsive">
              <!-- check whether success or not -->
              <!-- failure message -->
              <!-- Warning Message -->
              <!-- Agent table -->
              <table class="table table-bordered dataTable" style="overflow:hidden;">
                <tr>
                  <th width="100px">Name</th>
                  <th width="100px">User Name</th>
                  <th width="100px">Role</th>
                  <th width="100px">Status</th>
                  <th width="100px">Created By</th>
                  <th width="100px">Created</th>
                  <th width="100px">Action</th>
                </tr>
                @if(count($agent) == 0)
                  <tr><td colspan="7" style="text-align: center;">No Agent</td></tr>
                @else
                  @foreach($agent as $agnt)
                    <tr>
                      <td style="color:black;">{{$agnt->first_name}} {{$agnt->last_name}}</td>
                      <td style="color:black;">{{$agnt->username}}</td>
                      <td><button class="btn btn-success btn-xs">{{ucfirst($agnt->role)}}</button></td>
                      @if($agnt->status == 1)
                        <td><span style="color:green">Active</span></td>
                      @else
                        <td><span style="color:red">Inactive</span></td>
                      @endif
                      <td style="color:black;">{{$agnt->created_by}}</td>
                      <td style="color:black;">{{date('M d, Y', strtotime($agnt->created_at))}}</td>
                      <td>
                        <a href="{{ URL::to('/operators/edit/'.$agnt->uniq_id) }}" class="btn btn-info btn-xs btn-flat">
                          <i class="fa fa-edit" style="color:black;"> </i> Edit 
                        </a>
                      </td>
                    </tr>
                  @endforeach
                @endif
            </table>
            <div class="pull-right" style="margin-top : -10px; margin-bottom : -10px;">

            </div>
          </div>
        </div>
      </section><!-- /.content -->








    </div>

    @include('footer')

    @include('script')
  </body>
  </html>
