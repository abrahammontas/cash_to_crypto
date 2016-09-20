<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use DB;
use App\Order;
use App\Bank;
use App\User;
use App\Settings;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

class AdminController extends Controller
{
    private $current_time;

    public function __construct() {
        $this->current_time = Carbon::now()->toDateTimeString();
    }
    
    
    public function index() {
        return view(
        	'admin.dashboard',
        	[
        		'banks' => Bank::count(),
        		'pendingOrders'   => Order::whereStatus('pending')
                                        ->whereNotNull('selfie')->where('selfie', '!=', '')
                                        ->whereNotNull('receipt')->where('receipt', '!=', '')
                                    ->count(),
        		'issueOrders' 	  => Order::whereStatus('issue')->count(),
        		'completedOrders' => Order::whereStatus('completed')->count(),
                'users'           => User::count()
        	]
        );
    }

    public function orders($type) {
        $companies = DB::table('banks')
                        ->select(DB::raw("DISTINCT(company)"))
                        ->orderBy('company')
                        ->pluck('company');
        $company = session('company');
        $companies = ['All']+$companies;
        $company = in_array($company, $companies) ? $company : $companies[0];
        return view('admin.orders.page', ['type' => $type, 'companies' => $companies, 'company' => $company]);
    }

    public function getOrders(Request $request) {

        $type = $request->input("type");
        $company = $request->input("company");

        if($type == 'completed' && $company !== 'All') {
            $orders = Order::leftJoin('banks', 'bank_id', '=', 'banks.id')
                ->select(['orders.*','name','company'])
                ->with('user')
                ->where('company', '=', $company);
        } else {
            $orders = Order::leftJoin('banks', 'bank_id', '=', 'banks.id')
                ->select(['orders.*','name','company'])
                ->with('user');
//                ->where('company', '=', $company);
        }

        if ($type !== 'all') {
            $orders->whereStatus($type);
        }
        if ($type == 'pending') {
            $orders->whereNotNull('selfie')->where('selfie', '!=', '')->whereNotNull('receipt')->where('receipt', '!=', '');
        }
        $orders = $orders->orderBy('created_at', 'DESC')->paginate(1000);

        return view('admin.orders.rows', ['orders' => $orders, 'type' => $type]);
    }

	public function banks() {
    	$banks = Bank::paginate(50);
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
        $bank->account_type = $request->input('account_type', $bank->account_type);
        $bank->account_number = $request->input('account_number', $bank->account_number);
        $bank->account_address = $request->input('account_address', $bank->account_address);
        $bank->directions_before = $request->input('directions_before', $bank->directions_before);
        $bank->directions_after = $request->input('directions_after', $bank->directions_after);
    	$bank->active = $request->has('active');

    	$bank->save();

    	return back()->with('success', "Bank {$bank->name} successfully updated." );
    }

    public function bankCreate(Request $request) {
    	$bank = new Bank();

    	$bank->name = $request->input('name', $bank->name);
    	$bank->company = $request->input('company', $bank->company);
        $bank->account_type = $request->input('account_type', $bank->account_type);
        $bank->account_number = $request->input('account_number', $bank->account_number);
        $bank->account_address = $request->input('account_address', $bank->account_address);
        $bank->directions_before = $request->input('directions_before', $bank->directions_before);
        $bank->directions_after = $request->input('directions_after', $bank->directions_after);
    	$bank->active = $request->has('active');

    	$bank->save();
    	
    	return back()->with('success', "Bank {$bank->name} successfully created." );
    }

    public function ordersStatus(Request $request) {
    	$ids = $request->input('orders');
    	$status = $request->input('status');
    	$company = $request->input('company');

    	if (!$status) {
    		return back()->with(['warning' => "Select new status first.", 'company' => $company]);
    	}

    	if (!$ids) {
    		return back()->with(['warning' => "Nothing selected.", 'company' => $company]);
    	}
    	
    	DB::table('orders')->whereIn('id', $ids)->update(['status' => $status]);
		return back()->with(['success' => "Order(s) status successfully changed.", 'company' => $company]);
    }

    public function users() {
        $users = User::orderBy('created_at', 'DESC')->paginate(50);
        return view('admin.user.list', ['users' => $users]);
    }

    public function ban(Request $request, $id) {
        $user = User::find($id);
        if (!$user) {
            return back()->with('warning', 'User not found.');
        }
        $user->banned = true;
        $user->save();

        return back()->with('success', "User {$user->firstName} {$user->lastName} successfully banned." );
    }

    public function unban(Request $request, $id) {
        $user = User::find($id);
        if (!$user) {
            return back()->with('warning', 'User not found.');
        }
        $user->banned = false;
        $user->save();

        return back()->with('success', "User {$user->firstName} {$user->lastName} successfully unbanned." );
    }

    public function orderDelete(Request $request, $id) {
        $order = Order::find($id);
        $company = $request->input('company');
        
        if (!$order) {
            return back()->with(['warning' => 'Order not found.', 'company' => $company]);
        }
        $order->delete();
        return back()->with(['success' => "Order successfully deleted.", 'company' => $company]);
    }

    public function orderUpdate(Request $request, $id) {
        $order = Order::find($id);
        $company = $request->input('company');
        
        if (!$order) {
            return back()->with(['warning' => 'Order not found.', 'company' => $company]);
        }

        $newStatus = $request->input('status');
        $oldStatus = $order->status;
        $bitcoins  = $request->input('bitcoins');
        $email     = $request->input('email');
        $oldEmail  = $order->email;
        $notes     = $request->input('notes');

        $order->status   = $newStatus;
        $order->bitcoins = $bitcoins;
        $order->email    = $email;
        $order->notes    = $notes;
        $order->save();

        if ($newStatus == 'issue') {
            if ($order->email != $oldEmail && $order->email != '') {
                Mail::send('admin.emails.issue', ['order' => $order], function ($message) use ($order) {
                    $message->to($order->user->email);
                    $message->subject('Order Issue - Attention Needed');
                });
            }
        } else {
            if ($order->email != $oldEmail && $order->email != '') {
                Mail::send('admin.emails.general', ['order' => $order], function ($message) use ($order) {
                    $message->to($order->user->email);
                    $message->subject('Message From Support');
                });
            }
        }

        if ($newStatus == 'completed') {
            if ($oldStatus != 'completed') {
                $order->completed_at = $this->current_time;
                $order->save();
                Mail::send('admin.emails.completed', ['order' => $order], function($message) use ($order) {
                    $message->to($order->user->email);
                    $message->subject('Bitcoins Sent!');
                });
            }
        }

        /*if ($newStatus == 'pending') {
            if ($oldStatus == 'issue') {
                Mail::send('admin.emails.resolved', ['order' => $order], function($message) use ($order) {
                    $message->to($order->user->email);
                    $message->subject('Resolved order #'.$order->hash);
                });
            }
        }*/

        return back()->with(['success' => "Order successfully updated.", 'company' => $company]);
    }

    public function settings(Request $request) {
        if ($request->isMethod('post')) {
            Settings::updateParams($request->all());
            return back()->with(['success' => "Settings saved"]);
        }
        return view('admin.settings', ['settings' => Settings::getParams()]);
    }

    public function limits(Request $request, $id) {
        $user = User::find($id);
        if (!$user) {
            return back()->with('warning', 'User not found.');
        }
        
        $user->dailyLimit = $request->input('dailyLimit');
        $user->monthlyLimit = $request->input('monthlyLimit');
        $user->personalLimits = $request->input('personalLimits');
        $user->save();

        return back()->with('success', "User limits saved." );
    }

    public function profile(Request $request, $id) {
        $user = User::find($id);
        return view('admin.user.profile', ['user' => $user]);
    }

    public function userUpdate(Request $request, $id)
    {
        $user = User::find($id);
        $notes = $request->input('notes');

        $user->notes = $notes;
        $user->save();

        return back()->with('success', 'User notes updated successfully');
    }
}
