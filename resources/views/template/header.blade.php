<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title : 'Home Page' }}</title>
    <link rel="stylesheet" href="{!! asset('assets/bootstrap/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="{!! asset('assets/css/user.css') !!}">
    {{-- <link rel="stylesheet" href="{!! asset('assets/css/review.css') !!}"> --}}
    <link rel="stylesheet" href="{!! asset('assets/bootstrap/fonts/font-awesome.min.css') !!}">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-static-top" id="header">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand navbar-link" href="{!! URL::route('home') !!}"><img src="{!! asset('assets/img/square_logo.png') !!}" id="logo"><strong>Company</strong> Logo</a>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">

                @if (empty($user)) 
                    <li class="active" role="presentation"><a href="{!! URL::to('login') !!}">Log In</a></li>
                    <li class="active" role="presentation"><a href="{!! URL::to('register') !!}">Register </a></li>
                @elseif ($user->user_level == 0) 
                    <li ><a href="{!! URL::route('users.show', $user->id) !!}">Hello, {!! $user['name'] !!}</a></li>
                    <li class="active" role="presentation"><a href="{!! URL::to('logout') !!}">Log Out</a></li>
                @else 
                    <li ><a href="{!! URL::route('users.show', $user->id) !!}">Hello, {!! $user->name !!}</a></li>
                    <li class="active" role="presentation"><a href="{!! URL::route('admin') !!}">Admin CP</a></li>
                    <li class="active" role="presentation"><a href="{!! URL::to('logout') !!}">Log Out</a></li>
                @endif
                    <li class="active" role="presentation"><a href="#">Cart </a></li>
                    <li class="active" role="presentation"><a href="#">Help </a></li>
                </ul>
            </div>
        </div>
    </nav>