@extends('layouts.user')

@section('title', 'User Panel')

@section('content')
	<div class="wrapper" style="background-color:white;">
	    <div class="container-fluid container-padding">
	        <div class="row">
	        	<div class="col-md-12">
	        		<h2 class="text-left fw-300">Transaction History</h2>
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-md-12">
					<table class='table table-bordered table-hover'>
						<tr>
							<th>Order Number</th>
							<th>Date</th>
							<th>Status</th>
							<th>Amount Paid</th>
							<th>Bitcoins Received</th>
						</tr>
						@forelse ($orders as $order)
						<tr>
					    	<td>{{$order->id}}</td>
							<td>{{$order->created_at}}</td>
							<td>{{$order->status}}</td>
							<td>{{$order->amount}}</td>
							<td>{{$order->bitcoins}}</td>
						</tr>
						@empty
						<tr>
							<td colspan=5>You have not placed any orders yet.</td>
						</tr>
						@endforelse
					</table>
					{{ $orders->links() }}
		       	</div>
	        </div>
	    </div>
	</div>
@endsection
