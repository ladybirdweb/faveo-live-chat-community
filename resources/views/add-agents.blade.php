@extends('admin-layouts.app')
@section('content')

    <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-operators" style="border:2px solid black; margin-top: -8px; margin-left: 55px;" id="customer-chat-operators-edit">
        <div class="customer-chat-content-wrapper">
            <div style="font-size: 16px;margin-right: 10px;color: #333;">
                <div class="customer-chat-tabs">
                    <a href="#" class="customer-chat-tab customer-chat-tab-prev"><i class="icon-chevron-left"></i></a>
                    <div class="customer-chat-tabs-wrapper">
                        <a data-tag="operators" id="operators" href="#" class="customer-chat-tab customer-chat-tab-button operators"><i class="fa fa-user"></i> <span> {{__('lang.Operators')}}</span></a>
                        <a data-tag="departments" href="#" class="customer-chat-tab customer-chat-tab-button departments"><i class="fa fa-cubes"></i> {{__('lang.Departments')}}</a>
                    </div>
                    <a href="#" class="customer-chat-tab customer-chat-tab-next"><i class="icon-chevron-right"></i></a>
                </div>
                <div data-tag="operators" id="customer-chat-operators-tab" class="customer-chat-tab-content"></div>
                <div data-tag="departments" id="customer-chat-departments-tab" class="customer-chat-tab-content"></div>
                <div data-tag="settings" class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-settings-ui"></div>

            </div>
        </div>
        <div class="customer-chat-content-message" id="messages" style="margin-top: 55px;margin-left: 69px;">
            <div class="customer-chat-tabs-header" id = "intro">{{__('lang.Add_new_operator')}}</div>
            <a id="button" href="settings" class="customer-chat-content-button customer-chat-content-button-inline">{{__('lang.Back')}}</a>
        </div>

        <div class="customer-chat-content-messages edit-operator" style = "margin-left: 67px;margin-top: 65px;">
            <div class="customer-chat-content-row add-only edit-only">
                <div class="customer-chat-label">{{__('lang.Name')}}</div>
                <input type="text" name="name" id="name" class="customer-chat-content-message-input-field" data-validator="notEmpty" data-validator-label="Username" data-validator-state-ex="pass" />
            </div>
            <div class="customer-chat-content-row add-only edit-only">
                <div class="customer-chat-label">{{__('lang.Email')}}</div>
                <input type="text" name="email" id="email" class="customer-chat-content-message-input-field" data-validator="mail" data-validator-label="E-mail" data-validator-state-ex="pass" />
            </div>
            <div class="customer-chat-content-row add-only">
                <div class="customer-chat-label">{{__('lang.Password')}}</div>
                <input type="password" name="password" id="password" class="customer-chat-content-message-input-field" data-validator="password" data-validator-match="rePassField" data-validator-state="add" data-validator-label="Password" />
            </div>
            <div class="customer-chat-content-row add-only">
                <div class="customer-chat-label">{{__('lang.Confirm_Password')}}</div>
                <input type="password" name="confirmpassword" id="confirmpassword" class="customer-chat-content-message-input-field" data-validator="password" data-validator-match="passField" data-validator-state="add" data-validator-msg="false" />
            </div>
            <div class="customer-chat-content-row select-list-row add-only edit-only">
                <div class="customer-chat-label">{{__('lang.Departments')}}</div>
                <select id="departments" name="departments" class="customer-chat-content-message-input-field">
                    <option value="" selected="selected"> Select Department </option>
                </select>
                <div class="select-list"></div>
            </div>
            <div class="customer-chat-content-message button-row">
                <button type="submit" id="save" class="customer-chat-content-button customer-chat-content-button-inline" >{{__('lang.Submit')}}</button>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept' : 'application/json',
                    'Authorization' : 'Bearer '.$accessToken,
                }
            });

            $.ajax({
                url: 'show-department-list',
                type: 'get',
                dataType: 'JSON',
                success: function (response) {
                    if (response['success'] == true) {
                        $.each(response.data, function (key, value) {
                            $("#departments").append(
                                "<option value=" + value.id + ">" + value.name + "</option>"
                            );
                        });
                    }
                }
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $(document).on('click','#save',function() {
                let data = {
                    'username': $("#name").val(),
                    'email': $("#email").val(),
                    'password' : $("#password").val(),
                    'confirmpassword' : $("#confirmpassword").val(),
                    'departments' : $("#departments").val()
                }
                sendData(data);
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
                    url: 'addAgents',
                    type: 'post',
                    data: data,
                    dataType: 'JSON',
                    success: function (response) {
                        $('#intro').hide();
                        $('#button').hide();
                        if (response['success'] == true) {
                            $('#messages').empty();
                            $("#messages").append(
                                "<div class='customer-chat-tabs-header'>"+
                                "<strong>" + response.message + "</strong>" +
                                "</div>"
                            );
                            setTimeout(function () {
                                window.location.replace('/settings');
                            }, 3000);
                        }
                    },
                    error: function (error) {
                        $('#intro').hide();
                        $('#button').hide();
                        if (error.status == 401) {
                            $('#messages').empty();
                            $("#messages").append(
                                "<div class='customer-chat-tabs-header-error'>"+
                                "<ul>"+
                                "<li>"+  $.parseJSON(error.responseText).message + "</li>"+
                                "</ul>"+
                                "</div>"
                            );
                        }
                        else if(error.status == 422) {
                            let messages = $.parseJSON(error.responseText).errors;
                            $('#messages').empty();
                            $.each(messages, function (key, val) {
                                $("#messages").append(
                                    "<div class='customer-chat-tabs-header-error'>" +
                                    "<ul>" +
                                    "<li>" + val + "</li>" +
                                    "</ul>" +
                                    "</div>"
                                );
                            });
                        }
                    },
                });
            }
        });
    </script>



@endsection