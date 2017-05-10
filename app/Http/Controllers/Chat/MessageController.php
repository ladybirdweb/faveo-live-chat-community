<?php

namespace App\Http\Controllers\Chat;
use App\Http\Controllers\Controller;
use App\Model\Conversation;
use App\Model\Message;
use App\Model\Client;
use App\Model\Agent;
use App\Model\Login;
use DB;
use Input;
use Session;
use Response;
use Validator;
use Hash;
use Auth;
use Redirect;
use Mail;

class MessageController extends Controller{

	public function getChat(){
		$data = Input::all();
		$comes = [];
		$id = Input::get('conversation');
		$conversation = Message::where('conversation_id',$id)->get();
		foreach ($conversation as $convo) {
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
		$res = ['res' => '1','come' => $comes,'total' => $total];
		return json_encode($res);
	}
	public function sendMessage(){
		$img = url().'/asset/images/user3-128x128.jpg';
		$data = Input::all();
		$comes = [];
		$id = Input::get('conversation');
		$message = Input::get('message');
		$reply = Input::get('reply');
		$ins = Message::insert(['conversation_id' => $id,'message' => $message,'reply_id' => $reply,'view' => '1']);
		$conversation = Message::where('conversation_id',$id)->get();
		foreach ($conversation as $convo) {
			if($convo->message == 'Start a new Conversation'){
				$come = '<div class="new_conversation" style="text-align: center;padding-bottom:10px;"><b>Start a new Conversation</b></div>';
			}
			elseif($convo->message == 'joined the conversation'){
				$agent = Agent:: where('uniq_id',$convo->reply_id)->first();
				$come = '<div class="new_conversation" style="text-align: center;padding-bottom:10px;"><b>'.$agent->first_name.' '.$agent->last_name.'</a>'.$convo->message.'</b></div>';
			}
			else{
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
		$res = ['res' => '1','come' => $comes];
		return json_encode($res);
	}
	public function getJoin(){
		$conversation = Input::get('conversation');
		$joiner = Input::get('reply');
		if($conversation == ''){
			$user = Input::get('user');
			
			$string = md5(uniqid(rand(), true));
			$conversation = new Conversation;
			$conversation->conversation_id 		= $string;
			$conversation->client_id			= $user;
			$conversation->conversation_time 	= time();
			$conversation->save();

			$message = new Message;
			$message->conversation_id = $string;
			$message->reply_id = $user;
			$message->message = 'Start a new Conversation';
			$message->view = '0';
			$message->save();

			$message = new Message;
			$message->conversation_id = $string;
			$message->reply_id = $joiner;
			$message->message = 'joined the conversation';
			$message->view = '0';
			$message->save();
			$res = ['res' => '0'];
			return json_encode($res);
		}
		else{	
			$message = Message:: insert(['conversation_id' => $conversation,'reply_id' => $joiner,'message' => 'joined the conversation','view' => '0']);
			$res = ['res' => '1'];
			return json_encode($res);
		}
	}
	public function sendMessages(){
		$img = url().'/asset/images/user3-128x128.jpg';
		$data = Input::all();
		$comes = [];
		$id = Input::get('conversation');
		$message = Input::get('message');
		$reply = Input::get('reply');
		$ins = Message::insert(['conversation_id' => $id,'message' => $message,'reply_id' => $reply,'view' => '1']);
		$conversation = Message::where('conversation_id',$id)->get();
		foreach ($conversation as $convo) {
			if($convo->message == 'Start a new Conversation'){
				$come = '<div class="new_conversation" style="text-align: center;padding-bottom:10px;"><b>Start a new Conversation</b></div>';
			}
			elseif($convo->message == 'joined the conversation'){
				$agent = Agent:: where('uniq_id',$convo->reply_id)->first(); 
				$user = Login:: where('email',Session::get('admin'))->first();
				$user_id = Agent:: where('login_id',$user->id)->first(); 
				if($user_id->uniq_id == $agent->uniq_id){
					$come = '<div class="new_conversation" style="text-align: center;padding-bottom:10px;"><b>You '.$convo->message.'</b></div>';
				}
				else{
					$come = '<div class="new_conversation" style="text-align: center;padding-bottom:10px;"><b>'.$agent->first_name.' '.$agent->last_name.' '.$convo->message.'</b></div>';
				}
			}
			else{
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
		$res = ['res' => '1','come' => $comes];
		return json_encode($res);
	}
	public function chatDeactive(){
		$id = Input::get('conversation');
		$message = Message:: where('conversation_id', $id)->update(['view' => '0']);
		$res = ['res' => '1'];
		return json_encode($res);
	}
	public function getChats(){
		$data = Input::all();
		$comes = [];
		$id = Input::get('conversation');
		$messages = Conversation:: where('conversation_id',$id)->first();
		if($messages->conversation_time == ""){
			$user = Login:: where('email',Session::get('admin'))->first();
			$user_id = Agent:: where('login_id',$user->id)->first();
			$url = url().'/message/'.$user_id->uniq_id;
			$res = ['res' => '0','refresh_id' => $user_id->uniq_id,'url' => $url];
			return json_encode($res);
		}
		else{
			$conversation = Message::where('conversation_id',$id)->get();
			foreach ($conversation as $convo) {
				if($convo->message == 'Start a new Conversation'){
					$come = '<div class="new_conversation" style="text-align: center;padding-bottom:10px;"><b>Start a new Conversation</b></div>';
				}
				elseif($convo->message == 'joined the conversation'){
					$agent = Agent:: where('uniq_id',$convo->reply_id)->first(); 
					$user = Login:: where('email',Session::get('admin'))->first();
					$user_id = Agent:: where('login_id',$user->id)->first(); 
					if($user_id->uniq_id == $agent->uniq_id){
						$come = '<div class="new_conversation" style="text-align: center;padding-bottom:10px;"><b>You '.$convo->message.'</b></div>';
					}
					else{
						$come = '<div class="new_conversation" style="text-align: center;padding-bottom:10px;"><b>'.$agent->first_name.' '.$agent->last_name.' '.$convo->message.'</b></div>';
					}
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
			$res = ['res' => '1','come' => $comes,'total' => $total];
			return json_encode($res);
		}
	}
	public function chatEnd(){
		$id = Input::get('id');
		$client = Client:: where('uniq_id',$id)->first();
		$conversation = Conversation:: where('client_id',$client->url_id)->update(['conversation_time' => '']);
		Session::forget('cookie',$id);
		$res = ['res' => '1'];
		return json_encode($res);
	}
	public function chatEnds(){
		$id = Input::get('id');
		$conversation = Conversation:: where('client_id',$id)->update(['conversation_time' => '']);
		Session::forget('cookie',$id);
		$user = Login:: where('email',Session::get('admin'))->first();
		$user_id = Agent:: where('login_id',$user->id)->first();
		$url = url().'/message/'.$user_id->uniq_id;
		$res = ['res' => '1','url' => $url];
		return json_encode($res);
	}
	public function getCheckConversation(){
		$id = Input::get('id');
		$conversation = Input::get('conversation');
		$client = Client:: where('uniq_id',$id)->first();

		$message = Conversation:: where('conversation_id',$conversation)->where('conversation_time', '!=', '')->first();
		if(count($message) == 0){
			Session::forget('cookie',$id);
			$res = ['res' => '1'];
			return json_encode($res);
		}
	}
}