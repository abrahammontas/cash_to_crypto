<section id="topbar">
    <div class="container">
        <div class="row" style="padding-top:10px;">
            <div class="col-xs-8">
                <h4>Exchange Rate: 1BTC = ${{number_format(\App\Settings::getParam('ourprice'),2)}}</h4>
            </div>
            <div class="col-xs-4 text-right">
            @if (Auth::guest())
                <h5><a href="{{ url('/login') }}">Login</a> | <a href="{{ url('/register') }}">Register</a></h5>
            @else
                <div class="navbar navbar-right">
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
                </div>
            @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12" style="padding-bottom:10px;">
                <img width="400" src="/images/bitcoin_depot_logo.jpg" class="img-responsive">
            </div>
        </div>
    </div>
</section>