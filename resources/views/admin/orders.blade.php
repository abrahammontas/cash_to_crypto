@extends('layouts.admin')

@section('title', $type.' Orders')

@section('content')
	<div class="wrapper" style="background-color:white;">
	    <div class="container-fluid container-padding">
	        <div class="row">
	        	<div class="col-md-12">
	        		<h2 class="text-left fw-300">{{$type.' Orders'}}</h2>
	        	</div>
	        </div>
	        @if ($message = session('success'))
	            <div class="alert alert-success">
	                <p>{{ $message }}</p>
	            </div>
	        @endif

	        @if ($message = session('warning'))
	            <div class="alert alert-warning">
	                <p>{{ $message }}</p>
	            </div>
	        @endif
	        <div class="row">
	        	<div class="col-md-12">
					<table class='table table-stripped table-hover'>
						<thead>
					        <tr>
					            <th><input id="selectAllBoxes" type="checkbox"></th>
					            <th>Order ID</th>
					            <th>Order User ID</th>
					            <th>Time</th>
					            <th>Bank</th>
					            <th>Wallet Address</th>
					            <th>BTC Amount</th>
					            <th>USD</th>
					            <th>Total Charged</th>
					            <th>Receipt Photo</th>
					            <th>Order Status</th>
					        </tr>
					    </thead>
						@forelse ($orders as $i => $order)
						<tr class="{{($i & 1) ? 'odd' : 'even'}}">
							<td><input type='checkbox' name='orders[]' value='{{$order->id}}'/></td>
					    	<td>{{$order->id}}</td>
					    	<td>{{$order->user->id}}</td>
							<td>{{$order->created_at}}</td>
							<td>{{$order->bank->name}}</td>
							<td>{{$order->wallet}}</td>
							<td>{{$order->bitcoins}}</td>
							<td>{{$order->amount}}</td>
							<td>{{$order->total}}</td>
							<td>
								@if ($order->receipt)
									<button type="button" title='View' class="btn btn-primary btn-xs" data-toggle="modal" data-target="#receipt-{{$order->id}}"><span class='fa fa-eye'></span></button>
									<a title='Download' target='_blank' class="btn btn-primary btn-xs" href='{{asset('/storage/receipts/'.$order->receipt)}}'><span class='fa fa-download'></span></a>
									<div id="receipt-{{$order->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									  <div class="modal-dialog">
									    <div class="modal-content">
									        <div class="modal-body">
									            <img src="{{asset('/storage/receipts/'.$order->receipt)}}" class="img-responsive">
									        </div>
									    </div>
									  </div>
									</div>
								@else
								
								@endif
							</td>
							<td>{{$order->status}}</td>
						</tr>
						@empty
						<tr>
							<td colspan=11>No orders yet.</td>
						</tr>
						@endforelse
					</table>
					{{ $orders->links() }}
		       	</div>
	        </div>
	    </div>
	</div>
@endsection
