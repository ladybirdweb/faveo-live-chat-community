<?php

namespace App\Http\Controllers;

use App\Mail\resetpasswordemail;
use App\Models\Resetpassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class loginController extends Controller
{

    public function checkLogin(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'email'   => ['required'],
            'password'=> ['required'],
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>'400',
                'error'=>$validator->messages()
            ]);
        }

        $user = User::where('email', $req->email)->get()->first();
        if ($user) {
            $isValidPassword = Hash::check($req->password, $user->password);
            if ($isValidPassword)
            {
                Auth::login($user);
                $user = Auth::user();
//                $token = $user->createToken('loginToken')->accessToken;

                if (Auth::user()->role == 'admin') {

                    return response()->json([
                        'data'=> 'logged in as admin',
                        'status'=> 200,
                        'role'=>'admin'
//                        'token'=>$token
                    ]);
//                    return response('logged in as admin',200);
//                    return redirect('admin');
                }
                if (Auth::user()->role == 'agent') {
                    return response()->json([
                        'data'=> 'logged in as agent',
                        'status'=> 200,
                        'role'=>'agent'
//                        'token'=>$token
                    ]);
//                    return redirect('agent');
                }
            }
            return response()->json(['error'=> trans('lang.Invalid_Password'),'status'=> 400]);
//            return redirect('/')->with('error', trans('lang.Invalid_Password'));
        }
        return response()->json(['error'=> trans('lang.Invalid_Email'),'status'=> 400]);
//        return redirect('/')->with('error', trans('lang.Invalid_Email'));
    }


    function selectLanguage(Request $req)
    {
        $lang = $req->lang;
        session(['myLang'=> $lang]);
        return redirect('/');
    }


    public function forgetpassword(Request $req)
    {
        $req->validate([
            'email'   => ['required'],
        ]);
        $user = User::where('email', $req->email)->get()->first();
        if ($user)
        {
            $emailExists = Resetpassword::where('email',$req->email)->get()->first();
            $otp = random_int(100000, 999999);
            if($emailExists)
            {
                $emailExists->otp = $otp;
                $emailExists->save();
                $id = $emailExists->id;
            }
            else
            {
                $row = new ResetPassword;
                $row->email = $req->email;
                $row->otp = $otp;
                $row->save();
                $id = $row->id;
            }
            $resetPasswordLink =  url('checkLink' .'/' .$id .'/'.$otp);
            $emailData = [ 'link' => $resetPasswordLink , 'name' => $user->name];
            Mail::to($req->email)->send(new resetpasswordemail($emailData));
            return redirect('/')->with('success', trans('lang.Success_Link_Intro'));
        }
        else
        {
            return redirect('forgetpassword')->with('error', trans('lang.Invalid_Email'));
        }
    }


    function checkOtp($id, $otp)
    {
        $user = Resetpassword::find($id);
        if($user)
        {
            if ($user->otp == $otp)
            {
                Cache::add('email', $user->email);
                return redirect('setpassword');
            }
            return redirect("/")->with('error', trans('lang.Invalid_OTP'));
        }
        return redirect("/")->with('error', trans('lang.Invalid_Email'));
    }


    function setPassword(Request $req)
    {
        $req->validate([
            'password'   => ['required', Password::min(6)->mixedCase()->numbers()->symbols()],
            'confirmpassword'   => ['required'],
        ]);
        $user = User::where('email', Cache::get('email'))->get()->first();
        if($user)
        {
            if ($req->password == $req->confirmpassword)
            {
                $id = $user->id;
                $data = User::find($id);
                $data->password = Hash::make($req->password);
                $data->save();
                Cache::forget('email');
                return redirect('/')->with('success', trans('lang.Success_Password_Intro'));
            }
                return redirect('setpassword')->with('error', trans('lang.Error_Password_Intro'));
        }
            return redirect('setpassword')->with('error', trans('lang.Invalid_Email'));
    }

}