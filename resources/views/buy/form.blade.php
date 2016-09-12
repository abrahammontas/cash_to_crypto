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
    <nav class="navbar navbar-inverse" role="navigation" style="margin-bottom:0px;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Cash To Crypto - Buy Bitcoins!</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="top-navbar-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/" style="color:white !important;">Home</a></li>
                    <li><a href="/contact" style="color:white !important;">Contact</a></li>
                    @if (Auth::guest())
                        <li><a class="btn btn-link-2" href="{{ url('/login') }}">Login</a></li>
                        <li><a class="btn btn-link-2" style="background-color:#707070; color:white;" href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Hi, {{ Auth::user()->firstName}} {{ Auth::user()->lastName}}
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ Auth::user()->admin ? route('admin.dashboard') : route('dashboard') }}"><i class="fa fa-btn fa-dashboard"></i> Dashboard</a></li>
                                    <li><a href="{{ route('profile') }}"><i class="fa fa-fw fa-list-ul"></i> Profile</a></li>
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    @endif
                    <li class="scroll-link exchange-rate"><span style="font-weight:400;">Exchange Rate: 1BTC</span> = <span style="font-weight:400; color:gold">${{number_format(\App\Settings::getParam('ourprice'),2)}}</span></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<!-- <section id="closed" style="background-color:#9cb8e2; border-top: 1px solid #147ae0; border-bottom: 1px solid #147ae0;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12" style="padding-top:10px; padding-bottom:10px;">
                <h3 style="color:white; margin-top:5px; font-weight: 400;"><span style="color:red">* * *</span> We are closed for Labor Day Weekend. We will reopen Tuesday at 9:00am EST <span style="color:red">* * *</span></h3>
            </div>
        </div>
    </div>
</section> -->

<div class="wrapper" style="background-color:#f2f2f2;">
    <div class="container">
        <div class="row">
        <form action="{{route('buy')}}" data-toggle="validator"  role="form"  method="post">
            {{ csrf_field() }}
        <div class="row" style="margin: 6% 7%; margin-bottom:7%;">
            <div class="col-sm-5 col-sm-offset-1">
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
                        <input type="number" step="any" min=0 name="amount" style="width:200px" id="amount" class="form-control pull-right" required value='{{old('amount')}}'>
                        @if ($errors->has('amount'))
                            <span class="help-block">
                                <strong>{{ $errors->first('amount') }}</strong>
                            </span>
                        @endif
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
            <div class="col-sm-5 col-sm-offset-1" style="">
                <div class="buy-form" style="
                        border: 1px solid black !important;
                        border-radius: 4px;
                        background-color: white;
                        padding: 5% 7%;
                        margin-top: 5%;
                        margin-bottom: 2%;
                ">
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
            <input class="btn btn-success form-control" style="height:50px; font-size:20px; font-weight:300;" type="submit" name="submit-order" value="GET BITCOINS!">
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
            
//            var fees = total * .02;
//            var amount = total;

//            $("#bitcoin_subtotal").val('$'+amount.toFixed(2));
//            $("#bitcoin_fees").val('$'+fees.toFixed(2));
//            $("#bitcoin_total").val('$'+total.toFixed(2));
            $("#estimated_bitcoins").val((amount/{{number_format($ourbitcoinprice, 2)}}).toFixed(5));
        });
        $("#amount").change();

        $(document).on("click", ".saved-wallet", function(e){
            e.preventDefault();
            $($(this).attr('data-target')).val($(this).attr('data-address')).change();
        });

    })(jQuery);
</script>
@endsection
