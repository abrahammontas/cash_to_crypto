@extends('layouts.admin')

@section('title', 'Profile')

@section('content')

    <div class="row" style="margin-left:2%; margin-right:2%;">

        @if ($message = session('success'))
            <div class="alert alert-success">
                <p>{!! $message !!}</p>
            </div>
        @endif

        <div class="col-md-8">
            <h2 class="fw-300">Profile</h2>

            <div class="form-border" style="margin-top:30px; background-color: #f2f2f2">
                <div class="row font-main">
                    <div class="col-xs-2">
                        <strong>First Name:</strong>
                    </div>
                    <div class="col-xs-4 text-left">
                        {{$user->firstName}}
                    </div>
                    <div class="col-xs-2">
                        <strong>Last Name:</strong>
                    </div>
                    <div class="col-xs-4 text-left">
                        {{$user->lastName}}
                    </div>
                </div>
                <hr />
                <div style="margin-top:30px;"></div>
                <div class="row font-main">
                    <div class="col-xs-2">
                        <strong>Email:</strong>
                    </div>
                    <div class="col-xs-4 text-left">
                        {{$user->email}}
                    </div>
                    <div class="col-xs-2">
                        <strong>Phone:</strong>
                    </div>
                    <div class="col-xs-4 text-left">
                        {{$user->phone}}
                    </div>
                </div>
                <hr />
                <div style="margin-top:30px;"></div>
                <div class="row font-main">
                    <div class="col-xs-2">
                        <strong>Photo ID:</strong>
                    </div>
                    <div class="col-xs-10 col-sm-6 text-left">
                            <div class="form-group">
                                @if ($user->photoid)
                                    <img src="{{Storage::url('photoid/'.$user->photoid)}}" class="img-responsive">
                                    <!-- <div class='thumbnail' style="height:250px; background-size: cover; background-image: url({{Storage::url('photoid/'.$user->photoid)}})"/></div> -->
                                @endif
                            </div>
                    </div>
                </div>
                <hr />
                <div style="margin-top:30px;"></div>

                <div class="row font-main">
                    <div class="col-xs-2">
                        <strong>Wallets:</strong>
                    </div>
                    <div class="col-xs-10">
                        <div class="table-responsive">
                            <table class='table table-stripped table-hover'>
                                <thead>
                                    <tr>
                                        <th>Nickame</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                @foreach ($user->wallets as $wallet)
                                    <tr>
                                        <td>{{$wallet->name}}</td>
                                        <td>{{$wallet->address}}</td>
                                    </tr>
                                @endforeach
                            </table>
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
                            <div class="col-xs-6 col-sm-9">${{number_format($user->dailyLimitUsed(), 0, '.', ',')}} of ${{number_format($user->personalLimits ? $user->dailyLimit : App\Settings::getParam('dailyLimit'), 0, '.', ',')}}</div>
                        </div>
                        {{--<div class="row">--}}
                            {{--<div class="col-xs-6 col-sm-3 text-left">Monthly:</div>--}}
                            {{--<div class="col-xs-6 col-sm-9">${{number_format($user->monthlyLimitUsed(), 0, '.', ',')}} of ${{number_format($user->personalLimits ? $user->monthlyLimit : App\Settings::getParam('monthlyLimit'), 0, '.', ',')}}</div>--}}
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
        <div class="col-md-4">
            <h2 class="fw-300">Notes</h2>
            <div class="form-border" style="margin-top:30px; background-color: #f2f2f2">
                {{Form::open(['method' => 'put', 'route' =>['admin.user.update', $user->id]])}}

                <div class='form-group'>
                    {{Form::textarea('notes', $user->notes, ['class' => 'form-control', 'placeholder' => 'User Notes'])}}
                </div>

                <button type="submit" class="btn btn-primary">Save</button>

                {{Form::close()}}
            </div>
        </div>
    </div>

    <div class="row" style="margin-left: 2%; margin-right: 2%; padding-bottom: 60px">
        <div class="col-md-12">
            <h2 class="fw-300" style="margin-bottom: 40px;">Transaction History</h2>
            <div class='table-responsive'>
                <table class='table table-hover table-bordered'>
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Created At</th>
                            <th>Completed At</th>
                            <th>Bank</th>
                            <th>Wallet</th>
                            <th>Amount</th>
                            <th>Bitcoins</th>
                            <th>Photos</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    @forelse ($orders as $order)
                    <tbody>
                        <tr>
                            <td>{{$order->hash}}</td>
                            <td>Date: {{ date('m/d/Y', strtotime($order->created_at)) }}<br /> Time: {{ date('h:i a', strtotime($order->created_at) - 60 * 60 * 5) }}</td>
                            @if ($order->img_updated_at == '')
                                <td></td>
                            @else
                                <td><span style="font-weight:700">Date:</span> <br>{{ date('m/d/Y', strtotime($order->img_updated_at)) }} <br><span style="font-weight:700">Time:</span> <br>{{ date('h:i a', strtotime($order->img_updated_at) - 60 * 60 * 5) }}</td>
                            @endif
                            <td>{{$order->bank->name}}</td>
                            <td>{{$order->wallet}}</td>
                            <td>${{$order->amount}}</td>
                            <td>{{$order->bitcoins}}</td>
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
                            <td>{{ucwords($order->status)}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan=7>This user has not placed any orders.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
