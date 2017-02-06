<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Login;
use App\Models\Client;
use App\Models\Agent;
use DB;
use Input;
use Session;
use Response;
use Validator;
use Hash;
use Auth;
use Redirect;
use Mail;

class ClientController extends Controller{

	public function getClientDetails(){
		$detail = Input::get('ip');
		$time = time();
		$check = Client:: where(['ip' => $detail['ip']])->first();
		if(count($check) == 0){
			$client = new Client;
			$client->uniq_id 	= md5(uniqid(rand(), true));
			$client->ip 		= $detail['ip'];
			$client->city 		= $detail['city'];
			$client->country	= $detail['country_name'];
			$client->latitude	= $detail['latitude'];
			$client->longitude	= $detail['longitude'];
			$client->time_zone 	= $detail['time_zone'];
			$client->online_time= $time;
			$client->save();
		}
		else{
			$client = Client::where(['ip' => $detail['ip']])->update(['online_time' => $time]);	
		}
	}
	public function deleteIP(){
		$ip = Input::get('ip');
		$check = Client::where(['ip' => $ip])->update(['view' => '0']);
	}
	public function getChatContact(){
		$data = Input::all();
		$ip = Input::get('ip');
		$getIP = Client ::where('ip',$ip)->first();

		$client = Client::find($getIP->id);
		$client->name = Input::get('name');
		$client->email = Input::get('email');
		$client->phone = Input::get('phone');
		$client->save();
		
		$res = ['res' => '1'];
		return json_encode($res);
	}
	public function getPoOnline(){
		$comes = [];
		$client = Client::get();
		$url = url();
		if(count($client) == 0){
			$comes = '<div class="user-panel"><div class="pull-left info no-user">No User Online</div></div>';
			$res = ['res' => '1','come' => $comes];
			return json_encode($res);
		}
		else{
			$time = time() - 5;
			$remove = Client :: where('online_time','<',$time)->delete();
			foreach ($client as $clt) {
				if($clt->name == ""){
					$name = '';
				}
				else{
					$name = $clt->name;
				}
				$come = '<div class="user-panel"><div class="pull-left image"><img src="'.$url.'/asset/images/user4-128x128.jpg" class="img-circle" alt="User Image"><a href="#"><i class="fa fa-circle text-success" id="online"></i></a></div><div class="pull-left info"><p>'.$name.'</p><a href="#"><img src="'.$url.'/asset/images/indian.png">'.$clt->ip.'</a></div></div>';
				array_push($comes,$come);
			}
			$res = ['res' => '1','come' => $comes];
			return json_encode($res);
		}
	}
	public function updateAgent(){
		if(Session::has('agent')){
			$time = time();
			$users = Login::where(['email' => Session::get('agent')])->update(['online_time' => $time]);
		}
	}
	public function getAgentOnline(){
		$time = time() - 5;
		$comes = [];
		$url = url();
		$agents = Login :: where('online_time','>',$time)->where('role','agent')->get();
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
					if($agt->email != Session::get('agent')){
						$new_detail = Agent :: where('login_id',$agt->id)->first();
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
}