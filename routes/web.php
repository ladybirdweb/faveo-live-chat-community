<?php

use App\Http\Controllers\loginController;
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

        Route::get('/', function () {
            return view('login');
        });
        Route::post('checklogin', [loginController::class, 'checkLogin']);
        Route::view('forgetpassword', 'forgetpassword');
        Route::post('forgetpassword', [loginController::class, 'forgetpassword']);
        Route::get('checkLink/{id}/{otp}', [loginController::class, 'checkotp']);
        Route::view('setpassword', 'setpassword');
        Route::post('setpassword', [loginController::class, 'setpassword']);

    }
);
Route::group(
    ['middleware' => ['checkAdmin']],
    function () {
        Route::view('admin', 'admin');
    }
);

Route::group(
    ['middleware' => ['checkAgent']],
    function () {
        Route::view('agent', 'agent');
    }
);


