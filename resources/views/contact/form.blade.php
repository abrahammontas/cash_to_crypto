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
                    <form id="contact" role="form" data-toggle="validator" method="POST" action="{{ route('contact') }}">

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
                <h2 style="padding-top:15px; text-align:left;">Contact Info</h2>
                <div class="row">
                    <div class="col-sm-4" style="text-align:left;">
                        Email:
                    </div>
                    <div class="col-sm-8" style="text-align:left;">
                        <div class="row">
                            <a href="mailto:support@cashtocrypto.com">support@cashtocrypto.com</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4" style="text-align:left;">
                        Phone:
                    </div>
                    <div class="col-sm-8" style="text-align:left;">
                        <div class="row">
                            (678) 435-9604
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>