Hello, {{$order->user->firstName}} {{$order->user->lastName}},
there is an issue with you order #{{$order->hash}}:
{{$order->note}}