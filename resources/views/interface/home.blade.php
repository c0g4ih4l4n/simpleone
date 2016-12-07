
@extends('template.main')

@section('content')
    @include ('template.form-search')
    <div id="promo"><img src="assets/img/Facebook-Event-Banner-Image8_26-04.png" id="banner">

        <a href="#" class="btn btn-primary btn-sm" type="button" id="learn-more-banner">Learn More</a>

        <div class="container site-section" id="welcome">
            <h1>Welcome to Company Home Page</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute
                irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat nonproident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
        </div>
        <div class="container site-section" id="welcome">
            <h1>Most Popular</h1>
            <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="thumbnail popular-item">
                        <a href="{{ URL::route('products.show', $product->id) }}"><img src="{!! URL::route('get_photo', $product->photo) !!}"></a>
                        <div class="caption">
                            <h3><a href="{{ URL::route('products.show', $product->id) }}">{{ $product->product_name }}</a></h3>
                            <p>{{ $product->product_description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <a href="#" class="btn btn-primary btn-sm" type="button" id="learn-more-banner">More</a>
        </div>
        <div class="dark-section">
            <div class="container site-section" id="why">
                <h1>Why choose Us?</h1>
                <div class="row">
                    <div class="col-md-4 item"><span class="fa fa-birthday-cake"></span>
                        <h3>Great Price</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud.. </p>
                    </div>
                    <div class="col-md-4 item"><span class="fa fa-heart"></span>
                        <h3>Healthy &amp; Organic</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud.. </p>
                    </div>
                    <div class="col-md-4 item"><span class="fa fa-subway"></span>
                        <h3>Next Delivery</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud.. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop