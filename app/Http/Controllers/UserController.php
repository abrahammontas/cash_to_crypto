<?php

namespace App\Http\Controllers;

use Auth;
use App\Order;
use App\Wallet;
use App\Settings;
use App\Bank;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use Mail;

class UserController extends Controller
{
    public function index() {
    	$orders = Order::whereUserId(Auth::id())->with('bank')->orderBy('created_at', 'DESC')->paginate(10);
        return view('user.index', ['orders' => $orders]);
    }

    public function wallet() {
        return view('user.wallet');
    }

    public function currentOrder() {
        $order = Order::whereUserId(Auth::id())->with('bank')->whereStatus('pending')->first();
        if ($order) {
            return view('user.current-order', ['order' => $order]);
        }
        return redirect()->route('dashboard');
    }

    public function profile() {
        return view('user.profile');
    }

    public function locations() {
        return view('user.locations', ["banks" => Bank::whereActive(1)->lists('name')]);
    }

    public function profileUpdate(Request $request) {
        $this->validate($request, [
            'photoid' => 'image',
            'photo' => 'image',
        ],
        [
            'photoid.image' => 'Photo ID must be an image.',
            'photo.image' => 'Selfie must be an image.',
        ]); 

        $updated = false;
        $user = Auth::user();

        foreach (['photoid', 'photo'] as $image) {
            if ($request->hasFile($image)) {
                $hash = md5(microtime().$request->file($image));
                if(Storage::put("/public/$image/$hash", file_get_contents($request->file($image)))) {
                    $oldImage = "/public/$image/".$user->$image;
                    if ($user->$image && Storage::exists($oldImage)) {
                        Storage::delete($oldImage);
                    }
                    $user->$image = $hash;
                    $updated = true;
                }
            }
        }

        if ($updated) {
            $user->save();
            return back()->withInput()->with('success', 'Profile updated succesfully');
        }

        return back()->withInput();
    }

    public function walletDelete(Request $request) {
        $this->validate($request, [
            'wallet'   => 'required|integer|exists:wallets,id,user_id,'.Auth::id()
        ]);
        $wallet = Wallet::find($request->input('wallet'));
        $wallet->delete();
        return back()->with('success', 'Wallet succesfully deleted.');
    }

    public function walletCreate(Request $request) {
        $this->validate($request, [
            'address'   => 'required|btc_address',
            'name'      => 'required|max:32'
        ]);
        $wallet = new Wallet();
        $wallet->user_id = Auth::id();
        $wallet->address = trim($request->input('address'));
        $wallet->name = trim($request->input('name'));
        $wallet->save();
        return back()->with('success', 'Wallet successfully created.');
    }

    public function contact(Request $request) {
        $this->validate($request, [
            'email'   => 'required|email',
            'name'    => 'required|max:100',
            'text'    => 'required',
        ]);

        Mail::send('contact.email', $request->all(), function($message) use ($request){
            $message->to('support@cashtocrypto.com');
            $message->subject($request->input('name') . ' - ' . $request->input('subject'));
        });
        return back()->with('success', 'Email sent successfully!');
    }
}
