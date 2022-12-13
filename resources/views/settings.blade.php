@extends('admin_layouts.app')
@section('content')


{{--<div class="customer-chat-content">--}}
    <div class="customer-chat-content-wrapper">

{{--        <div id="customer-chat-admin-chat"></div>--}}

{{--        <div id="customer-chat-admin-map">--}}
{{--            <div class="map-wrapper"></div>--}}
{{--            <div class="no-key-info">--}}
{{--                <p> {{__('lang.map_no_api_key_info')}} </p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div id="customer-chat-admin-settings">--}}
        <div style="font-size: 16px;margin-right: 10px;color: #333;">
{{--            <h1>helooo</h1>--}}
{{--            <h1>helooo</h1>--}}
{{--            <h1>helooo</h1>--}}
{{--            <h1>helooo</h1>--}}
{{--            <h1>helooo</h1>--}}
{{--            <h1>helooo</h1>--}}

{{--            <!-- Tabs -->--}}

            <div class="customer-chat-tabs">
                <a href="#" class="customer-chat-tab customer-chat-tab-prev"><i class="icon-chevron-left"></i></a>
                <div class="customer-chat-tabs-wrapper">
                    <a data-tag="operators" id="operators" href="#" class="customer-chat-tab customer-chat-tab-button operators"><i class="fa fa-user"></i> <span> {{__('lang.Operators')}}</span></a>
                    <a data-tag="departments" id ="departments" href="#" class="customer-chat-tab customer-chat-tab-button departments"><i class="fa fa-cubes"></i> {{__('lang.Departments')}}</a>
                    <a data-tag="canned-messages" id = "canned" href="#" class="customer-chat-tab customer-chat-tab-button canned-messages"><i class="fa fa-comments"></i> {{__('lang.Canned_Messages')}}</a>
{{--                    <a data-tag="history" href="#" class="customer-chat-tab customer-chat-tab-button"><i class="fa fa-search"></i>  {{__('lang.History')}}</a>--}}
{{--                    <a data-tag="widget-theme" href="#" class="customer-chat-tab customer-chat-tab-button widget-theme"><i class="fa fa-eyedropper"></i>  {{__('lang.Widget_Settings')}}</a>--}}
{{--                    <a data-tag="blacklist" href="#" class="customer-chat-tab customer-chat-tab-button"><i class="fa fa-ban"></i> {{__('lang.Widget_Blacklist') }}</a>--}}
                    <a data-tag="settings" id = "settings" href="#" class="customer-chat-tab customer-chat-tab-button customer-chat-active"><i class="fa fa-wrench"></i> {{__('lang.Settings')}}</a>
                </div>
                <a href="#" class="customer-chat-tab customer-chat-tab-next"><i class="icon-chevron-right"></i></a>
            </div>

{{--            <!-- Tabs contents -->--}}

            <div data-tag="operators" id="customer-chat-operators-tab" class="customer-chat-tab-content"></div>
            <div data-tag="departments" id="customer-chat-departments-tab" class="customer-chat-tab-content"></div>
            <div data-tag="canned-messages" id="customer-chat-canned-messages-tab" class="customer-chat-tab-content"></div>
{{--            <div data-tag="history" id="customer-chat-history" class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-history"></div>--}}
{{--            <div data-tag="widget-theme" id="customer-chat-widget-theme-tab" class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-settings-ui customer-chat-tab-content-widget-theme"></div>--}}
{{--            <div data-tag="blacklist" id="customer-chat-pages-list" class="customer-chat-tab-content customer-chat-tab-content-pages-list"></div>--}}
            <div data-tag="settings" class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-settings-ui"></div>

        </div>

        {{-------------------------------------Add operator button--------------------------------------------------------------}}
        <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-operators customer-chat-tab-content-operators-list" id="customer-chat-operators-list">
            <div class="customer-chat-content-message" id = "addOperator">
                <div class="row">
                    <div class="col-1" style="font-size: 18px; margin-right: 0px;">{{__('lang.Operators')}}</div>
                    <div class="col-2"> <a id="" href="addOperators" class=""><button class="btn btn-sm btn-success">{{__('lang.Add_new')}}</button></a> </div>

                    </div>
            </div>
{{--        </div>--}}

{{--        <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-operators customer-chat-tab-content-operators-list" id="customer-chat-operators-list">--}}
            <div class="customer-chat-content-message" id = "addDepartment">
                <div class="row">
                    <div class="col-1" style="font-size: 18px; margin-right: 24px;">{{__('lang.Departments')}}</div>
                    <div class="col-2"> <a id="" href="addDepartments" class=""><button class="btn btn-sm btn-success">{{__('lang.Add_new')}}</button></a> </div>
                </div>
            </div>
{{--        </div>--}}

{{--        <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-operators customer-chat-tab-content-operators-list" id="customer-chat-operators-list">--}}
            <div class="customer-chat-content-message" id = "addCannedMessages">
                <div class="row">
                    <div class="col-2" style="font-size: 18px; margin-right: 44px;">{{__('lang.Canned_Messages')}}</div>
                    <div class="col-2"> <a id="" href="cannedMessages" class=""><button class="btn btn-sm btn-success">{{__('lang.Add_new')}}</button></a> </div>
                </div>
            </div>
{{--        </div>--}}

{{--        <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-operators customer-chat-tab-content-operators-list" id="customer-chat-operators-list">--}}
            <div class="customer-chat-content-message" id = "addSettings">
                <div class="row">
                   <div class="col-2"> <a id="" href="systemSettings" class=""><button class="btn btn-sm btn-success">{{__('lang.Settings')}}</button></a> </div>
                </div>
            </div>


            <div class="container">
                <h2 class="text-center" style="padding-top:14px;">{{__('lang.Departments_List')}}</h2>
                <form method="get" action='settings'>
                    <div class="form-floating" style="text-align: right!important;">
                        <input type="text" name='search'>
                        <button type='submit'> <i class="fas fa-search fa-fw"></i> </button>
                    </div>
                </form>
            </div>

            <div class="container col-lg-11">
                <table class="table table-bordered table-hover text-center">
                    <tr class="table-success">
                        <td>{{__('lang.ID')}}</td>
                        <td>{{__('lang.Department_Name')}}</td>
                        <td>{{__('lang.Description')}}</td>
                        <td>{{__('lang.Operations')}}</td>
                    </tr>
                                    @foreach($departments as $department)
                                        <tr>
                                            <td> {{$department['id']}} </td>
                                            <td> {{$department['name']}} </td>
                                            <td> {{$department['description']}} </td>
                                            <td>
                                                <a href="edit/{{$department['id']}}" > <button type="button" class="btn btn-primary mb-3"> <i class="fas fa-edit"></i> </button> </a>
                                                <a href="deleteDepartment/{{$department['id']}}" > <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger mb-3"> <i class="fas fa-trash"></i> </button> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                </table>
            </div>


        </div>

{{--        <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-operators customer-chat-tab-content-operators-list" id="customer-chat-operators-list">--}}
{{--            <div class="customer-chat-content-message" id = "addOperator">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-1" style="font-size: 18px; margin-right: -44px;">{{__('lang.Departments')}}</div>--}}
{{--                    <div class="col-2"> <a id="" href="addDepartments" class=""><button class="btn btn-sm btn-success">{{__('lang.Add_new')}}</button></a> </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div id="customer-chat-admin-qr"></div>
        <div id="customer-chat-admin-logs"></div>

{{--    </div>--}}
</div>
    <script>
        $(document).ready(function() {
            $("#addDepartment").hide();
            $("#addCannedMessages").hide();
            $("#addSettings").hide();
            // $("#addOperators").hide();
            $("#operators").click(function() {
                console.log('button clicked');
                $("#addOperator").show();
                $("#addDepartment").hide();
                $("#addCannedMessages").hide();
                $("#addSettings").hide();
            });
            $("#departments").click(function() {
                console.log('button clicked');
                $("#addOperator").hide();
                $("#addDepartment").show();
                $("#addCannedMessages").hide();
                $("#addSettings").hide();
            });
            $("#canned").click(function() {
                console.log('button clicked');
                $("#addOperator").hide();
                $("#addDepartment").hide();
                $("#addCannedMessages").show();
                $("#addSettings").hide();
            });
            $("#settings").click(function() {
                console.log('button clicked');
                $("#addOperator").hide();
                $("#addDepartment").hide();
                $("#addCannedMessages").hide();
                $("#addSettings").show();
            });
        });
    </script>


@endsection