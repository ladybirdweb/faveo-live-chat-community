<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentRequest;
use App\Models\User;
use App\Models\UserDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function createUser(AgentRequest $request)
    {
        try{
//            dd($request->all());
            if ($request->password != $request->confirmpassword)
            {
                return errorResponse(trans('lang.Error_Password_Intro'));
            }
            $user = User::updateOrCreate([
                'name' => $request->username,
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'agent',
//                'confirmpassword' => $request->confirmpassword,
//                'departments' => $request->departments  (id)
            ]);
//            dd($user);
            $userDepartment = UserDepartment::updateOrCreate(['id' => $request->id],
                [
                    'user_id' => $user->id,
                    'department_id' => $request->departments,
                ]);

//            dd($userDepartment);

//            if ($request->password == $request->confirmpassword) {
//                $id = $user->id;
//                $data = User::find($id);
//                $data->password = Hash::make($request->password);
//                $data->save();
//                return successResponse(trans('lang.Agent_saved'),'');
//            }
            return successResponse(trans('lang.Agent_saved'),'');

        }catch(\Exception $ex){
            return errorResponse($ex->getMessage());
        }
    }

    public function updateUser(Request $request)
    {
        try{
//            dd($request->all());
            $user = User::where ('id', $request->id)->update(['name'=> $request->username]);
            UserDepartment::updateOrCreate(['user_id'=>$request->id],['department_id'=> $request->department_name]);
//            $assignDepartment =  UserDepartment::where('user_id', $request->id)->get();
//            if($assignDepartment)
//            {
//                $assignDepartment->department_id = $request->department_name;
//            }
//            else{
//                $department = new UserDepartment;
//                $department->user_id = $request->id;
//                $department->depaartment_id = $request->department_name;
//            }
            return successResponse(trans('lang.Agent_saved'),'');

        }catch(\Exception $ex){
        return errorResponse($ex->getMessage());
}
    }

    public function showUserList()
    {
        try{
//        if($req->search)
//        {
//            $data = User::where('name','LIKE',"%$req->search%")->get();
//            $data = User::all();
            $data = User::with('departments')->where('role','agent')->get()->toArray();
//            dd($data);
            return successResponse('',$data);
//        }
//        return successResponse('',$data);
        }catch(\Exception $ex){
            return errorResponse($ex->getMessage());
        }
    }

    public function get_editUser($id)
    {
        try{
//            $data = User::find($id);
//            $data = User::find($id)->with('departments')->get()->toArray();
            $data = User::where('id', $id)->with('departments')->get()->toArray();

            if (empty($data))
            {
                return errorResponse(trans('lang.Invalid_ID'));
            }
//        return view('editdepartment', ["departments"=>$data]);
            return successResponse('',$data);

        }catch(\Exception $ex){
            return errorResponse($ex->getMessage());
        }
    }

    public function deleteUser($id)
    {
        try{
            $user = User::find($id);
            $user->delete();
            return successResponse(trans('lang.User_deleted'),'');
        }catch(\Exception $ex){
            return errorResponse($ex->getMessage());
        }
    }
}
