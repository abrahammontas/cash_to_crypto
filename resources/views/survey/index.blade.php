@extends('layouts.main')
@section('title', 'Registration')
@section('content')

    <!-- Loader -->
    <div class="loader">
        <div class="loader-img"></div>
    </div>

    <!-- Top content -->
    <div class="top-content">

        <!--     <section id="closed" style="background-color:#9cb8e2; border-top: 1px solid #147ae0; border-bottom: 1px solid #147ae0;">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12" style="padding-top:14px; padding-bottom:8px;">
                            <h3 style="color:white; margin-top:5px; font-weight: 400;"><span style="color:red">* * *</span> We are closed for Labor Day Weekend. We will reopen Tuesday at 9:00am EST <span style="color:red">* * *</span></h3>
                        </div>
                    </div>
                </div>
            </section> -->

        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 form-box wow">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Survey Form</h3>
                                <p>Please fill out the form below to complete your registration:</p>
                            </div>
                            <div class="form-top-right">
                                <span aria-hidden="true" class="typcn typcn-pencil"></span>
                            </div>
                        </div>
                        <div class="form-bottom">
                            {{Form::open(['method' => 'post', 'route' =>'survey.save'])}}

                            <div class="form-group{{ $errors->has('used_us') ? ' has-error' : '' }}">
                                {{ Form::label('question-1', 'Have you used cashtocrypto.com before?') }}<br />
                                {{ Form::radio('used_us', 'Yes', '', ['required' => 'required'])  }} Yes<br />
                                {{ Form::radio('used_us', 'No') }} No<br />
                            </div>

                            @if ($errors->has('used_us'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('used_us') }}</strong>
                                </span>
                            @endif

                            <div class="form-group{{ $errors->has('hear_about') ? ' has-error' : '' }}">
                                {{ Form::label('question-2', 'How did you hear about us?') }}<br />
                                {{ Form::radio('hear_about', 'google', '', ['id' => 'google', 'class' => 'h_about', 'required' => 'required'])  }} Google<br />
                                {{ Form::radio('hear_about', 'localbitcoins', '', ['id' => 'bitcoins', 'class' => 'h_about'])  }} Localbitcoins<br />
                                {{ Form::radio('hear_about', 'paxful', '', ['id' => 'paxful', 'class' => 'h_about'])  }} Paxful<br />
                                {{ Form::radio('hear_about', 'facebook', '', ['id' => 'facebook', 'class' => 'h_about'])  }} Facebook<br />
                                {{ Form::radio('hear_about', 'twitter', '', ['id' => 'twitter', 'class' => 'h_about'])  }} Twitter<br />
                                {{ Form::radio('hear_about', 'instagram', '', ['id' => 'instagram', 'class' => 'h_about'])  }} Instagram<br />
                                {{ Form::radio('hear_about', 'linkedin', '', ['id' => 'linkedin', 'class' => 'h_about'])  }} LinkedIn<br />
                                {{ Form::radio('hear_about', 'friend', '', ['id' => 'friend', 'class' => 'h_about']) }} Friend<br />
                                {{ Form::radio('hear_about', 'other', '', ['id' => 'other', 'class' => 'h_about']) }} Other<br />
                            </div>

                            @if ($errors->has('hear_about'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('hear_about') }}</strong>
                                </span>
                            @endif

                            <div id="other-box" class="form-group">
                                <textarea name="other" id="other" class="form-control" placeholder="Please specify"></textarea>
                                <div class="help-block with-errors">
                                    <strong>{{ $errors->first('other') }}</strong>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                {{ Form::label('question-3', 'What state do you live in?') }}<br />
                                {{ Form::select('state', [
                                            'Select'=>'Select',
                                            'Alabama'=>'Alabama',
                                            'Alaska'=>'Alaska',
                                            'Arizona'=>'Arizona',
                                            'Arkansas'=>'Arkansas',
                                            'California'=>'California',
                                            'Colorado'=>'Colorado',
                                            'Connecticut'=>'Connecticut',
                                            'Delaware'=>'Delaware',
                                            'Florida'=>'Florida',
                                            'Georgia'=>'Georgia',
                                            'Hawaii'=>'Hawaii',
                                            'Idaho'=>'Idaho',
                                            'Illinois'=>'Illinois',
                                            'Indiana'=>'Indiana',
                                            'Iowa'=>'Iowa',
                                            'Kansas'=>'Kansas',
                                            'Kentucky'=>'Kentucky',
                                            'Louisiana'=>'Louisiana',
                                            'Maine'=>'Maine',
                                            'Maryland'=>'Maryland',
                                            'Massachusetts'=>'Massachusetts',
                                            'Michigan'=>'Michigan',
                                            'Minnesota'=>'Minnesota',
                                            'Mississippi'=>'Mississippi',
                                            'Missouri'=>'Missouri',
                                            'Montana'=>'Montana',
                                            'Nebraska'=>'Nebraska',
                                            'Nevada'=>'Nevada',
                                            'New Hampshire'=>'New Hampshire',
                                            'New Jersey'=>'New Jersey',
                                            'New Mexico'=>'New Mexico',
                                            'New York'=>'New York',
                                            'North Carolina'=>'North Carolina',
                                            'North Dakota'=>'North Dakota',
                                            'Ohio'=>'Ohio',
                                            'Oklahoma'=>'Oklahoma',
                                            'Oregon'=>'Oregon',
                                            'Pennsylvania'=>'Pennsylvania',
                                            'Rhode Island'=>'Rhode Island',
                                            'South Carolina'=>'South Carolina',
                                            'South Dakota'=>'South Dakota',
                                            'Tennessee'=>'Tennessee',
                                            'Texas'=>'Texas',
                                            'Utah'=>'Utah',
                                            'Vermont'=>'Vermont',
                                            'Virginia'=>'Virginia',
                                            'Washington'=>'Washington',
                                            'West Virginia'=>'West Virginia',
                                            'Wisconsin'=>'Wisconsin',
                                            'Wyoming'=>'Wyoming',
                                ], ['class' => 'form-control']) }}
                            </div>

                            @if (!empty($showMsg))
                                <p style="color:red; font-size:14px;">
                                    <strong>
                                        Sorry, we are no longer able to do business with any person that resides, is
                                        located in, has a place of business, or is conducting business in New York.
                                    </strong>
                                </p>
                            @endif

                            @if(!empty($selectState))
                                <p style="color:red; font-size:14px;">
                                    <strong>
                                        Please select a state.
                                    </strong>
                                </p>
                            @endif

                            @if ($errors->has('state'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('state') }}</strong>
                                </span>
                            @endif

                            <div class="form-group">
                                {{ Form::submit('Submit', ['id' => 'btn-register', 'class' => 'btn btn-primary', 'style' => 'min-width:40%; margin-top:25px; text-transform:uppercase;']) }}
                            </div>

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div id="other2-box" class="form-group" style="height:100px;">

</div>
@endsection

@section('scripts')
    <script>
        $('#other-box').fadeOut();
        $('#other2-box').fadeIn();

        $(document).ready(function(){

            $('.h_about').on('click', function(){
                if($(this).val() == 'other') {
                    $('#other-box').fadeIn('slow');
                    $('#other2-box').fadeOut();
                } else {
                    $('#other-box').fadeOut('slow');
                    $('#other2-box').fadeIn();
                }
            });

        });
    </script>
@endsection