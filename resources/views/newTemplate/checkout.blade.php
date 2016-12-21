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
        <li class="active">Checkout</li>
      </ul>
      <div class="row">        
        <!-- Account Login-->
        <div class="span9">
          <div class="checkoutsteptitle">Step 1 : Delivery Details<a class="modify">Modify</a>
          </div>
          <div class="checkoutstep">
            <div class="row">
              <form class="form-horizontal">
                <fieldset>
                  <div class="span4">
                    <div class="control-group">
                      <label class="control-label" >First Name<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class=""  value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Last Name<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class=""  value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >E-Mail<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class=""  value="">
                      </div>
                    </div>
                  </div>
                  <div class="span4">
                    <div class="control-group">
                      <label class="control-label" >Address<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class=""  value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Post Code<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class=""  value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Country<span class="red">*</span></label>
                      <div class="controls">
                        <select >
                          <option>Please Select</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                    </div>
                    {{-- <div class="control-group">
                      <label class="control-label" >Region / State<span class="red">*</span></label>
                      <div class="controls">
                        <select >
                          <option>Please Select</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                    </div> --}}
                  </div>
                </fieldset>
              </form>
            </div>
          </div>


          <div class="checkoutsteptitle">Step 2: Confirm Order<a class="modify">Modify</a>
          </div>
          <div class="checkoutstep">
            <div class="container">  
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
                    </div>
                  </div>
                </div>

            <a href="{{ URL::route('pay') }}" class="btn btn-orange pull-right">Checkout</a>
          </div>
        </div>
        <!-- Sidebar Start-->
        <div class="span3">
          <aside>
            <div class="sidewidt">
              <h2 class="heading2"><span> Checkout Steps</span></h2>
              <ul class="nav nav-list categories">
                <li>
                  <a class="active" href="#">Checkout Options</a>
                </li>
                <li>
                  <a href="#">Billing Details</a>
                </li>
                <li>
                  <a href="#">Delivery Details</a>
                </li>
                <li>
                  <a href="#">Delivery Method</a>
                </li>
                <li>
                  <a href="#"> Payment Method</a>
                </li>
              </ul>
            </div>
          </aside>
        </div>
        <!-- Sidebar End-->
      </div>
    </div>
  </section>
</div>

@stop