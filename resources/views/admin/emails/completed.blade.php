@extends('admin.emails.default')

@section('content')

<h1 style='text-align: center;'>Order Summary</h1>

<table>
	<tr>
		<td><b>Order ID:</b></td>
		<td>{{$order->hash}}</td>
	</tr>
	<tr>
		<td><b>Bitcoin Address:</b></td>
		<td>{{$order->wallet}}</td>
	</tr>
	<tr>
		<td><b>Bitcoins Received:</b></td>
		<td>{{$order->bitcoins}}</td>
	</tr>
	<tr>
		<td><b>USD Amount:</b></td>
		<td>{{$order->amount}}</td>
	</tr>
</table>
@endsection

