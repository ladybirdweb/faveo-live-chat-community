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
      <!-- General tools such as edit or delete-->
      <section class="content-header">
        <!--<div class="row">-->
        <!--<div class="col-md-6">-->
        <h3>Canned Response</h3>
        <!--</div>-->
        <ol class="breadcrumb breadcrumb-custom">
          <li class="text"> You are here :</li>
          <li><a href="{{ URL::route('/') }}">Admin</a></li>
          <li class="text">Canned Messages</li>
        </ol>
        <!--</div>-->
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="box box-primary">
          <div class="box-header">
            <a href="{{ URL::route('/canned-message/add') }}" class="btn btn-primary pull-right">Create Canned Response</a>
          </div>
          <div class="box-body table-responsive ">
            <!-- check whether success or not -->
            <!-- failure message -->
            <!-- table -->
            <table class="table table-bordered dataTable" style="overflow:hidden;">
              <tr>
                <th>Name</th>
                <th>Created By</th>
                <th>Action</th>
              </tr>
              @if(count($message) == 0)
              <tr><td colspan="3" style="text-align: center;">No Canned Messgaes</td></tr>
              @else
                @foreach($message as $mess)
                  <tr>
                    <td><a href="#" title="{{$mess->message}}">{{$mess->title}}</a></td>
                    <td>{{$mess->created_by}}</td>
                    <td>
                      <a href="{{ URL::to('/canned-message/edit/'.$mess->uniq_id) }}" class="btn btn-info btn-xs btn-flat">
                        <i class="fa fa-edit" style="color:black;"> </i> Edit
                      </a>
                      <a href="#" data-id="{{$mess->uniq_id}}" class="btn btn-warning btn-xs btn-flat delete">
                        <i class="fa fa-trash" style="color:black;"> </i> Delete
                      </a>
                    </td>
                  </tr>
                @endforeach
              @endif
              <input type="hidden" id="url" value="{{URL::route('/canned-message/delete')}}">
            </table>
          </div>
        </div>
      </section><!-- /.content -->
    </div>
    <!-- Edit Modal for operator-->
    @include('footer')
    @include('script')
    <script src="{{ asset('asset/js/script/canned.js') }}"></script>
  </body>
  </html>
