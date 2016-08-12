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
	        		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						@forelse ($orders as $i => $order)
						@if ($i == 0 || ($i > 0 && $orders[$i]->company != $orders[$i-1]->company))
							
							@if ($i != 0)
								</table>
								{{Form::close()}}
							</div>
						</div>
					</div>
				</div>
							@endif
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="heading{{snake_case($order->bank->company)}}">
				      <h4 class="panel-title">
				        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{snake_case($order->bank->company)}}" aria-expanded="true" aria-controls="collapse{{snake_case($order->bank->company)}}">
				          {{$order->bank->company}}
				        </a>
				      </h4>
				    </div>
				    <div id="collapse{{snake_case($order->bank->company)}}" class="panel-collapse collapse {{$order->bank->company == session('company')  ? 'in' : ''}}" role="tabpanel" aria-labelledby="heading{{snake_case($order->bank->company)}}">
				      <div class="panel-body">
				        <div class="table-responsive">
				        {{Form::open(['method' => 'post', 'route' => 'admin.orders.status'])}}
				        	<div class="col-xs-2" style="padding: 0px 0px 10px 0px;">
					            <select class="form-control" name="status">
					              <option value="">Change status</option>
					              <option value="pending">Pending</option>
					              <option value="completed">Completed</option>
					              <option value="issue">Issue</option>
					            </select>
				            </div>
				            <div class="col-xs-4">
				            	<input type='hidden' name='company' value='{{$order->bank->company}}'/>
				              	<input type="submit" name="submit" class="btn btn-success"  style="padding-left:15px; padding-right:15px;"  value="Submit">
				            </div>
						<table class='table table-stripped table-hover'>
						<thead>
					        <tr>
					            <th><input class="selectAllBoxes" type="checkbox"></th>
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
						@endif


						<tr class="{{($i & 1) ? 'odd' : 'even'}}">
							<td><input type='checkbox' class='checkbox' name='orders[]' value='{{$order->id}}'/></td>
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
							<td>{{ucwords($order->status)}}</td>
						</tr>
						@empty
						<tr>
							<td colspan=11>No orders yet.</td>
						</tr>
						@endforelse
					</table>
				</div>
			</div>
		</div>
	</div>
					{{ $orders->links() }}
		       	</div>
	        </div>
	    </div>
	</div>
@endsection

@section('scripts')
<script>
	$(document).ready(function () {
	    $('.selectAllBoxes').click(function (event) {
	    	var instance = this;
	        $('.checkbox', $(this).closest("form")).each(function () {
	            this.checked = instance.checked;
	        });
	    });
	    if (!$('.panel-collapse.collapse.in').length) {
	    	$('.panel-collapse.collapse:first').addClass('in');
	    }
	});
</script>
@endsection
