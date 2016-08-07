@extends('layouts.main')

@section('title', 'Purchase Bitcoins')

@section('content')
<div class="wrapper" style="background-color:#f2f2f2;">
    <div class="container">
        <div class="row">
        <form action="" method="post">
            <div>
            <div class="col-lg-5 col-lg-offset-1 form-border">
               <h2 class="text-center form-title-font">Buy Bitcoins</h2>
               <hr>
                    <!-- <div class="form-group form-inline">
                        <label for="payment_method">Payment Method:</label>
                        <select name="order-payment" id="" class="form-control pull-right" style="width:50%;" required>
                            <option value="">Select Payment</option>
                            <option value="cash deposit">Cash Deposit</option>
                            <option value="cash by mail">Cash by Mail</option>
                        </select>
                    </div>
                    <hr> -->
                    <div class="form-group form-inline">
                        <label for="order-bank">Bank:</label>
                        <select name="order_bank" id="" class="form-control pull-right" style="width:50%;" required>
                            <option value="">Select Bank</option>
                            <option value="Credit Unions">Credit Unions</option>
                            <option value="City Bank">City Bank</option>
                            <option value="BB&amp;T">BB&amp;T</option>
                            <option value="PNC Bank">PNC Bank</option>
                            <option value="Huntington Bank">Huntington Bank</option>
                            <option value="Citizens Bank">Citizens Bank</option>
                        </select>
                    </div>
                    <hr>
                    <div class="form-group form-inline">
                        <label for="bitcoin-amount">USD Amount:</label>
                        <input type="number" name="order_usd" id="bitcoin_amount" class="form-control pull-right" style="width:50%;" required>
                    </div>
                    <hr>
                    <div class="form-group form-inline">
                        <label for="bitcoin-address">Wallet Address:</label>
                        <input type="text" name="order_wallet_address" class="form-control pull-right" style="width:50%;" required>
                    </div>
                    <hr>
                    <div class="form-group form-inline">
                        <label for="subtotal"><strong>Subtotal:</strong></label>
                        <input readonly="readonly" name="order_subtotal" class="form-control pull-right input-no-box" id="bitcoin_subtotal" style="width:50%; border:none; background-color:transparent; box-shadow:none;" value="$0.00">
                    </div>
                    <hr>
                    <div class="form-group form-inline">
                        <label for="fees"><strong>Fees:</strong></label>
                        <input readonly="readonly" name="order_fees" class="form-control pull-right input-no-box" id="bitcoin_fees" style="width:50%; border:none; background-color:transparent; box-shadow:none;" value="$0.00">
                    </div>
                    <hr>
                   <div class="form-group form-inline">
                        <label for="total"><strong>Total:</strong></label>
                        <input readonly="readonly" name="order_total" class="form-control pull-right input-no-box" id="bitcoin_total" style="width:50%; border:none; background-color:transparent; box-shadow:none;" value="$0.00">
                    </div>
                   <hr>
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
                        <input readonly="readonly" name="bitcoin_price" class="form-control pull-right" style="width:50%; border:none; background-color:transparent; box-shadow:none; text-align:right;" value="${{ number_format((float)$ourbitcoinprice, 2, '.', '')}}">
                </div>
               <hr>
               <div class="form-group form-inline">
                        <label for="estimated-bitcoins"><strong>Estimated Bitcoins:</strong></label>
                        <input readonly="readonly" name="order_bitcoins" class="form-control pull-right" id="estimated_bitcoins" style="width:50%; border:none; background-color:transparent; box-shadow:none; text-align:right;" value="$5.00">
                </div>
            </div>
            <div class="form-border" style="background-color:#e6e6e6; padding:5px 18px 10px 18px; margin-top:10px;">
                <p class="text-center" style="font-size:14px">Note: The number of Bitcoins received is calculated when your receipt is uploaded</p>
            </div>
            
            </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection