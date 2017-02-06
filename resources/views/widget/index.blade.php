<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Faveo Chat</title>
  @include('style')
  <style>
    .accordion-toggle {
      cursor: pointer;
    }


    .accordion-toggle{
      color: #ffffff;
      line-height: 30px;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 20px;
      text-align: center;
      background: white;
      width:100%;
      padding: 10px;

      margin-bottom: 1px;
      border:none;
    }

    i.fa.fa-angle-up, i.fa.fa-angle-down{
      float:right;
      font-size: 25px;
    }
    #box{
      border: 1px solid rgb(200, 200, 200);
      box-shadow: rgba(0, 0, 0, 0.1) 0px 5px 5px 2px;
      background: rgba(200, 200, 200, 0.1);
      border-radius: 4px;

      border-color: #337ab7;



    }

    h2{
      text-align:center;
      color:#fff;
    }

    .input-group{


      .form-horizontal{
        margin: 0 auto;
        width:80%;
      }




    </style>
    <style>     
      .user-panel>.info {
        padding: 5px 5px 5px 15px;
        line-height: 1;
        position: relative;
        left: -10px;
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
          <h1>Widget Theme</h1>
          <ol class="breadcrumb breadcrumb-custom">
            <li class="text"> You are here :</li>
            <li><a href="{{ URL::route('/') }}">Admin Panel</a></li>
            <li class="text">Widget Theme</li>
          </ol>
        </section>
        <section class="content" >


          <div class="box box-primary"   >
            <div class="box-header with-border" >


              <!-- /.box-header -->
              <div class="box-body" >
                <div class="row" >
                  <div class="col-md-12">

                    <div class="col-md-5">

                      <div  id="box" style="background-color:white;">
                        <div class="accordion-toggle" style="color:white; background-color:#337ab7;">Contact Us!<i class="fa fa-angle-down"></i></div>
                        <div class="accordion-content default">
                          <hr>

                          <form class="form-horizontal" action=" " method="" id="contact_form" style="margin: 0 auto; width:80%;" >
                            <fieldset>
                              <!-- Form Name -->


                              <!-- Text input-->

                              <div class="form-group">

                                <div class="col-md-12">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="first_name" placeholder="Name" class="form-control" type="text">
                                  </div>
                                </div>
                              </div>



                              <!-- Text input-->
                              <div class="form-group">

                                <div class="col-md-12">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input name="email" placeholder="E-Mail Address" class="form-control" type="text">
                                  </div>
                                </div>
                              </div>


                              <!-- Text input-->

                              <div class="form-group">

                                <div class="col-md-12">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                    <input name="phone" placeholder="(005)501-120101" class="form-control" type="text">
                                  </div>
                                </div>
                              </div>

                              <!-- Text input-->

                              <div class="form-group">

                                <div class="col-md-12 inputGroupContainer">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                    <textarea class="form-control" name="comment"  placeholder="Message" rows="3" ></textarea>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group">

                                <div class="col-md-12">
                                  <button type="submit" class="btn  pull-right" style="background-color:#86C953; color:white;">Send <span class="glyphicon glyphicon-send"></span></button>
                                </div>
                              </div>

                            </fieldset>
                          </form>
                        </div>			                       






                      </div>
                    </div>

                    <div class="col-md-5" >
                      <div  id="box" style="background-color:white; padding:0px;">		
                        <div class="accordion-toggle" style="color:white; background-color:#337ab7;">Talk To Us!<i class="fa fa-angle-down"></i></div>
                        <div class="accordion-content default">
                          <hr>

                          <div class="box-body chat">
                            <!-- chat item -->
                            <div class="item">
                              <img src="{{ asset('asset/images/user4-128x128.jpg') }}" alt="user image" class="online">

                              <p class="message">
                                <a href="#" class="name">
                                  <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                                  Mike Doe
                                </a>
                                I would like to meet you to discuss the latest news about
                                I would like to meet you to discuss the latest news about
                                I would like to meet you to discuss the latest news  news about
                              </p>

                              <!-- /.attachment -->
                            </div>
                            <!-- /.item -->
                            <!-- chat item -->
                            <div class="item">
                              <img src="{{ asset('asset/images/user3-128x128.jpg') }}" alt="user image" class="offline">

                              <p class="message">
                                <a href="#" class="name">
                                  <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                                  Alexander Pierce
                                </a>
                                I would like to meet you to discuss the latest news  news about
                                I would like to meet you to discuss the latest news  news about
                              </p>
                            </div>


                            <!-- /.item -->
                            <!-- chat item -->
                            <div class="box-footer">
                              <div class="input-group">
                                <!--   <input class="form-control" placeholder="Type message..." data-emojiable="true"> -->
                                <p class="lead emoji-picker-container">
                                  <input type="email" class="form-control" placeholder="Input field" data-emojiable="true">
                                </p>
                                <div class="input-group-btn">
                                  <button type="button" class="btn " style="background-color:#86C953;"><i class="fa fa-plus" style="color:white;" ></i></button>
                                </div>
                              </div>
                            </div>	
                            <!-- /.item -->
                          </div>	


                        </div>	
                      </div>
                    </div>





                  </div>
                </div>



                <!-- /.row -->
              </div>
              <!-- ./box-body -->
            </div>

          </div>












        </section>
      </div>
      @include('footer')
      @include('script')
    </body>
    </html>
