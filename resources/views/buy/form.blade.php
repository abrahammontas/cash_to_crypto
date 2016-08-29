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
                    <li><a href="/">Home</a></li>
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


<div class="wrapper" style="background-color:#f2f2f2;">
    <div class="container">
        <div class="row">
        <form action="{{route('buy')}}" data-toggle="validator"  role="form"  method="post">
            {{ csrf_field() }}
            <div class="col-lg-5 form-border order-form">
               <h2 class="text-center form-title-font">Buy Bitcoins</h2>
               <hr>
                    @if ($message = session('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                        </div>
                    @endif

                    @if ($message = session('warning'))
                        <div class="alert alert-warning">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="form-group form-inline{{ $errors->has('bank') ? ' has-error' : '' }}">
                        <label for="order-bank">Bank:</label>
                        {{ Form::select('bank', $banks, old('bank'), ['class'=> 'form-control pull-right', 'style'=>'width:200px', 'required']) }}
                        @if ($errors->has('bank'))
                            <span class="help-block">
                                <strong>{{ $errors->first('bank') }}</strong>
                            </span>
                        @endif
                    </div>
                    <hr>
                    <div class="form-group form-inline{{ $errors->has('amount') ? ' has-error' : '' }}">
                        <label for="bitcoin-amount">USD Amount:</label>
                        <input type="number" min=0 name="amount" style="width:200px" id="amount" class="form-control pull-right" required value='{{old('amount')}}'>
                        @if ($errors->has('amount'))
                            <span class="help-block">
                                <strong>{{ $errors->first('amount') }}</strong>
                            </span>
                        @endif
                    </div>
                    <hr>
                    <div class="form-group form-inline{{ $errors->has('wallet') ? ' has-error' : '' }}">
                        <label for="bitcoin-address">Wallet Address:</label>
                        <div class="input-group pull-right">
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
                    {{--<hr>--}}
                    {{--<div class="form-group form-inline">--}}
                        {{--<label for="subtotal"><strong>Subtotal:</strong></label>--}}
                        {{--<input type='text' readonly="readonly" name="subtotal" class="form-control pull-right input-no-box" id="bitcoin_subtotal" style="border:none; background-color:transparent; box-shadow:none;" value="$0.00">--}}
                    {{--</div>--}}
                    {{--<hr>--}}
                    {{--<div class="form-group form-inline">--}}
                        {{--<label for="fees"><strong>Fees:</strong></label>--}}
                        {{--<input type='text' readonly="readonly" name="fees" class="form-control pull-right input-no-box" id="bitcoin_fees" style="border:none; background-color:transparent; box-shadow:none;" value="$0.00">--}}
                    {{--</div>--}}
                    {{--<hr>--}}
                   {{--<div class="form-group form-inline">--}}
                        {{--<label for="total"><strong>Total:</strong></label>--}}
                        {{--<input type='text' readonly="readonly" name="total" class="form-control pull-right input-no-box" id="bitcoin_total" style="border:none; background-color:transparent; box-shadow:none;" value="$0.00">--}}
                    {{--</div>--}}
                   <hr>
                   <div class="help-block with-errors"></div>
                   <div class="form-group text-center">
                        <input class="btn btn-success" style="padding:10px 20px;" type="submit" name="submit-order" value="Get Bitcoins">
                   </div>
            </div>
            <div class="col-lg-5 col-lg-offset-1">
              <div class="form-border" style="margin-bottom:0px;">
               <h2 class="text-center form-title-font">Pricing Information</h2>
               <hr>
                    <div class="form-group form-inline">
                        <label for="bitcoin-price"><strong>Bitcoin Price:</strong></label>
                        <input readonly="readonly" id='bitcoin_price' name="bitcoin_price" class="form-control pull-right" style="border:none; background-color:transparent; box-shadow:none; text-align:right;" value="${{ number_format((float)$ourbitcoinprice, 2, '.', '')}}">
                </div>
               <hr>
               <div class="form-group form-inline">
                        <label for="estimated-bitcoins"><strong>Estimated Bitcoins:</strong></label>
                        <input readonly="readonly" name="bitcoins" class="form-control pull-right" id="estimated_bitcoins" style="border:none; background-color:transparent; box-shadow:none; text-align:right;" value="0.00000">
                </div>
            </div>
            <div class="form-border" style="background-color:#e6e6e6; padding:5px 18px 10px 18px; margin-top:10px; margin-left:60px;">
                <p class="text-center" style="font-size:14px">Note: The number of Bitcoins received is calculated when your receipt is uploaded</p>
            </div>
            
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
            var total = parseFloat($("#amount").val() ? $("#amount").val() : 0);
            
            var fees = total * .02;
            var amount = total - fees;

            $("#bitcoin_subtotal").val('$'+amount.toFixed(2));
            $("#bitcoin_fees").val('$'+fees.toFixed(2));
            $("#bitcoin_total").val('$'+total.toFixed(2));
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
