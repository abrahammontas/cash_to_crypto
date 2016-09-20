	<?php 
		$statusClasses = ['pending' => 'warning', 'completed' => 'success', 'issue' => 'danger', 'cancelled' => 'normal'];
	?>

	@forelse ($orders as $i => $order)



	<tr class="{{($i & 1) ? 'odd' : 'even'}}">
    	<td>{{$order->hash}}</td>
    	<td>
			<a href="{{route('admin.users.profile',['id' => $order->user_id])}}">{{ ($order->user->firstName) . ' ' . ($order->user->lastName) }}</a>
    	</td>
		<td>Date: {{ date('m/d/Y', strtotime($order->created_at)) }}<br /> Time: {{ date('h:i a', strtotime($order->created_at) - 60 * 60 * 4) }}</td>
		@if ($order->img_updated_at == '')
            <td></td>
        @else
            <td>Date: {{ date('m/d/Y', strtotime($order->img_updated_at)) }}<br /> Time: {{ date('h:i a', strtotime($order->img_updated_at) - 60 * 60 * 4) }}</td>
        @endif
		@if ($type == 'completed'))
			@if ($order->completed_at == '')
				<td></td>
			@else
				<td>Date: {{ date('m/d/Y', strtotime($order->completed_at)) }}<br /> Time: {{ date('h:i a', strtotime($order->completed_at) - 60 * 60 * 4) }}</td>
            @endif
		@endif
		<td>{{$order->bank->name}}</td>
		<td>{{$order->wallet}}</td>
		<td>{{$order->bitcoins}}</td>
		<td>${{$order->amount}}</td>
		<td>
				<button type="button" title='View' class="btn btn-primary btn-xs" data-toggle="modal" data-target="#photos-{{$order->id}}"><span class='fa fa-eye'></span></button>

				<div id="photos-{{$order->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-lg" style="width:1200px">
				    <div class="modal-content">
				        <div class="modal-body">
				        	<div class='row'>
								<div class='col-xs-4'>
									<a class="fancybox" href="{{Storage::url('photoid/'.$order->user->photoid)}}" target="_blank"><img src="{{Storage::url('photoid/'.$order->user->photoid)}}" class="img-responsive" alt="" /></a>
				        		</div>
				        		<div class='col-xs-4'>
									<a class="fancybox" href="{{ Storage::url('receipts/'.$order->receipt)}}" target="_blank"><img src="{{Storage::url('receipts/'.$order->receipt)}}" class="img-responsive"></a>
				        		</div>
				        		<div class='col-xs-4'>
									<a class="fancybox" href="{{Storage::url('selfie/'.$order->selfie)}}" target="_blank"><img src="{{Storage::url('selfie/'.$order->selfie)}}" class="img-responsive"></a>
				        		</div>
				        	</div>	    
				        </div>
				    </div>
				  </div>
				</div>	
		</td>
		<td>
			<button type='button' class='btn btn-{{$statusClasses[$order->status]}} btn-xs'  data-toggle="modal" data-target="#order-edit-{{$order->id}}">
				<i class='fa fa-pencil'></i> {{ucwords($order->status)}}
			</button>

			<div id="order-edit-{{$order->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
			  <div class="modal-dialog order-edit">
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
			                	{{Form::select('status', ['pending' => 'Pending', 'issue' => 'Issue', 'completed' => 'Completed', 'cancelled' => 'Cancelled'], $order->status, ['class' => 'form-control'])}}
			                </div>
			                <div class='form-group'>
			                	{{Form::textarea('email', $order->email, ['class' => 'form-control', 'placeholder' => 'Email to Buyer'])}}
			                </div>
							<div class='form-group'>
								{{Form::textarea('notes', $order->notes, ['class' => 'form-control', 'placeholder' => 'Order Notes'])}}
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
	@endforelse