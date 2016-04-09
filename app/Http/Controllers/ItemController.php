<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Items;
use App\Basket;

class ItemController extends Controller
{

    public function index()
    {
		$items 	= Items::get();
		$drops 	= Items::distinct()->select('type')->get();
		$basket = Basket::whereUser_id(Session::get('id'))->get();
		$money  = Session::get('money');
        return view('item.list', compact('items', 'drops', 'basket' ,'money'));
    }


    public function show($type)
    {
		$drops = Items::distinct()->select('type')->get();
		$item = Items::whereType($type)->get();
		$basket = Basket::whereId(Session::get('id'))->get();
		$money  = Session::get('money');
        return view('item.show', compact('drops','item','basket','money'));
    }

}