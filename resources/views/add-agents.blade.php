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
                <div class="customer-chat-label">{{__('lang.Username')}}</div>
                <input type="text" id="usernameField" class="customer-chat-content-message-input-field" data-validator="notEmpty" data-validator-label="Username" data-validator-state-ex="pass" />
            </div>
            <div class="customer-chat-content-row add-only edit-only">
                <div class="customer-chat-label">{{__('lang.Email')}}</div>
                <input type="text" id="mailField" class="customer-chat-content-message-input-field" data-validator="mail" data-validator-label="E-mail" data-validator-state-ex="pass" />
            </div>
            <div class="customer-chat-content-row add-only">
                <div class="customer-chat-label">{{__('lang.Password')}}</div>
                <input type="password" id="passField" class="customer-chat-content-message-input-field" data-validator="password" data-validator-match="rePassField" data-validator-state="add" data-validator-label="Password" />
            </div>
            <div class="customer-chat-content-row add-only">
                <div class="customer-chat-label">{{__('lang.Confirm_Password')}}</div>
                <input type="password" id="rePassField" class="customer-chat-content-message-input-field" data-validator="password" data-validator-match="passField" data-validator-state="add" data-validator-msg="false" />
            </div>

            <div class="customer-chat-content-row select-list-row add-only edit-only">
                <div class="customer-chat-label">{{__('lang.Departments')}}</div>
                <select name="defaultLanguage" class="customer-chat-content-message-input-field">
                    <option value="en" selected="selected">en</option>
                    <option value="pl">pl</option>
                </select>
{{--                <button type="submit" class="btn btn-sm" style="background: linear-gradient(to right, #36a9e1, #36a9e1);padding-bottom: 2px;padding-top: 2px;font-size: x-large;">{{__('lang.Submit')}}</button>--}}
                <div class="select-list"></div>
            </div>

            <div class="customer-chat-content-message button-row">
                <a id="customer-chat-operators-save" href="#" class="customer-chat-content-button customer-chat-content-button-inline">{{__('lang.Submit')}}</a>
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

@endsection