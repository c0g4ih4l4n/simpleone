<div class="review">
    <h1 class="heading1"><span class="maintext">Reviews</span><span class="subtext"> Related Reviews</span></h1>

    <div class="media">
        <div class="media-body">
            <h4 class="media-heading">Love this!</h4>
            <div><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-half"></span></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus nisl ac diam feugiat, non vestibulum libero posuere. Vivamus pharetra leo non nulla egestas, nec malesuada orci finibus. </p>
            <p><span class="reviewer-name"><strong>John Doe</strong></span><span class="review-date">  7 Oct 2015</span></p>
        </div>
    </div>

    @foreach ($reviews as $review)

    <div class="media">
        <div class="media-body">
            <h3 class="media-heading"><a href="{{ URL::route('products::reviews.show', ['id' => $product->id, 'reviews' => $review->id]) }}">{{ $review->title }}</a></h3>
            <div><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
            <p>{{ $review->content }}</p>
            <p><span class="reviewer-name"><strong>{{ $review->user_name }}</strong></span><span class="review-date">  {{ $review->created_at->format('d M Y') }}</span></p>
        </div>
    </div>

    @endforeach
</div>