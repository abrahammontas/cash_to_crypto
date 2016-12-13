@extends('layouts.main')

@section('title', 'Contact')

@section('content')

    <!-- Loader -->
    <div class="loader">
        <div class="loader-img"></div>
    </div>

    <!-- Top content -->
    <div class="top-content">
        <!-- Top menu -->
        @include('partials.navigation')

    <!--         <section id="closed" style="background-color:#9cb8e2; border-top: 1px solid #147ae0; border-bottom: 1px solid #147ae0;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12" style="padding-top:14px; padding-bottom:8px;">
                    <h3 style="color:white; margin-top:5px; font-weight: 400;"><span style="color:red">* * *</span> We are closed for Labor Day Weekend. We will reopen Tuesday at 9:00am EST <span style="color:red">* * *</span></h3>
                </div>
            </div>
        </div>
    </section> -->

        @if ($message = session('success'))
            <div class="row">
                <div class="container">
                    <div class="alert alert-success" style="margin-top:6%; margin-bottom:0px; text-align:left;">
                        <p>{!! $message !!}</p>
                    </div>
                </div>
            </div>
        @endif


        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 form-box wow fadeInUp">
                        <div class="form-top" style="padding-top:15px;">
                            <div>
                                <h2 class="text-center">Contact Us</h2>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form id="contact" role="form" data-toggle="validator" method="POST" data-disable="false" action="{{ route('contact') }}">

                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="sr-only col-md-4 control-label">Name</label>
                                    <input id="name" type="text" name="name" class="form-control" placeholder="Name" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="sr-only col-md-4 control-label">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                                    <label for="subject" class="sr-only col-md-4 control-label">Subject</label>
                                    <input id="subject" type="text" class="form-control" placeholder="Subject" name="subject" required>
                                    @if ($errors->has('subject'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                                    <label for="message" class="sr-only col-md-4 control-label">Message</label>
                                    <textarea id="message" type="text" class="form-control" placeholder="Message" name="text" required></textarea>
                                    @if ($errors->has('text'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success form-control">
                                        <i class="fa fa-btn"></i> Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-4 col-sm-offset-2" >
                        <h2 style="padding-top:15px; text-align:left; color:gold;">Contact Info</h2>
                        <div class="row">
                            <div class="col-md-6" style="text-align:left;">
                                <span style="color:white;">Email:</span>
                            </div>
                            <div class="col-md-6" style="text-align:left;">
                                <div class="row">
                                    <span style="color:white;">support@cashtocrypto.com</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="text-align:left;">
                                <span style="color:white;">Phone:</span>
                            </div>
                            <div class="col-md-6" style="text-align:left;">
                                <div class="row">
                                    <span style="color:white;">(678) 435-9604</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="text-align:left;">
                                <span style="color:white;">Address:</span>
                            </div>
                            <div class="col-md-6" style="text-align:left;">
                                <div class="row">
                                    <span><p style="color:white; line-height:1.2em; margin-top:7px;">2870 Peachtree Rd #327<br />Atlanta, GA 30305</p></span>
                                </div>
                            </div>
                        </div>
                        <br />
                        <h2 style="padding-top:15px; text-align:left; color:gold;">Business Hours</h2>
                        <div class="row">
                            <div class="col-xs-6" style="text-align:left;">
                                <span style="color:white;">Monday-Friday:</span>
                            </div>
                            <div class="col-xs-6" style="text-align:left;">
                                <div class="row">
                                    <span style="color:white;">9:00am - 8:00pm EST</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6" style="text-align:left;">
                                <span style="color:white;">Saturday</span>
                            </div>
                            <div class="col-xs-6" style="text-align:left;">
                                <div class="row">
                                    <span style="color:white;">9:00am - 3:00pm EST</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6" style="text-align:left;">
                                <span style="color:white;">Sunday</span>
                            </div>
                            <div class="col-xs-6" style="text-align:left;">
                                <div class="row">
                                    <span style="color:white;">Closed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection