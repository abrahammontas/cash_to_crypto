@extends('admin.emails.default')

@section('content')

<p>From: {{$name}} ({{$email}})</p>
<p>Subject: {{$subject}}</p>

{{$text}}

@endsection