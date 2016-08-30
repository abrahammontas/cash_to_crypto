@extends('layouts.user')

@section('title', 'Current Order')

@section('content')
<div class='wrapper current-order-page' style='margin-top:-20px;'>
    <div class='container'>
        <div class="row">
            <div class="col-md-12 col-md-5">
                @if ($message = session('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class='row'>
                    <div class="col-xs-12 form-border" style="padding:5%;">
                        <h2 class="text-center form-title-font">Current Order</h2>
                        <hr>
                        <div class="form-group form-inline">
                            <div class='row'>
                                <div class='col-xs-4'>
                                    Bank:
                                </div>
                                <div class='col-xs-8'>
                                    {{$order->bank->name}}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group form-inline">
                            <div class='row'>
                                <div class='col-xs-4'>
                                    Order ID:
                                </div>
                                <div class='col-xs-8'>
                                    {{$order->hash}}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group form-inline">
                            <div class='row'>
                                <div class='col-xs-4'>
                                    Your wallet:
                                </div>
                                <div class='col-xs-8'>
                                    {{$order->wallet}}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group form-inline">
                            <div class='row'>
                                <div class='col-xs-4'>
                                    Deposit Amount:
                                </div>
                                <div class='col-xs-8'>
                                    ${{number_format($order->total, 2, '.', ',')}}
                                </div>
                            </div>
                        </div>

                        <hr>
                    </div>
                

                    <div class="col-xs-12 form-border uploads" style="padding:5%;">
                        <h2 class="text-center form-title-font">Upload Receipt or Selfie</h2>
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
                        {{Form::open(["route" =>'both', 'enctype' => 'multipart/form-data'])}}
                        {{Form::hidden('order', $order->hash)}}
                        <div class="form-group form-inline {{ $errors->has('receipt') ? ' has-error' : '' }}">
                            <strong>Receipt</strong>
                            <input type='file' name='receipt'/>
                            @if ($errors->has('receipt'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('receipt') }}</strong>
                                </span>
                            @endif
                        </div>
                        <br />
                        <div class="form-group form-inline {{ $errors->has('selfie') ? ' has-error' : '' }}">
                            <strong style="padding-bottom:5px;">Selfie with Receipt</strong>
                            <input type='file' name='selfie'/>
                            @if ($errors->has('selfie'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('selfie') }}</strong>
                                </span>
                            @endif
                        </div>
                        <br />
                        <div class="form-group text-center">
                            <input class="btn btn-success" style="padding:10px 20px;" type="submit" name="submit-order" value="Upload">
                            <span class='help-block'>Make sure images are clear</span>
                        </div>
                        {{Form::close()}}
                    </div>


                </div>
            </div>

            <div class="col-md-12 col-md-offset-1 col-md-6 text-left">
                <div class='row'>
                    <div class="col-xs-12 form-border" style="padding:5%">
                        <h2 class="text-center form-title-font">Deposit Information</h2>
                        <hr>
                        <div class="form-group form-inline">
                            {!!$order->bank->directions_before!!}
                        </div>
                        <div class="form-group form-inline">
                            <div class='row'>
                                <div class='col-xs-4'>
                                    Account:
                                </div>
                                <div class='col-xs-8'>
                                    {{$order->bank->account_type}}
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group form-inline">
                            <div class='row'>
                                <div class='col-xs-4'>
                                    Name:
                                </div>
                                <div class='col-xs-8'>
                                    {{$order->bank->company}}
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group form-inline">
                            <div class='row'>
                                <div class='col-xs-4'>
                                    Address:
                                </div>
                                <div class='col-xs-8'>
                                    {{$order->bank->account_address}}
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group form-inline">
                            <div class='row'>
                                <div class='col-xs-4'>
                                    Account Number:
                                </div>
                                <div class='col-xs-8'>
                                    {{$order->bank->account_number}}
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group form-inline">
                            <div class='row'>
                                <div class='col-xs-4'>
                                    Amount:
                                </div>
                                <div class='col-xs-8'>
                                    ${{number_format($order->total, 2, '.', ',')}}
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div>
                            {!!$order->bank->directions_after!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin:5%;">
            <div class="col-md-12 footer">
                <center><b>Thanks for choosing Bitcoin Depot</b><br/>
                <b>2016 &copy; Cash To Crypto</b></center>
            </div>
        </div>
    </div>
</div>
@endsection