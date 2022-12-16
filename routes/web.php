<?php

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
        Route::view('forgetpassword', 'forgetpassword');
        Route::post('checkForgetpassword', [LoginController::class, 'forgetpassword']);
        Route::get('checkLink/{id}/{otp}', [LoginController::class, 'checkotp']);
        Route::view('setpassword', 'setpassword');
        Route::post('checkSetpassword', [LoginController::class, 'setpassword']);
        Route::post('selectlanguage', [LoginController::class, 'selectLanguage']);
    }
);

Route::group(
    ['middleware' => ['checkAdmin']],
    function () {
        Route::view('admin', 'admin');
        Route::view('edit', 'editdepartment');
        Route::view('settings','settings');
        Route::view('addOperators','admin_add_operators');
        Route::view('addDepartments','admin_add_departments');
        Route::view('cannedMessages','admin_add_canned_messages');
        Route::view('systemSettings','admin_system_settings');
//        Route::post('addDepartment', [DepartmentController::class, 'addDepartment']);
        Route::post('addDepartment', [DepartmentController::class, 'updateOrCreate']);

        Route::get('show-department-list',[DepartmentController::class,'showList']);
        Route::get('show-department-list/{search}',[DepartmentController::class,'showList']);

        Route::get('/deleteDepartment/{id}',[DepartmentController::class,'deleteDepartment']);
    }
);

//Route::view('edit/{id}/{name}','admin_edit_department');
Route::get('edit/{id}',[DepartmentController::class,'get_editDepartment']);
//Route::post('editDepartment',[DepartmentController::class,'editDepartment']);
Route::post('editDepartment',[DepartmentController::class,'updateOrCreate']);


Route::group(
    ['middleware' => ['checkAgent']],
    function () {
        Route::view('agent', 'agent');
    }
);


//Route::get('/test', function (){
//    return url ('editDepartment');
//});