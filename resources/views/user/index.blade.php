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
					<table class='table table-bordered table-hover'>
						<tr>
							<th>Order Number</th>
							<th>Date</th>
							<th>Status</th>
							<th>Amount Paid</th>
							<th>Bitcoins Received</th>
							<th style='width:400px'>Receipt</th>
						</tr>
						@forelse ($orders as $order)
						<tr>
					    	<td>{{$order->id}}</td>
							<td>{{$order->created_at}}</td>
							<td>{{$order->status}}</td>
							<td>{{$order->amount}}</td>
							<td>{{$order->bitcoins}}</td>
							<td>
								@if ($order->receipt)
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#receipt-{{$order->id}}">Receipt</button>
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
									{{Form::open(["route" =>'receipt', 'enctype' => 'multipart/form-data'])}}
										{{Form::file('receipt', ['class' => 'pull-left'])}}
										{{Form::hidden('order', $order->id)}}
										{{Form::button('Upload', ['type' => 'submit', 'class' => 'btn btn-default pull-left'])}}
									{{Form::close()}}
								@endif
							</td>
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
