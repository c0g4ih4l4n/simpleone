@extends ('front.main')

@section ('content')

@include ('front.form-search')

<div id="maincontainer">
  <section id="product">
    <div class="container">


     <!--  breadcrumb -->  
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Category</li>
      </ul>
      <div class="row">        


        <!-- Sidebar Start-->
        <aside class="span3">


         <!-- Category-->  
          <div class="sidewidt">
            <h2 class="heading2"><span>Categories</span></h2>
            <ul class="nav nav-list categories">

            {{-- Hien category theo cay --}}
            @foreach ($categories as $category)
            {{-- goc --}}
            @if ($category->parent_id == 0)
              <li>
                <a href="{!! URL::route('listCategory', $category->id) !!}">{{ $category->category_name }}</a>

                {{-- First Descend  --}}
                <ul class="nav nav-list categories">
                @foreach ($categories as $category_child)
                @if ($category_child->parent_id == $category->id)
                  <li>
                    <a href="{!! URL::route('listCategory', $category_child->id) !!}">{{ $category_child->category_name }}</a>
                  </li>
                @endif
                @endforeach
                </ul>
              </li>
            @endif
            @endforeach
            </ul>
          </div>


         <!--  Best Seller -->  
          <div class="sidewidt">

            <h2 class="heading2"><span>Best Seller</span></h2>

            <ul class="bestseller">
            @foreach ($bestsellers as $product)
              <li>
                <img width="50" height="50" src="{{ URL::route('get_photo', $product->photo) }}" alt="product" title="product">
                <a class="productname" href="product.html"> {{ $product->product_name }}</a>
                <span class="procategory"> {{ $product->category_name }}</span>
                <span class="price">${{ $product->price }}</span>
              </li>
            @endforeach
            </ul>

          </div>


          <!-- Latest Product -->  
          <div class="sidewidt">
            <h2 class="heading2"><span>Latest Products</span></h2>
            <ul class="bestseller">

            @foreach ($lastestProducts as $product)
              <li>
                <img width="50" height="50" src="{{ URL::route('get_photo', $product->photo) }}" alt="product" title="product">
                <a class="productname" href="product.html"> {{ $product->product_name }}</a>
                <span class="procategory"> {{ $product->category_name }}</span>
                <span class="price">${{ $product->price }}</span>
              </li>
            @endforeach

            </ul>
          </div>



          <!--  Must have -->  
          <div class="sidewidt">
          <h2 class="heading2"><span>Must have</span></h2>
          <div class="flexslider" id="mainslider">
            <ul class="slides">
              <li>
                <img src="img/product1.jpg" alt="" />
              </li>
              <li>
                <img src="img/product2.jpg" alt="" />
              </li>
            </ul>
          </div>
          </div>
        </aside>
        <!-- Sidebar End-->


        <!-- Category-->
        <div class="span9">          


          <!-- Category Products-->
          <section id="category">
            <div class="row">
              <div class="span9">

              
               <!-- Category-->
                <section id="categorygrid">
                
                  <ul class="thumbnails grid">

                  @foreach ($products as $product)
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



                    <li class="span3">
                      <a class="prdocutname" href="product.html">Product Name Here</a>
                      <div class="thumbnail">
                        <span class="offer tooltip-test" >Offer</span>
                        <a href="#"><img alt="" src="{{ URL::asset('web_assets/img/product2.jpg') }}"></a>
                        <div class="pricetag">
                          <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
                          <div class="price">
                            <div class="pricenew">$4459.00</div>
                            <div class="priceold">$5000.00</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="span3">
                      <a class="prdocutname" href="product.html">Product Name Here</a>
                      <div class="thumbnail">
                        <a href="#"><img alt="" src="{{ URL::asset('web_assets/img/product2.jpg') }}"></a>
                        <div class="pricetag">
                          <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
                          <div class="price">
                            <div class="pricenew">$4459.00</div>
                            <div class="priceold">$5000.00</div>
                          </div>
                        </div>
                      </div>
                    </li>



                  </ul>
                  <div class="pagination pull-right">
                    <ul>
                      <li><a href="#">Prev</a>
                      </li>
                      <li class="active">
                        <a href="#">1</a>
                      </li>
                      <li><a href="#">2</a>
                      </li>
                      <li><a href="#">3</a>
                      </li>
                      <li><a href="#">4</a>
                      </li>
                      <li><a href="#">Next</a>
                      </li>
                    </ul>
                  </div>


                </section>

              </div>

            </div>
          </section>

        </div>
      </div>
    </div>
  </section>
</div>
@stop