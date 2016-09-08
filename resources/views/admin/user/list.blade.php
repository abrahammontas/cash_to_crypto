@extends('layouts.admin')

@section('title', 'Users')

@section('content')
	    <div class="container-fluid container-padding">
	        <div class="row">
	        	<div class="col-md-12">
	        		<h2 class="text-left fw-300">Users</h2>
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
	        		<div class="table-responsive">
					<table class='table table-stripped table-hover'>
						<thead>
					        <tr>
					            <th>ID</th>
					            <th>First Name</th>
					            <th>Last Name</th>
					            <th>Phone</th>
					            <th>Email</th>
					            <th>Status</th>
					            <th>Selfie</th>
					            <th>Photo ID</th>
					            <th>Registered</th>
					            <th>Actions</th>
					        </tr>
					    </thead>
						@foreach ($users as $i => $user)
						<tr class="{{($i & 1) ? 'odd' : 'even'}}">
				            <td>{{$user->hash}}</td>
				            <td><a href="{{route('admin.users.profile',['id' => $user->id])}}">{{$user->firstName}}</a></td>
				            <td>{{$user->lastName}}</td>
				            <td>{{$user->phone}}</td>
				            <td>{{$user->email}}</td>
				            <td>
				            	@if ($user->banned)
				            		<span class="label label-danger">Banned</span>
				            	@elseif (!$user->is_activated)
				            		<span class="label label-warning">Pending</span>
				            	@else 
				            		<span class="label label-default">Active</span>
				            	@endif
				            </td>
				            <td>
				            	@if($user->photo)
				            		<button data-toggle="modal" data-target="#photo-{{$user->id}}" src="{{Storage::url('photo/'.$user->photo)}}" class='btn btn-primary btn-xs'><i class='fa fa-eye'></i></button>

									<div id="photo-{{$user->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"aria-hidden="true">
									  <div class="modal-dialog modal-lg">
									    <div class="modal-content">
									        <div class="modal-body">
									            <img src="{{Storage::url('photo/'.$user->photo)}}" class="img-responsive">
									        </div>
									    </div>
									  </div>
									</div>
				            	@endif
				            </td>
				            <td>
				            	@if($user->photoid)
				            		<button data-toggle="modal" data-target="#photoid-{{$user->id}}" src="{{Storage::url('photoid/'.$user->photoid)}}" class='btn btn-primary btn-xs'><i class='fa fa-eye'></i></button>
									
									<a title='Download' target='_blank' class="btn btn-primary btn-xs" href='{{Storage::url('photoid/'.$user->photoid)}}'>	<span class='fa fa-download'></span>
									</a>

									<div id="photoid-{{$user->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"aria-hidden="true">
									  <div class="modal-dialog modal-lg">
									    <div class="modal-content">
									        <div class="modal-body">
									            <img src="{{Storage::url('photoid/'.$user->photoid)}}" class="img-responsive">
									        </div>
									    </div>
									  </div>
									</div>
				            	@endif
				            </td>
				            <td>Date: {{ date('m/d/Y', strtotime($user->created_at)) }}<br /> Time: {{ date('h:i a', strtotime($user->created_at) - 60 * 60 * 4) }}</td>
				            <td>
				            	@if(!$user->banned)
				            		{{Form::open(['method' => 'post', 'route' => ['admin.users.ban', $user->id] ]) }}
				            		<button type='submit' title='Ban' class='btn btn-danger btn-xs'><i class='fa fa-ban'></i></button>
				            		{{Form::close()}}
				            	@else
				            		{{Form::open(['method' => 'post', 'route' => ['admin.users.unban', $user->id] ]) }}
				            		<button type='submit' title='Unban' class='btn btn-success btn-xs' style="float:right;"><i class='fa fa-check-circle-o'></i></button>
				            		{{Form::close()}}
				            	@endif
				            	<button data-toggle="modal" data-target="#limits-{{$user->id}}" type='button' title='Limits' class='btn btn-default btn-xs'><i class='fa fa-lock'></i></button>

								<div id="limits-{{$user->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"aria-hidden="true">
								  <div class="modal-dialog modal-lg">
						        	{{Form::open(['method' => 'put', 'route' =>['admin.users.limits', $user->id]])}}
						                <div class="panel panel-yellow">
						                    <div class="panel-heading">
						                        User limits <button class="close" data-dismiss="modal">×</button>
						                    </div>
						                    <div class="panel-body">
						                    	<div class='form-group'>
						                        	{{Form::checkbox('personalLimits', 1, $user->personalLimits)}} Personal limits
						                        </div>
						                    	<div class='form-group'>
						                        	{{Form::number('dailyLimit', $user->dailyLimit, ['class' => 'form-control', 'placeholder' => 'Daily limit'])}}
						                        </div>
						                        <div class='form-group'>
						                        	{{Form::number('monthlyLimit', $user->monthlyLimit, ['class' => 'form-control', 'placeholder' => 'Monthly limit'])}}
						                        </div>
						                    </div>
						                    <div class="panel-footer">
						                        <button type="submit" class="btn btn-primary">Save</button>
						        				<button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
						                    </div>
						                </div>
						            {{Form::close()}}
								  </div>
								</div>
				            </td>
						</tr>
						@endforeach
					</table>
					</div>
					{{ $users->links() }}
		       	</div>
	        </div>
	    </div>
@endsection
