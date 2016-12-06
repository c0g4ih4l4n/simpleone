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
        return view('newTemplate.index')->with($data);
    }

    public function listCategory()
    {
    return view('newTemplate.category');
    }

    function compareInteger($a, $b) {
        if ($a['order_number'] == $b['order_number']) 
            return 0;
        return ($a['order_number'] < $b['order_number']) ? -1 : 1;
    }
}
