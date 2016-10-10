@extends('layouts.main')

@section('title', 'Purchase Bitcoins')

@section('content')

<!-- Loader -->
<div class="loader">
    <div class="loader-img"></div>
</div>

<!-- Top content -->
<div class="top-content">
    <!-- Top menu -->
    <nav class="navbar navbar-inverse" role="navigation" style="margin-bottom:0px; background-color:white;">
        <div class="container">
            <div class="navbar-header">
                @if(Auth::guest())
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                @endif
                <a href="/"><img src="images/c2clogo.png" style="max-width:230px; margin-top:10px;" class="hidden-xs hidden-sm" alt="Cash-To-Crypto-logo"></a>
            </div>

            @if(Auth::guest())
                <div class="scroll-link exchange-rate hidden-md hidden-lg pull-left" style="color:white; padding-left:0px; margin-top:-50px;">
                    <img src="images/c2clogo.png" class="pull-left" style="max-width:200px" alt="c2c-logo"><br />
                    <span style="font-weight:400; color:#5FB06F;" class="text-left">Exchange Rate: 1BTC</span> <span style="color:#9F9F9F">=</span> <span style="font-weight:400; color:#CCA75C">${{number_format(\App\Settings::getParam('ourprice'),2)}}</span>
                </div>
            @else
                <div class="scroll-link exchange-rate hidden-md hidden-lg" style="color:white; padding-left:0px;">
                    <img src="images/c2clogo.png" style="max-width:200px" alt="c2c-logo"><br />
                    <span style="font-weight:400; color:#5FB06F;">Exchange Rate: 1BTC</span> <span style="color:#9F9F9F">=</span> <span style="font-weight:400; color:#CCA75C">${{number_format(\App\Settings::getParam('ourprice'),2)}}</span>
                </div>
            @endif


            @if(!Auth::guest())
                <div class="dropdown hidden-md hidden-lg">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Hi, {{ Auth::user()->firstName}} {{ Auth::user()->lastName}}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu text-center" style="left:30.5%;" role="menu">
                        {{--@if (auth()->user()->hasPending() == 0)--}}
                            {{--<li><a href="/buy-bitcoins"><button class="btn-menu-buy">Buy Bitcoins!</button></a></li>--}}
                        {{--@endif--}}
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ Auth::user()->admin ? route('admin.dashboard') : route('dashboard') }}"><i class="fa fa-btn fa-dashboard"></i> Dashboard</a></li>
                        @if (auth()->user()->hasPending())
                            <li>
                                <a href="{{route('current-order')}}"> Current Order</a>
                            </li>
                        @endif
                        <li><a href="{{ route('profile') }}"><i class="fa fa-fw fa-list-ul"></i> Profile</a></li>
                        <li><a href="{{ url('/directions') }}" style="color:#5b5b5b;">Directions</a></li>
                        <li><a href="{{ url('/atm-locations') }}" style="color:#5b5b5b;">Bitcoin ATMs</a></li>
                        <li><a href="{{ url('/contact') }}" style="color:#5b5b5b;">Contact</a></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                    </ul>
                </div>
        @endif

        <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="top-navbar-1">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ url('/directions') }}" style="color:#5b5b5b;">Directions</a></li>
                        <li><a href="{{ url('/atm-locations') }}" style="color:#5b5b5b;">Bitcoin ATMs</a></li>
                        <li><a href="{{ url('/contact') }}" style="color:#5b5b5b;">Contact</a></li>
                        <li><a class="btn btn-link-2 btn-login" href="{{ url('/login') }}">Login</a></li>
                        <li><a class="btn btn-link-2 btn-register" href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li>
                            <div class="dropdown hidden-xs hidden-sm">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Hi, {{ Auth::user()->firstName}} {{ Auth::user()->lastName}}
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    {{--@if (auth()->user()->hasPending() == 0)--}}
                                        {{--<li><a href="/buy-bitcoins"><button class="btn-menu-buy">Buy Bitcoins!</button></a></li>--}}
                                    {{--@endif--}}
                                    <li><a href="/">Home</a></li>
                                    <li><a href="{{ Auth::user()->admin ? route('admin.dashboard') : route('dashboard') }}"><i class="fa fa-btn fa-dashboard"></i> Dashboard</a></li>
                                    @if (auth()->user()->hasPending())
                                        <li>
                                            <a href="{{route('current-order')}}"> Current Order</a>
                                        </li>
                                    @endif
                                    <li><a href="{{ route('profile') }}"><i class="fa fa-fw fa-list-ul"></i> Profile</a></li>
                                    <li><a href="{{ url('/directions') }}" style="color:#5b5b5b;">Directions</a></li>
                                    {{--<li><a href="{{ url('/atm-locations') }}" style="color:#5b5b5b;">Bitcoin ATMs</a></li>--}}
                                    <li><a href="{{ url('/contact') }}" style="color:#5b5b5b;">Contact</a></li>
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    @endif
                    <li class="scroll-link exchange-rate hidden-xs hidden-sm"><span style="font-weight:400; color:#5FB06F;">Exchange Rate: 1BTC</span> <span style="color:#9F9F9F">=</span> <span style="font-weight:400; color:#CCA75C">${{number_format(\App\Settings::getParam('ourprice'),2)}}</span></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<div class="wrapper" style="background-color:#f2f2f2;">
    <div class="container">
        <div class="row">
            <form action="{{route('buy')}}" data-toggle="validator" data-disable="false" id="buy-form" name="buy-form" role="form"  method="post">
                {{ csrf_field() }}
                <div class="row" style="margin: 6% 7%; margin-bottom:7%;">
                    <div class="col-sm-5 col-sm-offset-1" style="position: inherit !important;">
                        <div class="buy-form" style="
                        border: 1px solid black !important;
                        border-radius: 4px;
                        background-color: white;
                        padding: 5% 7%;
                        margin-top: 5%;
                        margin-bottom: 2%;
                ">
                            <h2 class="text-center form-title-font">Buy Bitcoins</h2>
                            <hr>
                            @if ($message = session('success'))
                                <div class="alert alert-success" style="margin-top:5%;">
                                    <p>{!! $message !!}</p>
                                </div>
                            @endif

                            @if ($message = session('warning'))
                                <div class="alert alert-warning">
                                    <p>{!! $message !!}</p>
                                </div>
                            @endif

                            <div class="form-group form-inline{{ $errors->has('bank') ? ' has-error' : '' }}">
                                <label for="order-bank" style="pdding:0% 7%; font-weight:400;">Banks:</label>
                                {{ Form::select('bank', $banks, old('bank'), ['class'=> 'form-control pull-right', 'style'=>'width:200px', 'required']) }}
                                @if ($errors->has('bank'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('bank') }}</strong>
                            </span>
                                @endif
                            </div>
                            <hr>
                            <div class="form-group form-inline{{ $errors->has('amount') ? ' has-error' : '' }}">
                                <label for="bitcoin-amount" style="font-weight:400;">USD Amount:</label>
                                <input type="number" step="any" min="101"  name="amount" style="width:200px" id="amount" data-error="Please enter an an amount larger than $101" class="form-control pull-right" required value="{{old('amount')}}">

                                <div class="help-block with-errors">
                                    <strong>{{ $errors->first('amount') }}</strong>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group form-inline{{ $errors->has('wallet') ? ' has-error' : '' }}">
                                <label for="bitcoin-address" style="font-weight:400;">Wallet Address:</label>
                                <div class="input-group pull-right" style="width:40px">
                                    <input type="text" style="width:170px; height:34px;" name="wallet" id='wallet' value='{{old('wallet')}}' class="form-control" required aria-label="Wallet">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default dropdown-toggle" style="height:34px; width:30px; padding-right:10px; padding-left:10px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class='fa fa-btc'></span> <span class="caret" style="padding-bottom:20px;"></span></button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            @forelse (Auth::user()->wallets as $wallet)
                                                <li><a href="" class='saved-wallet' data-target='#wallet' data-address="{{$wallet->address}}">{{$wallet->name}}</a></li>
                                            @empty
                                                <li><a href="#" onclick='return false'>You have no saved wallets</a></li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                                @if ($errors->has('wallet'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('wallet') }}</strong>
                            </span>
                                @endif
                            </div>
                            <hr>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="col-md-12 hidden-sm hidden-xs" style="margin-top:10px; padding-left:0px; padding-right:0px;">
                            <input class="btn btn-success form-control" style="height:50px; font-size:20px; font-weight:300;" type="submit" name="submit-order" value="GET BITCOINS!">
                        </div>

                    </div>
                    <div class="col-sm-5 col-sm-offset-1" style="position: inherit !important;">
                        <div class="buy-form" style="
                        border: 1px solid black !important;
                        border-radius: 4px;
                        background-color: white;
                        padding: 5% 7%;
                        margin-top: 5%;
                        margin-bottom: 2%;
                ">
                            <div class="form-border" style="margin-bottom:0px;">
                            <div class="form-border" style="margin-bottom:0px;">
                                <h2 class="text-center form-title-font">Pricing Information</h2>
                                <hr>
                                <div class="form-group form-inline">
                                    <label for="bitcoin-price"><span style="font-weight:400">Bitcoin Price:</span></label>
                                    <input readonly="readonly" id='bitcoin_price' name="bitcoin_price" class="form-control pull-right" style="border:none; background-color:transparent; box-shadow:none; text-align:right; width:80px;" value="${{ number_format((float)$ourbitcoinprice, 2, '.', '')}}">
                                </div>
                                <hr>
                                <div class="form-group form-inline">
                                    <label for="estimated-bitcoins"><span style="font-weight:400">Estimated Bitcoins:</span></label>
                                    <input readonly="readonly" name="bitcoins" class="form-control pull-right" id="estimated_bitcoins" style="border:none; background-color:transparent; box-shadow:none; text-align:right; width:80px;" value="0.00000">
                                </div>
                                <div class="form-group text-center" style="margin-top:20px;">
                                    <span style="color:red">Note: Actual Bitcoin Amount will be calculated when your receipt is uploaded.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row hidden-md hidden-lg" style="margin-bottom:10%; margin-left:9%; margin-right:9%;">
                    <input class="btn btn-success form-control" style="height:50px; font-size:20px; font-weight:300;" type="submit" name="submit-order" id="submit-order" value="GET BITCOINS!">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    (function($){
        $(document).on("change keyup mouseup blur", "#amount", function(){
            var amount = parseFloat($("#amount").val() ? $("#amount").val() : 0);

            $("#estimated_bitcoins").val((amount/{{number_format($ourbitcoinprice, 2)}}).toFixed(5));
        });
        $("#amount").change();

        $(document).on("click", ".saved-wallet", function(e){
            e.preventDefault();
            $($(this).attr('data-target')).val($(this).attr('data-address')).change();
        });

    })(jQuery);

    (function($){
        $(document).on("change keyup mouseup blur", "#amount-mobile", function(){
            var amount = parseFloat($("#amount-mobile").val() ? $("#amount-mobile").val() : 0);

            $("#estimated_bitcoins_mobile").val((amount/{{number_format($ourbitcoinprice, 2)}}).toFixed(5));
        });
        $("#amount-mobile").change();

        $(document).on("click", ".saved-wallet-mobile", function(e){
            e.preventDefault();
            $($(this).attr('data-target')).val($(this).attr('data-address')).change();
        });

    })(jQuery);
</script>
@endsection
