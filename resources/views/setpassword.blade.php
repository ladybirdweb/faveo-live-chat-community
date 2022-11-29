@extends('login_layouts.header')
@section('content')

<img class="logo" src="{{ asset('img/faveo-logo.png') }}">

<div id="customer-chat-widget" class="customer-chat customer-chat-login customer-chat-widget login-form">
    <div class="customer-chat-header">
        <div class="customer-chat-header-title"> {{__('lang.Set_Password')}} </div>
    </div>

    <div id="customer-chat-content-login-form" class="customer-chat-content">
        <div class="customer-chat-content-info" id="message">


            <div id ="intro">
                {{__('lang.Set_Password_Intro') }}
            </div>

        </div>

            <div class="customer-chat-content-message-input">
                <input id="pass" type="password" name="password" class="customer-chat-content-message-input-field" placeholder=" {{__('lang.Password')}} " />
            </div>
            <div class="customer-chat-content-message-input">
                <input  id="confirmpass" type="password" name="confirmpassword" class="customer-chat-content-message-input-field" placeholder=" {{__('lang.Confirm_Password')}} " />
            </div>
            <div class="customer-chat-content-row">
                <button type="submit" id="customer-chat-login-start" class="customer-chat-content-button"> {{__('lang.Submit')}} <i class="icon-circle-arrow-right icon-white" style="margin: 3px 0 0 3px;"></i></button>
            </div>

    </div>
</div>

<script>
    $(document).ready(function(){
        $(document).on('click','#customer-chat-login-start',function() {
            console.log('abcx');

            let data = {
                'password': $("#pass").val(),
                'confirmpassword': $("#confirmpass").val(),
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
                url: 'checkSetpassword',
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
                    if (response.status == 401)
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
                },
                error: function (error) {
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
