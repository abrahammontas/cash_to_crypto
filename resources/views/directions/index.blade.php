@extends('layouts.main')

@section('title', 'How To Buy Bitcoins!')

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

    <div class="wrapper" style="background-color:#f7fff7;">
        <div class="container" style="padding-bottom:80px; padding-top:40px;">
            <div class="row" style="margin-top:20px; margin-bottom:30px; margin-right:15px; margin-left:15px;">
                <h4 style="border:1px solid black; padding:10px 20px; font-weight: 300; line-height: 1.4em;">To buy bitcoin from Cash To Crypto all you will need is cash. You are not required to have a bank account at any of the banks we have accounts at. To buy bitcoin just deposit cash into one of our bank accounts, upload the photos of your receipt, and you are done!</h4>
            </div>
            <div class="row">
                <div class="col-md-12 text-left">
                    <h4 style="font-weight: 300;"><b>Step 1:</b> After creating an account, upload a photo of your ID on your profile. We will accept a driver`s license, passport, or state ID card.</h4>
                    <h4 style="font-weight: 300;"><b>Step 2:</b> Save your bitcoin wallet address </h4>
                </div>
            </div>
            <div class="row" style="margin-top:15px;">
                <div class="col-md-12">
                    <img src="images/howto_profile.jpg" alt="how-to-profile">
                </div>
            </div>
            <div class="row" style="margin-top:30px;">
                <div class="col-md-12 text-left">
                    <h4 style="font-weight: 300;"><b>Step 3:</b> Choose a bank, type in your purchase amount and select your bitcoin wallet address.</h4>
                </div>
            </div>
            <div class="row" style="margin-top:15px;">
                <div class="col-md-12">
                    <img src="images/howto_buy.jpg" alt="how-to-buy">
                </div>
            </div>
            <div class="row" style="margin-top:30px;">
                <div class="col-md-12 text-left">
                    <h4 style="font-weight: 300;"><b>Step 4:</b> On the current order page you will see the complete directions along with the bank account information.</h4>
                    <h4 style="font-weight: 300;"><b>Step 5:</b> After you make the cash deposit, upload a photo of your receipt and a selfie of yourself holding the receipt.</h4>
                </div>
            </div>
            <div class="row" style="margin-top:15px;">
                <div class="col-md-12">
                    <img src="images/howto_directions.jpg" alt="how-to-directions">
                </div>
            </div>
        </div>
    </div>

@endsection