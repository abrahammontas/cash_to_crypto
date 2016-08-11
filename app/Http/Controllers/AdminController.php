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
        	'admin.dashboard',
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
        return view('admin.bank.list', ['banks' => $banks]);
    }
 
    public function bankDelete($id) {
    	$bank = Bank::find($id);
    	if (!$bank) {
    		return back()->with('warning', 'Bank not found.');
    	}
    	$name = $bank->name;
    	$bank->delete();
    	return back()->with('success', "Bank $name successfully deleted." );
    }

    public function bankUpdate(Request $request, $id) {
    	$bank = Bank::find($id);
    	if (!$bank) {
    		return back()->with('warning', 'Bank not found.');
    	}
    	$bank->name = $request->input('name', $bank->name);
    	$bank->company = $request->input('company', $bank->company);
    	$bank->active = $request->has('active');

    	$bank->save();

    	return back()->with('success', "Bank {$bank->name} successfully updated." );
    }

    public function bankCreate(Request $request) {
    	$bank = new Bank();

    	$bank->name = $request->input('name', $bank->name);
    	$bank->company = $request->input('company', $bank->company);
    	$bank->active = $request->has('active');

    	$bank->save();
    	
    	return back()->with('success', "Bank {$bank->name} successfully created." );
    }
}
