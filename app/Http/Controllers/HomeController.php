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
        $data = array (
            'user' => $this->user,
            'categories' => $this->categories,
            );
        return view('interface.home')->with($data);
    }
}
