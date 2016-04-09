<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Session;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    
	public function index()
	{
		return view('welcome');
	}
	
	public function store(Request $request)
	{
		$user = User::whereMail($request->mail)->wherePass($request->pass)->first();
		if($user==false){
			Session::flash('error', 'Wrong username and password combination. Please try again.');
			return Redirect::to('/');
		}else{
			Session::put('id', $user->id);
			Session::put('money', $user->money);
			Session::put('name', $user->mail);
			return Redirect::to('items');
		}
	}
	
}
