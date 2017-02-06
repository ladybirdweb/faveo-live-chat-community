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
          <li class="text">Messages History</li>


        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Inbox </h3>  <small> 5 new messages</small>
                <!-- /.box-tools -->
              </div>
              <!-- /.box-header -->
              <p> &nbsp; </p>
              <div id="form7">
                <form id="myForm">
                  <section id="section-two">

                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">

                          <div class="row">
                            <div class="col-xs-3 col-sm-3 col-md-3">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Username">
                              </div>
                            </div>

                            <div class="col-xs-3 col-sm-3 col-md-3">
                              <div class="form-group">
                                <label for="exampleInputEmail1">E-mail</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                              </div>
                            </div>

                            <div class="col-xs-3 col-sm-3 col-md-3">

                              <div class="form-group">
                                <label>From Date:</label>

                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                                </div>
                                <!-- /.input group -->
                              </div>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3">
                              <div class="form-group">
                                <label>To Date:</label>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                                </div>
                                <!-- /.input group -->
                              </div>
                            </div>
                            <span>
                              <a class="btn btn-primary pull-left" style="margin-left:15px;" >Search</a>
                            </span>             
                          </div>
                        </div>
                      </section>    
                    </br>
                    <p> &nbsp; </p>
                    <hr> </hr>
                  </div>              
                  <div class="box-body no-padding">
                    <div class="col-xs-12">
                      <table id="example1" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="width: 600px;"><a href="{{ URL::route('/message-history/list') }}" style="color:black;" >Alexander Pierce/Sarah Bullock <span class="pull-right"> 21.11.2016 </span></a></td>
                            <td style="text-align: center">
                              <div class="tools">
                                <span data-toggle="modal" data-target="#id">
                                  <a data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a>
                                </span>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="pull-right" style="margin-top : -10px; margin-bottom : -10px;">
                        <ul class="pagination"><li class="disabled"><span>«</span></li> <li class="active"><span>1</span></li><li><a href="#">2</a></li> <li><a href="#" rel="next">»</a></li></ul>
                      </div>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /. box -->
                </div>
                <!-- /.col -->
              </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('footer')
  </div>



  @include('script')
  <!-- Page script -->
  <script>
    $(function () {
      //Initialize Select2 Elements
      $(".select2").select2();

      //Datemask dd/mm/yyyy
      $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
      //Datemask2 mm/dd/yyyy
      $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
      //Money Euro
      $("[data-mask]").inputmask();

      //Date range picker
      $('#reservation').daterangepicker();
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
      //Date range as a button
      $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      });
      //Date picker
      $('#datepicker').datepicker({
        autoclose: true
      });
      //iCheck for checkbox and radio inputs
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
      });
      //Red color scheme for iCheck
      $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
      });
      //Flat red color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
      });
      //Colorpicker
      $(".my-colorpicker1").colorpicker();
      //color picker with addon
      $(".my-colorpicker2").colorpicker();

      //Timepicker
      $(".timepicker").timepicker({
        showInputs: false
      });
    });
  </script>
</body>
</html>