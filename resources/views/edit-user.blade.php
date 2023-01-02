@extends('admin-layouts.app')
@section('content')

    <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-operators" style="border:2px solid black; margin-top: -8px; margin-left: 55px;" id="customer-chat-operators-edit">

        <div class="customer-chat-content-message" id="messages" style="margin-top: 55px;margin-left: 69px;">
            <div id="intro" class="customer-chat-tabs-header">{{__('lang.Edit_Agent')}}</div>
            <a id="button" href="settings" class="customer-chat-content-button customer-chat-content-button-inline">{{__('lang.Back')}}</a>
        </div>

        <div class="customer-chat-content-messages edit-operator" style = "margin-left: 67px;margin-top: 65px;">
            <div class="customer-chat-content-row add-only edit-only">
                <div class="customer-chat-label">{{__('lang.Agent_Name')}}</div>
                <input type="text"  value="" name="agent_name" id="agent_name" class="customer-chat-content-message-input-field" data-validator="notEmpty" data-validator-label="Username" data-validator-state-ex="pass" />
            </div>
            <div class="customer-chat-content-row add-only edit-only">
                <div class="customer-chat-label">{{__('lang.Department_Name')}}</div>
                <select id="department_name" name="department_name" class="customer-chat-content-message-input-field">
                    <option value="" selected="selected"> Select Department </option>
                </select>
            </div>
            <input type="hidden" name ="id" id="id" value="">
            <div class="customer-chat-content-message button-row">
                <button type="submit" id="edit" class="btn btn-sm" style="background: linear-gradient(to right, #36a9e1, #36a9e1);padding-bottom: 2px;padding-top: 2px;font-size: x-large;">{{__('lang.Update_Agent')}}</button>
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
                url: "editUser/"+localStorage.getItem('id'),
                type: 'get',
                dataType: 'JSON',
                success: function (response) {
                    if (response['success'] == true) {
                        $("#agent_name").val(response.data[0].name);
                        console.log(response.data[0].departments.length);
                        if(response.data[0].departments.length > 0) {
                            let deptName = response.data[0].departments[0].name;
                            let deptId = response.data[0].departments[0].id;
                            $('#department_name').empty().append("<option value="+deptId+">"+deptName+"</option>");
                        }
                        $("#id").val(response.data[0].id)
                    }
                }
            });
            $(document).on('click','#edit',function() {
                let data = {
                    'username': $("#agent_name").val(),
                    'department_name': $("#department_name").val(),
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
                    url: 'updateAgents',
                    type: 'post',
                    data: data,
                    dataType: 'JSON',
                    success: function (response) {
                        if (response['success'] == true) {
                            $('#intro').hide();
                            $('#button').hide();
                            $("#messages").append(
                                " <div class='alert alert-success' role='alert'>" +
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
                            $("#department_name").append(
                                "<option value=" + value.id + ">" + value.name + "</option>"
                            );
                        });
                    }
                }
            });
        });
    </script>


@endsection