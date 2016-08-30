@extends('layouts.admin')

@section('title', 'Banks')

@section('content')
	    <div class="container-fluid container-padding">
	        <div class="row">
	        	<div class="col-md-12">
	        		<h2 class="text-left fw-300">Banks</h2>@include('admin.bank.create')
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
					            <th>Name</th>
					            <th>Company</th>
								<th>Account</th>
								<th>Address</th>
								<th>Account Number</th>
					            <th>Status</th>
					            <th>Actions</th>
					        </tr>
					    </thead>
						@foreach ($banks as $i => $bank)
						<tr class="{{($i & 1) ? 'odd' : 'even'}}">
					    	<td> {{ $bank->name }} </td>
					    	<td> {{ $bank->company }} </td>
							<td> {{ $bank->account_type }} </td>
							<td> {{ $bank->account_address }} </td>
							<td> {{ $bank->account_number }} </td>
							<td>{{$bank->active ? 'Enabled' : 'Disabled'}}</td>
							<td>
								@include('admin.bank.edit', ['bank' => $bank])
								@include('admin.bank.delete', ['bank' => $bank])
							</td>
						</tr>
						@endforeach
					</table>
					</div>
					{{ $banks->links() }}
		       	</div>
	        </div>
	    </div>
@endsection
