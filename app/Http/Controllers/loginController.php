<?php

namespace App\Http\Controllers;

use App\Models\Chat_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class loginController extends Controller
{
    public function checkLogin(Request $req)
    {
        $req->validate([
            'email'=>['required'],
            'password'=>['required']
        ]);

        $user = Chat_user::where('mail',$req->email)->get()->first();
        if($user)
        {
            $isValidPassword = Hash::check($req->password, $user->password);
            if($isValidPassword)
            {

//                $role = $email->roles;
//                if($role == 'admin')
//                {
//                    session(['role' => 'admin']);
//                    return redirect('admin');
//                }
//                if($role == 'agent')
//                {
//                    session(['role' => 'agent']);
//                    return redirect('agent');
//                }

                Auth::login($user);
                if(Auth::user()->roles == 'admin')
                {
                    return redirect('admin');
                }
                if(Auth::user()->roles == 'agent')
                {
                    return redirect('agent');
                }

            }
            return redirect('login')->with('error','Incorrect Password');
        }
        return redirect('login')->with('error','Incorrect Email');
    }
}



