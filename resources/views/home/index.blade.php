@extends('layouts.main')

@section('title', 'Buy Bitcoins!')

@section('content')

{{--@include('partials.disclaimer')--}}

<!-- Loader -->
<div class="loader">
    <div class="loader-img"></div>
</div>

<!-- Top content -->
<div class="top-content">
    <!-- Top menu -->
    <nav class="navbar navbar-inverse" role="navigation" style="margin-bottom:0px;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Cash To Crypto</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="top-navbar-1">
                <ul class="nav navbar-nav navbar-right">
                    <!-- <li><a class="scroll-link" href="#features">Home</a></li>
                    <li><a class="scroll-link" href="#how-it-works">How It Works</a></li>
                    <li><a class="scroll-link" href="#about-us">About</a></li>
                    <li><a class="scroll-link" href="#testimonials">Testimonials</a></li> -->
                    <li><a href="{{ url('/atm-locations') }}" style="color:white !important;">Bitcoin ATMs</a></li>
                    <li><a href="{{ url('/contact') }}" style="color:white !important">Contact</a></li>
                    @if (Auth::guest())
                        <li><a class="btn btn-link-2" href="{{ url('/login') }}" style="color:white !important">Login</a></li>
                        <li><a class="btn btn-link-2" style="background-color:#707070; color:white !important" href="{{ url('/register') }}" style="color:white">Register</a></li>
                    @else
                        <li>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Hi, {{ Auth::user()->firstName}} {{ Auth::user()->lastName}}
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ Auth::user()->admin ? route('admin.dashboard') : route('dashboard') }}"><i class="fa fa-btn fa-dashboard"></i> Dashboard</a></li>
                                    <li><a href="{{ route('profile') }}"><i class="fa fa-fw fa-list-ul"></i> Profile</a></li>
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    @endif
                    <li class="scroll-link exchange-rate"><span style="font-weight:400;">Exchange Rate: 1BTC</span> = <span style="font-weight:400; color:gold">${{number_format(\App\Settings::getParam('ourprice'),2)}}</span></li>
                </ul>
            </div>
        </div>
    </nav>

<!--     <section id="closed" style="background-color:#9cb8e2; border-top: 1px solid #147ae0; border-bottom: 1px solid #147ae0;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12" style="padding-top:14px; padding-bottom:8px;">
                    <h3 style="color:white; margin-top:5px; font-weight: 400;"><span style="color:red">* * *</span> We are closed for Labor Day Weekend. We will reopen Tuesday at 9:00am EST <span style="color:red">* * *</span></h3>
                </div>
            </div>
        </div>
    </section> -->

    <section id="disclaimer" style="background-color:#ff5e5e; border-top: 1px solid #cc1616; border-bottom: 1px solid #cc1616;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12" style="padding-top:14px; padding-bottom:6px;">
                    <p style="color:whitesmoke; font-size:14px;"><strong>WARNING: We will no longer be able to do business with any person that resides, is located, has a place of business, or is conducting business in New York.</strong></p>
                </div>
            </div>
        </div>
    </section>

    <div class="inner-bg" style="padding-bottom:100px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 text fadeInLeftBig" style="padding:20px 20px;">
                    <div class="row" style="margin-bottom:5%;">
                        <h1 class="wow">Buy Bitcoin With Cash!</h1>
                        <div class="description wow">
                            <p style="padding-right:40px; padding-left:40px;">
                                We have made purchasing bitcoin even easier! Register for a free account and follow our three simple steps to start buying Bitcoin!
                            </p>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10%;">
                        <div class="col-md-12">
                            <div class="col-md-4 text-center">
                                <img src="images/bank-icon.png" class="img-responsive" style="margin:auto;" alt="bitcoin-icon"><br>
                                <h4 style="font-weight:400">Step 1: Choose Location</h4>
                                <p class="steps-padding">Choose the most convenient deposit location from thousands of locations around the U.S.</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <img src="images/wallet-icon.png" class="img-responsive" style="margin:auto;" alt="bitcoin-icon"><br>
                                <h4 style="font-weight:400">Step 2: Deposit Cash</h4>
                                <p class="steps-padding">After placing an order, make a cash deposit to our account</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <img src="images/bitcoin-icon.png" class="img-responsive" style="margin:auto;" alt="bitcoin-icon"><br>
                                <h4 style="font-weight:400">Step 3: Get Bitcoin!</h4>
                                <p class="steps-padding">Your bitcoin purchase will be processed and delivered within 2 hours</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="top-big-link wow fadeInUp">
                            <a class="btn btn-link-2" style="background-color:#707070;" href="{{ url('/register') }}">Register For A Free Account!</a>
                            <!-- <a class="btn btn-link-2" href="#features">Learn more</a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 form-box wow fadeInUp">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Sign up now</h3>
                            <p>Fill in the form below to get instant access:</p>
                        </div>
                        <div class="form-top-right">
                            <span aria-hidden="true" class="typcn typcn-pencil"></span>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" role="form" data-toggle="validator" method="POST" action="{{ url('/register') }}">

                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                                <label for="firstName" class="sr-only">First Name</label>
                                <input id="name" type="text" class="form-control" placeholder="First Name" name="firstName" value="{{ old('firstName') }}" required>

                                @if ($errors->has('firstName'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('firstName') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                                <label for="lastName" class="sr-only">Last Name</label>
                                <input id="name" type="text" class="form-control"  placeholder="Last Name" name="lastName" value="{{ old('lastName') }}" required>

                                @if ($errors->has('lastName'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('firstName') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="sr-only">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" data-error="Invalid email address" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="sr-only">Phone</label>
                                <input type="text" data-minlength="10" name="phone" id="input-phone" class="form-control input-medium bfh-phone" data-country="US" value="{{ old('phone') }}"  required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="sr-only">Password</label>
                                <input id="password" type="password" class="form-control" placeholder="Password (minimum of 6 characters)" name="password" data-minlength="6" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="sr-only">Confirm Password</label>
                                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" data-match="#password" data-match-error="Passwords do not match" required>
                                <div class="help-block with-errors"></div>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="subscribed" style="padding-left:10px;">I agree to receive text and email promotions</label>
                                <input type="checkbox" name="subscribed" value="1" style="float:left;">
                            </div>

                            <div class="form-group">
                                <button type="submit" name="register" id="btn-register" class="btn form-control" style="text-transform:uppercase;">Create Free Account</button>
                            </div>

                            <!-- <div class="form-links">
                                <a href="#" class="launch-modal" data-modal-id="modal-privacy">Privacy Policy</a> -
                                <a href="#" class="launch-modal" data-modal-id="modal-faq">FAQ</a>
                            </div> -->

                        </form>
                        <hr />
                        <p style="font-size:16px; font-weight:300; color:#c6c4c4;">Already have an account? - <a href="{{ url('/login') }}"><button class="btn btn-primary">
                                Login</button></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- <!-- <!-- Features -->
<!-- <div class="features-container section-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 features section-description wow fadeIn">
                <h2>What's included</h2>
                <div class="divider-1 wow fadeInUp"><span></span></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 features-box features-box-gray wow fadeInUp">
                <div class="features-box-icon">
                    <span aria-hidden="true" class="typcn typcn-eye-outline"></span>
                </div>
                <h3>Easy To Use</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
            </div>
            <div class="col-sm-4 features-box wow fadeInDown">
                <div class="features-box-icon">
                    <span aria-hidden="true" class="typcn typcn-thumbs-ok"></span>
                </div>
                <h3>Responsive Design</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
            </div>
            <div class="col-sm-4 features-box features-box-gray wow fadeInUp">
                <div class="features-box-icon">
                    <span aria-hidden="true" class="typcn typcn-cog-outline"></span>
                </div>
                <h3>Bootstrap Engine</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 features-box wow fadeInUp">
                <div class="features-box-icon">
                    <span aria-hidden="true" class="typcn typcn-video-outline"></span>
                </div>
                <h3>Lots Of Videos</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
            </div>
            <div class="col-sm-4 features-box features-box-gray wow fadeInDown">
                <div class="features-box-icon">
                    <span aria-hidden="true" class="typcn typcn-device-phone"></span>
                </div>
                <h3>Mobile App</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
            </div>
            <div class="col-sm-4 features-box wow fadeInUp">
                <div class="features-box-icon">
                    <span aria-hidden="true" class="typcn typcn-group-outline"></span>
                </div>
                <h3>Big Community</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 section-bottom-button wow fadeInUp">
                <a class="btn btn-link-1 scroll-link" href="#top-content">Sign up now</a>
            </div>
        </div>
    </div>
</div> -->

<!-- More features -->
<!-- <div class="more-features-container section-container section-container-gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 more-features section-description wow fadeIn">
                <h2>More features</h2>
                <div class="divider-1 wow fadeInUp"><span></span></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5 more-features-box wow fadeInLeft">
                <img src="assets/img/devices/pc.png" alt="">
            </div>
            <div class="col-sm-7 more-features-box wow fadeInUp">
                <div class="more-features-box-text">
                    <div class="more-features-box-text-icon">
                        <span aria-hidden="true" class="typcn typcn-attachment"></span>
                    </div>
                    <h3>Ut wisi enim ad minim</h3>
                    <div class="more-features-box-text-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                        Ut wisi enim ad minim veniam, quis nostrud.
                    </div>
                </div>
                <div class="more-features-box-text">
                    <div class="more-features-box-text-icon">
                        <span aria-hidden="true" class="typcn typcn-user"></span>
                    </div>
                    <h3>Quis nostrud exerci tat</h3>
                    <div class="more-features-box-text-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                        Ut wisi enim ad minim veniam, quis nostrud.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Always beautiful -->
<!-- <div class="always-beautiful-container section-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 always-beautiful section-description wow fadeIn">
                <h2>Always beautiful</h2>
                <div class="divider-1 wow fadeInUp"><span></span></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7 always-beautiful-box wow fadeInLeft">
                <div class="always-beautiful-box-text always-beautiful-box-text-left">
                    <h3>Ut wisi enim ad minim</h3>
                    <p class="medium-paragraph">
                        Lorem ipsum dolor sit amet, <span class="blue">consectetur adipisicing</span> elit,
                        sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                        Ut wisi enim ad minim veniam, quis nostrud.
                        Exerci tation ullamcorper suscipit <span class="blue">lobortis nisl</span> ut aliquip ex ea commodo consequat.
                        Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl.
                    </p>
                </div>
            </div>
            <div class="col-sm-5 always-beautiful-box wow fadeInUp">
                <img src="assets/img/devices/pc2.png" alt="">
            </div>
        </div>
    </div>
</div> -->

<!-- How it works -->
<!-- <div class="how-it-works-container section-container section-container-image-bg">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 how-it-works section-description wow fadeIn">
                <h2>Ready in 4 steps</h2>
                <div class="divider-1 wow fadeInUp"><span></span></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1 how-it-works-box wow fadeInUp">
                <div class="how-it-works-box-icon">
                    <span aria-hidden="true" class="typcn typcn-pencil"></span>
                    <span aria-hidden="true" class="how-it-works-step">1</span>
                </div>
                <h3>Sign up</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
            </div>
            <div class="col-sm-4 col-sm-offset-2 how-it-works-box wow fadeInDown">
                <div class="how-it-works-box-icon">
                    <span aria-hidden="true" class="typcn typcn-ticket"></span>
                    <span aria-hidden="true" class="how-it-works-step">2</span>
                </div>
                <h3>Make payment</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1 how-it-works-box wow fadeInUp">
                <div class="how-it-works-box-icon">
                    <span aria-hidden="true" class="typcn typcn-key-outline"></span>
                    <span aria-hidden="true" class="how-it-works-step">3</span>
                </div>
                <h3>Log in</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
            </div>
            <div class="col-sm-4 col-sm-offset-2 how-it-works-box wow fadeInDown">
                <div class="how-it-works-box-icon">
                    <span aria-hidden="true" class="typcn typcn-thumbs-up"></span>
                    <span aria-hidden="true" class="how-it-works-step">4</span>
                </div>
                <h3>Start learning</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 section-bottom-button wow fadeInUp">
                <a class="btn btn-link-1 scroll-link" href="#top-content">Sign up now</a>
            </div>
        </div>
    </div>
</div> -->

<!-- Pricing -->
<!-- <div class="pricing-container section-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 pricing section-description wow fadeIn">
                <h2>Pricing</h2>
                <div class="divider-1 wow fadeInUp"><span></span></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 pricing-box wow fadeInUp">
                <div class="pricing-box-inner">
                    <div class="pricing-box-price"><span>$ </span><strong>12</strong><span> / month</span></div>
                    <h3>Basic</h3>
                    <h4>Freelancer</h4>
                    <div class="pricing-box-features">
                        <ul>
                            <li>1000 video lessons</li>
                            <li>Normal speed</li>
                            <li>500 solved exercises</li>
                            <li>300MB to save your code</li>
                            <li>750 hours of support</li>
                        </ul>
                    </div>
                    <div class="pricing-box-sign-up">
                        <a class="btn btn-link-1 scroll-link" href="#top-content">Sign up</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 pricing-box pricing-box-best wow fadeInDown">
                <div class="pricing-box-inner">
                    <div class="pricing-box-price">
                        <span>$ </span><strong>35</strong><span> / month</span>
                        <div class="pricing-box-icon">
                            <span aria-hidden="true" class="typcn typcn-star"></span>
                        </div>
                    </div>
                    <h3>Ultimate</h3>
                    <h4>Best value</h4>
                    <div class="pricing-box-features">
                        <ul>
                            <li>3000 video lessons</li>
                            <li>2x speed</li>
                            <li>2000 solved exercises</li>
                            <li>500MB to save your code</li>
                            <li>900 hours of support</li>
                        </ul>
                    </div>
                    <div class="pricing-box-sign-up">
                        <a class="btn btn-link-1 scroll-link" href="#top-content">Sign up</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 pricing-box wow fadeInUp">
                <div class="pricing-box-inner">
                    <div class="pricing-box-price"><span>$ </span><strong>75</strong><span> / month</span></div>
                    <h3>Platinum</h3>
                    <h4>Big company</h4>
                    <div class="pricing-box-features">
                        <ul>
                            <li>5000 video lessons</li>
                            <li>4x speed</li>
                            <li>4000 solved exercises</li>
                            <li>900MB to save your code</li>
                            <li>Unlimited hours of support</li>
                        </ul>
                    </div>
                    <div class="pricing-box-sign-up">
                        <a class="btn btn-link-1 scroll-link" href="#top-content">Sign up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Call to action -->
<!-- <div class="call-to-action-container section-container section-container-image-bg">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 call-to-action section-description wow fadeInLeftBig">
                <h2>Call to action</h2>
                <div class="divider-1 wow fadeInUp"><span></span></div>
                <p>
                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut
                    aliquip ex ea commodo consequat. Ut wisi enim ad minim veniam, quis nostrud.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 section-bottom-button wow fadeInUp">
                <a class="btn btn-link-1 scroll-link" href="#top-content">Sign up now</a>
            </div>
        </div>
    </div>
</div> -->

<!-- About us -->
<!-- <div class="about-us-container section-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 about-us section-description wow fadeIn">
                <h2>About us</h2>
                <div class="divider-1 wow fadeInUp"><span></span></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 about-us-box wow fadeInUp">
                <div class="about-us-photo">
                    <img src="assets/img/about/1.jpg" alt="" data-at2x="assets/img/about/1.jpg">
                    <div class="about-us-role">Marketing</div>
                </div>
                <h3>John Doe</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
                <div class="about-us-social">
                    <a href="#"><span class="typcn typcn-social-facebook"></span></a>
                    <a href="#"><span class="typcn typcn-social-dribbble"></span></a>
                    <a href="#"><span class="typcn typcn-social-twitter"></span></a>
                </div>
            </div>
            <div class="col-sm-4 about-us-box wow fadeInDown">
                <div class="about-us-photo">
                    <img src="assets/img/about/2.jpg" alt="" data-at2x="assets/img/about/2.jpg">
                    <div class="about-us-role">Designer</div>
                </div>
                <h3>Tim Brown</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
                <div class="about-us-social">
                    <a href="#"><span class="typcn typcn-social-facebook"></span></a>
                    <a href="#"><span class="typcn typcn-social-dribbble"></span></a>
                    <a href="#"><span class="typcn typcn-social-twitter"></span></a>
                </div>
            </div>
            <div class="col-sm-4 about-us-box wow fadeInUp">
                <div class="about-us-photo">
                    <img src="assets/img/about/3.jpg" alt="" data-at2x="assets/img/about/3.jpg">
                    <div class="about-us-role">Developer</div>
                </div>
                <h3>Sarah Red</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
                <div class="about-us-social">
                    <a href="#"><span class="typcn typcn-social-facebook"></span></a>
                    <a href="#"><span class="typcn typcn-social-dribbble"></span></a>
                    <a href="#"><span class="typcn typcn-social-twitter"></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
 -->
<!-- Testimonials -->
<!-- <div class="testimonials-container section-container section-container-gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 testimonials section-description wow fadeIn">
                <h2>Testimonials</h2>
                <div class="divider-1 wow fadeInUp"><span></span></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 testimonial-list wow fadeInUp">
                <div role="tabpanel">
                    <!-- Tab panes -->
                 <!--    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="tab1">
                            <div class="testimonial-image">
                                <img src="assets/img/testimonials/1.jpg" alt="" data-at2x="assets/img/testimonials/1.jpg">
                                <div class="testimonial-icon">
                                    <span aria-hidden="true" class="typcn typcn-pin"></span>
                                </div>
                            </div>
                            <div class="testimonial-text">
                                <p>
                                    "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                                    Lorem ipsum dolor sit amet, consectetur..."<br>
                                    <a href="#">Lorem Ipsum, dolor.co.uk</a>
                                </p>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab2">
                            <div class="testimonial-image">
                                <img src="assets/img/testimonials/2.jpg" alt="" data-at2x="assets/img/testimonials/2.jpg">
                                <div class="testimonial-icon">
                                    <span aria-hidden="true" class="typcn typcn-pin"></span>
                                </div>
                            </div>
                            <div class="testimonial-text">
                                <p>
                                    "Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip
                                    ex ea commodo consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit
                                    lobortis nisl ut aliquip ex ea commodo consequat..."<br>
                                    <a href="#">Minim Veniam, nostrud.com</a>
                                </p>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab3">
                            <div class="testimonial-image">
                                <img src="assets/img/testimonials/3.jpg" alt="" data-at2x="assets/img/testimonials/3.jpg">
                                <div class="testimonial-icon">
                                    <span aria-hidden="true" class="typcn typcn-pin"></span>
                                </div>
                            </div>
                            <div class="testimonial-text">
                                <p>
                                    "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                                    Lorem ipsum dolor sit amet, consectetur..."<br>
                                    <a href="#">Lorem Ipsum, dolor.co.uk</a>
                                </p>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab4">
                            <div class="testimonial-image">
                                <img src="assets/img/testimonials/4.jpg" alt="" data-at2x="assets/img/testimonials/4.jpg">
                                <div class="testimonial-icon">
                                    <span aria-hidden="true" class="typcn typcn-pin"></span>
                                </div>
                            </div>
                            <div class="testimonial-text">
                                <p>
                                    "Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip
                                    ex ea commodo consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit
                                    lobortis nisl ut aliquip ex ea commodo consequat..."<br>
                                    <a href="#">Minim Veniam, nostrud.com</a>
                                </p>
                            </div>
                        </div>
                    </div> -->
                    <!-- Nav tabs -->
            <!--         <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"></a>
                        </li>
                        <li role="presentation">
                            <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab"></a>
                        </li>
                        <li role="presentation">
                            <a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab"></a>
                        </li>
                        <li role="presentation">  -->
<!--                             <a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>  -->

{{--<div class='frontpage'>--}}
    {{--<section id="buy-now">--}}
        {{--<div class="wrapper">--}}
            {{--<img src="images/CashToCryptoGreenBanner_1920.jpg" class="img-responsive" alt="C@C-Green-Banner">--}}
        {{--</div>--}}
        {{--<div class="wrapper wrapper-image">--}}
            {{--<div class="container">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-xs-8">--}}
                        {{--<h3 class="text-left" style="color:white; text-shadow: 1px 1px 1px black; padding-top:10px;">Safe, Fast, Reliable. What more could you ask for?</h3>--}}
                    {{--</div>--}}
                    {{--<div class="col-xs-4 text-center">--}}
                        {{--<h3><button type="button" class="btn btn-success" style="margin-right:35%; border:1px solid black;"><h4><a href="{{route('buy')}}" class="btn-link">BUY NOW</a></h4></button></h3>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{----}}
    {{--<section id="steps">--}}
        {{--<div class="container">--}}
            {{--<div class="row" style="margin-top:40px; margin-bottom:50px;">--}}
                {{--<div class="col-xs-4 text-center">--}}
                    {{--<img src="images/bank-icon.png" class="img-responsive" alt="bitcoin-icon"><br>--}}
                    {{--<h4><b>Step 1: Choose Location</b></h4>--}}
                    {{--<p class="steps-padding">Choose the most convenient deposit location from thousands of locations around the U.S.</p>--}}
                {{--</div>--}}
                {{--<div class="col-xs-4 text-center">--}}
                    {{--<img src="images/wallet-icon.png" class="img-responsive" alt="bitcoin-icon"><br>--}}
                    {{--<h4><b>Step 2: Deposit Cash</b></h4>--}}
                    {{--<p class="steps-padding">After placing an order, make a cash deposit to our account</p>--}}
                {{--</div>--}}
                {{--<div class="col-xs-4 text-center">--}}
                    {{--<img src="images/bitcoin-icon.png" class="img-responsive" alt="bitcoin-icon"><br>--}}
                    {{--<h4><b>Step 3: Get Bitcoin!</b></h4>--}}
                    {{--<p class="steps-padding">Your bitcoin purchase will be processed and delivered within 2 hours</p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{----}}
    {{--<section id="why-us" style="background-color:#f2f2f2;">--}}
        {{--<div class="container">--}}
            {{--<div class="row" style="margin-top:50px; margin-bottom:60px;">--}}
                {{--<div class="col-xs-4">--}}
                    {{--<h2>Why Us?</h2>--}}
                    {{--<ul style="padding-top:10px;">--}}
                        {{--<li class="li-glyphicon">No Bank Account Needed</li>--}}
                        {{--<li class="li-glyphicon">Order From Your Phone</li>--}}
                        {{--<li class="li-glyphicon">Use Any Bitcoin Wallet</li>--}}
                        {{--<li class="li-glyphicon">Receive Your Bitcoin Same Day</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
                {{--<div class="col-xs-4" style="padding-right:20px;">--}}
                    {{--<h2>Our Reputation</h2>--}}
                    {{--<p>We have served thousands of customers, and we guarantee 100% customer satisfaction.</p>--}}
                {{--</div>--}}
                {{--<div class="col-xs-4">--}}
                    {{--<h2>Buy With Cash</h2>--}}
                    {{--<p>Buying Bitcoin with cash has never been easier. Place an order and bitcoin will be sent directly to your wallet.</p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{----}}
    {{--<section id="buy-now">--}}
        {{--<div class="wrapper">--}}
            {{--<img src="images/CashToCryptoGoldBanner_1920.jpg" class="img-responsive" alt="C@C-Green-Banner">--}}
        {{--</div>--}}
    {{--</section>--}}
    {{----}}
    {{--<section id="our-customers" style="margin-top:0px;">--}}
        {{--<div class="container">--}}
           {{--<div class="row" style="margin-top:40px;">--}}
               {{--<div class="col-md-12 text-center">--}}
                   {{--<h2>Our Customers</h2>--}}
               {{--</div>--}}
           {{--</div>--}}
           {{--<div class="row" style="margin-bottom:60px;">--}}
               {{--<div class="col-xs-4">--}}
                   {{--<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce luctus dolor cursus, varius lectus sed, suscipit lacus. Aliquam condimentum magna sit amet suscipit blandit. Nunc vel odio non nibh ornare ornare. Nunc nisi elit, condimentum sed urna vel, finibus iaculis purus. Aliquam nibh elit, iaculis ac velit id, feugiat tempor erat."</p>--}}
               {{--</div>--}}
               {{--<div class="col-xs-4">--}}
                   {{--<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce luctus dolor cursus, varius lectus sed, suscipit lacus. Aliquam condimentum magna sit amet suscipit blandit. Nunc vel odio non nibh ornare ornare. Nunc nisi elit, condimentum sed urna vel, finibus iaculis purus. Aliquam nibh elit, iaculis ac velit id, feugiat tempor erat."</p>--}}
               {{--</div>--}}
               {{--<div class="col-xs-4">--}}
                   {{--<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce luctus dolor cursus, varius lectus sed, suscipit lacus. Aliquam condimentum magna sit amet suscipit blandit. Nunc vel odio non nibh ornare ornare. Nunc nisi elit, condimentum sed urna vel, finibus iaculis purus. Aliquam nibh elit, iaculis ac velit id, feugiat tempor erat."</p>--}}
               {{--</div>--}}
           {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
{{--</div>--}}

@endsection