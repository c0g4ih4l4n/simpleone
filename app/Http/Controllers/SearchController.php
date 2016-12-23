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
	private $bestsellers;
    private $lastestProducts;

	public function __construct() 
	{
		if (Auth::check()) 
			$this->user = Auth::user();
        $this->categories = Category::all();

        $this->bestsellers = Product::orderBy('sold', 'desc')->limit(4)->get();

        $this->lastestProducts = Product::orderBy('created_at', 'desc')->limit(4)->get();
	}

    public function search() 
    {
    	$keyword = Input::get('keyword', '');
    	$id = Input::get('search_cate', '');
		$products = Product::SearchByKeyword($keyword, $id)->get();

        foreach ($products as $product) {
            if ($product->photos->last() == null) 
                $product->photo = null;
            else $product->photo = $product->photos->last()->name;
        }

		$data = array (
			'user' => $this->user,
			'keyword' => $keyword,
			'search_cate' => $id,
			'bestsellers' => $this->bestsellers,
			'lastestProducts' => $this->lastestProducts,
			'products' => $products,
			'categories' => $this->categories,
			'sort_categories' => $this->categories
			);

		return view('newTemplate.category')->with($data);
    }
}
