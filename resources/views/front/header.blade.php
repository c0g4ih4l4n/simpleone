<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>{{ isset($title) ? $title : 'Home Page' }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href="{{ URL::asset('web_assets/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ URL::asset('web_assets/css/bootstrap-responsive.css') }}" rel="stylesheet">
<link href="{{ URL::asset('web_assets/css/style.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/flexslider.css') }}" type="text/css" media="screen" rel="stylesheet"  />
<link href="{{ URL::asset('web_assets/css/jquery.fancybox.css') }}" rel="stylesheet">
<link href="{{ URL::asset('web_assets/css/cloud-zoom.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/form-search.css') }}" rel="stylesheet">
{{-- <link rel="stylesheet" href="{!! asset('assets/bootstrap/css/bootstrap.min.css') !!}"> --}}

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!-- fav -->
<link rel="shortcut icon" href="{{ URL::asset('web_assets/assets/ico/favicon.html') }}">

<link rel="stylesheet" href="{{ URL::asset('css/cart.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/user.css') }}">
{{-- <link rel="stylesheet" href="{!! URL::asset('css/bootstrap.min.css') !!}"> --}}
</head>
<body>
<!-- Header Start -->
<header>

  <div class="headerstrip">

    <div class="container">

      <div class="row">

        <div class="span12">

          <a href="{{ URL::route('home') }}" class="logo pull-left"><img src="{{ URL::asset('web_assets/img/logo.png') }}" alt="SimpleOne" title="SimpleOne"></a>

          <!-- Top Nav Start -->
          <div class="pull-left">

            <div class="navbar" id="topnav">

              <div class="navbar-inner">

                <ul class="nav" >
                
                @if (empty($user)) 
                  <li><a class="home active" href="{{ URL::route('home') }}">Home</a>
                  </li>
                  
                  <li><a class="myaccount" href="{!! URL::to('login') !!}">Log In</a>
                  </li>
                @elseif ($user->user_level == 0) 
                    <li ><a href="{!! URL::route('users.show', $user->id) !!}">Hello, {!! $user->name !!}</a></li>
                    <li class="active" role="presentation"><a href="{!! URL::to('logout') !!}">Log Out</a></li>
                @else 
                    <li ><a href="{!! URL::route('users.show', $user->id) !!}">Hello, {!! $user->name !!}</a></li>
                    <li class="active" role="presentation"><a href="{!! URL::route('admin') !!}">Admin CP</a></li>
                    <li class="active" role="presentation"><a href="{!! URL::to('logout') !!}">Log Out</a></li>
                @endif
                  <li><a class="shoppingcart" href="{{ URL::route('shoppingcart') }}">Shopping Cart</a>
                  </li>
                  <li><a class="checkout" href="{{ URL::route('checkout') }}">CheckOut</a>
                  </li>
                </ul>

              </div>
            </div>
          </div>
          <!-- Top Nav End -->
        </div>
      </div>
    </div>
  </div>
  <div class="container">

    <div id="categorymenu">
      <nav class="subnav">
        <ul class="nav-pills categorymenu">
          <li><a class="active"  href="{{ URL::route('home') }}">Home</a>
          </li>
          <li><a href="#">Products</a>
            <div>
              <ul>
                <li><a href="#"> Women's Accessories</a>
                </li>
                <li><a href="#">Men's Accessories <span class="label label-success">Sale</span>
                  </a>
                </li>
                <li><a href="#">Dresses </a>
                </li>
                <li><a href="#">Shoes <span class="label label-warning">(25)</span>
                  </a>
                </li>
                <li><a href="#">Bags <span class="label label-info">(new)</span>
                  </a>
                </li>
                <li><a href="#">Sunglasses </a>
                </li>
              </ul>
              <ul>
                <li><img style="display:block" src="img/proudctbanner.jpg" alt="" title="" >
                </li>
              </ul>
            </div>
          </li>
          <li><a  href="{{ URL::route('listCategory') }}">Categories</a>
          </li>
          <li><a href="{{ URL::route('shoppingcart') }}">Shopping Cart</a>
          </li>
          <li><a href="{{ URL::route('checkout') }}">Checkout</a>
          </li>
          <li><a href="compare.html">Compare</a>
          </li>          
          <li><a href="blog.html">Blog</a>
            <div>
              <ul>
                <li><a href="blog.html">Blog page</a>
                </li>
                <li><a href="bloglist.html">Blog List VIew</a>
                </li>
              </ul>
            </div>
          </li>
          <li><a href="myaccount.html">My Account</a>
            <div>
              <ul>
                <li><a href="myaccount.html">My Account</a>
                </li>
                <li><a href="login.html">Login</a>
                </li>
                <li><a href="register.html">Register</a>
                </li>
                <li><a href="wishlist.html">Wishlist</a>
                </li>
              </ul>
            </div>
          </li>
          <li><a href="features.html">Features</a>
          </li>
          <li><a href="{{ URL::route('contact') }}">Contact</a>
          </li>         
        </ul>
      </nav>
    </div>
  </div>
</header>
<!-- Header End -->
