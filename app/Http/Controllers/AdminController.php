<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\ProductItem;
use App\Models\Comment;
use App\User;
use App\Models\Review;
use App\Models\Vote;

class AdminController extends Controller
{

	private $admin;

    public function __construct() {
    	$this->admin = Auth::user();
    	
    }

    public function index() 
    {
		return view('admin.index');

    }

    public function manageCategory() {
        $categories = Category::all()->toArray();

        $data = array (
            'user' => $this->admin,
            'categories' => $categories
            );

    	return view('admin.index_category')->with($data);
    }

    public function manageProduct() {


    	return view('admin.manage_product', ['user' => $this->admin]);
    }

    public function manageUser() {
    	return view('admin.index_user', ['user' => $this->admin]);
    }

    public function showAddCategory() {
        $message = Session::get('message');
        return view('admin.add_category', ['user' => $this->admin, 'message' => $message]);

    }
    public function postAddCategory(CategoryRequest $request) {

        $category = new Category;
        $category['category_name'] = $request['category_name'];
        $category['category_description'] = $request['category_description'];
        $category['number_of_products'] = 0;
        $category->save();

        $message = "Success";


        return Redirect::route('add-category')->with('message', $message);
    }

    public function showAddProduct() {
        $message = Session::get('message');

        return view('admin.add_product', ['user' => $this->admin, 'message' => $message]);
    }

    public function postAddProduct(ProductRequest $request) {

        // Add Product
        $product = new Product();
        $product['product_name'] = $request['product_name'];
        $product['product_description'] = $request['product_description'];
        $product['quantity'] = $request['quantity'];

        $product_cat = new Category();
        $product_cat = Category::where('category_name', 'LIKE', $request['category_name'])->get()->first();
        $product_cat->number_of_products ++;

        $product_supplier = new Supplier();
        $product_supplier = Supplier::where('supplier_name', 'LIKE', $request['supplier_name'])->get()->first()->toArray();

        // echo '<pre>';
        //     print_r($product_cat);
        // echo '</pre>';

        $product['category_id'] = $product_cat['id'];
        $product['supplier_id'] = $product_supplier['id'];

        $product->save();

        $product_cat->save();


        $product = Product::where('product_name', '=', $request['product_name'])->first();

        // Add Product Item
        $product_item = new ProductItem();
        $product_item['color'] = $request['color'];
        $product_item['price'] = $request['price'];
        $product_item['quantity'] = $request['quantity'];
        $product_item['product_id'] = $product['id'];
        $product_item->save();

        // Message to notify that added successful
        $message = "Success";
        return Redirect::route('add-product')->with('message', $message);

    }
}
