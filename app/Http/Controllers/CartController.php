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
use App\Models\Deliver;
use App\Models\Category;

use App\Repositories\Eloquent\CheckoutRepository;
use App\Repositories\Eloquent\DeliverRepository;
use App\Repositories\Eloquent\ProductRepository;
use App\Repositories\Eloquent\CategoryRepository;

use Cart;
use App\Http\Traits\TakePhoto;

class CartController extends Controller
{
    use TakePhoto;

    private $user;

    private $carts;

    private $productRepository;

    private $categoryRepository;

    private $categories;
    // indentifier of cart
    // each user have own identifier
    private $identifier;

    public function __construct() 
    {
        $this->middleware('auth');

        $this->categoryRepository = new CategoryRepository(new Category);
        $this->categories = $this->categoryRepository->listAll();

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
    public function listCart() 
    {
        $data = array(
            'carts' => $this->carts,
            'user' => $this->user,
            'categories' => $this->categories
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
            'user' => $this->user,
            'categories' => $this->categories
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
            return "Doesn't have enough money !!";
        }

        // save delivery informantion to database
        $checkoutRepository = new CheckoutRepository(new Checkout);

        $checkoutRepository->createNew($request, $this->user, $this->identifier);

        $id = $checkoutRepository->findId($this->user, $this->identifier);

        // Create new Cart Delivery

        // Delete Shopping Cart
        Cart::instance('shopping');
        Cart::restore($this->identifier);


        // Save Deliver cart
        $cart = Cart::instance('shopping');
        $deliverRepository = new DeliverRepository(new Deliver);
        $deliverRepository->createNew($id, Cart::instance('shopping'), $this->identifier);

        // Subtract user balance
        $this->user->user_balance -= Cart::total();
        $this->user->save();

        // increase sold of product
        // 
        foreach (Cart::content() as $row) 
        {
            $row->model->increaseSold($row->model->id, $row->qty);
            $row->model->decreaseQuantity($row->model->id, $row->qty);
        }

        Cart::instance('shopping')->destroy();

        return Redirect::route('shoppingcart');
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


    // wish list
    public function wishlist() 
    {
        $wishlist = Cart::instance('wish-list')->content();
        foreach ($wishlist as $row) 
        {
            $product = Product::find($row->id);

            $row->product_name = $product->product_name; 

            $row->photo = $this->getPhotoName($product);
        }

        $data = array (
            'user' => $this->user,
            'categories' => $this->categories,
            'carts' => $wishlist
            );
        return view('newTemplate.wish-list')->with($data);
    }

    public function addWishList($product_id)
    {
        Cart::instance('wish-list');

        $product = Product::findOrFail($product_id);

        Cart::add($product_id, $product->product_name, 1, $product->item->price)->associate('App\Models\Product');

        return Redirect::route('wishlist');
    }

    public function removeWishList($rowId) 
    {
        Cart::instance('wish-list');

        Cart::remove($rowId);

        return Redirect::route('wishlist');
    }
}
