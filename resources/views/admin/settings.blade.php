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

			<div class="row">
				<div class="col-lg-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Banner Text
						</div>
						<div class="panel-body">
							<div class='row' style="padding-right: 15px; padding-left: 15px">

								{{ Form::open(['method' => 'post', 'route' => 'admin.settings']) }}

									<div class="form-group">
										{{ Form::textarea('banner_text', $settings['banner_text'], ['class' => 'form-control', 'size' => '30x4']) }}
									</div>

									<div class="form-group">
										@if($settings['banner_on'] == '1')
											{{ Form::select('banner_on', ['1' => 'Active', '0' => 'Disabled'], '', ['class' => 'form-control', 'style' => 'max-width:100px;']) }}
										@else
											{{ Form::select('banner_on', ['0' => 'Disabled', '1' => 'Active'], '', ['class' => 'form-control', 'style' => 'max-width:100px;']) }}
										@endif
									</div>

									{{ Form::submit('Update Banner', ['class' => 'btn btn-primary']) }}

								{{ Form::close() }}

							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4">
					<div class="panel panel-yellow">
						<div class="panel-heading">
							Store Status
						</div>
						<div class="panel-body">
							<div class='row' style="padding-right: 15px; padding-left: 15px">

								{{ Form::open(['method' => 'post', 'route' => 'admin.settings']) }}

									<div class="form-group">
										@if($settings['open'] == '1')
											{{ Form::select('open', ['1' => 'Open', '0' => 'Closed'], '', ['class' => 'form-control']) }}
										@else
											{{ Form::select('open', ['0' => 'Closed', '1' => 'Open'], '', ['class' => 'form-control']) }}
										@endif
									</div>

									{{ Form::submit('Update Status', ['class' => 'btn btn-primary']) }}

								{{ Form::close() }}

							</div>
						</div>
					</div>
				</div>
			</div>

			{{--{{Form::open(['method' => 'post', 'route' =>'admin.settings'])}}--}}
	        {{--<div class="row">--}}
                {{--<div class="col-lg-4">--}}
                    {{--<div class="panel panel-default">--}}
                        {{--<div class="panel-heading">--}}
                            {{--Limits--}}
                        {{--</div>--}}
                        {{--<div class="panel-body">--}}
                        	{{--<div class='row form-group'>--}}
                        		{{--<div class='col-lg-4'>--}}
                        			{{--Daily Limit:--}}
                        		{{--</div>--}}
                        		{{--<div class='col-lg-8'>--}}
                            		{{--<input type="number" required min="1" name='dailyLimit' value='{{$settings['dailyLimit']}}'/>--}}
                            	{{--</div>--}}
                            {{--</div>--}}
                            {{--<div class='row form-group'>--}}
                        		{{--<div class='col-lg-4'>--}}
                        			{{--Monthly Limit:--}}
                        		{{--</div>--}}
                        		{{--<div class='col-lg-8'>--}}
                            		{{--<input type="number" required min="1" name='monthlyLimit' value='{{$settings['monthlyLimit']}}'/>--}}
                            	{{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
			{{--</div>--}}
			{{--<div class='row'>--}}
				{{--<div class="col-lg-4">--}}
					{{--<button type='submit' class='btn btn-success'>Save</button>--}}
				{{--</div>--}}
			{{--</div>--}}
			{{--{{Form::close()}}--}}

		</div>
@endsection