@extends ('template.main')
@section ('content')
    <ol class="breadcrumb">
        <li><a><span>Home</span></a></li>
        <li><a><span>Library</span></a></li>
        <li><a><span>Data</span></a></li>
    </ol>
    <h2 id="title-user-infomation">Category Name</h2>
    <div class="container" id="user-info-container">
        <div class="media">
            <div class="media-left">
                <a><img class="media-object" src="{{ URL::asset('assets/img/default.png') }}"></a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">Category Name</h4>
                <div>
                    <h5>Description: </h5>
                    <p> Lorem ispum Lorem Lorem Lorem</p>
                </div>
                <h5 class="media-heading">Number Of Products: <span class="badge">42</span></h5>
                <div>
                    <h5> Number of Orders: <span class="badge">42</span></h5></div>
                <div>
                    <h5>Ave. Rate: <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span> 5.0/5.0</h5></div>
            </div>
        </div>
        <div id="most-popular-product">
            <h3>Most Popular Product<a href="#" target="_blank" class="link-see-all btn btn-primary">See All</a></h3>
            <div class="clearfix"></div>
            <div class="row popular-item-container">
                <div class="col-md-3">
                    <div class="thumbnail"><img src="{{ URL::asset('assets/img/Samsung-32inch.jpg') }}">
                        <div class="caption">
                            <h4>Product Name</h4>
                            <p>Nullam id dolor id nibh ultricies vehicula ut i</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="thumbnail"><img src="{{ URL::asset('assets/img/Samsung-32inch.jpg') }}">
                        <div class="caption">
                            <h4>Product Name</h4>
                            <p>Nullam id dolor id nibh ultricies vehicula ut i</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="thumbnail"><img src="{{ URL::asset('assets/img/Samsung-32inch.jpg') }}">
                        <div class="caption">
                            <h4>Product Name</h4>
                            <p>Nullam id dolor id nibh ultricies vehicula ut i</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="thumbnail"><img src="{{ URL::asset('assets/img/Samsung-32inch.jpg') }}">
                        <div class="caption">
                            <h4>Product Name</h4>
                            <p>Nullam id dolor id nibh ultricies vehicula ut i</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection