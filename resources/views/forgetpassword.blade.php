
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title> {{__('lang.Forget_Password')}} </title>

    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
</head>

<body class="login">

<img class="logo" src="{{ asset('img/faveo-logo.png') }}">

<div id="customer-chat-widget" class="customer-chat customer-chat-login customer-chat-widget login-form">
    <div class="customer-chat-header">
        <div class="customer-chat-header-title"> {{__('lang.Forget_Password')}} </div>
    </div>

    <div id="customer-chat-content-login-form" class="customer-chat-content">
        <div class="customer-chat-content-info" id="message">
            <div id ="intro">
                {{__('lang.Forget_Password_Intro') }}
            </div>
        </div>

            <div class="customer-chat-content-message-input">
                <input id="name" type="email" name="email" class="customer-chat-content-message-input-field" placeholder=" {{__('lang.Email')}} " />
            </div>
            <div class="customer-chat-content-row">
                <button type="submit" id="customer-chat-login-start" class="customer-chat-content-button"> {{__('lang.Submit')}} <i class="icon-circle-arrow-right icon-white" style="margin: 3px 0 0 3px;"></i></button>
            </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/lib/jquery.min.js') }}"></script>

<script>
    $(document).ready(function(){
        $(document).on('click','#customer-chat-login-start',function() {

            let data = {
                'email': $("#name").val(),
            }
            sendData(data);
            $('.customer-chat-login-errors').hide();
        });

        function sendData(data) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: 'checkForgetpassword',
                type: 'post',
                data: data,
                dataType: 'JSON',
                success: function (response) {
                    if (response.status == 200)
                    {
                        $("#message").append(
                            "<div class='customer-chat-login-success'>"+
                            "<ul>"+
                            "<li>"+  response.success + "</li>"+
                            "</ul>"+
                            "</div>"
                        );

                        setTimeout(function () {
                            window.location = "/";
                        }, 7000);

                        $('#intro').hide();
                    }
                    else {
                        if(response.validation_error == 0)
                        {
                            $("#message").append(
                                "<div class='customer-chat-login-errors'>"+
                                "<ul>"+
                                "<li>"+  response.error + "</li>"+
                                "</ul>"+
                                "</div>"
                            );
                            $('#intro').hide();
                        }
                        else
                        {
                            var errors = response.error;
                            $.each(errors, function (key, val) {
                                $("#message").append(
                                    "<div class='customer-chat-login-errors'>"+
                                    "<ul>"+
                                    "<li>"+  val + "</li>"+
                                    "</ul>"+
                                    "</div>"
                                );
                                $('#intro').hide();
                            });
                        }
                    }
                }
            });
        }
    });
</script>

<script type="text/javascript">
    jQuery(function($)
    {
        // Activate the first input

        $('#name').focus();
    });
</script>
<!--[if lte IE 9]>
        <script type="text/javascript" src="{{ asset('js/lib/placeholders.jquery.min.js') }}"></script>
        <![endif]-->

</body>
</html>

