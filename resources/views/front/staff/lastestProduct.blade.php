<!-- Latest Product -->  
<div class="sidewidt">
  <h2 class="heading2"><span>Latest Products</span></h2>
  <ul class="bestseller">

  @foreach ($lastestProducts as $product)
    <li>
      <img width="50" height="50" src="{{ URL::route('get_photo', $product->photo) }}" alt="product" title="product">
      <a class="productname" href="{{ URL::route('get_photo', $product->photo) }}"> {{ $product->product_name }}</a>
      <span class="procategory"> {{ $product->category_name }}</span>
      <span class="price">${{ $product->price }}</span>
    </li>
  @endforeach

  </ul>
</div>
