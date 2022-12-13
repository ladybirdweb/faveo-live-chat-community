@extends('admin_layouts.app')
@section('content')

    <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-operators" style="border:2px solid black; margin-top: -8px; margin-left: 55px;" id="customer-chat-operators-edit">

        <div class="customer-chat-content-message" style="margin-top: 55px;margin-left: 69px;">
            <div class="customer-chat-tabs-header">{{__('lang.Edit_Agent')}}</div>
            <a id="customer-chat-operators-back" href="settings" class="customer-chat-content-button customer-chat-content-button-inline">{{__('lang.Back')}}</a>
        </div>
{{--        <form action ="editDepartment" method ="post" >--}}
        <form action ="{{url('editDepartment')}}" method ="post" >
            @csrf
            <div class="customer-chat-content-messages edit-operator" style = "margin-left: 67px;margin-top: 65px;">
                <div class="customer-chat-content-row add-only edit-only">
                    <div class="customer-chat-label">{{__('lang.Department_Name')}}</div>
                    <input type="text"  value="{{$departments->name}}" name="name" id="usernameField" class="customer-chat-content-message-input-field" data-validator="notEmpty" data-validator-label="Username" data-validator-state-ex="pass" />
                </div>
                <div class="customer-chat-content-row add-only edit-only">
                    <div class="customer-chat-label">{{__('lang.Description')}}</div>
                    <input type="text" value="{{$departments->description}}" name="description" id="mailField" class="customer-chat-content-message-input-field" data-validator="mail" data-validator-label="E-mail" data-validator-state-ex="pass" />
                </div>
                <input type="hidden" name ="id" value="{{$departments->id}}">
                <div class="customer-chat-content-message button-row">
{{--                    <a id="customer-chat-operators-save" href="#" class="customer-chat-content-button customer-chat-content-button-inline">{{__('lang.Update_Department')}}</a>--}}
                    <button type="submit" class="btn btn-sm" style="background: linear-gradient(to right, #36a9e1, #36a9e1);padding-bottom: 2px;padding-top: 2px;font-size: x-large;">{{__('lang.Update_Department')}}</button>
                </div>
            </div>
        </form>


    </div>



{{--    <div class="row">--}}
{{--        <div class="container col-lg-12">--}}
{{--            <h3 class="text-center fw-bold mt-3">Edit Agent</h3>--}}
{{--        </div>--}}
{{--        <div class="contaier col-lg-12" style = "height:531px;">--}}
{{--            <div class="container col-lg-4 bg-light" style="margin-top:36px; height:300px;width:594px;">--}}
{{--                <main class="form-signin text-center" style="padding-top:80px;padding-right:55px;padding-left:55px;">--}}
{{--                    <form method="POST" action="editDepartment">--}}
{{--                        @csrf--}}
{{--                        @dd($data);--}}
{{--                        @dd($departments->name);--}}
{{--                        <div class="form-floating">--}}
{{--                            <input type="text" value="{{$departments->name}}" class="form-control" id="floatingInput"  name="name" placeholder="name@example.com" required>--}}
{{--                            <label for="floatingInput">{{__('lang.Department_Name')}}</label>--}}
{{--                        </div>--}}
{{--                        <div class="form-floating">--}}
{{--                            <input type="text" value="{{$departments->description}}" class="form-control" id="floatingInput"  name="name" placeholder="name@example.com" required>--}}
{{--                            <label for="floatingInput">{{__('lang.Description')}}</label>--}}
{{--                        </div>--}}
{{--                        <input type="hidden" name ="id" value="{{$departments->id}}">--}}
{{--                        <a href="https://laravel.com/docs/9.x/passport#main-content"> {{__('lang.Update_Department')}} </a>--}}
{{--                        <button class="w-100 btn btn-primary mt-3" type="submit"><a href="https://laravel.com/docs/9.x/passport#main-content"> {{__('lang.Update_Department')}} </a> </button>--}}
{{--                        <input type ="submit"  class="w-100 btn btn-primary mt-3" name="{{__('lang.Update_Department')}}"></input>--}}

{{--                    </form>--}}
{{--                </main>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


@endsection