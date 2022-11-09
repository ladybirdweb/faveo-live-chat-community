
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> {{__('english.Login')}} </title>

    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
</head>
<body class="login">

<img class="logo" src="{{ asset('img/faveo-logo.png') }}">

<div id="customer-chat-widget" class="customer-chat customer-chat-login customer-chat-widget login-form">
    <div class="customer-chat-header">
        <div class="customer-chat-header-title"> {{__('english.Login')}} </div>
    </div>

    <div id="customer-chat-content-login-form" class="customer-chat-content">
        <div class="customer-chat-content-info">
            @if (session('error'))
                <div class="customer-chat-login-errors">
                    {{ session('error') }}
                </div>
            @elseif (session('success'))
                <div class="customer-chat-login-errors">
                    {{ session('success') }}
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
                {{__('english.Intro') }}
            @endif
        </div>

        <form action="checklogin" method="POST">
            @csrf
            <div class="customer-chat-content-message-input">
                <input id="name" type="email" name="email" class="customer-chat-content-message-input-field" placeholder=" {{__('english.Email')}} " />
            </div>
            <div class="customer-chat-content-message-input">
                <input type="password" name="password" class="customer-chat-content-message-input-field" placeholder=" {{__('english.Password')}} " />
            </div>
            <div class="customer-chat-content-row">
                <button type="submit" id="customer-chat-login-start" class="customer-chat-content-button"> {{__('english.Login')}} <i class="icon-circle-arrow-right icon-white" style="margin: 3px 0 0 3px;"></i></button>
                <a class="btn btn-primary " href="forgetpassword" role="button">{{__('english.Forgot_Password')}}</a>
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






