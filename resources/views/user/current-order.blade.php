@extends('layouts.user')

@section('title', 'Current Order')

@section('content')

    @if($new_order = session('new_order'))
        <!-- Google Code for Buy Orders created Conversion Page -->
        <script type="text/javascript">
            /* <![CDATA[ */
            var google_conversion_id = 976131144;
            var google_conversion_language = "en";
            var google_conversion_format = "3";
            var google_conversion_color = "ffffff";
            var google_conversion_label = "4a4PCPf-_GoQyKi60QM";
            var google_remarketing_only = false;
            /* ]]> */
        </script>
        <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
        </script>
        <noscript>
            <div style="display:inline;">
                <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/976131144/?label=4a4PCPf-_GoQyKi60QM&amp;guid=ON&amp;script=0"/>
            </div>
        </noscript>
    @endif

    <div class='wrapper current-order-page' style='margin-top:-20px;'>
        <div class='container'>
            <div class="col-md-12">
                @if ($message = session('success'))
                    <div class="alert alert-success" style="margin-top:6%; margin-bottom:0px;">
                        <p>{!! $message !!}</p>
                    </div>
                @endif

                @if ($message = session('warning'))
                    <div class="alert alert-warning" style="margin-top:6%; margin-bottom:0px;">
                        <p>{!! $message !!}</p>
                    </div>
                @endif
            </div>

            <div class='row'>
                <div class="col-md-6">
                    <div class="form-border">
                        <h2 class="text-center form-title-font">Current Order</h2>
                        <hr>
                        <div class="form-group form-inline">
                            <div class='row'>
                                <div class='col-xs-4'>
                                    Bank:
                                </div>
                                <div class='col-sm-8'>
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
                                <div class='col-sm-8'>
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
                                <div class='col-sm-8'>
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
                                <div class='col-sm-8'>
                                    ${{number_format($order->total, 2, '.', ',')}}
                                </div>
                            </div>
                        </div>
                        <hr>

                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#order-cancel-{{$order->hash}}">
                            <span class='fa fa-trash' style="font-size:14px;"> Cancel Order</span>
                        </button>
                        <div id="order-cancel-{{$order->hash}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                {{Form::open(['method' => 'post', 'route' =>['order.cancel', $order->hash]])}}
                                <div class="panel panel-red">
                                    <div class="panel-heading">
                                        Cancel order <button class="close" data-dismiss="modal">×</button>
                                    </div>
                                    <div class="panel-body">
                                        Are you sure to cancel <b>{{$order->hash}}</b>?
                                    </div>
                                    <div class="panel-footer">
                                        <button type="submit" class="btn btn-primary">Yes</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                    </div>
                                </div>
                                {{Form::close()}}
                            </div>
                        </div>
                    </div>
                    <div class="form-border hidden-xs hidden-sm">
                        <h2 class="text-center form-title-font">Upload Receipt and Selfie</h2>
                        <hr>
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

                <div class="col-md-6">
                    <div class="form-border">
                        <h2 class="text-center form-title-font">Deposit Information</h2>
                        <hr>
                        <div class="form-group form-inline">
                            {!!nl2br($order->bank->directions_before)!!}
                        </div>
                        <div class="form-group form-inline">
                            <div class='row'>
                                <div class='col-xs-4'>
                                    Account:
                                </div>
                                <div class='col-sm-8'>
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
                                <div class='col-sm-8'>
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
                                <div class='col-sm-8'>
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
                                <div class='col-sm-8'>
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
                                <div class='col-sm-8'>
                                    ${{number_format($order->total, 2, '.', ',')}}
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div>
                            {!!nl2br($order->bank->directions_after)!!}
                        </div>
                    </div>
                </div>

                <div class="col-md-6 hidden-md hidden-lg">
                    <div class="form-border">
                        <h2 class="text-center form-title-font">Upload Receipt or Selfie</h2>
                        <hr>
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
            <div class="row" style="margin:5%;">
                <div class="col-md-12 footer">
                    <center><b>2016 &copy; Cash To Crypto</b></center>
                </div>
            </div>
        </div>
    </div>
@endsection