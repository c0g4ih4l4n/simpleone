{{-- <!--  Best Seller -->  
<div class="sidewidt">

  <h2 class="heading2"><span>Related Product</span></h2>

  <ul class="bestseller">
  @foreach ($relatedProducts as $product)
    <li>
      <img width="50" height="50" src="{{ URL::route('get_photo', $product->photo) }}" alt="product" title="product">
      <a class="productname" href="{{ URL::route('products::', $product->id)}}"> {{ $product->product_name }}</a>
      <span class="procategory"> {{ $product->category_name }}</span>
      <span class="price">${{ $product->price }}</span>
    </li>
  @endforeach
  </ul>

</div> --}}

@foreach ($relatedProducts as $product)
  <li class="span3">

    <a class="prdocutname" href="{{ URL::route('products::', $product->id) }}">{{ $product->product_name }}</a>

    <div class="thumbnail">
      <span class="sale tooltip-test">Sale</span>

      <a href="{{ URL::route('products::', $product->id) }}">
      @if ($product->photo != null)
      <img class="media-object img-responsive" src="{!! URL::route('get_photo', $product->photo) !!}">
      @else 
      <img class="media-object img-responsive" src="{{ URL::asset('web_assets/img/product1.jpg') }}">
      @endif
      </a>

      <div class="pricetag">
        <span class="spiral"></span><a href="{!! URL::route('cart_add', $product->id) !!}" class="productcart">ADD TO CART</a>

        <div class="price">
          <div class="pricenew">${{ $product->price }}</div>
          <div class="priceold">${{ $product->price }}</div>
        </div>

      </div>
    </div>
  </li>
@endforeach