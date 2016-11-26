<?php

namespace App\Models;

use Illuminate\Http\Request;

use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Eloquent\SupplierRepository;

use Illuminate\Database\Eloquent\Model;
use App\Http\Contracts\Votingable;
use App\Http\Traits\Votingable as VoteTrait;

use App\Models\Vote;
use App\Models\Supplier;

class Product extends Model implements Votingable
{

    use VoteTrait;
    protected $table = "products";

    protected $fillable = ['product_name', 'product_description', 'quantity', 'category_id', 'supplier_id'];

    public $timestamp = true;

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
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function photos()
    {
        return $this->morphMany('App\Models\Photo', 'photo');
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {

            $query->where(function ($query) use ($keyword) {
                $query->where("product_name", "LIKE","%$keyword%");
                    // ->orWhere("category_name", "LIKE", "%$keyword%")
                    // ->orWhere("supplier_name", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}
