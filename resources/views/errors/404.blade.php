@extends('layouts.main')

@section('title', 'Not found')

@section('head')
    <style type="text/css">
    .wrap{
        margin:0 auto;
        text-align:center;
        color:#8F8E8C;
        margin-bottom: 100px;
    }
    .logo{
        margin-top:50px;
    }   
    .logo h1{
        font-size:200px;
        color:#8F8E8C;
       
        margin-bottom:1px;
        text-shadow:1px 1px 6px #fff;
    }   
    .logo p{
        color:rgb(228, 146, 162);
        font-size:20px;
        margin-top:1px;
        text-align:center;
    }   
    .logo p span{
        color:lightgreen;
    }   
    </style>
@endsection

@section('content')
    <div class="wrap">
       <div class="logo">
           <h1>404</h1>
       </div>
       <h1>Page not found</h1>
    </div>
@endsection