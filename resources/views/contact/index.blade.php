@extends('layouts.main')

@section('title', 'Contact us')

@section('content')
    @include('partials.disclaimer')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name"><b>Name (Required)</b></label>
                        <input type="text" name="name" class="form-control" style="width:70%" required>
                    </div>
                    <div class="form-group">
                        <label for="email"><b>Email (Required)</b></label>
                        <input type="email" name="email" class="form-control" style="width:70%" required>
                    </div>
                    <div class="form-group">
                        <label for="subject"><b>Subject</b></label>
                        <input type="text" name="subject" class="form-control" style="width:70%">
                    </div>
                    <div class="form-group">
                        <label for="message"><b>Message (Required)</b></label>
                        <textarea name="message" id="" cols="30" rows="10" class="form-control" style="width:70%" required></textarea>
                    </div>
                    <input class="btn btn-success" style="padding:10px 20px;" type="submit" name="contact-form" value="Submit">
                </form>
            </div>
            @include('partials.sidebar')
        </div>
    </div>
@endsection