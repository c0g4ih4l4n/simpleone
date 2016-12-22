<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CheckoutRequest;

use App\Http\Requests;

use App\Models\Product;
use App\Models\Shoppingcart;
use App\Models\Checkout;

use App\Repositories\Eloquent\CheckoutRepository;

use Cart;
use App\Http\Traits\TakePhoto;

class CartController extends Controller
{
    use TakePhoto;

    private $user;

    private $carts;

    // indentifier of cart
    // each user have own identifier
    private $identifier;

    public function __construct() 
    {
        $this->middleware('auth');

        $this->user = Auth::user();
        $this->identifier = 1;


        Cart::instance('shopping');

        Cart::restore($this->identifier);

        $this->carts = Cart::content();

        foreach ($this->carts as $row) 
        {
            $product = Product::find($row->id);

            $row->product_name = $product->product_name; 

            $row->photo = $this->getPhotoName($product);
        }

        Cart::store($this->identifier);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * List Item int the Cart
     * @return [type] [description]
     */
    public function list() 
    {
        $data = array(
            'carts' => $this->carts,
            'user' => $this->user
            );

        return view('newTemplate.shopping-cart')->with($data);
    }

    /**
     * Hien Khung Thanh Toan
     * @return [type] [description]
     */
    public function checkOut() 
    {
        $data = array(
            'carts' => $this->carts,
            'user' => $this->user
            );

        return view('newTemplate.checkout')->with($data);
    }

    /**
     * Thuc hien thanh toan
     * @return [type] [description]
     */
    public function pay(Request $request)
    {
        Cart::instance('shopping');

        // if user balance less than total of Cart
        // return
        if ($this->user->user_balance < Cart::total())
        {
            return;
        }

        // save delivery informantion to database
        $checkoutRepository = new CheckoutRepository(new Checkout);

        $checkoutRepository->createNew($request, $this->user, $this->identifier);

        // Create new Cart Delivery
        foreach (Cart::content() as $row) 
        {
            Cart::instance('deliver');
            Cart::add($row->id, $row->product_name, $row->qty, $row->price)->associate('App\Models\Product');
        }

        // Delete Shopping Cart
        Cart::instance('shopping');
        Cart::restore($this->identifier);


        // Save Deliver cart
        $cart = Cart::instance('deliver');
        $content = $cart->content();

        var_dump($content);

        // if ($cart->storedCartWithIdentifierExists($identifier)) {
        //     throw new CartAlreadyStoredException("A cart with identifier {$identifier} was already stored.");
        // }

        // $cart->getConnection()->table('deliver')->insert([
        //     'identifier' => $this->identifier,
        //     'instance' => $cart->currentInstance(),
        //     'content' => serialize($content)
        // ]);

        // // Subtract user balance
        // $this->user->user_balance -= Cart::total();
        // $this->user->save();

        // Cart::instance('shopping')->destroy();

        // return $this->list();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function add($product_id)
    {
        Cart::instance('shopping');

        $product = Product::findOrFail($product_id);

        Cart::restore($this->identifier);

        Cart::add($product_id, $product->product_name, 1, $product->item->price)->associate('App\Models\Product');

        Cart::store($this->identifier);

        return Redirect::route('shoppingcart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId, $quantity)
    {
        Cart::instance('shopping');

        Cart::restore($this->identifier);

        Cart::update($rowId, $quantity);

        Cart::store($this->identifier);

        return Redirect::route('shoppingcart');
    }

    /**
     * Remove CartItem
     * @param  int $id id of removed item
     * @return 
     */
    public function remove($rowId) 
    {
        Cart::instance('shopping');

        Cart::restore($this->identifier);

        Cart::remove($rowId);

        Cart::store($this->identifier);

        return Redirect::route('shoppingcart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
