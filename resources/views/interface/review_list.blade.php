@extends ('template.main')
@section ('content')
    <ol class="breadcrumb">
        <li><a><span>Home</span></a></li>
        <li><a><span>Library</span></a></li>
        <li><a><span>Data</span></a></li>
    </ol>
    <h2 id="title-user-infomation">Top Review Of Product</h2>
    <div class="container" id="user-info-container">
    @foreach ($reviews as $review)
        <div class="media">
            <div class="media-left">
                <a><img class="img-circle media-object" src="{{ URL::asset('assets/img/default.png') }}"></a>
            </div>

            
            <div class="media-body">
                <h4 class="media-heading"><a href="{{ URL::route('products::reviews.show', ['id' => $product->id, 'reviews' => $review->id]) }}">{{ $review->title }}</a></h4>
                <h5 class="media-heading">Author: {!! $review->author !!}</h5>
                <div>
                    <h5>Content: </h5>
                    <p>{!! $review->content !!}</p>
                </div>
                <div>
                    <h5>Votes: <span class="badge">42</span></h5></div>
                <div>
                    <h5>Ave. Rate: <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span> 5.0/5.0</h5></div>
            </div>
        </div>
    @endforeach


        
    </div>
@endsection