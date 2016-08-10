<?php

namespace App\Http\Controllers;

use Auth;
use App\Order;
use App\Bank;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view(
        	'admin.index',
        	[
        		'banks' => Bank::count(),
        		'pendingOrders' => Order::whereStatus('pending')->count(),
        		'issueOrders' => Order::whereStatus('issue')->count(),
        	]
        );
    }

    public function orders($type) {
    	$orders = Order::with(['bank', 'user']);
    	if ($type !== 'all') {
    		$orders->whereStatus($type);
    	}
    	$orders = $orders->paginate(10);
        return view('admin.orders', ['orders' => $orders, 'type' => ucwords($type)]);
    }

	public function banks() {
    	$banks = Bank::paginate(10);
        return view('admin.banks', ['banks' => $banks]);
    }
}
