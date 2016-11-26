@extends ('template.main')
@section ('content')
    <ol class="breadcrumb">
        <li><a href="{!! URL::route('home') !!}"><span>Store </span></a></li>
        <li><a href="{!! URL::route('categories.show', $product->category_id) !!}"><span>{!! $product->category_name !!}</span></a></li>
        <li class="active"><span>{!! $product->product_name !!} </span></li>
    </ol>
    <div class="container">
        <div class="row product">
            <div class="col-md-4 col-md-offset-0"><img class="img-responsive" src="{!! URL::route('get_photo', $product->photo) !!}"></div>
            <div class="col-md-8">
                <h2>{!! $product['product_name'] !!}</h2>
                <p>{!! $product['product_description'] !!} </p>
                <select>
                    <option value="" selected="">Chose Your Size</option>
                    <option value="xxl">XXL</option>
                    <option value="xl">XL</option>
                    <option value="m">M</option>
                    <option value="s">S</option>
                </select>

                {{-- Color --}}
                {{-- Supplier --}}

                <h3>${!! $product['price'] !!} </h3>
                <button class="btn btn-primary" type="button">Add to cart</button>
                <form class="vote_form vote_product" action="{{ URL::route('vote') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="vote_id" value="{!! $product->id !!}">
                    @include ('interface.rating')
                    <span></span>
                </form>
            </div>
        </div>
        <div class="page-header">
            <h3>Product Details</h3>
        </div>
        <p>Sed mollis, urna eu tempus facilisis, diam tellus aliquam tortor, et vestibulum ante quam non justo. Nullam luctus rutrum mattis. Maecenas in pharetra mi, vel mollis odio. Morbi non mauris massa. </p>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Column 1</th>
                        <th>Column 2</th>
                        <th>Column 3</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                    </tr>
                    <tr>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                    </tr>
                    <tr>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                    </tr>
                    <tr>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="page-header">
            <h3><a class="" href="{{ URL::route('products::reviews.index', $product->id) }}">Reviews</a>
            <a href="{{ URL::route('products::reviews.create', $product->id) }}" class="btn btn-primary write-review" type="button">Write a review</a></h3></div>
        <div class="media">
            <div class="media-body">
                <h4 class="media-heading">Love this!</h4>
                <div><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-half"></span></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus nisl ac diam feugiat, non vestibulum libero posuere. Vivamus pharetra leo non nulla egestas, nec malesuada orci finibus. </p>
                <p><span class="reviewer-name"><strong>John Doe</strong></span><span class="review-date">7 Oct 2015</span></p>
            </div>
        </div>

        <div class="media">
            <div class="media-body">
                <h4 class="media-heading">Fantastic product</h4>
                <div><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus nisl ac diam feugiat, non vestibulum libero posuere. Vivamus pharetra leo non nulla egestas, nec malesuada orci finibus. </p>
                <p><span class="reviewer-name"><strong>Jane Doe</strong></span><span class="review-date">7 Oct 2015</span></p>
            </div>
        </div>

        @foreach ($reviews as $review)

        <div class="media">
            <div class="media-body">
                <h4 class="media-heading"><a href="{{ URL::route('products::reviews.show', ['id' => $product->id, 'reviews' => $review->id]) }}">{{ $review->title }}</a></h4>
                <div><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
                <p>{{ $review->content }}</p>
                <p><span class="reviewer-name"><strong>{{ $review->user_name }}</strong></span><span class="review-date">{{ $review->created_at->format('d M Y') }}</span></p>
            </div>
        </div>

        @endforeach

        <div class="page-header">
            <h3>Comment</h3>
        </div>

        @foreach ($comments as $comment)
        <div class="media">
            <div class="media-body">
                <h5 class="media-heading">{!! $comment->user_name !!}</h5>
                <div><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
                <p>{!! $comment->content !!} </p>
                <p><span class="comment-date">{{ $comment->created_at->format('d M Y') }}</span></p>
            </div>
        </div>

        @endforeach

        <div class="page-header">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="media">
                <div class="media-body">
                    <h3 class="media-heading">Leave A Comment</h3>
                    <form action="{!! URL::route('products::comments.store', $product->id) !!}" method="post">
                        {{ csrf_field() }}
                        <textarea name="content" class="ckeditor" id="comment" cols="30" rows="10"></textarea>
                        
                        <button type="submit" class="btn btn-primary center-block">Leave </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection