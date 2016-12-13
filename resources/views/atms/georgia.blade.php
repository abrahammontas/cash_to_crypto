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
                <h1>Bitcoin ATM Locations - Georgia</h1>
            </div>

            <div class="row">
                <h3 class="text-center">Buckhead (North Atlanta)</h3>
                <br />
                <div class="col-md-5 col-md-offset-2">
                    <ul class="list-unstyled text-left">
                        <li><strong>Store Name:</strong> Chevron Gas Station (Buy BTC Only)</li>
                        <li><strong>Address:</strong> 345 Pharr Rd NE Atlanta, GA, 30305</li>
                        <li><strong>Hours:</strong> Open 24/7</li>
                    </ul>
                    <br />
                    <ul class="list-unstyled text-left">
                        <li><strong>Store Name:</strong> Sunoco Gas Station (Buy BTC Only)</li>
                        <li><strong>Address:</strong> 2060 Peachtree Rd NW Atlanta, GA, 30309</li>
                        <li><strong>Hours:</strong> Open 24/7</li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <ul class="list-unstyled text-left">
                        <li><strong>Store Name:</strong> Terrific Package (Buy and Sell BTC)</li>
                        <li><strong>Address:</strong> 1899 Cheshire Bridge Rd NE, Atlanta, GA 30324</li>
                        <li><strong>Phone:</strong> 404-872-4294</li>
                        <li><strong>Hours (Monday-Thursday):</strong> 10am-11pm</li>
                        <li><strong>Hours (Friday-Saturday):</strong> 10am-11:45pm</li>
                        <li><strong>Hours (Sunday):</strong> 1pm-7pm</li>
                    </ul>
                </div>
            </div>

            <!-- ****************************************************************************************** -->

            <div class="row" style="margin-top:40px;">
                <h3 class="text-center">Downtown Atlanta</h3>
                <br />
                <div class="col-md-5 col-md-offset-2">
                    <ul class="list-unstyled text-left">
                        <li><strong>Store Name:</strong> Happy Hookah (Buy BTC Only)</li>
                        <li><strong>Address:</strong> 66 Peachtree St Nw Atlanta, GA, 30303</li>
                        <li><strong>Hours (Monday-Friday):</strong> 11am-10pm</li>
                        <li><strong>Hours (Saturday):</strong> 1pm-10pm</li>
                        <li><strong>Hours (Sunday):</strong> Closed</li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <ul class="list-unstyled text-left">
                        <li><strong>Store Name:</strong> N.Y. Style Pizza Convenience Store (Buy BTC Only)</li>
                        <li><strong>Address:</strong> 111 Luckie St. Nw Atlanta. GA</li>
                        <li><strong>Hours (Monday-Saturday):</strong> 7am-10pm</li>
                        <li><strong>Hours (Sunday):</strong> Closed</li>
                    </ul>
                </div>
            </div>

            <!-- ****************************************************************************************** -->

            <div class="row" style="margin-top:40px;">
                <h3 class="text-center">Midtown Atlanta</h3>
                <br />
                <div class="col-md-5 col-md-offset-2">
                    <ul class="list-unstyled text-left">
                        <li><strong>Store Name:</strong> Vape 911 Atlanta (Buy BTC Only)</li>
                        <li><strong>Address:</strong> 539 10th St NW, Atlanta, GA 30318</li>
                        <li><strong>Phone:</strong> 404-975-1877</li>
                        <li><strong>Hours (Monday-Saturday):</strong> 10am-8pm</li>
                        <li><strong>Hours (Sunday):</strong> 10am-6pm</li>
                    </ul>
                </div>
                <div class="col-md-5">
                    {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Terrific Package (Buy and Sell BTC)</li>--}}
                    {{--<li><strong>Address:</strong> 1899 Cheshire Bridge Rd NE, Atlanta, GA 30324</li>--}}
                    {{--<li><strong>Phone:</strong> 404-872-4294</li>--}}
                    {{--<li><strong>Hours (Monday-Thursday):</strong> 10am-11pm</li>--}}
                    {{--<li><strong>Hours (Friday-Saturday):</strong> 10am-11:45pm</li>--}}
                    {{--<li><strong>Hours (Sunday):</strong> 1pm-7pm</li>--}}
                    {{--</ul>--}}
                </div>
            </div>

            <!-- ****************************************************************************************** -->

            <div class="row" style="margin-top:40px;">
                <h3 class="text-center">Marietta</h3>
                <br />
                <div class="col-md-5 col-md-offset-2">
                    <ul class="list-unstyled text-left">
                        <li><strong>Store Name:</strong> Vape 911 Marietta (Buy BTC Only)</li>
                        <li><strong>Address:</strong> 3020 Canton Rd #226, Marietta, GA 30066</li>
                        <li><strong>Phone:</strong> 404-994-7770</li>
                        <li><strong>Hours (Monday-Saturday):</strong> 10am-10pm</li>
                        <li><strong>Hours (Sunday):</strong> 12pm-6pm</li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <ul class="list-unstyled text-left">
                        <li><strong>Store Name:</strong> Exxon Gas Station (Buy BTC Only)</li>
                        <li><strong>Address:</strong> 405 Cobb Pkwy S Marietta, GA, 30060</li>
                        <li><strong>Phone:</strong> 770-421-9261</li>
                        <li><strong>Hours:</strong> 9am-9pm daily</li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 col-md-offset-2">
                    <ul class="list-unstyled text-left">
                        <li><strong>Store Name:</strong> Texaco Gas Station (Buy BTC Only)</li>
                        <li><strong>Address:</strong> 2697 Windy Hill Rd SE, Marietta, GA 30067</li>
                        <li><strong>Hours:</strong> Open 24/7</li>
                    </ul>
                </div>
                <div class="col-md-5">
                    {{--<ul class="list-unstyled text-left">--}}
                        {{--<li><strong>Store Name:</strong> Exxon Gas Station (Buy BTC Only)</li>--}}
                        {{--<li><strong>Address:</strong> 405 Cobb Pkwy S Marietta, GA, 30060</li>--}}
                        {{--<li><strong>Phone:</strong> 770-421-9261</li>--}}
                        {{--<li><strong>Hours:</strong> 9am-9pm daily</li>--}}
                    {{--</ul>--}}
                </div>
            </div>

            <!-- ****************************************************************************************** -->

            <div class="row" style="margin-top:40px;">
                <h3 class="text-center">East Atlanta</h3>
                <br />
                <div class="col-md-5 col-md-offset-2">
                    <ul class="list-unstyled text-left">
                        <li><strong>Store Name:</strong> Moreland Food Mart (Buy BTC Only)</li>
                        <li><strong>Address:</strong> 381 Moreland Ave SE Suite A Atlanta, GA, 30316</li>
                        <li><strong>Phone:</strong> 404-521-0238</li>
                        <li><strong>Hours (Sunday-Wednesday):</strong> 9am-9pm</li>
                        <li><strong>Hours (Thursday-Saturday):</strong> 9am-11pm</li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <ul class="list-unstyled text-left">
                        <li><strong>Store Name:</strong> Citgo Gas Station (Buy BTC Only)</li>
                        <li><strong>Address:</strong> 1988 Flat Shoals Rd Atlanta, GA</li>
                        <li><strong>Hours (Monday-Saturday):</strong> 7am-11pm</li>
                        <li><strong>Hours (Sunday):</strong> 9am-9pm</li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 col-md-offset-2">
                    <ul class="list-unstyled text-left">
                        <li><strong>Store Name:</strong> Shell Gas Station (Buy BTC Only)</li>
                        <li><strong>Address:</strong> 3550 E Ponce DE Leon Blvd Scottdale, GA, 30079</li>
                        <li><strong>Hours:</strong> Open 24/7</li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <ul class="list-unstyled text-left">
                        <li><strong>Store Name:</strong> Chevron Gas Station (Buy and Sell BTC)</li>
                        <li><strong>Address:</strong> 1860 Memorial Dr. SE Atlanta, Ga</li>
                        <li><strong>Hours:</strong> Open 24/7</li>
                    </ul>
                </div>
            </div>

            <!-- ****************************************************************************************** -->

            <div class="row" style="margin-top:40px;">
                <h3 class="text-center">West Atlanta</h3>
                <br />
                <div class="col-md-5 col-md-offset-2">
                    <ul class="list-unstyled text-left">
                        <li><strong>Store Name:</strong> MLK Groceries Plus (Buy BTC Only)</li>
                        <li><strong>Address:</strong> 3665 MLK JR Dr Atlanta, GA</li>
                        <li><strong>Hours:</strong> 7am-12am daily</li>
                    </ul>
                </div>
                <div class="col-md-5">
                    {{--<ul class="list-unstyled text-left">--}}
                        {{--<li><strong>Store Name:</strong> Best 4 Less Quick Mart (Buy BTC Only)</li>--}}
                        {{--<li><strong>Address:</strong> 2200 Campbellton Rd Atlanta, GA</li>--}}
                        {{--<li><strong>Hours (Sunday - Thursday):</strong> 9:30am-9:30pm</li>--}}
                        {{--<li><strong>Hours (Friday-Saturday):</strong> 9:30am-10pm</li>--}}
                    {{--</ul>--}}
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 col-md-offset-2">
                    {{--<ul class="list-unstyled text-left">--}}
                        {{--<li><strong>Store Name:</strong> Shell Gas Station (Buy BTC Only)</li>--}}
                        {{--<li><strong>Address:</strong> 3550 E Ponce DE Leon Blvd Scottdale, GA, 30079</li>--}}
                        {{--<li><strong>Hours:</strong> Open 24/7</li>--}}
                    {{--</ul>--}}
                </div>
                <div class="col-md-5">
                    {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Citgo Gas Station (Buy BTC Only)</li>--}}
                    {{--<li><strong>Address:</strong> 1988 Flat Shoals Rd Atlanta, GA</li>--}}
                    {{--<li><strong>Hours (Monday-Saturday):</strong> 7am-11pm</li>--}}
                    {{--<li><strong>Hours (Sunday):</strong> 9am-9pm</li>--}}
                    {{--</ul>--}}
                </div>
            </div>

            <!-- ****************************************************************************************** -->

            <div class="row" style="margin-top:40px;">
                <h3 class="text-center">East Point</h3>
                <br />
                <div class="col-md-5 col-md-offset-2">
                    <ul class="list-unstyled text-left">
                        <li><strong>Store Name:</strong> Chevron Gas Station​</li>
                        <li><strong>Address:</strong> 1722 Campbellton Rd SW Atlanta, GA</li>
                        <li><strong>Hours:</strong> Open 24/7</li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <ul class="list-unstyled text-left">
                        <li><strong>Store Name:</strong> Best 4 Less Quick Mart</li>
                        <li><strong>Address:</strong> 2200 Campbellton Rd Atlanta, GA</li>
                        <li><strong>Hours:</strong> 9:00am-9:30pm daily</li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 col-md-offset-2">
                    {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Shell Gas Station (Buy BTC Only)</li>--}}
                    {{--<li><strong>Address:</strong> 3550 E Ponce DE Leon Blvd Scottdale, GA, 30079</li>--}}
                    {{--<li><strong>Hours:</strong> Open 24/7</li>--}}
                    {{--</ul>--}}
                </div>
                <div class="col-md-5">
                    {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Citgo Gas Station (Buy BTC Only)</li>--}}
                    {{--<li><strong>Address:</strong> 1988 Flat Shoals Rd Atlanta, GA</li>--}}
                    {{--<li><strong>Hours (Monday-Saturday):</strong> 7am-11pm</li>--}}
                    {{--<li><strong>Hours (Sunday):</strong> 9am-9pm</li>--}}
                    {{--</ul>--}}
                </div>
            </div>

            <!-- ****************************************************************************************** -->

            <div class="row" style="margin-top:40px;">
                <h3 class="text-center">South Atlanta</h3>
                <br />
                <div class="col-md-5 col-md-offset-2">
                    <ul class="list-unstyled text-left">
                        <li><strong>Store Name:</strong> Cleveland Corner Store (Buy BTC Only)</li>
                        <li><strong>Address:</strong> 387 Cleveland Ave SW Atlanta, GA, 30315</li>
                        <li><strong>Hours:</strong> 9am-10pm daily</li>
                    </ul>
                </div>
                <div class="col-md-5">
                    {{--<ul class="list-unstyled text-left">--}}
                        {{--<li><strong>Store Name:</strong> Best 4 Less Quick Mart (Buy BTC Only)</li>--}}
                        {{--<li><strong>Address:</strong> 2200 Campbellton Rd Atlanta, GA</li>--}}
                        {{--<li><strong>Hours (Sunday - Thursday):</strong> 9:30am-9:30pm</li>--}}
                        {{--<li><strong>Hours (Friday-Saturday):</strong> 9:30am-10pm</li>--}}
                    {{--</ul>--}}
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 col-md-offset-2">
                    {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Shell Gas Station (Buy BTC Only)</li>--}}
                    {{--<li><strong>Address:</strong> 3550 E Ponce DE Leon Blvd Scottdale, GA, 30079</li>--}}
                    {{--<li><strong>Hours:</strong> Open 24/7</li>--}}
                    {{--</ul>--}}
                </div>
                <div class="col-md-5">
                    {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Citgo Gas Station (Buy BTC Only)</li>--}}
                    {{--<li><strong>Address:</strong> 1988 Flat Shoals Rd Atlanta, GA</li>--}}
                    {{--<li><strong>Hours (Monday-Saturday):</strong> 7am-11pm</li>--}}
                    {{--<li><strong>Hours (Sunday):</strong> 9am-9pm</li>--}}
                    {{--</ul>--}}
                </div>
            </div>

            <!-- ****************************************************************************************** -->

            <div class="row" style="margin-top:40px;">
                <h3 class="text-center">Jonesboro</h3>
                <br />
                <div class="col-md-5 col-md-offset-2">
                    <ul class="list-unstyled text-left">
                        <li><strong>Store Name:</strong> Citgo Gas Station (Buy BTC Only)</li>
                        <li><strong>Address:</strong> 6765 Tara Blvd Jonesboro, GA, 30236</li>
                        <li><strong>Hours:</strong> 6:30am-1:30am daily</li>
                    </ul>
                </div>
                <div class="col-md-5">
                    {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Best 4 Less Quick Mart (Buy BTC Only)</li>--}}
                    {{--<li><strong>Address:</strong> 2200 Campbellton Rd Atlanta, GA</li>--}}
                    {{--<li><strong>Hours (Sunday - Thursday):</strong> 9:30am-9:30pm</li>--}}
                    {{--<li><strong>Hours (Friday-Saturday):</strong> 9:30am-10pm</li>--}}
                    {{--</ul>--}}
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 col-md-offset-2">
                    {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Shell Gas Station (Buy BTC Only)</li>--}}
                    {{--<li><strong>Address:</strong> 3550 E Ponce DE Leon Blvd Scottdale, GA, 30079</li>--}}
                    {{--<li><strong>Hours:</strong> Open 24/7</li>--}}
                    {{--</ul>--}}
                </div>
                <div class="col-md-5">
                    {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Citgo Gas Station (Buy BTC Only)</li>--}}
                    {{--<li><strong>Address:</strong> 1988 Flat Shoals Rd Atlanta, GA</li>--}}
                    {{--<li><strong>Hours (Monday-Saturday):</strong> 7am-11pm</li>--}}
                    {{--<li><strong>Hours (Sunday):</strong> 9am-9pm</li>--}}
                    {{--</ul>--}}
                </div>
            </div>

            <!-- ****************************************************************************************** -->

            <div class="row" style="margin-top:40px;">
                <h3 class="text-center">Doraville</h3>
                <br />
                <div class="col-md-5 col-md-offset-2">
                    <ul class="list-unstyled text-left">
                        <li><strong>Store Name:</strong> Stop N Save Food Mart</li>
                        <li><strong>Address:</strong> 6039 New Peachtree Rd. Doraville, GA</li>
                        <li><strong>Hours:</strong> 6:00am-midnigh daily</li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <ul class="list-unstyled text-left">
                        <li><strong>Store Name:</strong> Gas Station (Buy BTC Only)</li>
                        <li><strong>Address:</strong> 6400 Peachtree Industrial Blvd, Doraville, GA,30360 (Next to Doraville Package store)</li>
                        <li><strong>Hours:</strong> 7am-12am daily</li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 col-md-offset-2">
                    {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Shell Gas Station (Buy BTC Only)</li>--}}
                    {{--<li><strong>Address:</strong> 3550 E Ponce DE Leon Blvd Scottdale, GA, 30079</li>--}}
                    {{--<li><strong>Hours:</strong> Open 24/7</li>--}}
                    {{--</ul>--}}
                </div>
                <div class="col-md-5">
                    {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Citgo Gas Station (Buy BTC Only)</li>--}}
                    {{--<li><strong>Address:</strong> 1988 Flat Shoals Rd Atlanta, GA</li>--}}
                    {{--<li><strong>Hours (Monday-Saturday):</strong> 7am-11pm</li>--}}
                    {{--<li><strong>Hours (Sunday):</strong> 9am-9pm</li>--}}
                    {{--</ul>--}}
                </div>
            </div>

            <!-- ****************************************************************************************** -->

            <div class="row" style="margin-top:40px;">
                <h3 class="text-center">Sandy Springs</h3>
                <br />
                <div class="col-md-5 col-md-offset-2">
                    <ul class="list-unstyled text-left">
                        <li><strong>Store Name:</strong> Shell Gas Station (Buy BTC Only)</li>
                        <li><strong>Address:</strong> 5700 Roswell Rd Atlanta, GA</li>
                        <li><strong>Hours:</strong> Open 24/7</li>
                    </ul>
                </div>
                <div class="col-md-5">
                    {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Best 4 Less Quick Mart (Buy BTC Only)</li>--}}
                    {{--<li><strong>Address:</strong> 2200 Campbellton Rd Atlanta, GA</li>--}}
                    {{--<li><strong>Hours (Sunday - Thursday):</strong> 9:30am-9:30pm</li>--}}
                    {{--<li><strong>Hours (Friday-Saturday):</strong> 9:30am-10pm</li>--}}
                    {{--</ul>--}}
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 col-md-offset-2">
                    {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Shell Gas Station (Buy BTC Only)</li>--}}
                    {{--<li><strong>Address:</strong> 3550 E Ponce DE Leon Blvd Scottdale, GA, 30079</li>--}}
                    {{--<li><strong>Hours:</strong> Open 24/7</li>--}}
                    {{--</ul>--}}
                </div>
                <div class="col-md-5">
                    {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Citgo Gas Station (Buy BTC Only)</li>--}}
                    {{--<li><strong>Address:</strong> 1988 Flat Shoals Rd Atlanta, GA</li>--}}
                    {{--<li><strong>Hours (Monday-Saturday):</strong> 7am-11pm</li>--}}
                    {{--<li><strong>Hours (Sunday):</strong> 9am-9pm</li>--}}
                    {{--</ul>--}}
                </div>
            </div>

            <!-- ****************************************************************************************** -->

            <div class="row" style="margin-top:40px;">
                <h3 class="text-center">Union City</h3>
                <br />
                <div class="col-md-5 col-md-offset-2">
                    <ul class="list-unstyled text-left">
                        <li><strong>Store Name:</strong> Island Takeaway (Buy BTC Only)</li>
                        <li><strong>Address:</strong> 5540 Old National Hwy Atlanta, GA</li>
                        <li><strong>Hours (Monday-Saturday):</strong> 11am-10pm</li>
                        <li><strong>Hours (Sunday):</strong> Closed</li>
                    </ul>
                </div>
                <div class="col-md-5">
                    {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Best 4 Less Quick Mart (Buy BTC Only)</li>--}}
                    {{--<li><strong>Address:</strong> 2200 Campbellton Rd Atlanta, GA</li>--}}
                    {{--<li><strong>Hours (Sunday - Thursday):</strong> 9:30am-9:30pm</li>--}}
                    {{--<li><strong>Hours (Friday-Saturday):</strong> 9:30am-10pm</li>--}}
                    {{--</ul>--}}
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 col-md-offset-2">
                    {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Shell Gas Station (Buy BTC Only)</li>--}}
                    {{--<li><strong>Address:</strong> 3550 E Ponce DE Leon Blvd Scottdale, GA, 30079</li>--}}
                    {{--<li><strong>Hours:</strong> Open 24/7</li>--}}
                    {{--</ul>--}}
                </div>
                <div class="col-md-5">
                    {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Citgo Gas Station (Buy BTC Only)</li>--}}
                    {{--<li><strong>Address:</strong> 1988 Flat Shoals Rd Atlanta, GA</li>--}}
                    {{--<li><strong>Hours (Monday-Saturday):</strong> 7am-11pm</li>--}}
                    {{--<li><strong>Hours (Sunday):</strong> 9am-9pm</li>--}}
                    {{--</ul>--}}
                </div>
            </div>

            <!-- ****************************************************************************************** -->

            <div class="row" style="margin-top:40px; margin-bottom:60px;">
                <h3 class="text-center">Hapeville</h3>
                <br />
                <div class="col-md-5 col-md-offset-2">
                    <ul class="list-unstyled text-left">
                        <li><strong>Store Name:</strong> Citgo</li>
                        <li><strong>Address:</strong> 971 Virginia Ave Hapeville, GA, 30354</li>
                        <li><strong>Hours:</strong> Open 24/7</li>
                    </ul>
                </div>
                <div class="col-md-5">
                    {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Best 4 Less Quick Mart (Buy BTC Only)</li>--}}
                    {{--<li><strong>Address:</strong> 2200 Campbellton Rd Atlanta, GA</li>--}}
                    {{--<li><strong>Hours (Sunday - Thursday):</strong> 9:30am-9:30pm</li>--}}
                    {{--<li><strong>Hours (Friday-Saturday):</strong> 9:30am-10pm</li>--}}
                    {{--</ul>--}}
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 col-md-offset-2">
                    {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Shell Gas Station (Buy BTC Only)</li>--}}
                    {{--<li><strong>Address:</strong> 3550 E Ponce DE Leon Blvd Scottdale, GA, 30079</li>--}}
                    {{--<li><strong>Hours:</strong> Open 24/7</li>--}}
                    {{--</ul>--}}
                </div>
                <div class="col-md-5">
                    {{--<ul class="list-unstyled text-left">--}}
                    {{--<li><strong>Store Name:</strong> Citgo Gas Station (Buy BTC Only)</li>--}}
                    {{--<li><strong>Address:</strong> 1988 Flat Shoals Rd Atlanta, GA</li>--}}
                    {{--<li><strong>Hours (Monday-Saturday):</strong> 7am-11pm</li>--}}
                    {{--<li><strong>Hours (Sunday):</strong> 9am-9pm</li>--}}
                    {{--</ul>--}}
                </div>
            </div>

        </div>
    </div>

@endsection