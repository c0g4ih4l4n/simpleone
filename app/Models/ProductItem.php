<?php

namespace App\Models;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

use App\Repositories\Eloquent\ProductRepository;

class ProductItem extends Model
{

	public function __construct() 
	{

	}

	public static function withRequest(Request $request)
	{
		$product_item = new self();

		$product_item['color'] = $request['color'];
        $product_item['price'] = $request['price'];
        $product_item['quantity'] = $request['quantity'];

        $productRepository = new ProductRepository(new Product);
        $product_item['product_id'] = $productRepository->getIdByName($request->product_name);
        
        return $product_item;
	}

    protected $table = "products_item";

    protected $fillable = [
    'color', 'price', 'quantity', 'product_id'
    ];

    public $timestamp = false;

   	public function product() 
	{
		return $this->belongsTo('App\Models\Product');
	}

	public function photos()
	{
		return $this->morphMany('App\Models\Photo', 'photo');
	}

}
