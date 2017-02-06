<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Faveo Chat</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @include('style')
  <script src="{{ asset('asset/js/jquery2.1.1.min.js') }}"></script>
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <link href="http://www.faveohelpdesk.com/demo/helpdesk/lb-faveo/media/images/favicon.ico" rel="shortcut icon">
  <style>
    .error{
      border: 1px solid #ff0000;
    }
    .icon-error{
      color: #ff0000 !important;
    }
    .error-div{
      padding-left: 2px;
      color: #ff0000 !important;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    @include('header')
    <!-- Left side column. contains the logo and sidebar -->
    @include('nav-menu')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content-header">
        <!--<div class="row">-->
        <!--<div class="col-md-6">-->
        <h3>Canned Response</h3>
        <!--</div>-->
        <ol class="breadcrumb breadcrumb-custom">
          <li class="text"> You are here :</li>
          <li><a href="{{ URL::route('/') }}">Admin</a></li>
          <li class="text"><a href="{{ URL::route('/canned-message') }}">Canned Messages</a></li>
          <li class="text">Create</li>
        </ol>

        <!--</div>-->
      </section>
      <section class="content">
        <form action="{{URL::route('/canned-message/add')}}" method="post" class="faveo_canned_add">
          <input type="hidden" name="_token" value="{{ Session::token() }}">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create </h3>
            </div>
            <div class="box-body">
              <div class="row">
                <!-- username -->
                <div class="col-xs-6 form-group ">
                  <label for="title">Title</label>    <span class="text-red"> *</span>           
                  <input class="form-control title" name="title" type="text" id="title">
                </div>
                <!-- firstname -->
                <div class="col-xs-12 form-group ">
                  <label for="message">Message</label><span class="text-red"> *</span>
                  <textarea class="form-control message" name="message" cols="50" rows="10" id="message"></textarea>
                </div>
              </div>
            </div>
            <input type="hidden" id="url" value="{{URL::route('/canned-message')}}">
            <div class="box-footer">
              <input class="form-group btn btn-primary button" type="submit" value="Submit">
            </div>
          </div>
        </form>
          <script>
            // $(function() {
            //   $("textarea").wysihtml5();
            // });
          </script>
        </section><!-- /.content -->
      </section>
    </div>
    @include('footer')
    @include('script')
    <script src="{{ asset('asset/js/script/canned.js') }}"></script>
  </body>
  </html>
