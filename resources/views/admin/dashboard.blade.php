@extends('layouts.admin')

@section('title', 'User Panel')

@section('content')
            <div class="container-fluid container-padding">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-md-12 page-header">
                        <h1 style="display:inline-block">Welcome, {{Auth::user()->firstName}} {{Auth::user()->lastName}}!</h1>
                        @if(auth()->user()->id === 93)
                            <button type="button" class="btn btn-primary" style="margin:0px 20px 15px" data-toggle="modal" data-target="#viewAs">
                                View As Seller
                            </button>
                        @endif
                    </div>
                </div>
                <!-- /.row -->

                @if(auth()->user()->id === 93)
                <!-- Modal -->
                <div class="modal fade" id="viewAs" tabindex="-1" role="dialog" aria-labelledby="viewAsLabel">
                  <div class="modal-dialog" role="document">
                    {{ Form::open(['method' => 'post', 'route' => 'admin.dashboard']) }}
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="viewAsLabel">Select Seller</h4>
                          </div>
                          <div class="modal-body">
                              <div class="form-group">
                                  <select class="form-control" name="seller" id="">
                                      <option value="">Select</option>
                                      @foreach($sellers as $seller)
                                          <option value="{{ $seller->id }}">{{ $seller->firstName . ' ' . $seller->lastName }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                          </div>
                        </div>
                    {{ Form::close() }}
                  </div>
                </div>
                @endif

                <div class="row">
                    <div class="col-md-2">
                        <div class="panel panel-default" style="border: 1px solid #c9302c">
                                <div class="panel-heading" style="background-color:#ef3734">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-warning fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{$issueOrders}}</div>
                                            <div>Issue Orders</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ $admin_id === 93 ? route('admin.orders', 'issue') : route('admin.orders', ['type' => 'issue', 'admin_id' => $admin_id]) }}" class="issue-link">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right" style="color:#ef3734"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$pendingOrders}}</div>
                                        <div>Pending Orders</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ $admin_id === 93 ? route('admin.orders', 'pending') : route('admin.orders', ['type' => 'pending', 'admin_id' => $admin_id]) }}" style="font-weight:500;">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-flag-checkered fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$completedOrders}}</div>
                                        <div>Completed Orders</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ $admin_id === 93 ? route('admin.orders', 'completed') : route('admin.orders', ['type' => 'completed', 'admin_id' => $admin_id]) }}" style="font-weight:500">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="panel panel-default" style="border: 1px solid #6b6b6b">
                            <div class="panel-heading" style="background-color:#969494">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-flag-checkered fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$cancelledOrders}}</div>
                                        <div>Cancelled Orders</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ $admin_id === 93 ? route('admin.orders', 'cancelled') : route('admin.orders', ['type' => 'cancelled', 'admin_id' => $admin_id]) }}" class="cancelled-link">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-bank fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$banks}}</div>
                                        <div>Banks</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ $admin_id === 93 ? route('admin.banks') : route('admin.banks', $admin_id) }}" style="font-weight:500">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$users}}</div>
                                        <div>Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('admin.users') }}" style="font-weight:500">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
@endsection