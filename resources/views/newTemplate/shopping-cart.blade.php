@extends ('front.main')

@section ('content')

<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb --> 
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active"> Shopping Cart</li>
      </ul>       
      <h1 class="heading1"><span class="maintext"> Shopping Cart</span><span class="subtext"> All items in your  Shopping Cart</span></h1>
      <!-- Cart-->
      <div class="cart-info">
        <table class="table table-striped table-bordered">
          <tr>
            <th class="image">Image</th>
            <th class="name">Product Name</th>
            <th class="model">Model</th>
            <th class="quantity">Qty</th>
              <th class="total">Action</th>
            <th class="price">Unit Price</th>
            <th class="tax">Tax</th>
            <th class="total">Total</th>
           
          </tr>
          @foreach ($carts as $cartItem)
          <tr>
            <td class="image">
            <a href="#">
            @if ($cartItem->photo != null)
            <img class="media-object img-responsive" title="product" alt="product" src="{!! URL::route('get_photo', $cartItem->photo) !!}" height="50" width="50">
            @else 
            <img class="media-object img-responsive" title="product" alt="product" src="{{ URL::asset('web_assets/img/product1.jpg') }}" height="50" width="50">
            @endif
            </a></td>
            <td  class="name"><a href="#">{{ $cartItem->product_name}}</a></td>
            <td class="model">Purchased Product</td>
            <td class="quantity"><input type="text" size="1" value="{{ $cartItem->qty }}" name="quantity[40]" class="span1">
             </td>
             <td class="total"> <a href="{{ URL::route('shoppingcarts') }}"><img class="tooltip-test" data-original-title="Update" src="{{ URL::asset('web_assets/img/update.png') }}" alt=""></a>
              <a href="#"><img class="tooltip-test" data-original-title="Remove"  src="img/remove.png" alt=""></a></td>
           
             
            <td class="price">{{ $cartItem->price }}</td>
            <td class="tax">{{ $cartItem->tax }}</td>
            <td class="total">{{ $cartItem->total }}</td>
             
          </tr>
          @endforeach
        </table>
      </div>
      <div class="container">
      <div class="pull-right">
          <div class="span4 pull-right">
            <table class="table table-striped table-bordered ">
              <tr>
                <td><span class="extra bold">Sub-Total :</span></td>
                <td><span class="bold">{{ Cart::subTotal() }}</span></td>
              </tr>
              <tr>
                <td><span class="extra bold">Tax :</span></td>
                <td><span class="bold">{{ Cart::tax() }}</span></td>
              </tr>
              <tr>
                <td><span class="extra bold totalamout">Total :</span></td>
                <td><span class="bold totalamout">{{ Cart::total() }}</span></td>
              </tr>
            </table>
            <a href="{{ URL::route('checkout') }}" type="submit" value="CheckOut" class="btn btn-orange pull-right">CheckOut</a>
            <a href="{{ URL::route('listCategory') }}"><input type="submit" value="Continue Shopping" class="btn btn-orange pull-right mr10"></a>
          </div>
        </div>
        </div>
    </div>
  </section>
</div>

@stop