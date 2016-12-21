<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;

use App\Models\Product;
use Cart;
use App\Http\Traits\TakePhoto;

class CartController extends Controller
{
    use TakePhoto;

    private $user;

    private $carts;

    public function __construct() 
    {
        if (Auth::check()) 
        {
            $this->user = Auth::user();
        }

        $this->middleware('auth');
        $this->carts = Cart::content();

        foreach ($this->carts as $row) 
        {
            $product = Product::find($row->id);

            $row->product_name = $product->product_name; 

            $row->photo = $this->getPhotoName($product);
        }
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
    public function pay()
    {
        if ($this->user->user_balance < Cart::total())
        {
            return;
        }

        $this->user->user_balance -= Cart::total();
        $this->user->save();

        Cart::destroy();

        return $this->list();
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
        $product = Product::findOrFail($product_id);

        Cart::add($product_id, $product->product_name, 1, $product->item->price);

        return Redirect::back();
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
    public function update(Request $request, $id)
    {
        //
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
