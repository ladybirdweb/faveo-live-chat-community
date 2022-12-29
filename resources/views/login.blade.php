@extends('login-layouts.header')
@section('content')

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
            @if (session('error'))
                <div class="customer-chat-login-errors">
                    <ul>
                        <li> {{ session('error') }}</li>
                    </ul>
                </div>
            @else
            <div id ="intro">
                {{__('lang.Login_Intro') }}
            </div>
            @endif
        </div>

        <div class="customer-chat-content-message-input">
            <input id="name" type="email" name="email" class="customer-chat-content-message-input-field" placeholder=" {{__('lang.Email')}} " />
        </div>
        <div class="customer-chat-content-message-input">
            <input id="pass" type="password" name="password" class="customer-chat-content-message-input-field" placeholder=" {{__('lang.Password')}} " />
        </div>
        <div class="customer-chat-content-row">
            <button type="submit" id="customer-chat-login-start" class="customer-chat-content-button" style="margin-bottom: 10px;"> {{__('lang.Login')}} <i class="icon-circle-arrow-right icon-white" style="margin: 3px 0 0 3px;"></i></button>
            <a class="btn btn-primary" style="margin-left: 30px;" href="forgetpassword" role="button">{{__('lang.Forgot_Password')}}</a>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $(document).on('click','#customer-chat-login-start',function() {

            let data = {
                'email': $("#name").val(),
                'password': $("#pass").val()
            }
            sendData(data);
            $('.customer-chat-login-errors').hide();
        });

        function sendData(data) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept' : 'application/json',
                    'Authorization' : 'Bearer '.$accessToken,
                }
            });

            $.ajax({
                url: 'checklogin',
                type: 'post',
                data: data,
                dataType: 'JSON',
                success: function (response) {
                    if (response['success'] == true) {
                        if(response['message'] == 'admin')
                        {
                            window.location = "admin";
                        }
                        else{
                            window.location = "agent";
                        }
                    }
                },
                error: function (error) {
                    if (error.status == 401) {
                        console.log(error.responseJSON);
                        $("#message").append(
                            "<div class='customer-chat-login-errors'>"+
                            "<ul>"+
                            "<li>"+  error.responseJSON.message + "</li>"+
                            "</ul>"+
                            "</div>"
                        );
                        $('#intro').hide();
                    }
                    let messages = error.responseJSON.errors;
                    $.each(messages, function (key, val) {
                        $("#message").append(
                            "<div class='customer-chat-login-errors'>"+
                            "<ul>"+
                                "<li>"+  val + "</li>"+
                            "</ul>"+
                            "</div>"
                        );
                    });
                    $('#intro').hide();
                },
            });
        }
    });
</script>
@endsection
