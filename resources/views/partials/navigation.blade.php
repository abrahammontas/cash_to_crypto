<nav class="navbar navbar-inverse" role="navigation" style="margin-bottom:0px; background-color:white;">
    <div class="container">
        <div class="navbar-header">
            @if(Auth::guest())
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            @endif
            <a href="/"><img src="images/c2clogo.png" style="max-width:230px; margin-top:10px;" class="hidden-xs hidden-sm" alt="Cash-To-Crypto-logo"></a>
        </div>

        @if(Auth::guest())
            <div class="scroll-link exchange-rate hidden-md hidden-lg pull-left" style="color:white; padding-left:0px; margin-top:-50px;">
                <img src="images/c2clogo.png" class="pull-left" style="max-width:200px" alt="c2c-logo"><br />
                <span style="font-weight:400; color:#5FB06F;" class="text-left">Exchange Rate: 1BTC</span> <span style="color:#9F9F9F">=</span> <span style="font-weight:400; color:#CCA75C">${{number_format(\App\Settings::getParam('ourprice'),2)}}</span>
            </div>
        @else
            <div class="scroll-link exchange-rate hidden-md hidden-lg" style="color:white; padding-left:0px;">
                <img src="images/c2clogo.png" style="max-width:200px" alt="c2c-logo"><br />
                <span style="font-weight:400; color:#5FB06F;">Exchange Rate: 1BTC</span> <span style="color:#9F9F9F">=</span> <span style="font-weight:400; color:#CCA75C">${{number_format(\App\Settings::getParam('ourprice'),2)}}</span>
            </div>
        @endif

        @if(!Auth::guest())
            <div class="dropdown hidden-md hidden-lg">
                <a href="/buy-bitcoins"><button class="btn-menu-buy">Buy Bitcoins!</button></a>
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Hi, {{ ucfirst(strtolower(Auth::user()->firstName)) }} {{ ucfirst(strtolower(Auth::user()->lastName)) }}
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu text-center" style="left:24.5%;" role="menu">
                    <li><a href="{{ Auth::user()->admin ? route('admin.dashboard') : route('dashboard') }}"><i class="fa fa-btn fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{ url('/') }}" style="color:#5b5b5b; {{ Request::is('/') ? 'color:#CCA75C; font-weight:500;' : '' }}">Home</a></li>
                @if (auth()->user()->hasPending())
                        <li>
                            <a href="{{route('current-order')}}" style="{{ Request::is('/current-order') ? 'color:#CCA75C; font-weight:500;' : '' }}"> Current Order</a>
                        </li>
                    @endif
                    @if(auth()->user()->admin !== 1)
                        <li><a href="{{ route('profile') }}"><i class="fa fa-fw fa-list-ul"></i> Profile</a></li>
                    @endif
                    <li><a href="{{ url('/directions') }}" style="color:#5b5b5b; {{ Request::is('directions') ? 'color:#CCA75C; font-weight:500;' : '' }}">Directions</a></li>

                    <li><a href="{{ route('atms.georgia') }}" style="{{ Request::is('atms-georgia') ? 'color:#CCA75C; font-weight:500;' : '' }}">Georgia ATMs</a></li>
                    <li><a href="{{ route('atms.alabama') }}" style="{{ Request::is('atms-alabama') ? 'color:#CCA75C; font-weight:500;' : '' }}">Alabama ATMs</a></li>
                    <li><a href="{{ route('atms.massachusetts') }}" style="{{ Request::is('atms-massachusetts') ? 'color:#CCA75C; font-weight:500;' : '' }}">Massachusetts ATMs</a></li>
                    <li><a href="{{ route('atms.newjersey') }}" style="{{ Request::is('atms-newjersey') ? 'color:#CCA75C; font-weight:500;' : '' }}">New Jersey ATMs</a></li>
                    <li><a href="{{ route('atms.texas') }}" style="{{ Request::is('atms-texas') ? 'color:#CCA75C; font-weight:500;' : '' }}">Texas ATMs</a></li>
                    <li><a href="{{ route('atms.florida') }}" style="{{ Request::is('atms-florida') ? 'color:#CCA75C; font-weight:500;' : '' }}">Florida ATMs</a></li>

                    <li><a href="{{ url('/contact') }}" style="color:#5b5b5b; {{ Request::is('contact') ? 'color:#CCA75C; font-weight:500;' : '' }}">Contact</a></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                </ul>
            </div>
        @endif

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="top-navbar-1">
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/') }}" style="color:#5b5b5b; {{ Request::is('/') ? 'color:#CCA75C; font-weight:500;' : '' }}">Home</a></li>
                    <li><a href="{{ url('/directions') }}" style="color:#5b5b5b; {{ Request::is('directions') ? 'color:#CCA75C; font-weight:500;' : '' }}">Directions</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                           style="{{ (Request::is('atms-georgia') || Request::is('atms-alabama') || Request::is('atms-massachusetts') || Request::is('atms-newjersey') || Request::is('atms-texas') || Request::is('atms-florida')) ? 'color:#CCA75C; font-weight:500;' : '' }}"
                           data-toggle="dropdown" role="button" aria-expanded="false">
                            Bitcoin ATMs
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('atms.georgia') }}">Georgia</a></li>
                            <li><a href="{{ route('atms.alabama') }}">Alabama</a></li>
                            <li><a href="{{ route('atms.massachusetts') }}">Massachusetts</a></li>
                            <li><a href="{{ route('atms.newjersey') }}">New Jersey</a></li>
                            <li><a href="{{ route('atms.texas') }}">Texas</a></li>
                            <li><a href="{{ route('atms.florida') }}">Florida</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('/contact') }}" style="color:#5b5b5b; {{ Request::is('contact') ? 'color:#CCA75C; font-weight:500;' : '' }}">Contact</a></li>
                    <li><a class="btn btn-link-2 btn-login" href="{{ url('/login') }}">Login</a></li>
                    <li><a class="btn btn-link-2 btn-register" href="{{ url('/register') }}">Register</a></li>
                @else
                    <li>
                        <div class="dropdown hidden-xs hidden-sm">
                            <a href="/buy-bitcoins"><button class="btn-menu-buy">Buy Bitcoins!</button></a>
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Hi, {{ ucfirst(strtolower(Auth::user()->firstName)) }} {{ ucfirst(strtolower(Auth::user()->lastName)) }}
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ Auth::user()->admin ? route('admin.dashboard') : route('dashboard') }}"><i class="fa fa-btn fa-dashboard"></i> Dashboard</a></li>
                                <li><a href="{{ url('/') }}" style="color:#5b5b5b; {{ Request::is('/') ? 'color:#CCA75C; font-weight:500;' : '' }}">Home</a></li>
                            @if (auth()->user()->hasPending())
                                    <li>
                                        <a href="{{route('current-order')}}"> Current Order</a>
                                    </li>
                                @endif
                                @if(auth()->user()->admin !== 1)
                                    <li><a href="{{ route('profile') }}"><i class="fa fa-fw fa-list-ul"></i> Profile</a></li>
                                @endif
                                <li><a href="{{ url('/directions') }}" style="color:#5b5b5b; {{ Request::is('directions') ? 'color:#CCA75C; font-weight:500;' : '' }}">Directions</a></li>

                                <li><a href="{{ route('atms.georgia') }}" style="{{ Request::is('atms-georgia') ? 'color:#CCA75C; font-weight:500;' : '' }}">Georgia ATMs</a></li>
                                <li><a href="{{ route('atms.alabama') }}" style="{{ Request::is('atms-alabama') ? 'color:#CCA75C; font-weight:500;' : '' }}">Alabama ATMs</a></li>
                                <li><a href="{{ route('atms.massachusetts') }}" style="{{ Request::is('atms-massachusetts') ? 'color:#CCA75C; font-weight:500;' : '' }}">Massachusetts ATMs</a></li>
                                <li><a href="{{ route('atms.newjersey') }}" style="{{ Request::is('atms-newjersey') ? 'color:#CCA75C; font-weight:500;' : '' }}">New Jersey ATMs</a></li>
                                <li><a href="{{ route('atms.texas') }}" style="{{ Request::is('atms-texas') ? 'color:#CCA75C; font-weight:500;' : '' }}">Texas ATMs</a></li>
                                <li><a href="{{ route('atms.florida') }}" style="{{ Request::is('atms-florida') ? 'color:#CCA75C; font-weight:500;' : '' }}">Florida ATMs</a></li>

                                <li><a href="{{ url('/contact') }}" style="color:#5b5b5b; {{ Request::is('contact') ? 'color:#CCA75C; font-weight:500;' : '' }}">Contact</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                @endif
                <li class="scroll-link exchange-rate hidden-xs hidden-sm"><span style="font-weight:400; color:#5FB06F;">Exchange Rate: 1BTC</span> <span style="color:#9F9F9F">=</span> <span style="font-weight:400; color:#CCA75C">${{number_format(\App\Settings::getParam('ourprice'),2)}}</span></li>
            </ul>
        </div>
    </div>
</nav>