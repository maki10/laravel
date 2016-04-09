<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Basket;

class LogoutController extends Controller
{
  
    public function index()
	{
		$basket = Basket::whereUser_id(Session::get('id'))->delete();
		Session::forget('id');
		Session::forget('money');
		Session::forget('name');
		return Redirect::to('/');
	}
	
}
