<?php

namespace App\Http\Controllers\Chat;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Controllers\Controller;
use App\Model\Login;
use App\Model\Canned;
use App\Model\Agent;
use App\Model\Client;
use App\Model\Conversation;
use App\Model\Message;
use DB;
use Input;
use Session;
use Response;
use Validator;
use Hash;
use App\Model\Transaction;
use Auth;
use Redirect;
use Mail;
use App;
use PDF;

class HomeController extends Controller{

	public function getIndex(){
		if(Session::has('admin')){
		// 	$page = '';
		// 	return View('index')->with('page',$page);
		// }
		// elseif(Session::has('agent')){
			$users = Login::where(['email' => Session::get('admin')])->first();
			$agent = Agent:: where('login_id',$users->id)->first();
			return Redirect::to('/message/'.$agent->uniq_id);
		}
		else{
			$url = '/';
			return Redirect::to('/login')->with('url',$url);
		}
	}	
	public function getAdmin(){
		if(Session::has('admin')){
			$page = '';
			return View('index')->with('page',$page);
		}
		else{
			$url = '/';
			return Redirect::to('/login')->with('url',$url);
		}
	}
	public function getAgentProfile($id){
		if(Session::has('admin')){
			$page = '';
			$agent = [];
			$clients = [];
			$messages = [];
			$time = time();
			$time1 = time();
			$check = Login::where(['email' => Session::get('admin')])->first();
			$agent_id = Agent:: where('login_id',$check->id)->first();

			$remove = Client:: where('online_time','<',$time)->update(['view' => '0']);
			$alls = Client:: where('view','0')->get();
			if(count($alls) > 0){
				foreach($alls as $all){
					Session::forget($all->uniq_id);
					$message_id = Conversation:: where('client_id',$all->url_id)->get();
					if(count($message_id) > 0){
						foreach ($message_id as $ids) {
							$message = Message:: where('conversation_id',$ids->conversation_id)->update(['view' => '0']);
							$conversation = Conversation:: where('client_id',$all->url_id)->update(['conversation_time' => '']);	
						}
					}
				}
			}
			$client = Client:: where('view','1')->get();
			if(count($client) == 0){
				$client->message = 0;
			}
			else{
				foreach($client as $clt){
					$conversations = Message:: where(['reply_id' => $clt->uniq_id,'view' => '1'])->count();
					if($conversations == '0'){
						$clt->message = 0;
					}
					else{
						$clt->message = $conversations;
					}
					array_push($clients,$clt);
				}
			}
			$users = Login::where(['email' => Session::get('admin')])->update(['online_time' => $time1]);
			$agents = Login:: where('online_time','>',$time)->where('role','agent')->get();
			
			$user_detail = Client:: where('url_id',$id)->first();
			if(count($agents) == 0){
				$agent = [];
			}
			else{
				if(count($agents) == 1){
					$agent = [];		
				}
				else{
					foreach($agents as $agt) {
						if($agt->email != Session::get('admin')){
							$new_detail = Agent:: where('login_id',$agt->id)->first();
							$agt->name = $new_detail->first_name.' '.$new_detail->last_name;
							array_push($agent,$agt);
						}
					}
				}
			}
			if($agent_id->uniq_id == $id){
				$val = [];
				$message = [];
				$joined = [];
				$message_conversation = '';
				$list = [];
			}
			else{
				$val = $id;
				$list = Conversation:: where('client_id',$id)->paginate(10);
				$conversation = Conversation:: where('client_id',$val)->where('conversation_time', '!=', '')->first();
				if(count($conversation) == 0){
					$joined = [];
					$message = [];
					$message_conversation = '';
				}
				else{
					$joined = Message:: where(['conversation_id' => $conversation->conversation_id,'reply_id' => $agent_id->uniq_id])->get();
					$message = Message:: where('conversation_id',$conversation->conversation_id)->get();
					$message_conversation = $conversation->conversation_id;
				}
			}
			$client_detail = Client:: where('url_id',$id)->first();
			$active = 'active';
			$notactive = '';
			return View('agent/index')->with(['page' => $page,'client' => $clients,'agent' => $agent,'val' => $val,'message' => $message,'user_detail' => $user_detail,'joined' => $joined,'agent_detail' => $agent_id,'message_conversation' => $message_conversation,'client_detail' => $client_detail,'active' => $active,'notactive' => $notactive,'list' => $list]);
		}
		else{
			$url = '/agent-profile';
			return Redirect::to('/login')->with('url',$url);
		}
	}
	public function getAgentHistory($id){
		if(Session::has('admin')){
			$page = '';
			$agent = [];
			$clients = [];
			$messages = [];
			$time = time();
			$time1 = time();
			$check = Login::where(['email' => Session::get('admin')])->first();
			$agent_id = Agent:: where('login_id',$check->id)->first();

			$remove = Client:: where('online_time','<',$time)->update(['view' => '0']);
			$alls = Client:: where('view','0')->get();
			if(count($alls) > 0){
				foreach($alls as $all){
					Session::forget($all->uniq_id);
					$message_id = Conversation:: where('client_id',$all->url_id)->get();
					if(count($message_id) > 0){
						foreach ($message_id as $ids) {
							$message = Message:: where('conversation_id',$ids->conversation_id)->update(['view' => '0']);
							$conversation = Conversation:: where('client_id',$all->url_id)->update(['conversation_time' => '']);	
						}
					}
				}
			}
			$client = Client:: where('view','1')->get();
			if(count($client) == 0){
				$client->message = 0;
			}
			else{
				foreach($client as $clt){
					$conversations = Message:: where(['reply_id' => $clt->uniq_id,'view' => '1'])->count();
					if($conversations == '0'){
						$clt->message = 0;
					}
					else{
						$clt->message = $conversations;
					}
					array_push($clients,$clt);
				}
			}
			$users = Login::where(['email' => Session::get('admin')])->update(['online_time' => $time1]);
			$agents = Login:: where('online_time','>',$time)->where('role','agent')->get();
			
			$user_detail = Client:: where('url_id',$id)->first();
			if(count($agents) == 0){
				$agent = [];
			}
			else{
				if(count($agents) == 1){
					$agent = [];		
				}
				else{
					foreach($agents as $agt) {
						if($agt->email != Session::get('admin')){
							$new_detail = Agent:: where('login_id',$agt->id)->first();
							$agt->name = $new_detail->first_name.' '.$new_detail->last_name;
							array_push($agent,$agt);
						}
					}
				}
			}
			if($agent_id->uniq_id == $id){
				$val = [];
				$message = [];
				$joined = [];
				$message_conversation = '';
				$list = [];
			}
			else{
				$val = $id;
				$list = Conversation:: where('client_id',$id)->paginate(10);
				$conversation = Conversation:: where('client_id',$val)->where('conversation_time', '!=', '')->first();
				if(count($conversation) == 0){
					$joined = [];
					$message = [];
					$message_conversation = '';
				}
				else{
					$joined = Message:: where(['conversation_id' => $conversation->conversation_id,'reply_id' => $agent_id->uniq_id])->get();
					$message = Message:: where('conversation_id',$conversation->conversation_id)->get();
					$message_conversation = $conversation->conversation_id;
				}
			}
			$client_detail = Client:: where('url_id',$id)->first();
			$active = '';
			$notactive = 'active';
			return View('agent/index')->with(['page' => $page,'client' => $clients,'agent' => $agent,'val' => $val,'message' => $message,'user_detail' => $user_detail,'joined' => $joined,'agent_detail' => $agent_id,'message_conversation' => $message_conversation,'client_detail' => $client_detail,'active' => $active,'notactive' => $notactive,'list' => $list]);
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
		if(Session::has('cookie')){
			$time = time();
			$self = Client:: where(['uniq_id' => Session::get('cookie')])->first();
			if($self->online_time < $time){
				$online = '';
				$message = '';
				$conversation = '';
				Session::forget('cookie');
			}
			else{
				$online = Client:: where(['uniq_id' => Session::get('cookie'),'view' => '1'])->count();
				$user = Client:: where('uniq_id',Session::get('cookie'))->first();
				$conversation = Conversation:: where(['client_id' => $user->url_id])->where('conversation_time','!=', '')->first();
				if(count($conversation) > 0){
					$message = Message:: where('conversation_id',$conversation->conversation_id)->get();
				}
				else{
					$message = '';
				}
			}
		}
		else{
			$online = '';
			$message = '';
			$conversation = '';
		}
		return View('chat')->with(['online' => $online,'message' => $message,'conversation' => $conversation]);
	}
	public function pdf($id){
		$message = [];
		$conversation = Message:: where('conversation_id',$id)->get(); 
		if(count($conversation) == 0){
			$message = [];
		}
		else{
			foreach($conversation as $convo){
				if($convo->reply_id == ""){
					$convo->name = '';
				}
				else{
					$client = Client:: where('url_id',$convo->reply_id)->first();
					if(count($client) == 0){
						$agent = Agent:: where('uniq_id',$convo->reply_id)->first();
						$convo->name = $agent->first_name.' '.$agent->last_name;
					}
					else{
						if($client->name == ''){
							$name = $client->ip;
						}
						else{
							$name = $client->name;
						}
						$convo->name = $name;
					}
				}
				array_push($message,$convo);
			}
		}
		$data = ['message' => $message];
		$pdf = App::make('dompdf.wrapper');
		$pdf = PDF::loadview('pdf.pdf',$data);
		return $pdf->stream();
	}
}