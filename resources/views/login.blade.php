
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> {{__('lang.Login')}} </title>

    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
</head>
<body class="login">


<form method="POST" action="selectlanguage" style="padding-left: 1295px;margin-top: 5px;">
    @csrf
    <select name="lang">
        <option name="lang" value="en">{{__('lang.English')}}</option>
        <option name="lang" value="fr">{{__('lang.French')}}</option>
    </select>
    <button type="submit" class="btn btn-sm" style="background: linear-gradient(to right, #9C27B0, #E040FB);">{{__('lang.Submit')}}</button>
</form>



<img class="logo" src="{{ asset('img/faveo-logo.png') }}">

<div id="customer-chat-widget" class="customer-chat customer-chat-login customer-chat-widget login-form">
    <div class="customer-chat-header">
        <div class="customer-chat-header-title"> {{__('lang.Login')}} </div>
    </div>

    <div id="customer-chat-content-login-form" class="customer-chat-content">
        <div class="customer-chat-content-info">
            @if (session('error'))
                <div class="customer-chat-login-errors">
                    <ul>
                        <li> {{ session('error') }}</li>
                    </ul>
                </div>
            @elseif (session('success'))
                <div class="customer-chat-login-success">
                    <ul>
                        <li>{{ session('success') }}</li>
                    </ul>
                </div>
            @elseif ($errors->any())
                <div class="customer-chat-login-errors">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @else
                {{__('lang.Login_Intro') }}
            @endif
        </div>

        <form action="checklogin" method="POST">
            @csrf
            <div class="customer-chat-content-message-input">
                <input id="name" type="email" name="email" class="customer-chat-content-message-input-field" placeholder=" {{__('lang.Email')}} " />
            </div>
            <div class="customer-chat-content-message-input">
                <input type="password" name="password" class="customer-chat-content-message-input-field" placeholder=" {{__('lang.Password')}} " />
            </div>
            <div class="customer-chat-content-row">
                <button type="submit" id="customer-chat-login-start" class="customer-chat-content-button" style="margin-bottom: 10px;"> {{__('lang.Login')}} <i class="icon-circle-arrow-right icon-white" style="margin: 3px 0 0 3px;"></i></button>
{{--                <br>--}}
                <a class="btn btn-primary" style="margin-left: 30px;" href="forgetpassword" role="button">{{__('lang.Forgot_Password')}}</a>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/lib/jquery.min.js') }}"></script>

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






