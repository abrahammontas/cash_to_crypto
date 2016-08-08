<?php

namespace App\Http\Controllers;

use Auth;
use App\Order;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request) {
    	$orders = Order::whereUserId(Auth::id())->with('bank')->paginate(10);
        return view('user.index', ['orders' => $orders]);
    }

    public function wallet() {
        return view('user.wallet');
    }

    public function profile() {
        return view('user.profile');
    }


    public function locations() {
        return view('user.locations');
    }
}
