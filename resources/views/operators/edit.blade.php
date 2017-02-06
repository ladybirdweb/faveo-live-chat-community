<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Faveo Chat</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @include('style')
    <style>
    .error{
      border: 1px solid #ff0000;
    }
    .icon-error{
      color: #ff0000 !important;
    }
    .error-div{
      padding-left: 2px;
      color: #ff0000 !important;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        @include('header')
        <!-- Left side column. contains the logo and sidebar -->
        @include('nav-menu')


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <h3>Agents </h3>

                <ol class="breadcrumb breadcrumb-custom">
                    <li class="text"> You are here :</li>
                    <li><a href="{{ URL::route('/') }}">Admin</a></li>
                    <li class="text"><a href="{{ URL::route('/operators') }}">Agents</a></li>
                    <li class="text">Edit</li>
                </ol>
            </section>
            <section class="content">

                <!-- open a form -->
                <form action="{{URL::route('/operators/edit')}}" method="post" class="faveo_agent_edit">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <input type="hidden" name="id" value="{{ $user->uniq_id }}">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit an Agent</h3>  
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <!-- username -->
                                <div class="col-xs-4 form-group ">
                                    <label for="user_name">User Name</label> <span class="text-red"> *</span>
                                    <input class="form-control user_name" name="user_name" type="text" id="user_name" value="{{$other->username}}">
                                    <div class="user_error"></div>
                                </div>
                                <!-- firstname -->
                                <div class="col-xs-4 form-group ">
                                    <label for="first_name">First Name</label> <span class="text-red"> *</span>
                                    <input class="form-control first_name" name="first_name" type="text" id="first_name" value="{{$user->first_name}}">
                                </div>
                                <!-- lastname -->
                                <div class="col-xs-4 form-group ">
                                    <label for="last_name">Last Name</label> <span class="text-red"> *</span>
                                    <input class="form-control last_name" name="last_name" type="text" id="last_name" value="{{$user->last_name}}">
                                </div>
                            </div>
                            <div class="row">
                                <!-- email address -->
                                <div class="col-xs-4 form-group ">
                                    <label for="email">Email Address</label> <span class="text-red"> *</span>
                                    <input class="form-control email" name="email" type="email" id="email" value="{{$other->email}}">
                                    <div class="email_error"></div>
                                </div>
                                <!--country code-->
                                <div class="col-xs-1 form-group ">
                                    <label for="country_code">Code</label>
                                    <input class="form-control country_code" value="91" title="Enter your country&#039;s phone code" name="country_code" type="text" id="country_code" value="{{$user->country_code}}">
                                </div>
                                <!-- mobile -->
                                <div class="col-xs-3 form-group ">
                                    <label for="mobile">Mobile Number</label>
                                    <input class="form-control mobile" name="mobile" type="text" id="mobile" value="{{$user->mobile}}">
                                    <div class="mobile_error"></div>
                                </div>
                                <!-- password -->
                                <div class="col-xs-4 form-group ">
                                    <label for="password">Password</label>
                                    <input class="form-control" name="password" type="text" value="{{$user->password}}" readonly="">            
                                </div>
                            </div>
                            <div>
                                <h4>Agent Signature</h4>
                            </div>
                            <div class="">
                                <textarea class="form-control agent_sign" id="agent_sign" name="agent_sign" cols="30" rows="5">{{$user->agent_signature}}</textarea>
                            </div>
                            <div>
                                <h4>Account Status &amp; Setting</h4>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <!-- acccount type -->
                                    <div class="form-group ">
                                        <label for="active">Status</label>
                                        <div class="row">
                                            @if($other->status == 1)
                                            <div class="col-xs-3">
                                                <input checked="checked" name="active" type="radio" value="1" id="active"> Active
                                            </div>
                                            <div class="col-xs-3">
                                                <input name="active" type="radio" value="0" id="active"> Inactive
                                            </div>
                                            @else
                                            <div class="col-xs-3">
                                                <input name="active" type="radio" value="1" id="active"> Active
                                            </div>
                                            <div class="col-xs-3">
                                                <input checked="checked" name="active" type="radio" value="0" id="active"> Inactive
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Role -->
                                    <div class="form-group ">
                                        <label for="role">Role</label>
                                        <div class="row">
                                            @if($other->status == 'admin')
                                            <div class="col-xs-3">
                                                <input checked="checked" name="role" type="radio" value="admin" id="role"> Admin
                                            </div>
                                            <div class="col-xs-3">
                                                <input name="role" type="radio" value="agent" id="role"> Agent
                                            </div>
                                            @else
                                            <div class="col-xs-3">
                                                <input name="role" type="radio" value="admin" id="role"> Admin
                                            </div>
                                            <div class="col-xs-3">
                                                <input checked="checked" name="role" type="radio" value="agent" id="role"> Agent
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                </div>
                            </div>
                            <!-- Send email to user about registration password -->
                            <br/>
                        </div>
                        <input type="hidden" id="url" value="{{URL::route('/operators')}}">
                        <div class="box-footer">
                            <input class="form-group btn btn-primary button" type="submit" value="Submit">
                        </div>
                    </div>
                </form>
            </section><!-- /.content -->
        </div>
        @include('footer')
        @include('script')
        <script src="{{ asset('asset/js/script/agent.js') }}"></script>
    </body>
    </html>
