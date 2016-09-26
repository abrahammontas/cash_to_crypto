@extends('layouts.admin')

@section('title', 'Settings')

@section('content')

	    <div class="container-fluid container-padding">
	        <div class="row">
	        	<div class="col-md-12">
	        		<h2 class="text-left fw-300">Settings</h2>
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
			{{Form::open(['method' => 'post', 'route' =>'admin.settings'])}}
	        <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Limits
                        </div>
                        <div class="panel-body">
                        	<div class='row form-group'>
                        		<div class='col-lg-4'>
                        			Daily Limit:
                        		</div>
                        		<div class='col-lg-8'>
                            		<input type="number" required min="1" name='dailyLimit' value='{{$settings['dailyLimit']}}'/>
                            	</div>
                            </div>
                            {{--<div class='row form-group'>--}}
                        		{{--<div class='col-lg-4'>--}}
                        			{{--Monthly Limit:--}}
                        		{{--</div>--}}
                        		{{--<div class='col-lg-8'>--}}
                            		{{--<input type="number" required min="1" name='monthlyLimit' value='{{$settings['monthlyLimit']}}'/>--}}
                            	{{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
			</div>
			<div class='row'>
				<div class="col-lg-4">
					<button type='submit' class='btn btn-success'>Save</button>
				</div>
			</div>
			{{Form::close()}}
		</div>
@endsection