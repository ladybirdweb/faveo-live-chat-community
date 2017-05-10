<?php

namespace App\Http\Controllers\Chat;
use App\Http\Controllers\Controller;
use App\Model\Login;
use App\Model\Canned;
use DB;
use Input;
use Session;
use Response;
use Validator;
use Hash;
use Auth;
use Redirect;
use Mail;

class CannedController extends Controller{

	public function doAdd(){
		if(Session::has('admin')){
			$role = Login::where('email',Session::get('admin'))->first();
			$data = Input::all();
			$title = Input::get('title');
			$message = Input::get('message');

			$canned = new Canned;
			$canned->uniq_id = md5(uniqid(rand(), true));
			$canned->title = $title;
			$canned->message = $message;
			$canned->created_by = $role->id;
			$canned->save();

			$res = ['res' => '1'];
			return json_encode($res);
		}
		else{
			$url = '/';
			return Redirect::to('/login')->with('url',$url);
		}
	}
	public function doDelete(){
		if(Session::has('admin')){
			$id = Input::get('id');
			$delete = Canned::where('uniq_id',$id)->delete();

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
			$title = Input::get('title');
			$message = Input::get('message');

			$canned = Canned::find(Input::get('id'));
			$canned->title = $title;
			$canned->message = $message;
			$canned->created_by = $role->id;
			$canned->save();

			$res = ['res' => '1'];
			return json_encode($res);
		}
		else{
			$url = '/';
			return Redirect::to('/login')->with('url',$url);
		}
	}
}