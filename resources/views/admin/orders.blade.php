@extends('layouts.admin')

@section('title', $type.' Orders')

@section('content')
		<?php 
			$statusClasses = ['pending' => 'warning', 'completed' => 'success', 'issue' => 'danger'];
		?>
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
								<!--{{Form::close()}}-->
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
				        <!--
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
				            </div>-->
						<table class='table table-stripped table-hover'>
						<thead>
					        <tr>
					            <!--<th><input class="selectAllBoxes" type="checkbox"></th>-->
					            <th>Order ID</th>
					            <th>User ID</th>
					            <th>Time</th>
					            <th>Bank</th>
					            <th>Wallet Address</th>
					            <th>BTC Amount</th>
					            <th>USD</th>
					            <th>Total Charged</th>
					            <th>Receipt Photo</th>
					            <th>Status</th>
					        </tr>
					    </thead>
						@endif


						<tr class="{{($i & 1) ? 'odd' : 'even'}}">
							<!--<td><input type='checkbox' class='checkbox' name='orders[]' value='{{$order->id}}'/></td>-->
					    	<td>{{$order->hash}}</td>
					    	<td>
					    		@if($order->user->photoid)
				            		<button type='button' data-toggle="modal" data-target="#photoid-{{snake_case($order->bank->company)}}-{{$order->user->id}}" class='btn btn-default btn-xs'>{{$order->user->hash}}</button>

									<div id="photoid-{{snake_case($order->bank->company)}}-{{$order->user->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
									  <div class="modal-dialog modal-lg">
									    <div class="modal-content">
									        <div class="modal-body">
									            <img src="{{Storage::url('photoid/'.$order->user->photoid)}}" class="img-responsive">
									        </div>
									    </div>
									  </div>
									</div>
								@else
								{{$order->user->hash}}
				            	@endif
					    	</td>
							<td>{{$order->created_at}}</td>
							<td>{{$order->bank->name}}</td>
							<td><a target='_blank' class='btn btn-default btn-xs can-select' href='https://blockchain.info/address/{{$order->wallet}}'>{{$order->wallet}}</a></td>
							<td>{{$order->bitcoins}}</td>
							<td>{{$order->amount}}</td>
							<td>{{$order->total}}</td>
							<td>
								@if ($order->receipt)
									<button type="button" title='View' class="btn btn-primary btn-xs" data-toggle="modal" data-target="#receipt-{{$order->id}}"><span class='fa fa-eye'></span></button>
									<a title='Download' target='_blank' class="btn btn-primary btn-xs" href='{{Storage::url('receipts/'.$order->receipt)}}'><span class='fa fa-download'></span></a>
									<div id="receipt-{{$order->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									  <div class="modal-dialog modal-lg">
									    <div class="modal-content">
									        <div class="modal-body">
									            <img src="{{Storage::url('receipts/'.$order->receipt)}}" class="img-responsive">
									        </div>
									    </div>
									  </div>
									</div>
								@else
								
								@endif
							</td>
							<td>
								<button type='button' class='btn btn-{{$statusClasses[$order->status]}} btn-xs'  data-toggle="modal" data-target="#order-edit-{{$order->id}}">
									<i class='fa fa-pencil'></i> {{ucwords($order->status)}}
								</button>

								<div id="order-edit-{{$order->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
								  <div class="modal-dialog">
									{{Form::open(['method' => 'put', 'route' =>['admin.order.update', $order->id]])}}
								        <div class="panel panel-primary">
								            <div class="panel-heading">
								                Edit order <button class="close" data-dismiss="modal">×</button>
								            </div>
								            <div class="panel-body">
								            	<div class='form-group'>
								                	{{Form::number('bitcoins', $order->bitcoins, ['class' => 'form-control', 'placeholder' => 'Bitcoins', 'min' => 0, 'step' => 0.00001, 'required' => true])}}
								                </div>
								                <div class='form-group'>
								                	{{Form::select('status', ['pending' => 'Pending', 'issue' => 'Issue', 'completed' => 'Completed'], $order->status, ['class' => 'form-control'])}}
								                </div>
								                <div class='form-group'>
								                	{{Form::textarea('note', '', ['class' => 'form-control', 'placeholder' => 'Note'])}}
								                </div>
								            </div>
								            <div class="panel-footer">
								          		<input type='hidden' name='company' value='{{$order->bank->company}}'/>
								                <button type="submit" class="btn btn-primary">Save</button>
												<button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
								            </div>
								        </div>
								        {{Form::close()}}
								  </div>
								</div>


								<button type="button" title='Delete' class="btn btn-danger btn-xs" data-toggle="modal" data-target="#order-delete-{{$order->id}}">
									<span class='fa fa-trash'></span>
								</button>
								<div id="order-delete-{{$order->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
								  <div class="modal-dialog">
								  	{{Form::open(['method' => 'delete', 'route' =>['admin.order.delete', $order->id]])}}
							        <div class="panel panel-red">
							            <div class="panel-heading">
							                Delete order <button class="close" data-dismiss="modal">×</button>
							            </div>
							            <div class="panel-body">
							                Are you sure to delete <b>{{$order->hash}}</b>?
							            </div>
							            <div class="panel-footer">
							           		<input type='hidden' name='company' value='{{$order->bank->company}}'/>
							                <button type="submit" class="btn btn-primary">Delete</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							            </div>
							        </div>
							        {{Form::close()}}
								  </div>
								</div>
							</td>
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
