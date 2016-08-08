<?php

namespace App\Http\Controllers;

use App\Bank;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function index(Request $request) {
    	$banks = Bank::whereActive(true)->lists('name', 'id');
        return view('buy.index', ['ourbitcoinprice' => 100, 'banks' => $banks]);
    }

    public function order(Request $request) {
    	$this->validate($request, [
    		'amount' => 'required|numeric',
    		'wallet' => 'required',
    		'bank'   => 'required|integer|exists:banks,id'
    	]);


    }
}
