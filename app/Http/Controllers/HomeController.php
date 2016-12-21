<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    private $user;
    private $categories;
    private $products;
    public function __construct()
    {        
        if (Auth::check()) {
            $this->user = Auth::user();
        }
        $this->categories = Category::all();
        $this->products = Product::all();

        foreach ($this->categories as $category) {
            if ($category->photos->last() == null) 
                $category->photo = null;
            else $category->photo = $category->photos->last()->name;
        }

        foreach ($this->products as $product) {
            if ($product->photos->last() == null) 
                $product->photo = null;
            else $product->photo = $product->photos->last()->name;
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sort_categories = $this->categories->toArray();
        usort($sort_categories, array ($this, 'compareInteger'));


        $data = array (
            'user' => $this->user,
            'categories' => $this->categories,
            'sort_categories' => $sort_categories,
            'products' => $this->products
            );
        
        return view('newTemplate.index')->with($data);
    }

    public function listCategory()
    {
        $sort_categories = $this->categories->toArray();

        if (func_num_args() != 0)
        {
            $id = func_get_arg(0);
            $products = Product::where('category_id', '=', $id)->get();

            foreach ($products as $product) {
                if ($product->photos->last() == null) 
                    $product->photo = null;
                else $product->photo = $product->photos->last()->name;
            }
        }

        usort($sort_categories, array ($this, 'compareInteger'));


        $data = array (
            'user' => $this->user,
            'categories' => $this->categories,
            'sort_categories' => $sort_categories,
            );

        if (isset($products)) {
            $data['products'] = $products;
        } else {
            $data['products'] = $this->products;       
        }

        return view('newTemplate.category')->with($data);
    }

    public function listCategory()
    {
        $sort_categories = $this->categories->toArray();

        if (func_num_args() != 0)
        {
            $id = func_get_arg(0);
            $products = Product::where('category_id', '=', $id)->get();

            foreach ($products as $product) {
                if ($product->photos->last() == null) 
                    $product->photo = null;
                else $product->photo = $product->photos->last()->name;
            }
        }

        usort($sort_categories, array ($this, 'compareInteger'));

        $data = array (
            'user' => $this->user,
            'categories' => $this->categories,
            'sort_categories' => $sort_categories,
            );
        if (isset($products)) {
            $data['products'] = $products;
        } else {
            $data['products'] = $this->products;       
        }

        return view('template.category')->with($data);
    }

    function compareInteger($a, $b) {
        if ($a['order_number'] == $b['order_number']) 
            return 0;
        return ($a['order_number'] < $b['order_number']) ? -1 : 1;
    }

    /**
     * Display Contact Form
     * @return [type] [description]
     */
    public function contact()
    {
        $data = array (
            'user' => $this->user,
            'categories' => $this->categories,
            'products' => $this->products
            );
        return view('newTemplate.contact');
    }
}
