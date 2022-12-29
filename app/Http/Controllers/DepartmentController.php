<?php

namespace App\Http\Controllers;

use App\Http\Requests\departmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{

//    public function addDepartment(departmentRequest $req)
//    {
//        $department = new Department;
//        $department->name = $req->name;
//        $department->description = $req->description;
//        $department->save();
////        return successResponse('department saved', $department, 200);
//        return redirect('settings');
//    }
//
//    public function editDepartment(Request $req)
//    {
////        dd($req->all());
//        $department = Department::find($req->id);
//        $department->name = $req->name;
//        $department->description = $req->description;
//        $department->save();
////        dd($department->name);
//        return redirect('settings')->with('success','Department updated Successfully');
//    }

    public function updateOrCreate(departmentRequest $request)
    {
        try{
            Department::updateOrCreate(['id' => $request->id], [
                'name' => $request->name,
                'description' => $request->description
            ]);
//            return redirect('settings')->with('success', 'Department saved successfully');
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
//        return view('editdepartment', ["departments"=>$data]);
        return successResponse('',$data);

        }catch(\Exception $ex){
            return errorResponse($ex->getMessage());
        }
    }

    public function showList()
    {
        try{
//        if($req->search)
//        {
//            $data = Department::where('name','LIKE',"%$req->search%")->get();
            $data = Department::all();

//            return view("settings", ["departments"=>$data]);
            return successResponse('',$data);
//        }
//        return view("settings", ["departments"=>$data]);
        }catch(\Exception $ex){
            return errorResponse($ex->getMessage());
        }
    }

    public function deleteDepartment($id)
    {
        try{
        $department = Department::find($id);
        $department->delete();
//        return redirect('settings')->with('success','Department deleted Successfully');
            return successResponse(trans('lang.Department_deleted'),'');

        }catch(\Exception $ex){
            return errorResponse($ex->getMessage());
        }
    }

}
