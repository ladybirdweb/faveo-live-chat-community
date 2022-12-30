<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::group(
    ['middleware' => ['checkLogin']],
    function () {
        Route::view('/', 'login');
        Route::post('checklogin', [LoginController::class, 'checkLogin']);
        Route::view('forgetpassword', 'forget-password');
        Route::post('checkForgetpassword', [LoginController::class, 'forgetpassword']);
        Route::get('checkLink/{id}/{otp}', [LoginController::class, 'checkotp']);
        Route::view('setpassword', 'set-password');
        Route::post('checkSetpassword', [LoginController::class, 'setpassword']);
        Route::post('selectlanguage', [LoginController::class, 'selectLanguage']);
    }
);

Route::group(
    ['middleware' => ['checkAdmin']],
    function () {
        Route::view('admin', 'admin');
        Route::view('edit', 'edit-department');
        Route::view('editUser', 'edit-user');
        Route::view('settings','settings');
        Route::view('addAgents','add-agents');
        Route::view('addDepartments','add-departments');
        Route::view('cannedMessages','add-canned-messages');
        Route::view('systemSettings','system-settings');

        Route::post('addAgents', [AgentController::class, 'createUser']);
        Route::post('updateAgents', [AgentController::class, 'updateUser']);
        Route::post('addDepartment', [DepartmentController::class, 'updateOrCreate']);

        Route::get('show-department-list',[DepartmentController::class,'showList']);
//        Route::get('show-department-list/{search}',[DepartmentController::class,'showList']);
        Route::get('show-agent-list',[AgentController::class,'showUserList']);

        Route::get('/deleteDepartment/{id}',[DepartmentController::class,'deleteDepartment']);
        Route::get('/deleteUser/{id}',[AgentController::class,'deleteUser']);
    }
);

//Route::view('edit/{id}/{name}','admin_edit_department');
Route::get('edit/{id}',[DepartmentController::class,'get_editDepartment']);
Route::get('editUser/{id}',[AgentController::class,'get_editUser']);
//Route::post('editDepartment',[DepartmentController::class,'editDepartment']);
Route::post('editDepartment',[DepartmentController::class,'updateOrCreate']);
//Route::post('editAgent',[AgentController::class,'updateOrCreate']);


Route::group(
    ['middleware' => ['checkAgent']],
    function () {
        Route::view('agent', 'agent');
    }
);


//Route::get('/test', function (){
//    return url ('editDepartment');
//});