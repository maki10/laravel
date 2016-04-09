<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Basket;
use App\Items;
use Session;
use App\User;

class BasketController extends Controller
{
    
	public function add($id)
	{
		$user = User::whereId(Session::get('id'))->first();
		if($this->check_add($id)==false){
			$basket = new Basket();
			$items = Items::whereId($id)->first();
			$basket->id = $id;
			$basket->user_id = $user->id;
			$basket->name = $items->name;
			$basket->price = $items->price;
			$basket->kol = 1;
			$basket->type = $items->type;
			$basket->weight = $items->weight;
			$basket->save();
			Session::flash('success', 'Item added to the cart');
			return Redirect::to('/items');
		}else{
			$basket = Basket::whereId($id)->first();
			$kol = $basket->kol + 1;
			$basket->update(['kol' => $kol]);
			Session::flash('success', 'Item added to the cart');
			return Redirect::to('/items')->withErrors('alert("Item added to Card")');
		}	
	}

	public function check_add($id)
	{
		$basket = Basket::whereId($id)->first();
		if(is_null($basket) == false){
			return true;
		}else{
			return false;
		}
	}
	
	public function delete($id)
	{
		$basket = Basket::whereId($id)->first();
		if($basket->kol>1){
			$kol = $basket->kol - 1;
			$basket->update(['kol' => $kol]);
			Session::flash('success', 'Item remove from card');
			return Redirect::to('/card');
		}else{
			$basket->destroy($id);
			Session::flash('success', 'Item remove from card');
			return Redirect::to('/card');
		}
	}
	
}