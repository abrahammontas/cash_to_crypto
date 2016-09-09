@extends('admin.emails.default')

@section('content')

<p>Email: ({{$email}})</p>
<br />
{{$text}}

@endsection