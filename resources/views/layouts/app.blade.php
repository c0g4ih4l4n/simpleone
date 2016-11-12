
@extends('template.main')

@section('container')
    <form id="search-form">
        <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">All Category <span class="caret"></span></button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">First Item</a></li>
                <li><a href="#">Second Item</a></li>
                <li><a href="#">Third Item</a></li>
            </ul>
        </div>
        <input class="form-control" type="search" placeholder="Search Here" id="search-field">
        <button class="btn btn-warning" type="button"> <span class="glyphicon glyphicon-search"></span></button>
    </form>
    <div id="promo"><img src="assets/img/Facebook-Event-Banner-Image8_26-04.png" id="banner">
        <a href="#">
            <button class="btn btn-primary btn-sm" type="button" id="learn-more-banner">Learn More</button>
        </a>
        <div class="container site-section" id="welcome">
            <h1>Welcome to Company Home Page</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute
                irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat nonproident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
        </div>
        <div class="container site-section" id="welcome">
            <h1>Most Popular</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="thumbnail popular-item"><img src="assets/img/C:\Users\Administrator\Desktop\test\giaodien\images\products\iPhone7-Pink.jpg">
                        <div class="caption">
                            <h3>iPhone 7 Pink</h3>
                            <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail popular-item"><img src="assets/img/C:\Users\Administrator\Desktop\test\giaodien\images\products\iPhone7.jpg">
                        <div class="caption">
                            <h3>iPhone 7</h3>
                            <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail popular-item"><img src="assets/img/Samsung-32inch.jpg">
                        <div class="caption">
                            <h3>SamSung TV</h3>
                            <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                        </div>
                    </div>
                </div>
            </div>
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