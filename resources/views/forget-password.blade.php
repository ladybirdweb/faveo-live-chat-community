@extends('login-layouts.header')
@section('content')

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
                        $("#message").append(
                            "<div class='customer-chat-login-success'>"+
                            "<ul>"+
                            "<li>"+  response['message'] + "</li>"+
                            "</ul>"+
                            "</div>"
                        );

                        setTimeout(function () {
                            window.location = "/";
                        }, 3000);

                        $('#intro').hide();
                },
                error: function (error) {
                    if (error.status == 401) {
                        $("#message").append(
                            "<div class='customer-chat-login-errors'>"+
                            "<ul>"+
                            "<li>"+  $.parseJSON(error.responseText).message + "</li>"+
                            "</ul>"+
                            "</div>"
                        );
                        $('#intro').hide();
                    }
                    let messages = $.parseJSON(error.responseText).errors;
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
