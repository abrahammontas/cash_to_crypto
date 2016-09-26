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

@endsection
