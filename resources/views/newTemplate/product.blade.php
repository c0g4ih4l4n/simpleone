@extends ('front.main')

@section ('content')

<div id="maincontainer">
  <section id="product">
    <div class="container">      
      <!-- Product Details-->

      <div class="row">

       <!-- Left Image-->
        <div class="span5">

          <ul class="thumbnails mainimage">

            <li class="span5">
              <a rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{{ URL::route('get_photo', $product->photo) }}">
                <img src="{{ URL::route('get_photo', $product->photo) }}" alt="" title="">
              </a>
            </li>

            <li class="span5">
              <a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{{ URL::route('get_photo', $product->photo) }}">
                <img src="{{ URL::route('get_photo', $product->photo) }}" alt="" title="">
              </a>
            </li>

            <li class="span5">
              <a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{{ URL::route('get_photo', $product->photo) }}">
                <img src="{{ URL::route('get_photo', $product->photo) }}" alt="" title="">
              </a>
            </li>

            <li class="span5">
              <a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{{ URL::route('get_photo', $product->photo) }}">
                <img src="{{ URL::route('get_photo', $product->photo) }}" alt="" title="">
              </a>
            </li>

          </ul>

          <ul class="thumbnails mainimage">

            <li class="producthtumb">
              <a class="thumbnail" >
                <img src="{{ URL::route('get_photo', $product->photo) }}" alt="" title="">
              </a>
            </li>

            <li class="producthtumb">
              <a class="thumbnail" >
                <img src="{{ URL::route('get_photo', $product->photo) }}" alt="" title="">
              </a>
            </li>

            <li class="producthtumb">
              <a class="thumbnail" >
                <img src="{{ URL::route('get_photo', $product->photo) }}" alt="" title="">
              </a>
            </li>

            <li class="producthtumb">
              <a class="thumbnail" >
                <img src="{{ URL::route('get_photo', $product->photo) }}" alt="" title="">
              </a>
            </li>

          </ul>
        </div>

         <!-- Right Details-->
        <div class="span7">
          <div class="row">
            <div class="span7">

              <h1 class="productname"><span class="bgnone">{{ $product->product_name }}</span></h1>

              <div class="productprice">
                <div class="productpageprice">
                  <span class="spiral"></span>${{ $product->price }}</div>
              </div>


              {{-- Add to cart and wish list --}}
              <ul class="productpagecart">

                <li><a class="cart" href="{{ URL::route('cart_add', $product->id) }}">Add to Cart</a>
                </li>

                <li id="wish-list"><a class="cart" id="wish" href="{{ URL::route('wishlist_add', $product->id) }}">Add to Wish List</a>
                </li>
              </ul>


              <!-- Product Description tab & comments-->
              <div class="productdesc">
                <ul class="nav nav-tabs" id="myTab">
                  <li class="active" id=""><a href="#description">Description</a>
                  </li>

                  <li id=""><a href="#specification">Specification</a>
                  </li>

                  <li id=""><a href="#review">Review</a>
                  </li>

                  <li id=""><a href="#producttag">Tags</a>
                  </li>
                </ul>

                <div class="tab-content">

                  <div class="tab-pane active" id="description">
                    <h2>{{ $product->product_name }}</h2>
                    {{ $product->product_description }}
                    <br>
                    <br>
                    <ul class="listoption3">
                      <li>Lorem ipsum dolor sit amet Consectetur adipiscing elit</li>
                      <li>Integer molestie lorem at massa Facilisis in pretium nisl aliquet</li>
                      <li>Nulla volutpat aliquam velit </li>
                      <li>Faucibus porta lacus fringilla vel Aenean sit amet erat nunc Eget porttitor lorem</li>
                    </ul>
                  </div>

                  <div class="tab-pane " id="specification">

                    <ul class="productinfo">
                      <li>
                        <span class="productinfoleft"> Product Code:</span> Product 16 </li>

                      <li>
                        <span class="productinfoleft"> Reward Points:</span> 60 </li>

                      <li>
                        <span class="productinfoleft"> Availability: </span> In Stock </li>

                      <li>
                        <span class="productinfoleft"> Old Price: </span> $500.00 </li>

                      <li>
                        <span class="productinfoleft"> Ex Tax: </span> $500.00 </li>

                    </ul>
                  </div>
                  <div class="tab-pane" id="review">

                    <h3>Write a Review</h3>

                    <form class="bootstrap-form-with-validation" role="form" method="POST" action="{{ URL::route('products::reviews.store', $product->id) }}">

                      {{ csrf_field() }}

                      @if (isset($message))
                          <div class="alert alert-success">
                              <ul>
                                  <li>{{ $message }}</li>
                              </ul>
                          </div>
                      @endif
                      @if (count($errors) > 0)
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif

                      <div class="form-group">
                        <label class="control-label">Title</label>
                        <div class="controls">
                          <input type="text" class="span3" name="review_title">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">Description </label>
                        <div class="controls">
                          <textarea rows="3"  class="span3" name="review_content"></textarea>
                        </div>
                      </div>

                      <input type="submit" class="btn btn-orange" value="continue">

                    </form>

                  </div>

                  <div class="tab-pane" id="producttag">

                    <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum <br>
                      <br>
                    </p>

                    <ul class="tags">

                      <li><a href="#"><i class="icon-tag"></i> Webdesign</a>
                      </li>
                      <li><a href="#"><i class="icon-tag"></i> html</a>
                      </li>
                      <li><a href="#"><i class="icon-tag"></i> html</a>
                      </li>
                      <li><a href="#"><i class="icon-tag"></i> css</a>
                      </li>
                      <li><a href="#"><i class="icon-tag"></i> jquery</a>
                      </li>
                      <li><a href="#"><i class="icon-tag"></i> css</a>
                      </li>
                      <li><a href="#"><i class="icon-tag"></i> jquery</a>
                      </li>
                      </li>
                    </ul>
                  </div>

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--  Related Products-->
  <section id="related" class="row">

    <div class="container">

      <h1 class="heading1"><span class="maintext">Related Products</span><span class="subtext"> See Our Most featured Products</span></h1>

      <ul class="thumbnails">

      @include ('front.staff.relatedProduct')


      </ul>
    </div>
  </section>
  <!-- Popular Brands-->
</div>

@include ('front.staff.review')
@include ('front.staff.comment')

@stop