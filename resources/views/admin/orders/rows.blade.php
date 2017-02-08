	<?php 
		$statusClasses = ['pending' => 'warning', 'completed' => 'success', 'issue' => 'danger', 'cancelled' => 'normal'];
	?>

	@forelse ($orders as $i => $order)



	<tr class="{{($i & 1) ? 'odd' : 'even'}}">
    	<td>{{$order->hash}}</td>
    	<td>
			@if($query != '' && $query != null)
				<a href="{{route('admin.users.profile',['id' => $order->user_id])}}">{{ ucfirst(strtolower($order->firstName)) . " " . ucfirst(strtolower($order->lastName)) }}</a>
			@else
				<a href="{{route('admin.users.profile',['id' => $order->user_id])}}">{{ ucfirst(strtolower($order->user->firstName)) . " " . ucfirst(strtolower($order->user->lastName)) }}</a>
			@endif
    	</td>
		<td><span style="font-weight:700">Date:</span> <br>{{ date('m/d/Y', strtotime($order->created_at)) }} <br><span style="font-weight:700">Time:</span> <br>{{ date('h:i a', strtotime($order->created_at)) }}</td>
		@if ($order->img_updated_at == '')
            <td></td>
        @else
            <td><span style="font-weight:700">Date:</span> <br>{{ date('m/d/Y', strtotime($order->img_updated_at)) }} <br><span style="font-weight:700">Time:</span> <br>{{ date('h:i a', strtotime($order->img_updated_at)) }}</td>
        @endif
		@if ($type == 'completed'))
			@if ($order->completed_at == '')
				<td></td>
			@else
				<td><span style="font-weight:700">Date:</span> <br>{{ date('m/d/Y', strtotime($order->completed_at)) }} <br><span style="font-weight:700">Time:</span> <br>{{ date('h:i a', strtotime($order->completed_at) - 60 * 60 * 5) }}</td>
            @endif
		@endif
		<td>{{$order->bank->name}}</td>
		<td>{{$order->wallet}}</td>
		<td>{{$order->bitcoins}}</td>
		<td>${{$order->amount}}</td>
		<td>
		<table>
			<tr>
				@if ($order->status == 'completed')
				<td>
					<a href="{{route('admin.downloadOrders',$order->id)}}" class="btn btn-primary btn-xs" ><span class='fa fa-download'></span></a>
				</td>
				@endif
				<td>
					<button type="button" title='View' class="btn btn-primary btn-xs" data-toggle="modal" data-target="#photos-{{$order->id}}"><span class='fa fa-eye'></span></button>



					<div id="photos-{{$order->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-body">
								<div class='row' style="margin:10px; margin-top:-10px;">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class='row'>
									<div class='col-md-4' style="margin-bottom:10px;">
										<a class="fancybox" href="{{Storage::url('photoid/'.$order->user->photoid)}}" target="_blank"><img src="{{Storage::url('photoid/'.$order->user->photoid)}}" class="img-responsive" alt="" /></a>
									</div>
									<div class='col-md-4' style="margin-bottom:10px;">
										<a class="fancybox" href="{{ Storage::url('receipts/'.$order->receipt)}}" target="_blank"><img src="{{Storage::url('receipts/'.$order->receipt)}}" class="img-responsive"></a>
									</div>
									<div class='col-md-4' style="margin-bottom:10px;">
										<a class="fancybox" href="{{Storage::url('selfie/'.$order->selfie)}}" target="_blank"><img src="{{Storage::url('selfie/'.$order->selfie)}}" class="img-responsive"></a>
									</div>
								</div>
							</div>
						</div>
					  </div>
					</div>
				</td>
			</tr>
		</table>
		</td>
		<td>

			<button type='button' class='btn {{ ($order->status == 'pending' && ($order->receipt == '' || $order->selfie == '')) ? 'btn-created' : 'btn-' . $statusClasses[$order->status] }} btn-xs'  style="width:100%;" data-toggle="modal" data-target="#order-edit-{{$order->id}}">
				<i class='fa fa-pencil'></i> {{ ($order->status == 'pending' && ($order->receipt == '' || $order->selfie == '')) ? 'Created' : ucwords($order->status) }}
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

			<br />


			<button type="button" title='Delete' class="btn btn-danger btn-xs" style="width:100%; margin-top:3px;" data-toggle="modal" data-target="#order-delete-{{$order->id}}">
				<i class='fa fa-trash'></i> Delete
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
	<tr>
        <td colspan="12" style="text-align: center;">
		{{$links}}
        </td>
	</tr>