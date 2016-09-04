@extends('layouts.user')

@section('title', 'User Panel')

@section('content')
	    <div class="container-fluid container-padding">
	        <div class="row">
	        	<div class="col-md-12">
	        		<h2 class="text-left fw-300">Transaction History</h2>
	        	</div>
	        </div>
	        @if ($message = session('success'))
	            <div class="alert alert-success">
	                <p>{!! $message !!}</p>
	            </div>
	        @endif

	        @if ($message = session('warning'))
	            <div class="alert alert-warning">
	                <p>{!! $message !!}</p>
	            </div>
	        @endif
	        <div class="row">
	        	<div class="col-md-12">
	        		<div class='table-responsive'>
					<table class='table table-hover table-bordered'>
						<thead>
							<tr>
								<th>Order Number</th>
								<th>Date</th>
								<th>Status</th>
								<th>Amount</th>
								<th>Bitcoins</th>
								<th>Photos</th>
								<th>Actions</th>
							</tr>
						</thead>
						@forelse ($orders as $order)
						<tbody>
						<tr>
					    	<td>{{$order->hash}}</td>
							<td>Date: {{ date('m/d/Y', strtotime($order->created_at)) }}<br /> Time: {{ date('h:i a', strtotime($order->created_at) - 60 * 60 * 4) }}</td>
							<td>{{ucwords($order->status)}}</td>
							<td>${{$order->amount}}</td>
							<td>{{$order->bitcoins}}</td>
							<td>
								<div class="row form-group">
									<div class='col-xs-12'>
									Receipt: 
								@if ($order->receipt)
								<button type="button" title='View' class="btn btn-primary btn-xs" data-toggle="modal" data-target="#receipt-{{$order->hash}}"><span class='fa fa-eye'></span> View Receipt</button>

									<div id="receipt-{{$order->hash}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									  <div class="modal-dialog modal-lg">
									    <div class="modal-content">
									        <div class="modal-body">
									            <img src="{{Storage::url('receipts/'.$order->receipt)}}" class="img-responsive">
									        </div>
									    </div>
									  </div>
									</div>

									@if ($order->status != 'completed' && $order->status != 'cancelled')
									<div style="margin-top:10px;">
										<p>Update image below:</p>
									</div>
									{{Form::open(["route" =>'receipt', 'enctype' => 'multipart/form-data'])}}
									{{Form::file('receipt', ['class' => 'pull-left'])}}
									{{Form::hidden('order', $order->hash)}}
									{{Form::button('Upload', ['type' => 'submit', 'class' => 'btn btn-default pull-left'])}}
									{{Form::close()}}
									@endif
								@else
									@if ($order->status != 'completed' && $order->status != 'cancelled')
									{{Form::open(["route" =>'receipt', 'enctype' => 'multipart/form-data'])}}
										{{Form::file('receipt', ['class' => 'pull-left'])}}
										{{Form::hidden('order', $order->hash)}}
										{{Form::button('Upload', ['type' => 'submit', 'class' => 'btn btn-default pull-left'])}}
									{{Form::close()}}
									@endif
								@endif
									</div>
								</div>
								<div class="row">
									<div class='col-xs-12'>
									Selfie:
								@if ($order->selfie)
								<button type="button" title='View' class="btn btn-primary btn-xs" data-toggle="modal" data-target="#selfie-{{$order->hash}}"><span class='fa fa-eye'></span> View Selfie</button>

									<div id="selfie-{{$order->hash}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									  <div class="modal-dialog modal-lg">
									    <div class="modal-content">
									        <div class="modal-body">
									            <img src="{{Storage::url('selfie/'.$order->selfie)}}" class="img-responsive">
									        </div>
									    </div>
									  </div>
									</div>

									@if ($order->status != 'completed' && $order->status != 'cancelled')
									<div style="margin-top:10px;">
										<p>Update image below:</p>
									</div>
									{{Form::open(["route" =>'selfie', 'enctype' => 'multipart/form-data'])}}
									{{Form::file('selfie', ['class' => 'pull-left'])}}
									{{Form::hidden('order', $order->hash)}}
									{{Form::button('Upload', ['type' => 'submit', 'class' => 'btn btn-default pull-left'])}}
									{{Form::close()}}
									@endif
								@else
									@if ($order->status != 'completed' && $order->status != 'cancelled')
									{{Form::open(["route" =>'selfie', 'enctype' => 'multipart/form-data'])}}
										{{Form::file('selfie', ['class' => 'pull-left'])}}
										{{Form::hidden('order', $order->hash)}}
										{{Form::button('Upload', ['type' => 'submit', 'class' => 'btn btn-default pull-left'])}}
									{{Form::close()}}
									@endif
								@endif
									</div>
								</div>
							</td>
							<td>
								@if ($order->status != 'completed' && $order->status != 'cancelled')
								<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#order-cancel-{{$order->hash}}">
									<span class='fa fa-trash' style="font-size:14px;"> Cancel Order</span>
								</button>
								<div id="order-cancel-{{$order->hash}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
								  <div class="modal-dialog">
								  	{{Form::open(['method' => 'post', 'route' =>['order.cancel', $order->hash]])}}
							        <div class="panel panel-red">
							            <div class="panel-heading">
							                Cancel order <button class="close" data-dismiss="modal">×</button>
							            </div>
							            <div class="panel-body">
							                Are you sure to cancel <b>{{$order->hash}}</b>?
							            </div>
							            <div class="panel-footer">
							                <button type="submit" class="btn btn-primary">Yes</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
							            </div>
							        </div>
							        {{Form::close()}}
								  </div>
								</div>
								@endif
							</td>
						</tr>
						@empty
						<tr>
							<td colspan=7>You have not placed any orders yet.</td>
						</tr>
						@endforelse
						</tbody>
					</table>
					</div>
					{{ $orders->links() }}
		       	</div>
	        </div>
	    </div>
@endsection
