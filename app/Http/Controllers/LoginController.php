<?php

namespace App\Http\Controllers;

use App\Http\Requests\forgetPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\setPasswordRequest;
use App\Jobs\resetPasswordEmailJob;
use App\Models\Resetpassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function checkLogin(LoginRequest $req)
    {
        if (!$user = Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            return errorResponse(trans('lang.Invalid_Credentials'));
        }
        $user = Auth::user();
        $token = $user->createToken('loginToken')->accessToken;
        session(['token' => $token]);

        return successResponse(Auth::user()->role, $token);
    }

    public function forgetpassword(forgetPasswordRequest $req)
    {
        $user = User::where('email', $req->email)->first();
        if (!$user) {
            return errorResponse(trans('lang.Invalid_Email'));
        }
        $otp = random_int(100000, 999999);
        if (!$emailExists = Resetpassword::where('email', $req->email)->first()) {
            $row = new ResetPassword();
            $row->email = $req->email;
            $row->otp = $otp;
            $row->save();
            $id = $row->id;
        }
        $emailExists->otp = $otp;
        $emailExists->save();
        $id = $emailExists->id;

        $resetPasswordLink = url('checkLink'.'/'.$id.'/'.$otp);
        $details = ['link' => $resetPasswordLink, 'name' => $user->name, 'email' => $req->email];
        dispatch(new resetPasswordEmailJob($details));

        return successResponse(trans('lang.Success_Link_Intro'), '');
    }

    public function checkOtp($id, $otp)
    {
        if (!$user = Resetpassword::find($id)) {
            return redirect('/')->with('error', trans('lang.Invalid_Email'));
        }
        if ($user->otp == $otp) {
            Cache::add('email', $user->email);

            return redirect('setpassword');
        }

        return redirect('/')->with('error', trans('lang.Invalid_OTP'));
    }

    public function setPassword(setPasswordRequest $req)
    {
        $user = User::where('email', Cache::get('email'))->first();
        if (!$user) {
            return errorResponse(trans('lang.Invalid_Email'));
        }
        if ($req->password == $req->confirmpassword) {
            $id = $user->id;
            $data = User::find($id);
            $data->password = Hash::make($req->password);
            $data->save();
            Cache::forget('email');

            return successResponse(trans('lang.Success_Password_Intro'), '');
        }

        return errorResponse(trans('lang.Error_Password_Intro'));
    }

    public function selectLanguage(Request $req)
    {
        $lang = $req->lang;
        session(['myLang'=> $lang]);

        return redirect('/');
    }
}
