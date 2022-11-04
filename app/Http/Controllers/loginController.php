<?php

namespace App\Http\Controllers;

use App\Mail\resetpasswordemail;
use App\Models\Resetpassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class loginController extends Controller
{
    public function checkLogin(Request $req)
    {
        $req->validate([
            'email'   => ['required'],
            'password'=> ['required'],
        ]);
        $user = User::where('email', $req->email)->get()->first();
        if ($user) {
            $isValidPassword = Hash::check($req->password, $user->password);
            if ($isValidPassword) {
                Auth::login($user);
                if (Auth::user()->role == 'admin') {
                    return redirect('admin');
                }
                if (Auth::user()->role == 'agent') {
                    return redirect('agent');
                }
            }

            return redirect('/')->with('error', 'Incorrect Password');
        }

        return redirect('/')->with('error', 'Incorrect Email');
    }

    public function forgetpassword(Request $req)
    {
        $req->validate([
            'email'   => ['required'],
        ]);
        $user = User::where('email', $req->email)->get()->first();
        if ($user) {
            $emailExists = Resetpassword::where('email', $req->email)->get()->first();
            $otp = random_int(100000, 999999);
            if ($emailExists) {
                $emailExists->otp = $otp;
                $emailExists->save();
            } else {
                $row = new ResetPassword();
                $row->email = $req->email;
                $row->otp = $otp;
                $row->save();
            }

            $id = $emailExists->id;
            $resetPasswordLink = url('checkLink'.'/'.$id.'/'.$otp);
            $emailData = ['link' => $resetPasswordLink];
            Mail::to($req->email)->send(new resetpasswordemail($emailData));

            return redirect('/')->with('success', 'The link has been send successfully to your email');
        } else {
            return redirect('forgetpassword')->with('error', 'Incorrect Email');
        }
    }

    public function checkOtp($id, $otp)
    {
        $user = Resetpassword::find($id);
        if ($user) {
            if ($user->otp == $otp) {
                Cache::add('email', $user->email);

                return redirect('setpassword');
            }

            return redirect('/')->with('error', 'Invalid OTP');
        }

        return redirect('/')->with('error', 'Invalid Email');
    }

    public function setPassword(Request $req)
    {
        $req->validate([
            'password'          => ['required'],
            'confirmpassword'   => ['required'],
        ]);
        $user = User::where('email', Cache::get('email'))->get()->first();
        if ($user) {
            if ($req->password == $req->confirmpassword) {
                $id = $user->id;
                $data = User::find($id);
                $data->password = Hash::make($req->password);
                $data->save();
                Cache::forget('email');

                return redirect('/')->with('success', 'Your password has  been changed successfully');
            }

            return redirect('setpassword')->with('error', 'Password and confirm password should be same');
        }

        return redirect('setpassword')->with('error', 'Invalid email');
    }
}
