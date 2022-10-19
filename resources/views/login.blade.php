<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> {{ $app->trans('login.title') }} </title>

    <!-- Fonts -->

{{ $app->renderView('blocks/fonts.html'); }}

    <!-- Styles -->

<link rel="stylesheet" href="{{ $app->asset('css/jquery.mCustomScrollbar.css') }}" />
<link rel="stylesheet" href="{{ $app->asset('css/main.css') }}" />
<link rel="stylesheet" href="{{ $app->asset('css/admin.css') }}" />
<link rel="stylesheet" href="{{ $app->asset('css/bootstrap.css') }}" />
</head>
<body class="login">

<img class="logo" src="{{ $app->asset('img/logo.png') }}">

<div id="customer-chat-widget" class="customer-chat customer-chat-login customer-chat-widget login-form">
<div class="customer-chat-header">
    <div class="customer-chat-header-title"> {{ $app->trans('login.title') }} </div>
</div>

<div id="customer-chat-content-login-form" class="customer-chat-content">
    <div class="customer-chat-content-info">
        @if($vars['errors'])
        <div class="customer-chat-login-errors">
            {{ $app->trans('login.error') }}
        </div>
        @elseif
            {{ $app->trans('login.intro') }}
        @endif
    </div>

    <form action="" method="post">
        <div class="customer-chat-content-message-input">
            <input id="name" type="text" name="name" value="{{ $vars['name'] }}" class="customer-chat-content-message-input-field" placeholder="{{ $app->trans('your.mail') }}" />
        </div>
        <div class="customer-chat-content-message-input">
            <input type="password" name="password" class="customer-chat-content-message-input-field" placeholder="{{ $app->trans('your.pass') }}" />
        </div>
        <div class="customer-chat-content-row">
            <button type="submit" id="customer-chat-login-start" class="customer-chat-content-button"> {{ $app->trans('login') }} <i class="icon-circle-arrow-right icon-white" style="margin: 3px 0 0 3px;"></i></button>
        </div>
    </form>
</div>
</div>

<!-- Scripts -->

{{ $app->renderView('blocks/debugScripts.html'); }}

<script type="text/javascript" src="{{ $app->asset('js/lib/jquery.min.js') }}"></script>

<script type="text/javascript">
jQuery(function($)
{
    // Activate the first input

    $('#name').focus();
});
</script>
<!--[if lte IE 9]>
    <script type="text/javascript" src="{{ $app->asset('js/lib/placeholders.jquery.min.js') }}"></script>
    <![endif]-->
</body>
</html>
