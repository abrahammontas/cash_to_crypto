<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cash To Crypto - @yield('title')</title>

        <!-- Bootstrap -->
        {{--<link href="/css/bootstrap.min.css" rel="stylesheet">--}}
        {{--<link href="/css/style.css" rel="stylesheet">--}}
        {{--<link href="/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">--}}
        {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/typicons/typicons.min.css">
        <link rel="stylesheet" href="/assets/css/animate.css">
        <link rel="stylesheet" href="/assets/css/form-elements.css">
        <link rel="stylesheet" href="/assets/css/style.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/assets/ico/apple-touch-icon-57-precomposed.png">

        @yield('head')

    </head>
    <body>

        @yield('content')

        @include('partials.footer')

        <!-- Javascript -->
        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>

        <!--[if lt IE 10]>
        <script src="assets/js/placeholder.js"></script>
        <![endif]-->


        <!-- Register form validation -->
        <script src="/js/validator.min.js"></script>
        <script scr="/js/bootstrap-formhelpers-phone.js"></script>
        <script src="/js/bootstrap-formhelpers.min.js"></script>
        <!-- custom JS -->
        <script src="/js/custom.js"></script>

        @yield('scripts')
        
    </body>
</html>