<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> {{__('lang.Admin')}} </title>

    <!-- Styles -->

    <link rel="icon" type="image/icon" href="{{ asset('img/faveo-logo.png') }}">
    {{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/bootstrap-popover.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/colorpicker.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/jquery-ui-1.10.3.custom.css') }}" >
    <script src="https://kit.fontawesome.com/877ab14696.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
<div id="customer-chat" class="customer-chat customer-chat-admin">

    @include('admin_layouts.header')
    @include('admin_layouts.sidebar')
    @yield('content')
    @include('admin_layouts.footer')

</div>
</body>
</html>
