<?php

namespace App\Http\Controllers;

use App\Http\Requests\departmentRequest;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function updateOrCreate(departmentRequest $request)
    {
        try{
            Department::updateOrCreate(['id' => $request->id], [
                'name' => $request->name,
                'description' => $request->description
            ]);
            return successResponse(trans('lang.Department_saved'),'');
        }catch(\Exception $ex){
            return errorResponse($ex->getMessage());
        }
    }

    public function get_editDepartment($id)
    {
        try{
        $data = Department::find($id);
        if (empty($data))
        {
            return errorResponse(trans('lang.Invalid_ID'));
        }
        return successResponse('',$data);
        }catch(\Exception $ex){
            return errorResponse($ex->getMessage());
        }
    }

    public function showList()
    {
        try{
            $data = Department::all();
            return successResponse('',$data);
        }catch(\Exception $ex){
            return errorResponse($ex->getMessage());
        }
    }

    public function deleteDepartment($id)
    {
        try{
        $department = Department::find($id);
        $department->delete();
            return successResponse(trans('lang.Department_deleted'),'');
        }catch(\Exception $ex){
            return errorResponse($ex->getMessage());
        }
    }
}
