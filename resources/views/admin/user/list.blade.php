@extends('layouts.admin')

@section('title', 'Users')

@section('content')
	<div class="wrapper" style="background-color:white;">
	    <div class="container-fluid container-padding">
	        <div class="row">
	        	<div class="col-md-12">
	        		<h2 class="text-left fw-300">Users</h2>
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
				            <td>{{$user->firstName}}</td>
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
				            <td>{{$user->created_at}}</td>
				            <td>
				            	@if(!$user->banned)
				            		{{Form::open(['method' => 'post', 'route' => ['admin.users.ban', $user->id] ]) }}
				            		<button type='submit' title='Ban' class='btn btn-danger btn-xs'><i class='fa fa-ban'></i></button>
				            		{{Form::close()}}
				            	@else
				            		{{Form::open(['method' => 'post', 'route' => ['admin.users.unban', $user->id] ]) }}
				            		<button type='submit' title='Unban' class='btn btn-success btn-xs'><i class='fa fa-check-circle-o'></i></button>
				            		{{Form::close()}}
				            	@endif
				            </td>
						</tr>
						@endforeach
					</table>
					{{ $users->links() }}
		       	</div>
	        </div>
	    </div>
	</div>
@endsection
