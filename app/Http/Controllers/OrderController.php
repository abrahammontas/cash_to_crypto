<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bank;
use App\Order;
use Auth;
use App\Settings;

class OrderController extends Controller
{
	private $price;

	public function __construct() {
		$this->price = Settings::getParam('ourprice');
	}

    public function index(Request $request) {
    	$banks = Bank::whereActive(true)->lists('name', 'id');
        return view('buy.index', ['ourbitcoinprice' => $this->price, 'banks' => $banks]);
    }

    public function order(Request $request) {
    	$this->validate($request, [
    		'amount' => 'required|numeric',
    		'wallet' => 'required|between:1,50',
    		'bank'   => 'required|integer|exists:banks,id'
    	]);

    	$total = round($request->input('amount'), 2);
        $fees = round($total * 0.02, 2);
        $amount = $total - $fees;
        $bitcoins = round($amount/$this->price, 5);

    	$order = new Order();
    	$order->user_id  = Auth::id();
        $order->bank_id  = $request->input('bank');
        $order->wallet   = $request->input('wallet');
        $order->amount   = $amount;
        $order->bitcoins = $bitcoins;
        $order->total    = $total;
        $order->save();

        return redirect()->route('dashboard');
    }
}
