@extends('layouts.admin')

@section('title', 'User Panel')

@section('content')
            <div class="container-fluid container-padding">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Welcome, {{Auth::user()->firstName}} {{Auth::user()->lastName}}!
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                
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
                                <a href="{{route('admin.orders', 'issue')}}" class="issue-link">
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
                            <a href="{{route('admin.orders', 'pending')}}" style="font-weight:500;">
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
                            <a href="{{route('admin.orders', 'completed')}}" style="font-weight:500">
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
                            <a href="{{route('admin.orders', 'cancelled')}}" class="cancelled-link">
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
                            <a href="{{route('admin.banks')}}" style="font-weight:500">
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
                            <a href="{{route('admin.users')}}" style="font-weight:500">
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