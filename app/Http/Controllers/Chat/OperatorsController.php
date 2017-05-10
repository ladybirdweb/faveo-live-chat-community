<?php

namespace App\Http\Controllers\Chat;
use App\Http\Controllers\Controller;
use App\Model\Login;
use App\Model\Agent;
use DB;
use Input;
use Session;
use Response;
use Validator;
use Hash;
use Auth;
use Redirect;
use Mail;

class OperatorsController extends Controller{

	public function doAdd(){
		if(Session::has('admin')){
			$role = Login::where('email',Session::get('admin'))->first();
			$data = Input::all();
			$email = Input::get('email');
			$username = Input::get('user_name');
			$first_name = Input::get('first_name');
			$last_name = Input::get('last_name');
			$code = Input::get('country_code');
			$mobile = Input::get('mobile');
			$password = Input::get('password');
			$agent_sign = Input::get('agent_sign');
			$status = Input::get('active');
			$roles = Input::get('role');
			$check_username = Login::where('username',$username)->count();
			if($check_username > 0){
				$res = ['res' => 2];
				return json_encode($res);
			}
			$check_email = Login::where('email',$email)->count();
			if($check_email > 0){
				$res = ['res' => 0];
				return json_encode($res);
			}
			
			$user = new Login;
			$user->username = $username;
			$user->email = $email;
			$user->password = md5($password);
			$user->role = $roles;
			$user->status = $status;
			$user->save();

			$login_id = Login::where('email',$email)->first();

			$agent = new Agent;
			$agent->uniq_id = md5(uniqid(rand(), true));
			$agent->password = $password;
			$agent->first_name = $first_name;
			$agent->last_name = $last_name;
			$agent->country_code = $code;
			$agent->mobile = $mobile;
			$agent->agent_signature = $agent_sign;
			$agent->login_id = $login_id->id;
			$agent->created_by = $role->id;
			$agent->save();

			$res = ['res' => '1'];
			return json_encode($res);
		}
		else{
			$url = '/';
			return Redirect::to('/login')->with('url',$url);
		}
	}
	public function doEdit(){
		if(Session::has('admin')){
			$role = Login::where('email',Session::get('admin'))->first();
			$data = Input::all();
			$email = Input::get('email');
			$username = Input::get('user_name');
			$first_name = Input::get('first_name');
			$last_name = Input::get('last_name');
			$code = Input::get('country_code');
			$mobile = Input::get('mobile');
			$password = Input::get('password');
			$agent_sign = Input::get('agent_sign');
			$status = Input::get('active');
			$roles = Input::get('role');
			$id = Input::get('id');

			$agent_detail = Agent::where('uniq_id',$id)->first();
			$user_detail = Login::where('id',$agent_detail->login_id)->first();

			if($user_detail->username != $username){
				$check_username = Login::where('username',$username)->count();
				if($check_username > 1){
					$res = ['res' => 2];
					return json_encode($res);
				}
			}
			if($user_detail->email != $email){
				$check_email = Login::where('email',$email)->count();
				if($check_email > 1){
					$res = ['res' => 2];
					return json_encode($res);
				}
			}
			
			$user = Login::find($user_detail->id);
			$user->username = $username;
			$user->email = $email;
			$user->role = $roles;
			$user->status = $status;
			$user->save();

			$login_id = Login::where('email',$email)->first();

			$agent = Agent::find($agent_detail->id);
			$agent->first_name = $first_name;
			$agent->last_name = $last_name;
			$agent->country_code = $code;
			$agent->mobile = $mobile;
			$agent->agent_signature = $agent_sign;
			$agent->login_id = $login_id->id;
			$agent->created_by = $role->id;
			$agent->save();

			$res = ['res' => '1'];
			return json_encode($res);
		}
		else{
			$url = '/';
			return Redirect::to('/login')->with('url',$url);
		}
	}
}