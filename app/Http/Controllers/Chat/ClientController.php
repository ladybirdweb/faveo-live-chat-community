<?php

namespace App\Http\Controllers\Chat;
use App\Http\Controllers\Controller;
use App\Model\Login;
use App\Model\Client;
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
use App\Model\Conversation;
use App\Model\Message;


class ClientController extends Controller{

	public function getClientDetails(){
		$detail = Input::get('ip');
		$time = time();
		$check = Client:: orderBy('id','DESC')->first();
		$string = md5(uniqid(rand(), true));
		if(count($check) == 0){
			$new_string = $string.'.1';
		}
		else{
			$vars = $check->uniq_id;
			$last = str_replace(".", "", strstr($vars, '.'));
			$new = $last + 1;
			$new_string = $string.'.'.$new;
		}
		$client = new Client;
		$client->uniq_id 	= $new_string;
		$client->url_id 	= $string;
		$client->ip 		= $detail['ip'];
		$client->city 		= $detail['city'];
		$client->country	= $detail['country_name'];
		$client->latitude	= $detail['latitude'];
		$client->longitude	= $detail['longitude'];
		$client->os			= Input::get('os');
		$client->time_zone 	= $detail['time_zone'];
		$client->view		= 1;
		$client->online_time= $time;
		$client->save();

		$res = ['res' => '1','id' => $new_string];
		return json_encode($res);
	}
	public function getClientDetailsUpdate(){
		$time = time() + 10;
		$id = Input::get('e');
		$comes = [];
		$client = Client::where(['uniq_id' => $id])->update(['online_time' => $time,'view' => '1']);

		$user = Client:: where(['uniq_id' => $id])->first();

		$conversation = Conversation:: where('client_id',$user->url_id)->where('conversation_time', '!=', '')->first();

		if(count($conversation) > 0){
			$message = Message:: where('conversation_id',$conversation->conversation_id)->get();
			dd('dddd');
			foreach ($message as $convo) {
				if($convo->message == 'Start a new Conversation'){
					$come = '<div class="new_conversation" style="text-align: center;padding-bottom:10px;"><b>Start a new Conversation</b></div>';
				}
				elseif($convo->message == 'joined the conversation'){
					$agent = DB::table('faveo_users')->where('uniq_id',$convo->reply_id)->first();
					$come = '<div class="new_conversation" style="text-align: center;padding-bottom:10px;"><b>'.$agent->first_name.' '.$agent->last_name.' '.$convo->message.'</b></div>';
				}
				else{
					$img = url().'/asset/images/user3-128x128.jpg';
					$time = date('h:i a', strtotime($convo->created_at));
					$client = Client:: where('uniq_id',$convo->reply_id)->first();
					if(count($client) == 0){
						$agent = Agent:: where('uniq_id',$convo->reply_id)->first();
						$come = '<div class="item"><img src="'.$img.'" alt="user image" class="offline"><p class="message"><a href="#" class="name"><small class="text-muted pull-right"><i class="fa fa-clock-o"></i> '.$time.'</small>'.$agent->first_name.' '.$agent->last_name.'</a>'.$convo->message.'</p></div>';
					}
					else{
						if($client->name == ''){
							$name = $client->ip;
						}
						else{
							$name = $client->name;
						}
						$come = '<div class="item"><img src="'.$img.'" alt="user image" class="offline"><p class="message"><a href="#" class="name"><small class="text-muted pull-right"><i class="fa fa-clock-o"></i> '.$time.'</small>'.$name.'</a>'.$convo->message.'</p></div>';
					}
				}
				array_push($comes,$come);
			}
			$total = count($conversation);
			if(count($conversation) > 0){
				Session::put('cookie',$id);
				$session_val = '1';
			}
			else{
				$session_val = '0';
			}
			$res = ['res' => '1','come' => $comes,'total' => $total,'conversation' => $conversation->conversation_id,'session_val' => $session_val];
			return json_encode($res);
		}
		else{
			$res = ['res' => 0];
			return json_encode($res);
		}
	}
	public function deleteIP(){
		$ip = Input::get('ip');
		$check = Client::where(['ip' => $ip])->update(['view' => '0']);
	}
	public function getChatContact(){
		
		$data = Input::all();
		$ip = Input::get('ip');
		
		$getIP = Client::where('uniq_id',$ip)->first();
		dd($data);
		$client = Client::find($getIP->id);
		$client->name 			= Input::get('name');
		$client->email 			= Input::get('email');
		$client->phone 			= Input::get('phone');
		$client->message_time 	= time();
		$client->save();
		Session::put('cookie',$ip);
		
		$string = md5(uniqid(rand(), true));

		$conversation = new Conversation;
		$conversation->conversation_id 		= $string;
		$conversation->client_id			= $getIP->url_id;
		$conversation->conversation_time 	= time();
		$conversation->save();

		$message = new Message;
		$message->conversation_id = $string;
		$message->reply_id = $getIP->url_id;
		$message->message = 'Start a new Conversation';
		$message->view = '0';
		$message->save();

		$res = ['res' => '1',"id" => $ip,'conversation' => $string];
		return json_encode($res);
	}
	public function getPoOnline(){
		$comes = [];
		$client = Client:: where('view','1')->get();
		$url = url();
		if(count($client) == 0){
			$time = time();
			$remove = Client:: where('online_time','<',$time)->update(['view' => '0']);
			$alls = Client:: where('view','0')->get();
			if(count($alls) > 0){
				foreach($alls as $all){
					Session::forget($all->uniq_id);
					$message_id = Conversation:: where('client_id',$all->url_id)->where('conversation_time', '!=', '')->get();
					if(count($message_id) > 0){
						foreach ($message_id as $ids) {
							$message = Message:: where('conversation_id',$ids->conversation_id)->update(['view' => '0']);
							$conversation = Conversation:: where('client_id',$all->url_id)->update(['conversation_time' => '']);	
						}
					}
				}
			}
			$comes = '<div class="user-panel"><div class="pull-left info no-user">No User Online</div></div>';
			$res = ['res' => '1','come' => $comes];
			return json_encode($res);
		}
		else{
			$time = time();
			$remove = Client:: where('online_time','<',$time)->update(['view' => '0']);
			$alls = Client:: where('view','0')->get();
			if(count($alls) > 0){
				foreach($alls as $all){
					Session::forget($all->uniq_id);
					$message_id = Conversation:: where('client_id',$all->url_id)->where('conversation_time', '!=', '')->get();
					if(count($message_id) > 0){
						foreach ($message_id as $ids) {
							$message = Message:: where('conversation_id',$ids->conversation_id)->update(['view' => '0']);
							$conversation = Conversation:: where('client_id',$all->url_id)->update(['conversation_time' => '']);	
						}
					}
				}
			}
			foreach ($client as $clt) {
				$message_ids = Conversation:: where('client_id',$clt->url_id)->where('conversation_time', '!=', '')->first();
				if(count($message_ids) == 0){
					$counter = '';
				}
				else{
					$conversation = Message:: where(['conversation_id' => $message_ids->conversation_id,'reply_id' => $clt->uniq_id,'view' => '1'])->count();
					if($conversation == '0'){
						$counter = '';
					}
					else{
						$counter = '<span  class="badge bg-green pull-right" style="margin-top:6%;">'.$conversation.'</span>';
					}
				}
				if($clt->name == ""){
					$name = '';
				}
				else{
					$name = '<a href="'.$url.'/message/'.$clt->url_id.'">'.$clt->name.'</a>';
				}
				$come = '<div class="user-panel"><div class="pull-left image"><img src="'.$url.'/asset/images/user4-128x128.jpg" class="img-circle" alt="User Image"><a href="'.$url.'/message/'.$clt->url_id.'"><i class="fa fa-circle text-success" id="online"></i></a></div><div class="pull-left info"><p>'.$name.'</p><a href="'.$url.'/message/'.$clt->url_id.'"><img src="'.$url.'/asset/images/indian.png">'.$clt->ip.'</a></div>'.$counter.'</div>';
				array_push($comes,$come);
			}
			$res = ['res' => '1','come' => $comes];
			return json_encode($res);
		}
	}
	public function updateAgent(){
		if(Session::has('admin')){
			$time = time();
			$users = Login::where(['email' => Session::get('admin')])->update(['online_time' => $time]);
		}
	}
	public function getAgentOnline(){
		$time = time()-10;
		$comes = [];
		$url = url();
		$agents = Login:: where('online_time','>',$time)->where('role','agent')->get();
		if(count($agents) == 0){
			$comes = '<div class="user-panel"><div class="pull-left info no-user">No Agent Online</div></div>';
			$res = ['res' => '1','come' => $comes];
			return json_encode($res);
		}
		else{
			if(count($agents) == 1){
				$comes = '<div class="user-panel"><div class="pull-left info no-user">No Agent Online</div></div>';
				$res = ['res' => '1','come' => $comes];
				return json_encode($res);
			}
			else{
				foreach($agents as $agt) {
					if($agt->email != Session::get('admin')){
						$new_detail = Agent:: where('login_id',$agt->id)->first();
						$name = $new_detail->first_name.' '.$new_detail->last_name;
						$come = '<div class="user-panel"><div class="pull-left image"><img src="'.$url.'/asset/images/user4-128x128.jpg" class="img-circle" alt="User Image"><a href="#"><i class="fa fa-circle text-success" id="online"></i></a></div><div class="pull-left info"><p>'.$name.'</p><a href="#"><img src="'.$url.'/asset/images/indian.png">'.$agt->ip.'</a></div></div>';
						array_push($comes,$come);
					}
				}
				$res = ['res' => '1','come' => $comes];
				return json_encode($res);
			}
		}
	}
	public function updateName(){
		$id = Input::get('id');
		$name = Input::get('name');
		$ups = Client:: where('url_id',$id)->update(['name' => $name]);
		$res = ['res' => '1','come' => $name];
		return json_encode($res);
	}
	public function updateEmail(){
		$id = Input::get('id');
		$email = Input::get('email');
		$ups = Client:: where('url_id',$id)->update(['email' => $email]);
		$res = ['res' => '1','come' => $email];
		return json_encode($res);
	}
	public function updatePhone(){
		$id = Input::get('id');
		$phone = Input::get('phone');
		$ups = Client:: where('url_id',$id)->update(['phone' => $phone]);
		$res = ['res' => '1','come' => $phone];
		return json_encode($res);
	}
}