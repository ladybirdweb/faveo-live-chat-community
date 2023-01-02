@extends('admin-layouts.app')
@section('content')

    <div class="customer-chat-content-wrapper">
        <div style="font-size: 16px;margin-right: 10px;color: #333;">
            <div class="customer-chat-tabs">
                <a href="#" class="customer-chat-tab customer-chat-tab-prev"><i class="icon-chevron-left"></i></a>
                <div class="customer-chat-tabs-wrapper">
                    <a data-tag="operators" id="operators" href="#" class="customer-chat-tab customer-chat-tab-button operators"><i class="fa fa-user"></i> <span> {{__('lang.Operators')}}</span></a>
                    <a data-tag="departments" id ="departments" href="#" class="customer-chat-tab customer-chat-tab-button departments"><i class="fa fa-cubes"></i> {{__('lang.Departments')}}</a>
                </div>
                <a href="#" class="customer-chat-tab customer-chat-tab-next"><i class="icon-chevron-right"></i></a>
            </div>
        </div>

        <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-operators customer-chat-tab-content-operators-list" id="customer-chat-operators-list">

            {{------------------------------------- Operators --------------------------------------------------------------}}

            <div class="customer-chat-content-message" id = "addOperator">
                <div class="row">
                    <div class="col-1" style="font-size: 18px; margin-right: 0px;">{{__('lang.Operators')}}</div>
                    <div class="col-2"> <a id="" href="addAgents" class=""><button class="btn btn-sm btn-success">{{__('lang.Add_new')}}</button></a> </div>
                </div>

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

            {{------------------------------------- Departments --------------------------------------------------------------}}

            <div class="customer-chat-content-message" id = "addDepartment">
                <div class="row">
                    <div class="col-1" style="font-size: 18px; margin-right: 24px;">{{__('lang.Departments')}}</div>
                    <div class="col-2"> <a id="" href="addDepartments" class=""><button class="btn btn-sm btn-success">{{__('lang.Add_new')}}</button></a> </div>
                </div>

                <div id ="list2"></div>
                <table  id ="rows" class="table table-bordered table-hover text-center">
                    <thead>
                    <tr class="table-success">
                        <td>{{__('lang.Department_Name')}}</td>
                        <td>{{__('lang.Description')}}</td>
                        <td>{{__('lang.Operations')}}</td>
                    </tr>
                    </thead>
                </table>
            </div>

        </div>
    </div>



    <script>
        $(document).ready(function() {
            $("#addDepartment").hide();
            $("#addOperator").hide();
            // $("#addOperator").show();
            // $("#addDepartment").show();

            $("#operators").click(function() {
                $("#addOperator").show();
                $("#addDepartment").hide();
            });
            $("#departments").click(function() {
                $("#addOperator").hide();
                $("#addDepartment").show();
            });
        });
    </script>

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

            $('#agentrows').DataTable({
                ajax: {
                    url: 'show-agent-list',
                    dataSrc: "data"
                },
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

    <script>
        $(document).ready(function () {
            $.noConflict();

            $('#rows').DataTable({
                ajax: {
                    url: 'show-department-list',
                    dataSrc: "data"
                },
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