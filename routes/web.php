<?php

use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\App;
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
//            App::setlocale(session('myLang'));
            return view('login');
        });
        Route::post('checklogin', [loginController::class, 'checkLogin']);
        Route::get('forgetpassword', function () {
            return view('forgetpassword');
        });
        Route::post('checkForgetpassword', [loginController::class, 'forgetpassword']);
        Route::get('checkLink/{id}/{otp}', [loginController::class, 'checkotp']);
        Route::get('setpassword', function () {
            return view('setpassword');
        });
        Route::post('checkSetpassword', [loginController::class, 'setpassword']);

        Route::post('selectlanguage', [loginController::class, 'selectLanguage']);
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
