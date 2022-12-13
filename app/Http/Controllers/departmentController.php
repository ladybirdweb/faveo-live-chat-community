<?php

namespace App\Http\Controllers;

use App\Http\Requests\departmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class departmentController extends Controller
{
    public function addDepartment(departmentRequest $req)
    {
        $department = new Department;
        $department->name = $req->name;
        $department->description = $req->description;
        $department->save();
//        return successResponse('department saved', $department, 200);
        return redirect('settings');
    }


    public function showList(Request $req)
    {
        // $data = Department::all();
//        if($req->search)
//        {
            $data = Department::where('name','LIKE',"%$req->search%")->get();
            return view("settings", ["departments"=>$data]);
//        }
//        $data = Department::where('role','Agent')->get()->toArray();
//        return view("settings", ["departments"=>$data]);
    }

    public function get_editDepartment($id)
    {
        $data = Department::find($id);
//        dd($data->description);
        return view('editdepartment', ["departments"=>$data]);
    }

    public function editDepartment(Request $req)
    {
//        dd($req->all());
        $department = Department::find($req->id);
        $department->name = $req->name;
        $department->description = $req->description;
        $department->save();
//        dd($department->name);
        return redirect('settings')->with('success','Department updated Successfully');
    }

    public function deleteDepartment($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect('settings')->with('success','Department deleted Successfully');
    }

//    public function updateOrCreate(departmentRequest $request)
//    {
//        Department::updateOrCreate(['id' => $request->id], [
//            'name' => $request->name,
//            'description' => $request->description
//        ]);
//    }

}
