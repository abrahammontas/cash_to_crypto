@extends('layouts.main')

@section('title', 'Purchase Bitcoins')

@section('content')
<div class="wrapper" style="background-color:#f2f2f2;">
    <div class="container">
        <div class="row">
        <form action="{{route('buy')}}" data-toggle="validator"  role="form"  method="post">
            {{ csrf_field() }}
            <div class="col-lg-5 col-lg-offset-1 form-border">
               <h2 class="text-center form-title-font">Buy Bitcoins</h2>
               <hr>
                    <div class="form-group form-inline{{ $errors->has('bank') ? ' has-error' : '' }}">
                        <label for="order-bank">Bank:</label>
                        {{ Form::select('bank', $banks, old('bank'), ['class'=> 'form-control pull-right', 'required']) }}
                        @if ($errors->has('bank'))
                            <span class="help-block">
                                <strong>{{ $errors->first('bank') }}</strong>
                            </span>
                        @endif
                    </div>
                    <hr>
                    <div class="form-group form-inline {{ $errors->has('amount') ? ' has-error' : '' }}">
                        <label for="bitcoin-amount">USD Amount:</label>
                        <input type="number" min=0 name="amount" id="amount" class="form-control pull-right" required value='{{old('amount')}}'>
                        @if ($errors->has('amount'))
                            <span class="help-block">
                                <strong>{{ $errors->first('amount') }}</strong>
                            </span>
                        @endif
                    </div>
                    <hr>
                    <div class="form-group form-inline{{ $errors->has('wallet') ? ' has-error' : '' }}">
                        <label for="bitcoin-address">Wallet Address:</label>
                        <input type="text" name="wallet" class="form-control pull-right" required>
                        @if ($errors->has('wallet'))
                            <span class="help-block">
                                <strong>{{ $errors->first('wallet') }}</strong>
                            </span>
                        @endif
                    </div>
                    <hr>
                    <div class="form-group form-inline">
                        <label for="subtotal"><strong>Subtotal:</strong></label>
                        <input readonly="readonly" name="subtotal" class="form-control pull-right input-no-box" id="bitcoin_subtotal" style="border:none; background-color:transparent; box-shadow:none;" value="$0.00">
                    </div>
                    <hr>
                    <div class="form-group form-inline">
                        <label for="fees"><strong>Fees:</strong></label>
                        <input readonly="readonly" name="fees" class="form-control pull-right input-no-box" id="bitcoin_fees" style="border:none; background-color:transparent; box-shadow:none;" value="$0.00">
                    </div>
                    <hr>
                   <div class="form-group form-inline">
                        <label for="total"><strong>Total:</strong></label>
                        <input readonly="readonly" name="total" class="form-control pull-right input-no-box" id="bitcoin_total" style="border:none; background-color:transparent; box-shadow:none;" value="$0.00">
                    </div>
                   <hr>
                   <div class="help-block with-errors"></div>
                   <div class="form-group text-center">
                        <input class="btn btn-success" style="padding:10px 20px;" type="submit" name="submit-order" value="Get Bitcoins">
                   </div>
            </div>
            <div class="col-lg-5">
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
            <div class="form-border" style="background-color:#e6e6e6; padding:5px 18px 10px 18px; margin-top:10px;">
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
        $(document).ready(function()
        {
            $(document).on("change keyup mouseup blur", "#amount", function(){
                var total = parseFloat($("#amount").val() ? $("#amount").val() : 0);
                
                var fees = total * .02;
                var amount = total - fees;

                $("#bitcoin_subtotal").val('$'+amount.toFixed(2));
                $("#bitcoin_fees").val('$'+fees.toFixed(2));
                $("#bitcoin_total").val('$'+total.toFixed(2));
                $("#estimated_bitcoins").val((amount/{{number_format($ourbitcoinprice, 2)}}).toFixed(5));
            });
        });
    })(jQuery);
</script>
@endsection