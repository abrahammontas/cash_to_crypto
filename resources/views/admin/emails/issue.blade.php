@extends('admin.emails.default')

@section('content')
<h1 style='text-align: center;'>Issue Resolution</h1>
<p>Hi {{$order->user->firstName}},</p>
<p>There is an issue that needs your attention</p>
<p><b>Issue:</b> {{$order->note}}</p>
@endsection

