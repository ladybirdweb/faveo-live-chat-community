<?php

use App\Http\Controllers\loginController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('logout', function () {
    if (session()->has('role')) {
        session()->pull('role');
    }

    return redirect('login');
});

Route::group(
    ['middleware' => ['checkLogin']],
    function () {
        Route::view('login', 'login');
        Route::post('checklogin', [loginController::class, 'checkLogin']);
    }
);

Route::view('admin', 'admin');
Route::view('agent', 'agent');
