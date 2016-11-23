<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{

	public function __construct() 
	{

	}

	public static function withRequest()
	{
		$product_item = new self();

		$product_item['color'] = $request['color'];
        $product_item['price'] = $request['price'];
        $product_item['quantity'] = $request['quantity'];
        $product_item['product_id'] = $this->getIdByName($request->product_name);

        
	}

    protected $table = "products_item";

    protected $fillable = [
    'color', 'price', 'quantity', 'product_id'
    ];

    public $timestamp = false;
}
