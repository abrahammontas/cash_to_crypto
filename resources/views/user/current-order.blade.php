@extends('layouts.user')

@section('title', 'Current Order')

@section('content')

    <div>
        <div style='margin: auto; width: 800px; padding: 20px;'>
            <div style='border-radius: 0px; box-shadow: 3px 3px 3px #bfbfbf; background-color: white; padding: 30px; padding-top: 20px; margin-bottom: 30px;'>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">

                            {{ $orders->bank->name }}

                        </div>
                        <div class="col-md-6">

                            {{--{{ $currentOrder->bank->account_type }}--}}

                        </div>

                    </div>
                </div>


            </div>
            <b>Thanks for choosing Bitcoin Depot</b><br/>
            <b>2016 &copy; Cash To Crypto</b>
        </div>
    </div>

@endsection