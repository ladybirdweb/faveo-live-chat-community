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
                        <a data-tag="canned-messages" href="#" class="customer-chat-tab customer-chat-tab-button canned-messages"><i class="fa fa-comments"></i> {{__('lang.Canned_Messages')}}</a>
                        <a data-tag="settings" href="#" class="customer-chat-tab customer-chat-tab-button customer-chat-active"><i class="fa fa-wrench"></i> {{__('lang.Settings')}}</a>
                    </div>
                    <a href="#" class="customer-chat-tab customer-chat-tab-next"><i class="icon-chevron-right"></i></a>
                </div>

                <div data-tag="operators" id="customer-chat-operators-tab" class="customer-chat-tab-content"></div>
                <div data-tag="departments" id="customer-chat-departments-tab" class="customer-chat-tab-content"></div>
                <div data-tag="settings" class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-settings-ui"></div>

            </div>
        </div>
        <div class="customer-chat-content-message" style="margin-top: 55px;margin-left: 69px;">
            <div class="customer-chat-tabs-header">{{__('lang.Add_new_operator')}}</div>
            <a id="customer-chat-operators-back" href="settings" class="customer-chat-content-button customer-chat-content-button-inline">{{__('lang.Back')}}</a>
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
{{--                <a id="save" href="#" class="customer-chat-content-button customer-chat-content-button-inline">{{__('lang.Submit')}}</a>--}}
            </div>

            {{--            <div class="customer-chat-content-row edit-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('avatar') ?></div>--}}
{{--                <i id="imageField" class="avatar customer-chat-content-message-avatar-operator"></i>--}}
{{--                <div class="customer-chat-upload-field customer-chat-content-message-input-field">--}}
{{--                    <input id="avatarUploadField" name="avatar" type="file" />--}}
{{--                </div>--}}
{{--                <a href="#" id="avatar-from-collection" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('from.coll') ?></a>--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row pass-only current-pass">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('curr.pass') ?></div>--}}
{{--                <input type="password" id="changePassCurrentField" class="customer-chat-content-message-input-field" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row pass-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('new.pass') ?></div>--}}
{{--                <input type="password" id="changePassField" class="customer-chat-content-message-input-field" data-validator="password" data-validator-match="changePassRetypeField" data-validator-state="pass" data-validator-label="Password" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row pass-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('retype.new.pass') ?></div>--}}
{{--                <input type="password" id="changePassRetypeField" class="customer-chat-content-message-input-field" data-validator="password" data-validator-match="changePassField" data-validator-state="pass" data-validator-msg="false" />--}}
{{--            </div>--}}
        </div>
{{--        <div class="customer-chat-content-message button-row">--}}
{{--            <a id="customer-chat-operators-change-password" href="#" class="customer-chat-content-button customer-chat-content-button-inline edit-only"><?php echo $app->trans('change.pass') ?></a>--}}
{{--            <a id="customer-chat-operators-cancel" href="#" class="customer-chat-content-button customer-chat-content-button-inline pass-only"><?php echo $app->trans('cancel') ?></a>--}}
{{--            <a id="customer-chat-operators-save" href="#" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('save') ?></a>--}}
{{--            <img class="customer-chat-content-loading-icon" src="<?php echo $app->asset('img/loading.gif') ?>" />--}}
{{--        </div>--}}
    </div>


    <script>
        $(document).ready(function(){

            // function sendData(data) {
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
                                // "<option value='' selected='selected'>Select_Department </option>"
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
                console.log(data);
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
                            $("#messages").append(
                                "<div class='customer-chat-tabs-header'>"+
                                // "<div class='alert alert-warning alert-dismissible fade show' role='alert'>"+
                                "<strong>" + response.message + "</strong>" +
                                // "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close></button>" +
                                // "</div>"+
                                "</div>"
                            );
                            setTimeout(function () {
                                window.location = "settings";
                            }, 3000);

                        }
                    },
                    error: function (error) {
                        $('#intro').hide();
                        $('#button').hide();
                        if (error.status == 401) {
                            console.log(error.responseJSON);
                            $("#messages").append(
                                "<div class='customer-chat-tabs-header'>"+
                                "<ul>"+
                                "<li>"+  error.responseJSON.message + "</li>"+
                                "</ul>"+
                                "</div>"
                            );
                        }
                        let messages = error.responseJSON.errors;
                        $.each(messages, function (key, val) {
                            $("#messages").append(
                                "<div class='customer-chat-tabs-header'>"+
                                "<ul>"+
                                "<li>"+  val + "</li>"+
                                "</ul>"+
                                "</div>"
                            );
                        });
                    },
                });
            }
        });
    </script>



@endsection