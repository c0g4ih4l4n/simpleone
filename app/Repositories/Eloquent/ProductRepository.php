<?php

namespace App\Repositories\Eloquent;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;

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

class ProductRepository extends AbstractRepository
{

	protected $product;

    protected $categoryRepository;

	public function __construct(Product $product)
	{
		$this->model = $product;
        $this->categoryRepository = new CategoryRepository(new Category);
	}

	public function listAll() 
	{
		$products = Product::all();
        
        foreach ($products as $product) {
            $product['category_name'] = $product->category->category_name;
            $product['supplier_name'] = $product->supplier->supplier_name;
            $product['price'] = $product->item['price'];
        }

        return $products;
	}

    public function findByName($productName)
    {
        return Product::where('product_name', '=', $productName)->first();
    }

    public function getIdByName($productName)
    {
        return $this->findByName($productName)->id;
    }

    public function getById($id) 
    {
        $product = Product::findOrFail($id);
        $product['price'] = $product->item->price;
        $product->category_name = $product->category->category_name;
        $product->vote = $product->votes;
        $product->vote->aveVote = $product->averageVote();

        return $product;
    }

	public function store(Request $request) 
	{

		$product = Product::withRequest($request);
        if (!$product->save())
            App::abort(500, 'Error');

        if (!($this->categoryRepository->increaseNumOfProduct($request->category_name)))
        {
        	App::abort(500, 'Error');
        }

        // Add Product Item
        $product_item = ProductItem::withRequest($request);

        if (!$product_item->save())
            App::abort(500, 'Error');

        // Message to notify that added successful
        $message = "Success";
        return $message;
	}

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword != '') {
            $query->where(function ($query) use ($keyword) {
                $query->where("product_name", "LIKE","%$keyword%")
                    ->orWhere("category_name", "LIKE", "%$keyword%")
                    ->orWhere("supplier_name", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}