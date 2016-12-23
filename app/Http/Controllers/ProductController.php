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
use App\Repositories\Eloquent\CategoryRepository;

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

    protected $categoryRepository;

    private $categories;

    public function __construct() {
        if (Auth::check()) {
            $this->user = Auth::user();
        }
        $this->productRepository = new ProductRepository(new Product);
        $this->categoryRepository = new CategoryRepository(new Category);
        $this->categories = $this->categoryRepository->listAll();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->listAll();
        $categories = $this->categoryRepository->listAll();
        
        $data = array (
            'user' => $this->user,
            'products' => $products,
            'categories' => $categories
            );
        // return view('interface.view_product')->with($data);
        return view('admin.product_list')->with($data);
    }

    public function listProduct()
    {
        return view('newTemplate.product');
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
        return view('admin.product_add')->with($data);
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

        foreach ($comments as $comment) 
        {
            $comment->user_name = $comment->user->name;
        }

        $reviews = Review::where('product_id', '=', $id)->get();

        foreach ($reviews as $review) 
        {
            $review->user_name = $review->user->name;
        }
        

        $data = array (
            'user' => $this->user,
            'product' => $product,
            'categories' => $this->categories,
            'reviews' => $reviews,
            'comments' => $comments,
            );
        
        return view('newTemplate.product')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->getById($id);

        $data = array (
            'product' => $product,
            'user' => $this->user,
            );
        return view('admin.product_edit')->with($data);
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
        $this->productRepository->updateProduct($request, $id);

        $product = Product::where('product_name', '=', $request['product_name'])->first();

        // Add Product Item
        $product_item = $product->item;
        $product_item['color'] = $request['color'];
        $product_item['price'] = $request['price'];
        $product_item['quantity'] = $request['quantity'];
        $product_item->save();

        // // Message to notify that added successful
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
        $message = $this->productRepository->deleteById($id);   

        $data = array (
            'message' => $message,
            'user' => $this->user,
            );

        return Redirect::route('admin.products.index')->with($data);
    }

}

