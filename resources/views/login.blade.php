
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title> {{__('lang.Login')}} </title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

</head>
<body class="login">

<form method="POST" action="selectlanguage" style="padding-left: 1700px;margin-top: 5px;">
    @csrf
    <select name="lang">
        <option name="lang" value="en"> {{__('lang.English')}} </option>
        <option name="lang" value="fr"> {{__('lang.French')}} <img src="{{ asset('img/fr.png') }}" alt="fr"> </option>
    </select>
    <button type="submit" class="btn btn-sm" style="background: linear-gradient(to right, #36a9e1, #36a9e1);">{{__('lang.Submit')}}</button>
</form>

<img class="logo" src="{{ asset('img/faveo-logo.png') }}">

<div id="customer-chat-widget" class="customer-chat customer-chat-login customer-chat-widget login-form">
    <div class="customer-chat-header">
        <div class="customer-chat-header-title"> {{__('lang.Login')}} </div>
    </div>

    <div id="customer-chat-content-login-form" class="customer-chat-content">
        <div class="customer-chat-content-info" id="message">
{{--            @if (session('error'))--}}
{{--                <div class="customer-chat-login-errors">--}}
{{--                    <ul>--}}
{{--                        <li> {{ session('error') }}</li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @elseif (session('success'))--}}
{{--                <div class="customer-chat-login-success" id="message">--}}
{{--                    <ul>--}}
{{--                        <li>{{ session('success') }}</li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @elseif ($errors->any())--}}
{{--                <div class="customer-chat-login-errors" id="message">--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @else--}}
            <div id ="intro">
                {{__('lang.Login_Intro') }}
            </div>
{{--            @endif--}}
        </div>

{{--        <form action="" method="POST">--}}
            @csrf
            <div class="customer-chat-content-message-input">
                <input id="name" type="email" name="email" class="customer-chat-content-message-input-field" placeholder=" {{__('lang.Email')}} " />
            </div>
            <div class="customer-chat-content-message-input">
                <input id="pass" type="password" name="password" class="customer-chat-content-message-input-field" placeholder=" {{__('lang.Password')}} " />
            </div>
            <div class="customer-chat-content-row">
                <button type="submit" id="customer-chat-login-start" class="customer-chat-content-button" style="margin-bottom: 10px;"> {{__('lang.Login')}} <i class="icon-circle-arrow-right icon-white" style="margin: 3px 0 0 3px;"></i></button>
{{--                <br>--}}
                <a class="btn btn-primary" style="margin-left: 30px;" href="forgetpassword" role="button">{{__('lang.Forgot_Password')}}</a>
            </div>
{{--        </form>--}}
    </div>
</div>

{{--<script type="text/javascript" src="{{ asset('js/lib/jquery.min.js') }}"></script>--}}
<script>
    $(document).ready(function(){
        $(document).on('click','#customer-chat-login-start',function() {
            console.log('button clicked');

            let data = {
                'email': $("#name").val(),
                'password': $("#pass").val()
            }
            console.log(data);
            sendData(data);
        });

            // if( email != "" && password != "" ){
                function sendData(data) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: 'checklogin',
                        type: 'post',
                        data: data,
                        dataType: 'JSON',
                        success: function (response) {
                            // var msg = "";
                            // console.log(response.token);
                            if (response.status == 200) {
                                if(response.role == 'admin')
                                {
                                    // console.log('admin');
                                    window.location = "admin";
                                }
                                else{
                                    window.location = "agent";
                                }
                            }
                            else {
                                // msg = response.error;
                                $("#message").append(
                                    "<div class='customer-chat-login-errors'>"+
                                    "<ul>"+
                                    "<li>"+  response.error + "</li>"+
                            "</ul>"+
                            "</div>"
                            );
                                $('#intro').hide();
                            }

                            // $("#message").html(msg);
                        }
                    });
                }
            // }
        // });
    });
</script>
{{--<script type="text/javascript">--}}
{{--    jQuery(function($)--}}
{{--    {--}}
{{--        // Activate the first input--}}

{{--        $('#name').focus();--}}
{{--    });--}}
{{--</script>--}}
<!--[if lte IE 9]>
{{--<!--        <script type="text/javascript" src="{{ asset('js/lib/placeholders.jquery.min.js') }}"></script>-->--}}
        <![endif]-->
</body>
</html>






