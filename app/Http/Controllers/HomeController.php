<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Login;
use App\Models\Canned;
use App\Models\Agent;
use App\Models\Client;
use DB;
use Input;
use Session;
use Response;
use Validator;
use Hash;
use App\Models\Transaction;
use Auth;
use Redirect;
use Mail;

class HomeController extends Controller{

	public function getIndex(){
		if(Session::has('admin')){
			$page = '';
			return View('index')->with('page',$page);
		}
		elseif(Session::has('agent')){
			$page = '';
			$agent = [];
			$time = time() - 5;
			$time1 = time();
			$remove = Client :: where('online_time','<',$time)->delete();
			$client = Client::get();
			$users = Login::where(['email' => Session::get('agent')])->update(['online_time' => $time1]);
			$agents = Login :: where('online_time','>',$time)->where('role','agent')->get();
			if(count($agents) == 0){
				$agent = [];
			}
			else{
				if(count($agents) == 1){
					$agent = [];		
				}
				else{
					foreach($agents as $agt) {
						if($agt->email != Session::get('agent')){
							$new_detail = Agent :: where('login_id',$agt->id)->first();
							$agt->name = $new_detail->first_name.' '.$new_detail->last_name;
							array_push($agent,$agt);
						}
					}
				}
			}
			return View('agent/index')->with(['page' => $page,'client' => $client,'agent' => $agent]);
		}
		else{
			$url = '/';
			return Redirect::to('/login')->with('url',$url);
		}
	}	
	public function getAgentProfile(){
		if(Session::has('agent')){
			$agent = [];
			$page = '';
			$time = time() - 5;
			$time1 = time();
			$remove = Client :: where('online_time','<',$time)->delete();
			$client = Client::get();
			$users = Login ::where(['email' => Session::get('agent')])->update(['online_time' => $time1]);
			$agents = Login :: where('online_time','>',$time)->where('role','agent')->get();
			if(count($agents) == 0){
				$agent = [];
			}
			else{
				if(count($agents) == 1){
					$agent = [];		
				}
				else{
					foreach($agents as $agt) {
						if($agt->email != Session::get('agent')){
							$new_detail = Agent :: where('login_id',$agt->id)->first();
							$agt->name = $new_detail->first_name.' '.$new_detail->last_name;
							array_push($agent,$agt);
						}
					}
				}
			}
			return View('agent/index')->with(['page' => $page,'client' => $client,'agent' => $agent]);
		}
		else{
			$url = '/agent-profile';
			return Redirect::to('/login')->with('url',$url);
		}
	}
	public function getProfile(){
		if(Session::has('admin')){
			$page = '';
			return View('profile/index')->with('page',$page);
		}
		else{
			$url = '/profile';
			return Redirect::to('/login')->with('url',$url);
		}
	}
	public function getProfileEdit(){
		if(Session::has('admin')){
			$page = '';
			return View('profile/edit')->with('page',$page);
		}
		else{
			$url = '/profile';
			return Redirect::to('/login')->with('url',$url);
		}
	}
	public function getSetting(){
		if(Session::has('admin')){
			$page = 'setting';
			return View('setting')->with('page',$page);
		}
		else{
			$url = '/setting';
			return Redirect::to('/login')->with('url',$url);
		}
	}
	public function getOperators(){
		if(Session::has('admin')){
			$agent = [];
			$page = 'operators';
			$user = Login::orderBy('id','DESC')->get();
			if(count($user) == 0){
				$agent = $user;
			}
			else{
				foreach($user as $usr){
					$agent_val = Agent::where('login_id',$usr->id)->first();
					if(count($agent_val) == 0){
						// array_push($agent, $agent_val);
					}
					else{
						$role = Login::where('id',$agent_val->created_by)->first();
						$agent_val->created_by = $role->username;
						$agent_val->username = $usr->username;
						$agent_val->role = $usr->role;
						$agent_val->status = $usr->status;
						array_push($agent, $agent_val);
					}
				}
			}
			return View('operators/index')->with(['page' => $page,'agent' => $agent]);
		}
		else{
			$url = '/operators';
			return Redirect::to('/login')->with('url',$url);
		}
	}
	public function getOperatorsAdd(){
		if(Session::has('admin')){
			$page = 'operators';
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < 8; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			$pass = $randomString;
			return View('operators/add')->with(['page' => $page,'password' => $pass]);
		}
		else{
			$url = '/operators-add';
			return Redirect::to('/login')->with('url',$url);
		}
	}
	public function getOperatorsEdit($id){
		if(Session::has('admin')){
			$page = 'operators';
			$user = Agent::where('uniq_id',$id)->first();
			$other = Login::where('id',$user->login_id)->first();
			return View('operators/edit')->with(['page' => $page,'user' => $user,'other' => $other]);
		}
		else{
			$url = '/operators-edit';
			return Redirect::to('/login')->with('url',$url);
		}
	}
	public function getWidgetTheme(){
		if(Session::has('admin')){
			$page = 'widget-theme';
			return View('widget/index')->with('page',$page);
		}
		else{
			$url = '/widget-theme';
			return Redirect::to('/login')->with('url',$url);
		}
	}
	public function getCannedMessage(){
		if(Session::has('admin')){
			$mess = [];
			$page = 'canned-message';
			$message = Canned::orderBy('id','DESC')->get();
			if(count($message) == 0){
				$mess = $message;
			}
			else{
				foreach ($message as $msg) {
					$role = Login::where('id',$msg->created_by)->first();
					$msg->created_by = $role->username;
					array_push($mess, $msg);
				}
			}
			return View('canned/index')->with(['page' => $page,'message' => $mess]);
		}
		else{
			$url = '/canned-message';
			return Redirect::to('/login')->with('url',$url);
		}
	}
	public function getCannedMessageAdd(){
		if(Session::has('admin')){
			$page = 'canned-message';
			return View('canned/add')->with('page',$page);
		}
		else{
			$url = '/canned-message-add';
			return Redirect::to('/login')->with('url',$url);
		}
	}
	public function getCannedMessageEdit($id){
		if(Session::has('admin')){
			$canned = Canned::where('uniq_id',$id)->first();
			$page = 'canned-message';
			return View('canned/edit')->with(['page' => $page,'canned' => $canned]);
		}
		else{
			$url = '/canned-message-edit';
			return Redirect::to('/login')->with('url',$url);
		}
	}
	public function getMessageHistory(){
		if(Session::has('admin')){
			$page = 'message-history';
			return View('message/index')->with('page',$page);
		}
		else{
			$url = '/message-history';
			return Redirect::to('/login')->with('url',$url);
		}
	}
	public function getMessageHistoryList(){
		if(Session::has('admin')){
			$page = 'message-history';
			return View('message/list')->with('page',$page);
		}
		else{
			$url = '/message-history';
			return Redirect::to('/login')->with('url',$url);
		}
	}
	public function getLogs(){
		if(Session::has('admin')){
			$page = 'logs';
			return View('logs')->with('page',$page);
		}
		else{
			$url = '/logs';
			return Redirect::to('/login')->with('url',$url);
		}
	}
	public function getChat(){
		return View('chat');
	}
}