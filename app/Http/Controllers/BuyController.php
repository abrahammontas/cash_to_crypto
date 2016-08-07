<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Http\Controllers\Controller;

class BuyController extends Controller
{
    public function index() {
        return view('buy.index', ['ourbitcoinprice' => 100]);
    }
}
