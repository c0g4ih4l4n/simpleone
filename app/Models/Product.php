<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Contracts\Votingable;
use App\Http\Traits\Votingable as VoteTrait;

use App\Vote;

class Product extends Model implements Votingable
{

    public function __construct()
    {

    }

    public static function withRequest(Request $request)
    {

        $product = new self();
        $product['product_name'] = $request['product_name'];
        $product['product_description'] = $request['product_description'];
        $product['quantity'] = $request['quantity'];

        $categoryRepository = new CategoryRepository(new Category);

        $supplierRepository = new SupplierRepository(new Supplier);

        // echo '<pre>';
        //     print_r($product_cat);
        // echo '</pre>';

        $product['category_id'] = $categoryRepository->getIdByName($request->category_name);
        $product['supplier_id'] = $supplierRepository->getIdByName($request->supplier_name);

        return $product;
    }

    use VoteTrait;
    protected $table = "products";

    protected $fillable = ['product_name', 'product_description', 'quantity', 'category_id', 'supplier_id'];

    public $timestamp = false;

    public function category() {
    	return $this->belongsTo('App\Models\Category');
    }
    public function supplier() {
    	return $this->belongsTo('App\Models\Supplier');
    }

    public function item() {
    	return $this->hasOne('App\Models\ProductItem');
    }

    public function comments() {
        return $this->morphMany('App\Models\Comment', 'Commentable');
    }

}
