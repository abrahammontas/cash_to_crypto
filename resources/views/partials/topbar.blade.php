<section id="topbar">
    <div class="container">
        <div class="row" style="padding-top:10px;">
            <div class="col-xs-8">
                <h4>Exchange Rate: $<?php /* echo $ourbitcoinprice; */ ?></h4>
            </div>
            <div class="navbar navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
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