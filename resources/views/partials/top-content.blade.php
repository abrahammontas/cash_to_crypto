<!-- Loader -->
<div class="loader">
    <div class="loader-img"></div>
</div>

<!-- Top content -->
<div class="top-content">

    <!-- Top menu -->
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Cash To Crypto - Buy Bitcoins!</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="top-navbar-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="scroll-link" href="#features">Home</a></li>
                    <li><a class="scroll-link" href="#how-it-works">How It Works</a></li>
                    <li><a class="scroll-link" href="#about-us">About</a></li>
                    <li><a class="scroll-link" href="#testimonials">Testimonials</a></li>
                    <li><a class="scroll-link" href="#pricing">Contact</a></li>
                    @if (Auth::guest())
                        <li><a class="btn btn-link-2" href="{{ url('/login') }}">Login</a></li>
                        <li><a class="btn btn-link-2" style="background-color:#707070; color:white;" href="{{ url('/register') }}">Register</a></li>
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

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 text">
                    <h1 class="wow fadeInLeftBig">Buy Bitcoin With Cash!</h1>
                    <div class="description wow fadeInLeftBig">
                        <p>
                            We have made purchasing bitcoin even easier! Register for a free account, upload your photo id once and make your first purchase with our new system!
                        </p>
                    </div>
                    <div class="top-big-link wow fadeInUp">
                        <a class="btn btn-link-1 scroll-link" href="#pricing">Register</a>
                        <a class="btn btn-link-2 scroll-link" href="#features">Learn more</a>
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
                        <form role="form" role="form" data-toggle="validator" method="POST" action="{{ url('/login') }}">

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
                                <button type="submit" name="register" id="btn-register" class="btn form-control" style="text-transform:uppercase;">Create Free Account</button>
                            </div>

                            <!-- <div class="form-links">
                                <a href="#" class="launch-modal" data-modal-id="modal-privacy">Privacy Policy</a> -
                                <a href="#" class="launch-modal" data-modal-id="modal-faq">FAQ</a>
                            </div> -->

                        </form>
                        <hr />
                        <p style="font-size:16px; font-weight:300; color:#c6c4c4;">Already have an account? - <button class="btn btn-primary">Login</button></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>