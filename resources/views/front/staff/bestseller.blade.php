<!--  Best Seller -->  
<div class="sidewidt">

  <h2 class="heading2"><span>Best Seller</span></h2>

  <ul class="bestseller">
  @foreach ($bestsellers as $product)
    <li>
      <img width="50" height="50" src="{{ URL::route('get_photo', $product->photo) }}" alt="product" title="product">
      <a class="productname" href="{{ URL::route('products::', $product->id)}}"> {{ $product->product_name }}</a>
      <span class="procategory"> {{ $product->category_name }}</span>
      <span class="price">${{ $product->price }}</span>
    </li>
  @endforeach
  </ul>

</div>