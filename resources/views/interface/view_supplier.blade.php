@extends ('template.main')
@section ('content')
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('admin.suppliers.index') }}"><span>All Suppliers</span></a></li>
        <li><a href="{{ URL::route('admin.suppliers.show', $category->id) }}"><span>{{ $category->category_name }}</span></a></li>
    </ol>
    <h2 id="title-user-infomation">{{ $category->category_name}}</h2>
    <div class="container" id="user-info-container">
        <div class="media">


            <div class="media-left col-md-3">
                <a>
                {{-- Neu Khong co hinh De hinh mac dinh --}}
                @if ($category->photo != null)
                <img class="media-object img-responsive" src="{{ URL::route('get_photo', $category->photo)}}">
                @else 
                <img class="media-object img-responsive" src="{{ URL::asset('assets/img/default_category.jpg')}}">
                @endif
                </a>

            </div>


            <div class="media-body">
                <h4 class="media-heading">{{ $category->category_name}}</h4>
                <div>
                    <h5>Description: </h5>
                    <p>{{ $category->category_description }}</p>
                </div>
                <h5 class="media-heading">Number Of Products: <span class="badge">{{ $category->number_of_products}}</span></h5>
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