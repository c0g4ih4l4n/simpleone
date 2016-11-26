<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductEditRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

use App\Repositories\Eloquent\ProductRepository;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\ProductItem;
use App\Models\Comment;
use App\User;
use App\Models\Review;
use App\Models\Vote;

class ProductController extends Controller
{

    private $user;

    protected $productRepository;

    public function __construct() {
        if (Auth::check()) {
            $this->user = Auth::user();
        }
        $this->productRepository = new ProductRepository(new Product);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->listAll();
        
        $data = array (
            'user' => $this->user,
            'products' => $products,
            );
        // return view('interface.view_product')->with($data);
        return view('admin.index_product')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message = Session::get('message');
        $data = array (
            'message' => $message,
            'user' => $this->user,
            );
        return view('admin.add_product')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // Add Product

        $message = $this->productRepository->store($request);

        return Redirect::route('admin.products.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->productRepository->getById($id);
        $comments = $product->comments;
        foreach ($comments as $comment) {
            $comment->user_name = $comment->user->name;
        }

        $reviews = Review::where('product_id', '=', $id)->get();
        foreach ($reviews as $review) {
            $review->user_name = $review->user->name;
        }
        

        $data = array (
            'user' => $this->user,
            'product' => $product,
            'reviews' => $reviews,
            'comments' => $comments,
            );
        return view('interface.product_detail')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = Product::find($id);
        $product['category_name'] = $product->Category->category_name;
        $product['supplier_name'] = $product->supplier->supplier_name;
        $product['color'] = $product->item->color;
        $product['price'] = $product->item->price;
        $product['quantity'] = $product->item->quantity;

        $data = array (
            'product' => $product,
            'user' => $this->user,
            );
        return view('admin.edit_product')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductEditRequest $request, $id)
    {
        $product = Product::find($id);

        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->quantity = $request->quantity;

        if ($product->supplier->supplier_name != $request->supplier_name) {
            $product_supplier = Supplier::where('supplier_name', 'LIKE', $request['supplier_name'])->get()->first()->toArray();
            $product['supplier_id'] = $product_supplier['id'];
        }

        // kiem tra cac dieu kien de update
        if ($product->category->category_name != $request->category_name) {
            $product_cat_new = Category::where('category_name', 'LIKE', $request['category_name'])->get()->first();
            $product_cat_new->number_of_products ++;
            
            $product_cat_old = Category::where('category_name', 'LIKE', $product->category->category_name)->get()->first();
            $product_cat_old->number_of_products --;
            $product['category_id'] = $product_cat_new['id'];

            $product_cat_old->save();        
            $product_cat_new->save();
        }

        $product->save();




        $product = Product::where('product_name', '=', $request['product_name'])->first();

        // Add Product Item
        $product_item = $product->item;
        $product_item['color'] = $request['color'];
        $product_item['price'] = $request['price'];
        $product_item['quantity'] = $request['quantity'];
        $product_item->save();

        // Message to notify that added successful
        $message = "Success";
        return Redirect::route('admin.products.index')->with('message', $message);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        ProductItem::where('product_id', '=', $id)->delete();

        Product::destroy($id);
        
        // Xoa product xong => giam so san pham trong category
        $category = Category::findOrFail($product['category_id']);
        $category->number_of_products--;
        $category->save();

        return $this->index();
    }
}

