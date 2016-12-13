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
            <h1>Bitcoin ATM Locations - Florida</h1>
        </div>

        <div class="row" style="margin-bottom:60px;">
            <h3 class="text-center">Miami</h3>
            <br />
            <div class="col-md-5 col-md-offset-2">
                <ul class="list-unstyled text-left">
                    <li><strong>Store Name:</strong> Chevron Gas Station</li>
                    <li><strong>Address:</strong> 601 NW 103rd st. Miami, FL, 33150</li>
                    <li><strong>Hours:</strong> </li>
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

        {{--<div class="row" style="margin-top:40px">--}}
            {{--<h3 class="text-center">Fort Worth</h3>--}}
            {{--<br />--}}
            {{--<div class="col-md-5 col-md-offset-2">--}}
                {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Lisa`s Chicken (Buy Bitcoin Only)</li>--}}
                    {{--<li><strong>Address:</strong> 2501 Hemphill St. Fort Worth, TX, 76110</li>--}}
                    {{--<li><strong>Hours:</strong> 7am-10am daily</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="col-md-5">--}}
                {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Valero Gas Station (Buy Bitcoin Only)</li>--}}
                    {{--<li><strong>Address:</strong> 4821 S Fwy Fort Worth, TX 76115</li>--}}
                    {{--<li><strong>Hours (Monday-Saturday):</strong> 5am-1am</li>--}}
                    {{--<li><strong>Hours (Sunday):</strong> 6am-12am daily</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}

    </div>
</div>


@endsection