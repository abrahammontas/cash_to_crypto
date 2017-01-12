<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use DB;
use App\Order;
use App\Bank;
use App\User;
use App\Settings;
use Illuminate\Pagination\Paginator;
use Maatwebsite\Excel\Facades\Excel;
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
    

    public function index(Request $request) {

        $admin_id = Auth::user()->id;

        if($request->input('seller') && $request->input('seller') != 93) {
            $userAs = $request->input('seller');
        } else {
            $userAs = Auth::user()->id;
        }

        if($userAs == 93) {
            $users = User::count();
        } else {
            $users = Order::leftJoin('banks', 'bank_id', '=', 'banks.id')
                ->leftJoin('users', 'orders.user_id', '=', 'users.id')
                ->select('users.*')
                ->where('banks.user_id', '=', $userAs)
                ->count();
        }

        return view(
        	'admin.dashboard',
        	[
        		'banks' => Bank::where('user_id', '=', $userAs)
                                ->count(),
        		'pendingOrders'   => Order::leftJoin('banks', 'bank_id', '=', 'banks.id')
                                        ->select(['orders.*','name','company'])
                                        ->with('user')
                                        ->whereStatus('pending')
                                        ->whereNotNull('selfie')->where('selfie', '!=', '')
                                        ->whereNotNull('receipt')->where('receipt', '!=', '')
                                        ->where('banks.user_id', '=', $userAs)
                                        ->count(),
        		'issueOrders' 	  => Order::leftJoin('banks', 'bank_id', '=', 'banks.id')
                                        ->select(['orders.*','name','company'])
                                        ->with('user')
                                        ->whereStatus('issue')
                                        ->where('banks.user_id', '=', $userAs)
                                        ->count(),
        		'completedOrders' => Order::leftJoin('banks', 'bank_id', '=', 'banks.id')
                                        ->select(['orders.*','name','company'])
                                        ->with('user')
                                        ->whereStatus('completed')
                                        ->where('banks.user_id', '=', $userAs)
                                        ->count(),
                'cancelledOrders' => Order::leftJoin('banks', 'bank_id', '=', 'banks.id')
                                        ->select(['orders.*', 'name', 'company'])
                                        ->with('user')
                                        ->whereStatus('cancelled')
                                        ->where('banks.user_id', '=', $userAs)
                                        ->count(),
                'users'           => $users,
                'sellers' => User::where('admin', '=', 1)->get(),
                'admin_id' => $admin_id,
                'userAs'   => $userAs
        	]

        );
    }

    public function indexTwo($admin_id) {

        if(auth()->user()->id !== 93) {
            $admin_id = Auth::user()->id;
        }

        $users = Order::leftJoin('banks', 'bank_id', '=', 'banks.id')
            ->leftJoin('users', 'orders.user_id', '=', 'users.id')
            ->select('users.*')
            ->where('banks.user_id', '=', $admin_id)
            ->count();

        return view(
            'admin.dashboard',
            [
                'banks' => Bank::where('user_id', '=', $admin_id)
                    ->count(),
                'pendingOrders'   => Order::leftJoin('banks', 'bank_id', '=', 'banks.id')
                    ->select(['orders.*','name','company'])
                    ->with('user')
                    ->whereStatus('pending')
                    ->whereNotNull('selfie')->where('selfie', '!=', '')
                    ->whereNotNull('receipt')->where('receipt', '!=', '')
                    ->where('banks.user_id', '=', $admin_id)
                    ->count(),
                'issueOrders' 	  => Order::leftJoin('banks', 'bank_id', '=', 'banks.id')
                    ->select(['orders.*','name','company'])
                    ->with('user')
                    ->whereStatus('issue')
                    ->where('banks.user_id', '=', $admin_id)
                    ->count(),
                'completedOrders' => Order::leftJoin('banks', 'bank_id', '=', 'banks.id')
                    ->select(['orders.*','name','company'])
                    ->with('user')
                    ->whereStatus('completed')
                    ->where('banks.user_id', '=', $admin_id)
                    ->count(),
                'cancelledOrders' => Order::leftJoin('banks', 'bank_id', '=', 'banks.id')
                    ->select(['orders.*', 'name', 'company'])
                    ->with('user')
                    ->whereStatus('cancelled')
                    ->where('banks.user_id', '=', $admin_id)
                    ->count(),
                'users'    => $users,
                'sellers'  => User::where('admin', '=', 1)->get(),
                'admin_id' => $admin_id
            ]
        );
    }

    public function orders(Request $request = null, $type, $admin_id = null, $company = null) {

        $page = "1";
        $query = "";

        if($company == null){
            $company = "All";
        }


        if($request != null){
            $page = $request->input("page");
            $query = $request->input("query");
            $company = $request->input("company");
        }

        if($admin_id == null || Auth()->user()->id !== 93) {

            $admin_id = Auth::user()->id;
        }

        $companies = DB::table('banks')
                        ->select(DB::raw("DISTINCT(company)"))
                        ->where('user_id', '=', $admin_id)
                        ->orderBy('company')
                        ->pluck('company');

        if ($request->input('export')) {

            if($request->input('companyExport') != null) {
                $company = $request->input('companyExport');
            }

            if($company != "All") {
                $banks = Bank::where('company', '=', $company)->select('id')->get()->toArray();
                $completed_orders = Order::whereStatus('completed')->whereIn('bank_id', $banks)->get()->toArray();
            } else {
                $completed_orders = Order::whereStatus('completed')->get()->toArray();
            }
            $export = Excel::create('completed_orders', function($excel) use ($completed_orders) {
                $excel->sheet('completed_orders_sheet', function($sheet) use ($completed_orders) {
                    $sheet->fromArray($completed_orders);
                })->export('xls');
            });

            return back()->with('export', $export);
        }

        return view('admin.orders.page', ['type' => $type, 'company' => $company , 'query' => $query, 'companies' => $companies, 'admin_id' => $admin_id, 'page' => $page]);
    }

    public function getOrders(Request $request) {

        $type = $request->input("type");
        $page = $request->input("page");
        $query = $request->input("query");
        $company = $request->input("company");
        $admin_id = $request->input("admin_id");

        if($admin_id == null || auth()->user()->id !== 93) {
            $admin_id = Auth::user()->id;
        }

        if(null != $query && $query != "") {
            $orders = Order::leftJoin('banks', 'bank_id', '=', 'banks.id')
                ->leftJoin('users', 'orders.user_id', '=', 'users.id')
                ->where("banks.user_id", "=", $admin_id)
                ->Where(function ($orderQuery) use ($query){
                    $orderQuery->where('users.firstName', 'LIKE', '%' . $query . '%')
                               ->orWhere('users.lastName', 'LIKE', '%' . $query . '%')
                               ->orWhere('banks.name', 'LIKE', '%' . $query . '%')
                               ->orWhere('orders.wallet', 'LIKE', '%' . $query . '%');
                });

        } else {
            $orders = Order::leftJoin('banks', 'bank_id', '=', 'banks.id')
                ->select(['orders.*','name','company'])
                ->with('user')
                ->where('banks.user_id', '=', $admin_id);
        }


        if(isset($company) && $company !== 'All'){
            $orders->where('banks.company', '=', $company);
        }
        if ($type !== 'all') {
            $orders->whereStatus($type);
        }
        if ($type == 'pending') {
            $orders->whereNotNull('selfie')->where('selfie', '!=', '')->whereNotNull('receipt')->where('receipt', '!=', '');
        }

        $orders = $orders->orderBy('orders.created_at', 'DESC')->paginate(50);

        $links = $orders->appends(['type' => $type, 'company' => $company, 'query' => $query]);

        $links->setPath($links->resolveCurrentPath()."/".$type);

        return view('admin.orders.rows', ['links' => $links, 'orders' => $orders, 'type' => $type, 'admin_id' => $admin_id, 'query' => $query, 'company' => $company, 'page' => $page]);
    }

	public function banks($admin_id = null) {

        if($admin_id == null || auth()->user()->id !== 93) {
            $admin_id = Auth::user()->id;
        }

    	$banks = Bank::where('user_id', '=', $admin_id)
                ->paginate(50);
        return view('admin.bank.list', ['banks' => $banks, 'admin_id' => $admin_id ]);
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

    public function bankCreate(Request $request, $admin_id = null) {

        if($admin_id == null) {
            $admin_id = Auth::user()->id;
        }

    	$bank = new Bank();

        $bank->user_id = $admin_id;
    	$bank->name = $request->input('name', $bank->name);
    	$bank->company = $request->input('company', $bank->company);
        $bank->account_type = $request->input('account_type', $bank->account_type);
        $bank->account_number = $request->input('account_number', $bank->account_number);
        $bank->account_address = $request->input('account_address', $bank->account_address);
        $bank->directions_before = $request->input('directions_before', $bank->directions_before);
        $bank->directions_after = $request->input('directions_after', $bank->directions_after);
    	$bank->active = $request->has('active');

    	$bank->save();
    	
    	return back()->with(['success' => "Bank {$bank->name} successfully created.", 'admin_id' => $admin_id]);
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

    public function users($admin_id = null) {

        if($admin_id == null || auth()->user()->id !== 93) {
            $admin_id = Auth::user()->id;
        }

        if($admin_id == 93) {
            $users = User::orderBy('created_at', 'DESC')->paginate(50);
        } else {
            $users = Order::leftJoin('banks', 'bank_id', '=', 'banks.id')
                ->leftJoin('users', 'orders.user_id', '=', 'users.id')
                ->select('users.*')
                ->where('banks.user_id', '=', $admin_id)
                ->orderBy('orders.created_at', 'DESC')
                ->groupBy('users.id')
                ->paginate(50);
        }

        return view('admin.user.list', ['users' => $users, 'admin_id' => $admin_id]);
    }


    public function postUsers(Request $request, $admin_id = null) {

        $query = $request->input('search');

        if($admin_id == null) {
            $admin_id = Auth::user()->id;
        }

        if ($query != '' && $query != null) {
            if($admin_id == 93) {
                $users = DB::table('users')
                    ->where('firstName', 'LIKE', '%' . $query . '%')
                    ->Where(function ($orderQuery) use ($query){
                        $orderQuery->where('firstName', 'LIKE', '%' . $query . '%')
                                   ->orWhere('lastName', 'LIKE', '%' . $query . '%')
                                   ->orWhere('phone', 'LIKE', '%' . $query . '%');
                    })
                    ->paginate(50);
            } else {
                $users = Order::leftJoin('banks', 'bank_id', '=', 'banks.id')
                    ->leftJoin('users', 'orders.user_id', '=', 'users.id')
                    ->select('users.*')
                    ->where('banks.user_id', '=', $admin_id)
                    ->Where(function ($orderQuery) use ($query){
                        $orderQuery->where('firstName', 'LIKE', '%' . $query . '%')
                                   ->orWhere('lastName', 'LIKE', '%' . $query . '%')
                                   ->orWhere('phone', 'LIKE', '%' . $query . '%');
                    })
                    ->paginate(50);
            }

            return view('admin.user.list', ['users' => $users, 'admin_id' => $admin_id]);
        }

        if ($request->input('export')) {

            $users = User::all()->toArray();
            $export = Excel::create('users', function($excel) use ($users) {
                $excel->sheet('users_sheet', function($sheet) use ($users) {
                    $sheet->fromArray($users);
                })->export('xls');
            });
            return back()->with('export', $export);
        }

        return back()->with('admin_id', $admin_id);
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
                $status = 'completed';
                $amount = $order->amount;
                Mail::send('admin.emails.completed', ['order' => $order], function($message) use ($order) {
                    $message->to($order->user->email);
                    $message->subject('Bitcoins Sent!');
                });
            }
        } else {
            $status = '';
            $amount = '';
        }

        return back()->with(['success' => "Order successfully updated.", 'company' => $company, 'status' => $status, 'amount' => $amount]);    }

    public function settings(Request $request) {
        if(auth()->user()->id !== 93) {
            return redirect('admin.index');
        }

        if ($request->isMethod('post')) {
            Settings::updateParams($request->all());
            if($request->has('banner_on')) {
                return back()->with(['success' => "Banner updated"]);
            } else {
                return back()->with(['success' => "Store status updated"]);
            }
        }

        $admin_id = null;
        return view('admin.settings', ['settings' => Settings::getParams(), 'admin_id' => $admin_id]);
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
        $orders = Order::whereUserId($id)->with('bank')->orderBy('created_at', 'DESC')->paginate(100);
        $admin_id = null;
        return view('admin.user.profile', ['user' => $user, 'orders' => $orders, 'admin_id' => $admin_id]);
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
