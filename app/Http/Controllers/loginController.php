<?php

namespace App\Http\Controllers;

use App\Http\Requests\forgetPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\setPasswordRequest;
use App\Models\Resetpassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use App\Jobs\resetPasswordEmailJob;

class loginController extends Controller
{

    public function checkLogin(LoginRequest $req)
    {
//        $user = User::where('email', $req->email)->first();
        $user = Auth::attempt(['email' => $req->email, 'password' => $req->password]);
        if (!$user)
        {
            return Response()->json([
                'error' => trans('lang.Invalid_Credentials'),
                'status' => 401,
            ]);
//            return errorResponse(trans('lang.Invalid_Credentials'), 401);

        }
//        Auth::login($user);
        $user = Auth::user();
        $token = $user->createToken('loginToken')->accessToken;
        session(['token' => $token]);
        if (Auth::user()->role == 'admin') {
            return successResponse()([
                'data'=> 'logged in as admin',
//                'status'=> 200,
                'role'=>'admin',
                'token'=>$token
            ]);
        }
        if (Auth::user()->role == 'agent') {
            return successResponse()([
                'data'=> 'logged in as agent',
//                'status'=> 200,
                'role'=>'agent',
                'token'=>$token
            ]);
        }
    }


    function selectLanguage(Request $req)
    {
        $lang = $req->lang;
        session(['myLang'=> $lang]);
        return redirect('/');
    }


    public function forgetpassword(forgetPasswordRequest $req)
    {
        $user = User::where('email',$req->email)->first();
        if (!$user) {
            return response()->json([
                'error' => trans('lang.Invalid_Email'),
                'status' => 401,
            ]);
        }
        $otp = random_int(100000, 999999);
        if(!$emailExists = Resetpassword::where('email',$req->email)->first()) {
            $row = new ResetPassword;
            $row->email = $req->email;
            $row->otp = $otp;
            $row->save();
            $id = $row->id;
        }
        $emailExists->otp = $otp;
        $emailExists->save();
        $id = $emailExists->id;

        $resetPasswordLink =  url('checkLink' .'/' .$id .'/'.$otp);
//        $emailData = [ 'link' => $resetPasswordLink , 'name' => $user->name];
//        Mail::to($req->email)->send(new resetpasswordemail($emailData));
//        $details['email'] = $req->email;
        $details = [ 'link' => $resetPasswordLink , 'name' => $user->name,'email' => $req->email];

        resetPasswordEmailJob::dispatch($details);
//        dispatch(new App\Jobs\resetPasswordEmailJob($details));
//        return response()->json(['message'=>'Mail Send Successfully!!']);
        return response()->json([
            'success'=> trans('lang.Success_Link_Intro'),
            'status'=> 200,
        ]);
    }


    function checkOtp($id, $otp)
    {
        if(!$user = Resetpassword::find($id)) {
            return redirect("/")->with('error', trans('lang.Invalid_Email'));
        }
        if ($user->otp == $otp) {
            Cache::add('email', $user->email);
            return redirect('setpassword');
        }
        return redirect("/")->with('error', trans('lang.Invalid_OTP'));
    }


    function setPassword(setPasswordRequest $req)
    {
        $user = User::where('email', Cache::get('email'))->first();
//        $user = Auth::attempt(['email'=> Cache::get('email')]);
        if(!$user) {
            return response()->json([
                'error' => trans('lang.Invalid_Email'),
                'status' => 401,
            ]);
        }
        if ($req->password == $req->confirmpassword)
        {
            $id = $user->id;
            $data = User::find($id);
            $data->password = Hash::make($req->password);
            $data->save();
            Cache::forget('email');
            return response()->json([
                'success'=> trans('lang.Success_Password_Intro'),
                'status'=>200,
            ]);
        }
        return response()->json([
            'error'=> trans('lang.Error_Password_Intro'),
            'status'=>401,
        ]);
    }

}


