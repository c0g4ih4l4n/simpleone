<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Models\ProductItem;
use App\Models\Supplier;
use App\Models\Category;

use Illuminate\Support\Facades\Response;

use CategoryRepository;
use SupplierRepository;

class ProductRepository extends AbstractRepository
{

	protected $product;

	public function __construct(Product $product)
	{
		$this->model = $product;
	}

	public function listAll() 
	{
		$products = Product::all();
        
        foreach ($products as $product) {
            $product['category_name'] = $product->category->category_name;
            $product['supplier_name'] = $product->supplier->supplier_name;
            $product['price'] = $product->item->price;
        }

        return $products;
	}

    public function findByName($productName)
    {
        return Product::where('product_name', '=', $request['product_name'])->firstOrFail();
    }

    public function getIdByName($productName)
    {
        return $this->findByName($productName)->id;
    }

	public function store(Request $request) 
	{

		$product = Product::withRequest($request);
        $product->save();

        if (!($categoryRepository->increaseNumOfProduct($request->category_name)))
        {
        	App::abort(500, 'Error');
        }

        // Add Product Item
        $product_item = new ProductItem();

        $product_item->save();

        // Message to notify that added successful
        $message = "Success";

	}

}