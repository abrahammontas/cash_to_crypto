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
use Carbon\Carbon;

class OrderController extends Controller
{
    private $price;
    private $current_time;

    public function __construct() {
        $this->price = Settings::getParam('ourprice');
        $this->current_time = Carbon::now()->toDateTimeString();
    }

    public function index(Request $request) {
        $banks = Bank::whereActive(true)->lists('name', 'id');
        return view('buy.form', ['ourbitcoinprice' => $this->price, 'banks' => $banks]);
    }

    public function order(Request $request) {
        if (!Auth::user()->photoid) {
            return back()->withInput()->with('warning', "Please upload your Photo ID in your <a href='/profile'>profile</a>.");
        }

        if (Auth::user()->hasPending()) {
            return back()->withInput()->with('warning', 'Please cancel or complete your current order before submitting a new one.');
        }

        $this->validate($request, [
            'amount' => 'required|numeric',
            'wallet' => 'required|btc_address',
            'bank'   => 'required|integer|exists:banks,id'
        ]);


        $total = round($request->input('amount'), 2);
        $fees = round($total * 0.02, 2);
        $amount = $total;
        $bitcoins = round($amount/$this->price, 5);

        if (Auth::user()->dailyLimitLeft() < $amount) {
            return back()->with('warning', 'Daily limit reached. Try agin later or decrease ammount.')->withInput();
        }

//        if (Auth::user()->monthlyLimitLeft() < $amount) {
//            return back()->with('warning', 'Monthly limit reached. Try agin later or decrease ammount.')->withInput();
//        }

        $faker = \Faker\Factory::create();
        do {
            $hash = $faker->unique()->randomNumber(7, true);
        } while ( Order::whereHash($hash)->exists());



        $order = new Order();
        $order->user_id  = Auth::id();
        $order->hash     = $hash;
        $order->bank_id  = $request->input('bank');
        $order->wallet   = trim($request->input('wallet'));
        $order->amount   = $total;
        $order->bitcoins = $bitcoins;
        $order->total    = $total;
        $order->save();

//        $admins = User::whereAdmin(1)->whereBanned(0)->get();
//        $admins->each(function($admin) use ($order){
//            Mail::send('admin.emails.new', ['order' => $order, 'admin' => $admin], function($message) use ($admin) {
//                $message->to($admin->email);
//                $message->subject('New order');
//            });
//        });

        return redirect()->route('current-order')->with('success', 'Order created successfully. Below you will find your order summary and deposit directions.');
    }

    public function uploadReceipt(Request $request) {
        $this->validate($request, [
            'receipt' => 'required|image',
            'order'   => 'required|exists:orders,hash,user_id,'.Auth::id()
        ]);
        $order = Order::whereHash($request->input('order'))->first();
        $hash = md5(microtime().$order->id);

        if(Storage::put('/public/receipts/'.$hash, file_get_contents($request->file('receipt')))) {
        	$order->img_updated_at = $this->current_time;
            $order->receipt = $hash;
            $order->save();

//            $admins = User::whereAdmin(1)->whereBanned(0)->get();
//            $admins->each(function($admin) use ($order, $request){
//                Mail::send('admin.emails.receipt', ['order' => $order, 'admin' => $admin], function($message) use ($admin, $request) {
//                    $message->to($admin->email);
//                    $message->subject('Receipt upload');
//                    $message->attach($request->file('receipt'), ['as' => 'receipt.jpg']);
//                });
//            });

            return back()->with('success', 'Receipt uploaded successfully.');
        }
        return back()->with('warning', 'Can\'t upload receipt. Try again later.');
    }

    public function uploadSelfie(Request $request) {
        $this->validate($request, [
            'selfie' => 'required|image',
            'order'   => 'required|exists:orders,hash,user_id,'.Auth::id()
        ]);
        $order = Order::whereHash($request->input('order'))->first();
        $hash = md5(microtime().$order->id);

        if(Storage::put('/public/selfie/'.$hash, file_get_contents($request->file('selfie')))) {
        	$order->img_updated_at = $this->current_time;
            $order->selfie = $hash;
            $order->save();

//            $admins = User::whereAdmin(1)->whereBanned(0)->get();
//            $admins->each(function($admin) use ($order, $request){
//                Mail::send('admin.emails.selfie', ['order' => $order, 'admin' => $admin], function($message) use ($admin, $request) {
//                    $message->to($admin->email);
//                    $message->subject('Selfie upload');
//                    $message->attach($request->file('selfie'), ['as' => 'selfie.jpg']);
//                });
//            });

            return back()->with('success', 'Selfie uploaded successfully.');
        }
        return back()->with('warning', 'Can\'t upload selfie. Try again later.');
    }

    public function uploadImages(Request $request) {
        $this->validate($request, [
            'receipt' => 'required_without:selfie|image',
            'selfie' => 'required_without:receipt|image',
            'order'   => 'required|exists:orders,hash,user_id,'.Auth::id()
        ]);
        $order = Order::whereHash($request->input('order'))->first();
        $hash = md5(microtime().$order->id);

        $selfieUploaded = $receiptUploaded = true;

        if ($request->hasFile('receipt')) {
            if(Storage::put('/public/receipts/'.$hash, file_get_contents($request->file('receipt')))) {
                $order->receipt = $hash;
                $order->save();

//                $admins = User::whereAdmin(1)->whereBanned(0)->get();
//                $admins->each(function($admin) use ($order, $request){
//                    Mail::send('admin.emails.receipt', ['order' => $order, 'admin' => $admin], function($message) use ($admin, $request) {
//                        $message->to($admin->email);
//                        $message->subject('Receipt upload');
//                        $message->attach($request->file('receipt'), ['as' => 'receipt.jpg']);
//                    });
//                });
            } else {
                $receiptUploaded = false;
            }
        }

        if ($request->hasFile('selfie')) {
            if(Storage::put('/public/selfie/'.$hash, file_get_contents($request->file('selfie')))) {
                $order->selfie = $hash;
                $order->save();

//                $admins = User::whereAdmin(1)->whereBanned(0)->get();
//                $admins->each(function($admin) use ($order, $request){
//                    Mail::send('admin.emails.selfie', ['order' => $order, 'admin' => $admin], function($message) use ($admin, $request) {
//                        $message->to($admin->email);
//                        $message->subject('Selfie upload');
//                        $message->attach($request->file('selfie'), ['as' => 'selfie.jpg']);
//                    });
//                });

            } else {
                $selfieUploaded = false;
            }
        }

        if ($selfieUploaded && $receiptUploaded && $request->hasFile('receipt') && $request->hasFile('selfie')) {
            $order->img_updated_at = $this->current_time;
            $order->save();
            return back()->with('success', 'Receipt and selfie uploaded successfully.');
        } else if ($selfieUploaded && $request->hasFile('selfie')) {
            $order->img_updated_at = $this->current_time;
            $order->save();
            return back()->with(['success' => 'Selfie uploaded successfully.']);
        } else if ($receiptUploaded && $request->hasFile('receipt')) {
            $order->img_updated_at = $this->current_time;
            $order->save();
            return back()->with(['success' => 'Receipt uploaded successfully.']);
        }
        
        return back()->with('warning', 'Can\'t upload images. Try again later.');
    }

    public function cancel(Request $request, $hash) {
        $order = Order::whereHash($hash)->whereUserId(Auth::id())->first();
        if (!$order) {
            return back()->with('warning', 'Order not found!');
        }
        if ($order->status == 'completed') {
            return back()->with('warning', 'Order completed.');
        }
        if ($order->status == 'cancelled') {
            return back()->with('warning', 'Order already cancelled.');
        }

        $order->status = 'cancelled';
        $order->save();
        return back()->with('success', 'Order successfully cancelled.');
    }
}
