@extends('admin.emails.default')

@section('content')
Hi {{ $admin->firstName }},
<br>
{{ $order->user->firstName }} {{ $order->user->lastName }} has placed an order for {{  $order->bitcoins }} bitcoins at a price of {{  $order->amount }}
@endsection