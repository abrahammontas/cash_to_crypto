@extends('layouts.main')

@section('title', 'ATM Locations')

@section('content')

<!-- Loader -->
<div class="loader">
    <div class="loader-img"></div>
</div>

<!-- Top content -->
<div class="top-content">
    <!-- Top menu -->
    @include('partials.navigation')
</div>

<div class="wrapper" style="background-color:#f2f2f2;">
    <div class="container">

        <div class="row" style="margin-top:15px; margin-bottom:30px;">
            <h1>Bitcoin ATM Locations - New Jersey</h1>
        </div>


        <div class="row" style="margin-bottom:60px;">
            {{--<h3 class="text-center">Boston</h3>--}}
            {{--<br />--}}
            <div class="col-md-5 col-md-offset-2">
                <ul class="list-unstyled text-left">
                    <li><strong>Store Name:</strong> Grove News Corner</li>
                    <li><strong>Address:</strong> 119 Newark Ave Jersey City, NJ</li>
                    <li><strong>Hours (Monday-Friday):</strong> 5am-10pm</li>
                    <li><strong>Hours (Saturday):</strong> 6am - 10pm</li>
                    <li><strong>Hours (Sunday):</strong> 6am - 9pm</li>
                </ul>
            </div>
            <div class="col-md-5">
                {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Jetpep Gas Station (Buy BTC Only)</li>--}}
                    {{--<li><strong>Address:</strong> 1608 Bessemer Rd Birmingham, AL</li>--}}
                    {{--<li><strong>Hours (Monday-Saturday):</strong> 5am-1am</li>--}}
                    {{--<li><strong>Hours (Sunday):</strong> 6am-12am</li>--}}
                {{--</ul>--}}
            </div>
        </div>

        <!-- ****************************************************************************************** -->

        {{--<div class="row">--}}
            {{--<h3 class="text-center">West Birmingham</h3>--}}
            {{--<br />--}}
            {{--<div class="col-md-5 col-md-offset-2">--}}
                {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Woodland Petro Gas station (Buy BTC Only)</li>--}}
                    {{--<li><strong>Address:</strong> 6400 1st Ave N Birmingham, AL</li>--}}
                    {{--<li><strong>Hours:</strong> 6am-12am daily</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--<div class="col-md-5">--}}
                {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Jetpep Gas Station (Buy BTC Only)</li>--}}
                    {{--<li><strong>Address:</strong> 1608 Bessemer Rd Birmingham, AL</li>--}}
                    {{--<li><strong>Hours (Monday-Saturday):</strong> 5am-1am</li>--}}
                    {{--<li><strong>Hours (Sunday):</strong> 6am-12am</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}

    </div>
</div>


@endsection