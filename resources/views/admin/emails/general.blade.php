@extends('admin.emails.default')

@section('content')
    <p>Hi {{$order->user->firstName}},</p>
    <p>{{$order->email}}</p>
@endsection