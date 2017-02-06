<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Advanced form elements</title>
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
                <h3>Settings</h3>
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="text"> You are here :</li>
                    <li><a href="{{ URL::route('/') }}">Admin Panel</a></li>
                    <li class="text">Settings</li>
                </ol>

            </section>
            <section class="content">


                <div class="box box-primary">
                    <div class="box-header with-border">


                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-6" >
                                        <div class="form-group" id="colorpickerField1">
                                            <label for="name" >Primary color</label>

                                            <input class="form-control my-colorpicker1" name="name" type="text" placeholder="#36a9e1" id="Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Secondary color</label>

                                            <input class="form-control my-colorpicker1" name="name" type="text" placeholder="#467a1f" id="Location Name">
                                        </div>
                                    </div>





                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Label color</label>

                                            <input class="form-control my-colorpicker1" name="name" type="text" placeholder="#ffffff" id="Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Contact form e-mail</label>

                                            <input class="form-control" name="name" type="text" placeholder="admin@domain.com" id="Location Name">
                                        </div>
                                    </div>





                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Hide when off-line</label>
                                            <br>
                                            <button style="background-color:white;">  <input type="checkbox"> </button>


                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Show widget automatically</label>

                                            <br>
                                            <button style="background-color:white;">  <input type="checkbox"> </button>
                                        </div>
                                    </div>





                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Show widget automatically after (seconds)</label>

                                            <input class="form-control " name="name" type="text" placeholder="10" id="Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Ask guests for e-mail</label>
                                            <br>
                                            <button style="background-color:white;">  <input type="checkbox"> </button>

                                        </div>
                                    </div>





                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Chat header</label>

                                            <input class="form-control" name="name" type="text" placeholder="Talk to us" id="Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Welcome message</label>

                                            <input class="form-control" name="name" type="text" placeholder="Please fill the following form to start the chat" id="Location Name">
                                        </div>
                                    </div>





                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Name label</label>

                                            <input class="form-control" name="name" type="text" placeholder="Your name" id="Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">E-mail label</label>

                                            <input class="form-control" name="name" type="text" placeholder="Your e-mail" id="Location Name">
                                        </div>
                                    </div>





                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">New message sound</label>

                                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <option selected="selected">default</option>
                                                <option>New message A</option>
                                                <option>New message B</option>
                                                <option>New message C</option>
                                                <option>New message D</option>
                                                <option>New message E</option>
                                                <option>New message F</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Message time minutes</label>

                                            <input class="form-control" name="name" type="text" placeholder="Message time minutes" id="Location Name">
                                        </div>
                                    </div>





                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Widget's width (in pixels, minimum 370)</label>

                                            <input class="form-control" name="name" type="text" placeholder="370" id="Location Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Widget's height (in pixels)</label>

                                            <input class="form-control" name="name" type="text" placeholder="411" id="Location Name">
                                        </div>
                                    </div>





                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Widget's offset from the right edge (in pixels)</label>

                                            <input class="form-control" name="name" type="text" placeholder="50" id="Location Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Mobile version breakpoint</label>

                                            <input class="form-control" name="name" type="text" placeholder="550" id="Location Name">
                                        </div>
                                    </div>





                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Maximum connections</label>

                                            <input class="form-control" name="name" type="text" placeholder="5" id="Location Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Start chat button label</label>

                                            <input class="form-control" name="name" type="text" placeholder="Start" id="Location Name">
                                        </div>
                                    </div>





                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Loading message</label>

                                            <input class="form-control" name="name" type="text" placeholder="Loading message" id="Location Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Login error message</label>

                                            <input class="form-control" name="name" type="text" placeholder="Login error" id="Location Name">
                                        </div>
                                    </div>





                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Back button label</label>

                                            <input class="form-control" name="name" type="text" placeholder="Back" id="Location Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Chat input label</label>

                                            <input class="form-control" name="name" type="text" placeholder="Write your question" id="Location Name">
                                        </div>
                                    </div>





                                </div>
                            </div>	

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Initial message author</label>

                                            <input class="form-control" name="name" type="text" placeholder="Operator" id="Location Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Message time days</label>

                                            <input class="form-control" name="name" type="text" placeholder="day(s) ago" id="Location Name">
                                        </div>
                                    </div>





                                </div>
                            </div>	

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Message time minutes</label>

                                            <input class="form-control" name="name" type="text" placeholder="minute(s) ago" id="Location Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Message time seconds</label>

                                            <input class="form-control" name="name" type="text" placeholder="second(s) ago" id="Location Name">
                                        </div>
                                    </div>





                                </div>
                            </div>	

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Operator off-line message</label>

                                            <input class="form-control" name="name" type="text" placeholder="Operator went off-line" id="Location Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Toggle sound label</label>

                                            <input class="form-control" name="name" type="text" placeholder="Sound effects" id="Location Name">
                                        </div>
                                    </div>





                                </div>
                            </div>	
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Toggle auto-scroll label</label>

                                            <input class="form-control" name="name" type="text" placeholder="Emoticons" id="Location Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">End chat confirm</label>

                                            <input class="form-control" name="name" type="text" placeholder="Yes" id="Location Name">
                                        </div>
                                    </div>





                                </div>
                            </div>	

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">End chat cancel</label>

                                            <input class="form-control" name="name" type="text" placeholder="Cancel" id="Location Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Contact form header</label>

                                            <input class="form-control" name="name" type="text" placeholder="Contact us" id="Location Name">
                                        </div>
                                    </div>





                                </div>
                            </div>	

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Contact form info message</label>

                                            <input class="form-control" name="name" type="text" placeholder="All operators are off-line. Use the below form to send us an e-mail with your question." id="Location Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Contact form question label</label>

                                            <input class="form-control" name="name" type="text" placeholder="Your question" id="Location Name">
                                        </div>
                                    </div>





                                </div>
                            </div>	

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Contact form send button label</label>

                                            <input class="form-control" name="name" type="text" placeholder="Send" id="Location Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Contact form success header</label>

                                            <input class="form-control" name="name" type="text" placeholder="Message sent" id="Location Name">
                                        </div>
                                    </div>





                                </div>
                            </div>	

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Contact form success message</label>

                                            <input class="form-control" name="name" type="text"placeholder="Your question has been sent. Thank you!" id="Location Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name">Contact form error header</label>

                                            <input class="form-control" name="name" type="text" placeholder="Error" id="Location Name">
                                        </div>
                                    </div>

                                </hr>



                            </div>


                        </div>	

                        <div class="box-footer">
                            <button type="button" class="btn btn-primary">Save</button>

                        </div>	



                    </div>
                    <!-- ./box-body -->
                </div>

            </div>












        </section>
    </div>
    @include('footer')

    @include('script')
    <!-- Page script -->
    <script>
        $(function () {
            //Colorpicker
            $(".my-colorpicker1").colorpicker();
            //color picker with addon
            $(".my-colorpicker2").colorpicker();
        });
    </script>
</body>
</html>
