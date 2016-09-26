@extends(Auth::user()->admin ? 'layouts.admin' : 'layouts.user')

@section('title', 'Profile')

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                	<h2 class="fw-300">Profile</h2>
                	@if(!Auth::user()->photoid)
	                <div class="alert alert-danger" role="alert">
						Note: You must upload a valid Photo ID before purchasing bitcoins!
                        <!--Note: You must upload both a valid Photo ID and Selfie before purchasing bitcoins!-->
					</div>
					@endif
			        @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{!! $message !!}</p>
                    </div>
                	@endif

                	@if ($message = Session::get('warning'))
                    <div class="alert alert-warning">
                        <p>{!! $message !!}</p>
                    </div>
                	@endif

                    @foreach ($errors->all() as $error) 
                    <div class="alert alert-warning">
                        <p>{{ $error }}</p>
                    </div>
                    @endforeach

                    <div class="form-border" style="margin-top:30px; background-color: #f2f2f2">
                    	<div class="row font-main">
                    		<div class="col-xs-2">
                    			<strong>First Name:</strong>
                    		</div>
                    		<div class="col-xs-4 text-left">
                    			{{Auth::user()->firstName}}
                    		</div>
                    		<div class="col-xs-2">
                    			<strong>Last Name:</strong>
                    		</div>
                    		<div class="col-xs-4 text-left">
                    			{{Auth::user()->lastName}}
                    		</div>
                    	</div>
                        <hr />
                        <div style="margin-top:30px;"></div>
                        <div class="row font-main">
                            <div class="col-xs-2">
                                <strong>Email:</strong>
                            </div>
                            <div class="col-xs-4 text-left">
                                {{Auth::user()->email}}
                            </div>
                            <div class="col-xs-2">
                                <strong>Phone:</strong>
                            </div>
                            <div class="col-xs-4 text-left">
                                {{Auth::user()->phone}}
                            </div>
                        </div>
                        <hr />
                        <div style="margin-top:30px;"></div>
                        <div class="row font-main">
                            <div class="col-xs-2">
                                <strong>Photo ID:</strong>
                            </div>
                            <div class="col-xs-10 col-sm-6 text-left">
                                {{ Form::open(['method'=> 'post', 'enctype' => 'multipart/form-data']) }}
                                    <div class="form-group">
                                        @if (Auth::user()->photoid)
                                            <img class="img-responsive" src="{{Storage::url('photoid/'.Auth::user()->photoid)}}">
                                        	<!-- <div class='thumbnail' style="height:300px; background-size: cover; background-image: url({{Storage::url('photoid/'.Auth::user()->photoid)}})"/></div> -->
                                        @endif

                                        <input type="file" name="photoid">
                                        @if ($errors->has('photoid'))
			                                <span class="help-block label label-danger">
			                                    <strong>{{ $errors->first('photoid') }}</strong>
			                                </span>
			                            @endif
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" value="Update Photo ID">
                                    </div>
                                {{Form::close()}}
                            </div>
                            <!--<div class="col-xs-2">
                                <strong>Selfie Image:</strong>
                            </div>
                            <div class="col-xs-4 text-left">
                                {{ Form::open(['method'=> 'post', 'enctype' => 'multipart/form-data']) }}
                                    <div class="form-group">
                                        @if (Auth::user()->photo)
                                        	<div class='thumbnail' style="height:250px; background-size: cover; background-image: url({{Storage::url('photo/'.Auth::user()->photo)}})"/></div>
                                        @endif
                                        <input type="file" name="photo">
                                        @if ($errors->has('photo'))
			                                <span class="help-block label label-danger">
			                                    <strong>{{ $errors->first('photo') }}</strong>
			                                </span>
			                            @endif
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" value="Update Selfie">
                                    </div>
                                {{ Form::close() }}
                            </div>-->
                        </div>
                        <hr />
                        <div style="margin-top:30px;"></div>
                        
                        <div class="row font-main">
                            <div class="col-xs-2">
                                <strong>Bitcoin Wallets:</strong>
                            </div>
                         	<div class="col-xs-10">
                              	<div class="table-responsive">
	                               	<table class='table table-stripped table-hover'>
	                               		<thead>
									        <tr>
                                                <th>Nickname</th>
									            <th>Bitcoin Address</th>
									            {{--<th>Orders</th>--}}
									            <th></th>
									        </tr>
									    </thead>
										@foreach (Auth::user()->wallets as $wallet)
											<tr>
                                                <td>{{$wallet->name}}</td>
												<td>{{$wallet->address}}</td>
												{{--<td>{{$wallet->orders()->count()}}</td>--}}
												<td>
													<button type="button" title='Delete' class="btn btn-danger btn-xs" data-toggle="modal" data-target="#wallet-delete-{{$wallet->id}}">
														<span class='fa fa-minus'></span>
													</button>
													<div id="wallet-delete-{{$wallet->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
													  <div class="modal-dialog">
													  	{{Form::open(['method' => 'delete', 'route' => 'wallet.delete'])}}
													  	{{Form::hidden('wallet', $wallet->id)}}
												        <div class="panel panel-red">
												            <div class="panel-heading">
												                Delete wallet <button class="close" data-dismiss="modal">×</button>
												            </div>
												            <div class="panel-body">
												                Are you sure to delete <b>{{$wallet->address}}</b> address?
												            </div>
												            <div class="panel-footer">
												                <button type="submit" class="btn btn-primary">Delete</button>
																<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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
                                <button type="button" class="btn btn-outline btn-default pull-right" data-toggle="modal" data-target="#wallet-create">
                                	<span class='fa fa-plus'> Add Bitcoin address</span>
                                </button>
                                
                                <div id="wallet-create" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                  <div class="modal-dialog">
                                	{{Form::open(['method' => 'post', 'route' =>'wallet.create'])}}
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                Create wallet <button class="close" data-dismiss="modal">×</button>
                                            </div>
                                            <div class="panel-body">
                                            	<div class='form-group'>
                                                	{{Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Address', 'required' => true])}}
                                                </div>
                                                <div class='form-group'>
                                                    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nickame', 'required' => true])}}
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
                            </div>
                        </div>
                        <hr/>

                        <div class="row font-main">
                            <div class="col-xs-6 col-sm-2">
                                <strong>Transaction Limits:</strong>
                            </div>
                            <div class="col-xs-6 col-sm-4 text-left">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-3 text-left">Daily:</div>
                                    <div class="col-xs-6 col-sm-9">${{number_format(Auth::user()->dailyLimitUsed(), 0, '.', ',')}} of ${{number_format(Auth::user()->personalLimits ? Auth::user()->dailyLimit : App\Settings::getParam('dailyLimit'), 0, '.', ',')}}</div>
                                </div>
                                {{--<div class="row">--}}
                                    {{--<div class="col-xs-6 col-sm-3 text-left">Monthly:</div>--}}
                                    {{--<div class="col-xs-6 col-sm-9">${{number_format(Auth::user()->monthlyLimitUsed(), 0, '.', ',')}} of ${{number_format(Auth::user()->personalLimits ? Auth::user()->monthlyLimit : App\Settings::getParam('monthlyLimit'), 0, '.', ',')}}</div>--}}
                                {{--</div>--}}
                            </div>
                            <div class="col-xs-2">
                                <!-- Title.... -->
                            </div>
                            <div class="col-xs-4 text-left">
                                <!-- Content.... -->
                            </div>
                        </div>
                    </div>
                </div>
        	</div>
        </div>
@endsection
