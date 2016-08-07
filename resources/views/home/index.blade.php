@extends('layouts.main')

@section('title', 'Buy Bitcoins!')

@section('content')
    @include('partials.disclaimer')

    <section id="buy-now">
        <div class="wrapper">
            <img src="images/CashToCryptoGreenBanner_1920.jpg" class="img-responsive" alt="C@C-Green-Banner">
        </div>
        <div class="wrapper wrapper-image">
            <div class="container">
                <div class="row">
                    <div class="col-xs-8">
                        <h3 class="text-left" style="color:white; text-shadow: 1px 1px 1px black; padding-top:10px;">Safe, Fast, Reliable. What more could you ask for?</h3>
                    </div>
                    <div class="col-xs-4 text-center">
                        <h3><button type="button" class="btn btn-success" style="margin-right:35%; border:1px solid black;"><h4><a href="{{route('buy')}}" class="btn-link">BUY NOW</a></h4></button></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="steps">
        <div class="container">
            <div class="row" style="margin-top:40px; margin-bottom:50px;">
                <div class="col-xs-4 text-center">
                    <img src="images/bank-icon.png" class="img-responsive" alt="bitcoin-icon"><br>
                    <h4><b>Step 1: Choose Location</b></h4>
                    <p class="steps-padding">Choose the most convenient deposit location from thousands of locations around the U.S.</p>
                </div>
                <div class="col-xs-4 text-center">
                    <img src="images/wallet-icon.png" class="img-responsive" alt="bitcoin-icon"><br>
                    <h4><b>Step 2: Deposit Cash</b></h4>
                    <p class="steps-padding">After placing an order, make a cash deposit to our account</p>
                </div>
                <div class="col-xs-4 text-center">
                    <img src="images/bitcoin-icon.png" class="img-responsive" alt="bitcoin-icon"><br>
                    <h4><b>Step 3: Get Bitcoin!</b></h4>
                    <p class="steps-padding">Your bitcoin purchase will be processed and delivered within 2 hours</p>
                </div>
            </div>
        </div>
    </section>
    
    <section id="why-us" style="background-color:#f2f2f2;">
        <div class="container">
            <div class="row" style="margin-top:50px; margin-bottom:60px;">
                <div class="col-xs-4">
                    <h2>Why Us?</h2>
                    <ul style="padding-top:10px;">
                        <li class="li-glyphicon">No Bank Account Needed</li>
                        <li class="li-glyphicon">Order From Your Phone</li>
                        <li class="li-glyphicon">Use Any Bitcoin Wallet</li>
                        <li class="li-glyphicon">Receive Your Bitcoin Same Day</li>
                    </ul>
                </div>
                <div class="col-xs-4" style="padding-right:20px;">
                    <h2>Our Reputation</h2>
                    <p>We have served thousands of customers, and we guarantee 100% customer satisfaction.</p>
                </div>
                <div class="col-xs-4">
                    <h2>Buy With Cash</h2>
                    <p>Buying Bitcoin with cash has never been easier. Place an order and bitcoin will be sent directly to your wallet.</p>
                </div>
            </div>
        </div>
    </section>
    
    <section id="buy-now">
        <div class="wrapper">
            <img src="images/CashToCryptoGoldBanner_1920.jpg" class="img-responsive" alt="C@C-Green-Banner">
        </div>
    </section>
    
    <section id="our-customers" style="margin-top:0px;">
        <div class="container">
           <div class="row" style="margin-top:40px;">
               <div class="col-md-12 text-center">
                   <h2>Our Customers</h2>
               </div>
           </div>
           <div class="row" style="margin-bottom:60px;">
               <div class="col-xs-4">
                   <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce luctus dolor cursus, varius lectus sed, suscipit lacus. Aliquam condimentum magna sit amet suscipit blandit. Nunc vel odio non nibh ornare ornare. Nunc nisi elit, condimentum sed urna vel, finibus iaculis purus. Aliquam nibh elit, iaculis ac velit id, feugiat tempor erat."</p>
               </div>
               <div class="col-xs-4">
                   <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce luctus dolor cursus, varius lectus sed, suscipit lacus. Aliquam condimentum magna sit amet suscipit blandit. Nunc vel odio non nibh ornare ornare. Nunc nisi elit, condimentum sed urna vel, finibus iaculis purus. Aliquam nibh elit, iaculis ac velit id, feugiat tempor erat."</p>
               </div>
               <div class="col-xs-4">
                   <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce luctus dolor cursus, varius lectus sed, suscipit lacus. Aliquam condimentum magna sit amet suscipit blandit. Nunc vel odio non nibh ornare ornare. Nunc nisi elit, condimentum sed urna vel, finibus iaculis purus. Aliquam nibh elit, iaculis ac velit id, feugiat tempor erat."</p>
               </div>
           </div>
        </div>
    </section>
@endsection