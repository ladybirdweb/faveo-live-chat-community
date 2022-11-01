<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>faveo chat!</title>
</head>

<body style="background-color:#eee; overflow-y:hidden;">

{{--@if(isset($error))--}}
{{--    <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--        <strong>{{$error}}</strong>--}}
{{--        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--    </div>--}}
{{--@endif--}}

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container-fluid col-lg-12" >

    <div class="row">
        <div class="container col-lg-12">
            <h3 class="text-center mt-4"style="color:skyblue;">{{__('loginLang.FAVEO_CHAT')}}</h3>
        </div>
        <div class="container col-lg-12">
            <h3 class="text-center mt-3">{{__('loginLang.Great_to_see_you')}}</h3>
        </div>
        <div class="contaier col-lg-12" style = "height:551px;">
            <div class="container col-lg-4 bg-light" style="margin-top:36px; height:435px;width:594px;">
                <main class="form-signin text-center" style="padding-top:80px;padding-right:55px;padding-left:55px;">
                    <form method="POST" action="checklogin">
                        <!-- <img class="mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
                        @csrf
                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" >
                            <label for="floatingInput">{{__('loginLang.Email')}}</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" >
                            <label for="floatingPassword">{{__('loginLang.Password')}}</label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary mt-3 mb-3" type="submit">{{__('loginLang.Login')}}</button>
                        {{--    c                    <a class="btn btn-primary w-100 mb-3 btn-lg" href="forgotpass" role="button">{{__('loginLang.Forgot_Password')}}</a>--}}
                    </form>
                </main>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="contaier col-lg-12" style = "height:150px;"></div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>