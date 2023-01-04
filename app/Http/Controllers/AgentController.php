<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentRequest;
use App\Http\Requests\UpdateAgentRequest;
use App\Models\User;
use App\Models\UserDepartment;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function createUser(AgentRequest $request)
    {
        try{
            if ($request->password != $request->confirmpassword)
            {
                return errorResponse(trans('lang.Error_Password_Intro'));
            }
            $user = User::updateOrCreate([
                'name' => $request->username,
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'agent',
            ]);
            UserDepartment::updateOrCreate(['id' => $request->id],
                [
                    'user_id' => $user->id,
                    'department_id' => $request->departments,
                ]);
            return successResponse(trans('lang.Agent_saved'),'');
        }catch(\Exception $ex){
            return errorResponse($ex->getMessage());
        }
    }

    public function showUserList()
    {
        try{
            $data = User::with('departments')->where('role','agent')->get()->toArray();
            return successResponse('',$data);
        }catch(\Exception $ex){
            return errorResponse($ex->getMessage());
        }
    }

    public function get_editUser($id)
    {
        try{
            $data = User::where('id', $id)->with('departments')->get()->toArray();
            if (empty($data))
            {
                return errorResponse(trans('lang.Invalid_ID'));
            }
            return successResponse('',$data);
        }catch(\Exception $ex){
            return errorResponse($ex->getMessage());
        }
    }

    public function updateUser(UpdateAgentRequest $request)
    {
        try{
            User::where ('id', $request->id)->update(['name'=> $request->username]);
            UserDepartment::updateOrCreate(['user_id'=>$request->id],['department_id'=> $request->department_name]);
            return successResponse(trans('lang.Agent_saved'),'');
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
