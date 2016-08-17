<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bank;
use App\Order;
use App\User;
use Auth;
use App\Settings;
use Storage;
use Mail;

class OrderController extends Controller
{
	private $price;

	public function __construct() {
		$this->price = Settings::getParam('ourprice');
	}

    public function index(Request $request) {
    	$banks = Bank::whereActive(true)->lists('name', 'id');
        return view('buy.form', ['ourbitcoinprice' => $this->price, 'banks' => $banks]);
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
        $order->hash     = uniqid();
        $order->bank_id  = $request->input('bank');
        $order->wallet   = trim($request->input('wallet'));
        $order->amount   = $amount;
        $order->bitcoins = $bitcoins;
        $order->total    = $total;
        $order->save();

        $admins = User::whereAdmin(1)->whereBanned(0)->get();
        $admins->each(function($admin) use ($order){
            Mail::send('admin.emails.new', ['order' => $order, 'admin' => $admin], function($message) use ($admin) {
                $message->to($admin->email);
                $message->subject('New order');
            });
        });

        return redirect()->route('dashboard')->with('success', 'Order created successfully.');
    }

    public function uploadReceipt(Request $request) {
        $this->validate($request, [
            'receipt' => 'required|image',
            'order'   => 'required|exists:orders,hash,user_id,'.Auth::id()
        ]);
        $order = Order::whereHash($request->input('order'))->first();
        $hash = md5(microtime().$order->id);

        if(Storage::put('/public/receipts/'.$hash, file_get_contents($request->file('receipt')))) {
            $order->receipt = $hash;
            $order->save();

            $admins = User::whereAdmin(1)->whereBanned(0)->get();
            $admins->each(function($admin) use ($order, $request){
                Mail::send('admin.emails.receipt', ['order' => $order, 'admin' => $admin], function($message) use ($admin, $request) {
                    $message->to($admin->email);
                    $message->subject('Receipt upload');
                    $message->attach($request->file('receipt'), ['as' => 'receipt.jpg']);
                });
            });

            return back()->with('success', 'Receipt uploaded successfully.');
        }
        return back()->with('warning', 'Can\'t upload receipt. Try again later.');
    }
}
