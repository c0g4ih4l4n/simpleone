<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;

use App\Http\Requests;

use App\Models\Category;

class SearchController extends Controller
{

	protected $user;
	protected $categories;

	public function __construct() 
	{
		if (Auth::check()) 
			$this->user = Auth::user();
        $this->categories = Category::all();
	}

    public function search() 
    {
    	$keyword = Input::get('keyword', '');
		$products = Product::SearchByKeyword($keyword)->get();

		$data = array (
			'user' => $this->user,
			'keyword' => $keyword,
			'products' => $products,
			'sort_categories' => $this->categories
			);

		return view('interface.view_product')->with($data);
    }
}
