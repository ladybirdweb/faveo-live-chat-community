@extends('admin-layouts.app')
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
{{--                    <a data-tag="canned-messages" id = "canned" href="#" class="customer-chat-tab customer-chat-tab-button canned-messages"><i class="fa fa-comments"></i> {{__('lang.Canned_Messages')}}</a>--}}
{{--                    <a data-tag="history" href="#" class="customer-chat-tab customer-chat-tab-button"><i class="fa fa-search"></i>  {{__('lang.History')}}</a>--}}
{{--                    <a data-tag="widget-theme" href="#" class="customer-chat-tab customer-chat-tab-button widget-theme"><i class="fa fa-eyedropper"></i>  {{__('lang.Widget_Settings')}}</a>--}}
{{--                    <a data-tag="blacklist" href="#" class="customer-chat-tab customer-chat-tab-button"><i class="fa fa-ban"></i> {{__('lang.Widget_Blacklist') }}</a>--}}
{{--                    <a data-tag="settings" id = "settings" href="#" class="customer-chat-tab customer-chat-tab-button customer-chat-active"><i class="fa fa-wrench"></i> {{__('lang.Settings')}}</a>--}}
                </div>
                <a href="#" class="customer-chat-tab customer-chat-tab-next"><i class="icon-chevron-right"></i></a>
            </div>

{{--            <!-- Tabs contents -->--}}

            <div data-tag="operators" id="customer-chat-operators-tab" class="customer-chat-tab-content"></div>
            <div data-tag="departments" id="customer-chat-departments-tab" class="customer-chat-tab-content"></div>
{{--            <div data-tag="canned-messages" id="customer-chat-canned-messages-tab" class="customer-chat-tab-content"></div>--}}
{{--            <div data-tag="history" id="customer-chat-history" class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-history"></div>--}}
{{--            <div data-tag="widget-theme" id="customer-chat-widget-theme-tab" class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-settings-ui customer-chat-tab-content-widget-theme"></div>--}}
{{--            <div data-tag="blacklist" id="customer-chat-pages-list" class="customer-chat-tab-content customer-chat-tab-content-pages-list"></div>--}}
{{--            <div data-tag="settings" class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-settings-ui"></div>--}}

        </div>

        {{-------------------------------------Add operator button--------------------------------------------------------------}}
        <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-operators customer-chat-tab-content-operators-list" id="customer-chat-operators-list">
            <div class="customer-chat-content-message" id = "addOperator">
                <div class="row">
                    <div class="col-1" style="font-size: 18px; margin-right: 0px;">{{__('lang.Operators')}}</div>
                    <div class="col-2"> <a id="" href="addAgents" class=""><button class="btn btn-sm btn-success">{{__('lang.Add_new')}}</button></a> </div>
                </div>

                <div id="agentlist" class="container col-lg-11">
                    <div id ="agentlist2"></div>
                    <table  id ="agentrows" class="table table-bordered table-hover text-center">
                        <thead>
                        <tr class="table-success">
                            <td>{{__('lang.Agent_Name')}}</td>
                            <td>{{__('lang.Email')}}</td>
                            <td>{{__('lang.Department_Name')}}</td>
                            <td>{{__('lang.Operations')}}</td>
                        </tr>
                        </thead>
                    </table>
                </div>

            </div>
{{--        </div>--}}

{{--        <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-operators customer-chat-tab-content-operators-list" id="customer-chat-operators-list">--}}
            <div class="customer-chat-content-message" id = "addDepartment">
                <div class="row">
                    <div class="col-1" style="font-size: 18px; margin-right: 24px;">{{__('lang.Departments')}}</div>
                    <div class="col-2"> <a id="" href="addDepartments" class=""><button class="btn btn-sm btn-success">{{__('lang.Add_new')}}</button></a> </div>
                </div>

                <div id="list" class="container col-lg-11">
                    <div id ="list2"></div>
                    <table  id ="rows" class="table table-bordered table-hover text-center">
                        <thead>
                        <tr class="table-success">
{{--                            <td>{{__('lang.ID')}}</td>--}}
                            <td>{{__('lang.Department_Name')}}</td>
                            <td>{{__('lang.Description')}}</td>
                            <td>{{__('lang.Operations')}}</td>
                        </tr>
                        </thead>
                        {{--                                    @foreach($departments as $department)--}}
                        {{--                                        <tr>--}}
                        {{--                                            <td> {{$department['id']}} </td>--}}
                        {{--                                            <td> {{$department['name']}} </td>--}}
                        {{--                                            <td> {{$department['description']}} </td>--}}
                        {{--                                            <td>--}}
                        {{--                                                <a href="edit/{{$department['id']}}" > <button type="button" class="btn btn-primary mb-3"> <i class="fas fa-edit"></i> </button> </a>--}}
                        {{--                                                <a href="deleteDepartment/{{$department['id']}}" > <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger mb-3"> <i class="fas fa-trash"></i> </button> </a>--}}
                        {{--                                            </td>--}}
                        {{--                                        </tr>--}}
                        {{--                                    @endforeach--}}
                    </table>
                </div>
            </div>
{{--        </div>--}}

{{--        <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-operators customer-chat-tab-content-operators-list" id="customer-chat-operators-list">--}}
{{--            <div class="customer-chat-content-message" id = "addCannedMessages">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-2" style="font-size: 18px; margin-right: 44px;">{{__('lang.Canned_Messages')}}</div>--}}
{{--                    <div class="col-2"> <a id="" href="cannedMessages" class=""><button class="btn btn-sm btn-success">{{__('lang.Add_new')}}</button></a> </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-operators customer-chat-tab-content-operators-list" id="customer-chat-operators-list">--}}
{{--            <div class="customer-chat-content-message" id = "addSettings">--}}
{{--                <div class="row">--}}
{{--                   <div class="col-2"> <a id="" href="systemSettings" class=""><button class="btn btn-sm btn-success">{{__('lang.Settings')}}</button></a> </div>--}}
{{--                </div>--}}
{{--            </div>--}}
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
            // $("#addOperator").hide();
            // $("#addCannedMessages").hide();
            // $("#addSettings").hide();
            // $("#addAgents").hide();
            $("#operators").click(function() {
                // console.log('button clicked');
                $("#addOperator").show();
                $("#addDepartment").hide();
                // $("#addCannedMessages").hide();
                // $("#addSettings").hide();
            });
            $("#departments").click(function() {
                // console.log('button clicked');
                $("#addOperator").hide();
                $("#addDepartment").show();
                // $("#addCannedMessages").hide();
                // $("#addSettings").hide();
            });
            // $("#canned").click(function() {
            //     console.log('button clicked');
            //     $("#addOperator").hide();
            //     $("#addDepartment").hide();
            //     $("#addCannedMessages").show();
            //     $("#addSettings").hide();
            // });
            // $("#settings").click(function() {
            //     console.log('button clicked');
            //     $("#addOperator").hide();
            //     $("#addDepartment").hide();
            //     $("#addCannedMessages").hide();
            //     $("#addSettings").show();
            // });
        });
    </script>


{{--    <script>--}}
{{--        $(document).ready(function(){--}}

{{--            // function sendData(data) {--}}
{{--                $.ajaxSetup({--}}
{{--                    headers: {--}}
{{--                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),--}}
{{--                        'Accept' : 'application/json',--}}
{{--                        'Authorization' : 'Bearer '.$accessToken,--}}
{{--                    }--}}
{{--                });--}}

{{--                $.ajax({--}}
{{--                    url: 'show-department-list',--}}
{{--                    type: 'get',--}}
{{--                    dataType: 'JSON',--}}
{{--                    success: function (response) {--}}
{{--                        if (response['success'] == true) {--}}
{{--                            $.each(response.data, function (key, value) {--}}
{{--                                $("#rows").append(--}}
{{--                                    "<tr>"+--}}
{{--                                    // " <td>" + value.id + "</td>" +--}}
{{--                                    "<td>" + value.name + "</td>" +--}}
{{--                                    "<td>" + value.description + "</td>" +--}}
{{--                                    "<td>" +--}}
{{--                                    "<button type='button' id = 'edit' data-id = '"+ value.id +"'class='btn btn-primary mb-3'> <i class='fas fa-edit'></i> </button>" +--}}
{{--                                    "<button type='submit' id = 'delete' data-id = '"+ value.id +"'class='btn btn-danger mb-3'> <i class='fas fa-trash'></i> </button>" +--}}
{{--                                    "</td>"+--}}
{{--                                    "</tr>"--}}
{{--                                );--}}
{{--                            });--}}
{{--                        }--}}
{{--                    }--}}
{{--                });--}}
{{--            // }--}}
{{--            // $(document).on('click','#save',function() {--}}
{{--            //--}}
{{--            //     let data = {--}}
{{--            //         'search': $("#search").val(),--}}
{{--            //     }--}}
{{--            //     sendData(data);--}}
{{--            // });--}}


{{--        });--}}
{{--    </script>--}}

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>--}}
{{--<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>--}}
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
{{--<script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.3.1/js/dataTables.rowReorder.min.js"></script>--}}

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
{{--<script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.3.1/js/dataTables.rowReorder.min.js"></script>--}}

<script>
    $(document).ready(function () {
        $.noConflict();

        $('#rows').DataTable({
            ajax: {
                url: 'show-department-list',
                dataSrc: "data"
            },
            // data: this.res,
            columns: [
                { data: 'name' },
                { data: 'description' },
                {
                    data:null,
                    mRender: function (data) { return '<button type="button" id = "edit" data-id = '+ data.id +'class="btn btn-primary mb-3"> <i class="fas fa-edit"></i></button> <button type="submit" id = "delete" data-id = '+ data.id +'class="btn btn-danger mb-3"> <i class="fas fa-trash"></i> </button>'
                        ; }}
            ],
            "pageLength": 8
        });
    });
</script>
<script>
    $(document).ready(function () {
        $.noConflict();

        $('#agentrows').DataTable({
            ajax: {
                url: 'show-agent-list',
                dataSrc: "data"
            },
            // data: this.res,
            columns: [
                { data: 'name' },
                { data: 'email' },
                { data: 'departments[0].name' },
                {
                    data:null,
                    mRender: function (data) { return '<button type="button" id = "editUser" data-id = '+ data.id +'class="btn btn-primary mb-3"> <i class="fas fa-edit"></i></button> <button type="submit" id = "deleteUser" data-id = '+ data.id +'class="btn btn-danger mb-3"> <i class="fas fa-trash"></i> </button>'
                    ; }}
            ],
            "pageLength": 8
        });
    });
</script>




{{--<script>--}}
{{--    $(document).ready(function(){--}}

{{--        // function sendData(data) {--}}
{{--        $.ajaxSetup({--}}
{{--            headers: {--}}
{{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),--}}
{{--                'Accept' : 'application/json',--}}
{{--                'Authorization' : 'Bearer '.$accessToken,--}}
{{--            }--}}
{{--        });--}}

{{--        $.ajax({--}}
{{--            url: 'show-agent-list',--}}
{{--            type: 'get',--}}
{{--            dataType: 'JSON',--}}
{{--            success: function (response) {--}}
{{--                if (response['success'] == true) {--}}
{{--                    $.each(response.data, function (key, value) {--}}
{{--                        // console.log(value.department[0].name);--}}
{{--                        // console.log(value.departments.length);--}}
{{--                        let department = "---";--}}
{{--                        if (value.departments.length != 0) {--}}
{{--                            department = value.departments[0].name;--}}
{{--                        }--}}
{{--                        $("#agentrows").append(--}}
{{--                            "<tr>"+--}}
{{--                            "<td>" + value.name + "</td>" +--}}
{{--                            " <td>" + value.email + "</td>" +--}}
{{--                            "<td>" + department + "</td>" +--}}
{{--                            "<td>" +--}}
{{--                            "<button type='button' id = 'editUser' data-id = '"+ value.id +"'class='btn btn-primary mb-3'> <i class='fas fa-edit'></i> </button>" +--}}
{{--                            "<button type='submit' id = 'deleteUser' data-id = '"+ value.id +"'class='btn btn-danger mb-3'> <i class='fas fa-trash'></i> </button>" +--}}
{{--                            "</td>"+--}}
{{--                            "</tr>"--}}
{{--                        );--}}
{{--                    });--}}
{{--                }--}}
{{--            }--}}
{{--        });--}}

{{--    });--}}
{{--</script>--}}


    <script>
        $(document).ready(function() {
            $(document).on('click','#edit',function() {
                var id = $(this).attr("data-id");
                localStorage.setItem('id',id);
                window.location.replace('/edit');
            });

            $(document).on("click","#delete",function ()
            {
                if(confirm('Are you sure you want to delete this department')) {
                    var id = $(this).attr("data-id");
                    // var obj = $(this)
                    $.ajax({
                        type: "GET",
                        url: "deleteDepartment/" + id,
                        success: function (response) {
                            console.log(response);
                            $("#list2").append(
                                " <div class='alert alert-success' role='alert'>" +
                                response.message +
                                " </div>"
                            )
                            setTimeout(function () {
                                window.location.replace('/settings');
                            }, 3000);

                        },
                        error: function (err) {

                        },
                    });
                }

            });

        });
    </script>


{{--<script>--}}
{{--    $(document).ready(function() {--}}
{{--        $(document).on('click','#editUser',function() {--}}
{{--            var id = $(this).attr("data-id");--}}
{{--            console.log(id);--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}

<script>
    $(document).ready(function() {
        $(document).on('click','#editUser',function() {
            var id = $(this).attr("data-id");
            localStorage.setItem('id',id);
            window.location.replace('/editUser');
        });

        $(document).on("click","#deleteUser",function ()
        {
            if(confirm('Are you sure you want to delete this department')) {
                var id = $(this).attr("data-id");
                // var obj = $(this)
                $.ajax({
                    type: "GET",
                    url: "deleteUser/" + id,
                    success: function (response) {
                        console.log(response);
                        $("#agentlist2").append(
                            " <div class='alert alert-success' role='alert'>" +
                            response.message +
                            " </div>"
                        )
                        setTimeout(function () {
                            window.location.replace('/settings');
                        }, 3000);

                    },
                    error: function (err) {

                    },
                });
            }

        });

    });
</script>

@endsection