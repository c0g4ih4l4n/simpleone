@extends ('front.main')

@section ('content')

<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb --> 
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
        </li>
        <li class="active">Wish List</li>
      </ul>       
      <h4 class="heading1"><span class="maintext"> Wish List</span><span class="subtext"> All items in your Wish List</span></h4>

      <!-- Cart-->
      <div class="cart-info">
        <table class="table table-striped table-bordered">

          {{-- Cart Head --}}
          <tr>
            <th class="rowId"></th>
            <th class="image">Image</th>
            <th class="name">Product Name</th>
            <th class="model">Model</th>
{{--             <th class="quantity">Qty</th> --}}
              <th class="total">Action</th>
            <th class="price">Unit Price</th>
            <th class="tax">Tax</th>
            <th class="total">Total</th>
          </tr>

          {{-- Cart Information --}}
          @foreach ($carts as $cartItem)
          <tr>

            <td class="rowId">{{ $cartItem->rowId }}</td>

            <td class="image">
            <a href="{{ URL::route('products::', $cartItem->id) }}">

            @if ($cartItem->photo != null)
            <img class="media-object img-responsive" title="product" alt="product" src="{!! URL::route('get_photo', $cartItem->photo) !!}" height="50" width="50">
            @else 
            <img class="media-object img-responsive" title="product" alt="product" src="{{ URL::asset('web_assets/img/product1.jpg') }}" height="50" width="50">
            @endif

            </a></td>


            <td  class="name"><a href="{{ URL::route('products::', $cartItem->id)}}">{{ $cartItem->model->product_name }}</a></td>
            <td class="model">Purchased Product</td>
           {{--  <td class="quantity"><input type="text" size="1" value="{{ $cartItem->qty }}" name="quantity[]" class="span1">
             </td> --}}

            {{-- Action Update or remove --}}
             <td class="total"> 

              <a href="{{ URL::route('wishlist_remove', $cartItem->rowId) }}"><img class="tooltip-test" data-original-title="Remove" src="img/remove.png" alt=""></a></td>
           
             
            <td class="price">{{ $cartItem->price }}</td>
            <td class="tax">{{ $cartItem->tax }}</td>
            <td class="total">{{ $cartItem->total }}</td>
             
          </tr>
          @endforeach
        </table>
      </div>
      
  </section>
</div>

<script>
  
</script>

@stop