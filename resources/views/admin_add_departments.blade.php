@extends('admin_layouts.app')
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
        <div class="customer-chat-tabs-header">{{__('lang.Add_new_department')}}</div>
        <a id="customer-chat-operators-back" href="settings" class="customer-chat-content-button customer-chat-content-button-inline">{{__('lang.Back')}}</a>
    </div>
xyz
    <form action ="addDepartment" method ="post" >
        @csrf
    <div class="customer-chat-content-messages edit-operator" style = "margin-left: 67px;margin-top: 65px;">
        <div class="customer-chat-content-row add-only edit-only">
            <div class="customer-chat-label">{{__('lang.Name')}}</div>
            <input type="text" name="name" id="usernameField" class="customer-chat-content-message-input-field" data-validator="notEmpty" data-validator-label="Username" data-validator-state-ex="pass" />
        </div>
        <div class="customer-chat-content-row add-only edit-only">
            <div class="customer-chat-label">{{__('lang.Description')}}</div>
            <input type="text" name="description" id="mailField" class="customer-chat-content-message-input-field" data-validator="mail" data-validator-label="E-mail" data-validator-state-ex="pass" />
        </div>

{{--        <div class="customer-chat-content-row add-only">--}}
{{--             <div class="customer-chat-label">{{__('lang.Operators')}}</div>--}}
{{--            <select name="defaultLanguage" class="customer-chat-content-message-input-field">--}}
{{--                <option value="en" selected="selected">en</option>--}}
{{--                <option value="pl">pl</option>--}}
{{--            </select>--}}
{{--        </div>--}}

        <div class="customer-chat-content-message button-row">
{{--            <a id="customer-chat-operators-save" href="#" class="customer-chat-content-button customer-chat-content-button-inline">{{__('lang.Submit')}}</a>--}}
        <button type="submit" class="btn btn-sm" style="background: linear-gradient(to right, #36a9e1, #36a9e1);padding-bottom: 2px;padding-top: 2px;font-size: x-large;">{{__('lang.Submit')}}</button>
        </div>
    </div>
    </form>
</div>


@endsection