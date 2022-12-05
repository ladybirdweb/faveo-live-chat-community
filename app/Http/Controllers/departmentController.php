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
//        dd(123);
        $department = new Department;
        $department->name = $req->name;
        $department->description = $req->description;
        $department->save();
//        return successResponse('department saved', $department, 200);
        return view('settings');
    }
}
