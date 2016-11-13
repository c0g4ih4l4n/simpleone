<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\Category;
use App\Product;
use App\Supplier;
use App\ProductItem;
use App\Comment;
use App\User;
use App\Review;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    private $user;
    private $categories;
    public function __construct()
    {        
        if (Auth::check()) {
            $this->user = Auth::user();
        }
        $this->categories = Category::all();
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
            'sort_categories' => $sort_categories
            );
        return view('interface.home')->with($data);
    }

    function compareInteger($a, $b) {
        if ($a['order_number'] == $b['order_number']) 
            return 0;
        return ($a['order_number'] < $b['order_number']) ? -1 : 1;
    }
}
