<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Login;
use DB;
use Input;
use Session;
use Response;
use Validator;
use Hash;
use Auth;
use Redirect;
use Mail;

class UserController extends Controller{

	public function getLogin(){
		Session::forget('admin');
		Session::forget('agent');
		$urls = Session::get('url');
		if($urls == ''){
			$url = '/';
		}
		else{
			$url = $urls;
		}
		return View('login')->with('url',$url);
	}
	public function doLogin(){
		$data = Input::all();
		$ip = Input::get('ip');
		$email = Input::get('email');
		$password = md5(Input::get('password'));
		$userCheck = Login::where(['email' => $email])->first();
		if(count($userCheck) == 0){
			$res = ['res' => 0];
			return json_encode($res);
		}
		else{
			$user = Login::where(['email' => $email,'password' => $password])->first();
			if(count($user) == 0){
				$res = ['res' => 1];
				return json_encode($res);
			}
			else{
				if($user->role == 'admin'){
					Session::put('admin',$email);
					$res = ['res' => 2];
					return json_encode($res);	
				}
				else{
					Session::put('agent',$email);
					$users = Login::where(['email' => $email,'password' => $password])->update(['online_time' => time(),'ip' => $ip]);
					$res = ['res' => 3];
					return json_encode($res);
				}
			}
		}
	}
	public function doLogout(){
		Session::flush();
		return Redirect::to('/');
	}	
}