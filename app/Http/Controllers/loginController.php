<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Mail\resetpasswordemail;
use App\Models\Resetpassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class loginController extends Controller
{

    public function checkLogin(LoginRequest $req)
    {
//        $validator = Validator::make($req->all(),[
//            'email'   => ['required'],
//            'password'=> ['required'],
//        ]);
//
//        if($validator->fails())
//        {
//            return response()->json([
//                'status'=>'401',
//                'error'=>$validator->messages(),
//                'validation_error' => 1,
//            ]);
//        }

        if (!$user = User::where('email', $req->email)->first()) {
            return response()->json([
                'error' => trans('lang.Invalid_Email'),
                'status' => 401,
//            'validation_error'=> 0
            ]);
        }
        if (!$isValidPassword = Hash::check($req->password, $user->password)) {
            return response()->json([
                'error' => trans('lang.Invalid_Password'),
                'status' => 401,
//            'validation_error'=> 0
            ]);
        }
        Auth::login($user);
        $user = Auth::user();
        $token = $user->createToken('loginToken')->accessToken;
        session(['token' => $token]);
        if (Auth::user()->role == 'admin') {
            return response()->json([
                'data'=> 'logged in as admin',
                'status'=> 200,
                'role'=>'admin',
                'token'=>$token
            ]);
        }
        if (Auth::user()->role == 'agent') {
            return response()->json([
                'data'=> 'logged in as agent',
                'status'=> 200,
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


    public function forgetpassword(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'email'   => ['required'],
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>'401',
                'error'=>$validator->messages(),
                'validation_error' => 1,
            ]);
        }

        if (!$user = User::where('email', $req->email)->first()) {
            return response()->json([
                'error' => trans('lang.Invalid_Email'),
                'status' => 401,
                'validation_error' => 0,
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
        $emailData = [ 'link' => $resetPasswordLink , 'name' => $user->name];
        Mail::to($req->email)->send(new resetpasswordemail($emailData));
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


    function setPassword(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'password'   => ['required', Password::min(6)->letters()->numbers()->symbols()],
            'confirmpassword'   => ['required'],
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>'401',
                'error'=>$validator->messages(),
                'validation_error' => 1,
            ]);
        }
        if(!$user  = User::where('email', Cache::get('email'))->first()) {
            return response()->json([
                'error' => trans('lang.Invalid_Email'),
                'status' => 401,
                'validation_error' => 0,
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
            'validation_error' => 0,
        ]);
    }

}


