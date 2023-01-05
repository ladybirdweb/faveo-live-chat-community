@extends('admin-layouts.app')
@section('content')

    <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-operators" style="border:2px solid black; margin-top: -8px; margin-left: 55px;" id="customer-chat-operators-edit">
        <div class="customer-chat-content-message" id="messages" style="margin-top: 55px;margin-left: 69px;">
            <div id="intro" class="customer-chat-tabs-header">{{__('lang.Edit_Department')}}</div>
            <a id="button" href="settings" class="customer-chat-content-button customer-chat-content-button-inline">{{__('lang.Back')}}</a>
        </div>
        <div class="customer-chat-content-messages edit-operator" style = "margin-left: 67px;margin-top: 65px;">
            <div class="customer-chat-content-row add-only edit-only">
                <div class="customer-chat-label">{{__('lang.Department_Name')}}</div>
                <input type="text"  value="" name="name" id="name" class="customer-chat-content-message-input-field" data-validator="notEmpty" data-validator-label="Username" data-validator-state-ex="pass" />
            </div>
            <div class="customer-chat-content-row add-only edit-only">
                <div class="customer-chat-label">{{__('lang.Description')}}</div>
                <input type="text" value="" name="description" id="description" class="customer-chat-content-message-input-field" data-validator="mail" data-validator-label="E-mail" data-validator-state-ex="pass" />
            </div>
            <input type="hidden" name ="id" id="id" value="">
            <div class="customer-chat-content-message button-row">
                <button type="submit" id="edit" class="btn btn-sm" style="background: linear-gradient(to right, #36a9e1, #36a9e1);padding-bottom: 2px;padding-top: 2px;font-size: x-large;">{{__('lang.Update_Department')}}</button>
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
                url: "edit/"+localStorage.getItem('id'),
                type: 'get',
                dataType: 'JSON',
                success: function (response) {
                    if (response['success'] == true) {
                        console.log(response['data'].id);
                        $("#name").val(response['data'].name),
                        $("#description").val(response['data'].description),
                        $("#id").val(response['data'].id)
                    }
                }
            });

            $(document).on('click','#edit',function() {

                let data = {
                    'name': $("#name").val(),
                    'description': $("#description").val(),
                    'id': $("#id").val(),
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
                    url: 'editDepartment',
                    type: 'post',
                    data: data,
                    dataType: 'JSON',
                    success: function (response) {
                        if (response['success'] == true) {
                            $('#intro').hide();
                            $('#button').hide();
                            $('#messages').empty();
                            $("#messages").append(
                                " <div class='customer-chat-tabs-header'>" +
                                "<strong>" + response.message + "</strong>" +
                                "</div>"
                            );
                            localStorage.clear();
                            setTimeout(function () {
                                window.location = "settings";
                            }, 3000);
                        }
                    },
                    error: function (error) {
                        if (error.status == 401) {
                            $('#messages').empty();
                            $("#messages").append(
                                "<div class='customer-chat-tabs-header-error'>"+
                                "<ul>"+
                                "<li>"+  $.parseJSON(error.responseText).message + "</li>"+
                                "</ul>"+
                                "</div>"
                            );
                            $('#intro').hide();
                        }
                        else if (error.status == 422) {
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
                            $('#intro').hide();
                        }
                    },
                });
            }
        });
    </script>


@endsection