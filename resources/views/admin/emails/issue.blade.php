@extends('admin.emails.default')

@section('content')
<p>Hi {{$order->user->firstName}},</p>
<p>There is an issue that needs your attention</p>
<p><b>Issue:</b> {{$order->email}}</p>
@endsection

