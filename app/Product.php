<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Contracts\Votingable;
use App\Http\Traits\Votingable as VoteTrait;

use App\Vote;

class Product extends Model implements Votingable
{
    use VoteTrait;
    protected $table = "products";

    protected $fillable = ['product_name', 'product_description', 'quantity', 'category_id', 'supplier_id'];

    public $timestamp = false;

    public function category() {
    	return $this->belongsTo('App\Category');
    }
    public function supplier() {
    	return $this->belongsTo('App\Supplier');
    }

    public function item() {
    	return $this->hasOne('App\ProductItem');
    }

    public function comments() {
        return $this->morphMany('App\Comment', 'Commentable');
    }

}
