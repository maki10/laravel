<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Session;

use App\Http\Requests;
use App\Card;
use App\Basket;
use App\User;

class CardController extends Controller
{

    
	public function index()
    {
		$basket = Basket::whereUser_id(Session::get('id'))->get();
		if(empty($basket->first())){
			return Redirect::to('/items');
		}else{
			$ship = $this->shiping();
			$price = $this->full_price();
			$money  = Session::get('money');
			return view('card.index', compact('basket','ship','price','money'));
		}
    }
	

	public function shiping()
	{
		$basket = Basket::whereUser_id(Session::get('id'))->get();
		foreach($basket as $ship){
			if(!isset($shiping)){
				$shiping = $ship['weight'] * $ship['kol'];
			}else{
				$shiping = $shiping + $ship['weight'] * $ship['kol'];
			}
		}
		if($shiping<=10){
			return 0;
		}elseif($shiping<20){
			return 5;			
		}else{
			return 10;
		}
	}
	
	public function full_price()
	{
		$basket = Basket::whereUser_id(Session::get('id'))->get();
		foreach($basket as $money){
			if(!isset($price)){
				$price = $money['price'] * $money['kol'];
			}else{
				$price = $price + $money['price'] * $money['kol'];
			}
		}
		$pric = $this->shiping() + $price;
		return $pric;
	}
	
	public function buy()
	{
		$new_price = Session::get('money') - $this->full_price();
		$id = Session::get('id');
		
		if($new_price<0){
			Session::flash('error', 'You dont have enough of money to buy these items. Please remove something from the Cart.');			
			return Redirect::to('card');
		}
		
		$user = User::whereId(Session::get('id'))->first();
		$user->money = $new_price;
		$user->save();
		Session::put('money', $new_price);
		$basket = Basket::whereUser_id(Session::get('id'))->delete();
		Session::flash('success', 'Items bought!');		
		return Redirect::to('items');
	}
	
}