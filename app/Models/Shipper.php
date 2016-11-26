<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    
    protected $table = "shippers";

    protected $fillable = ['id', 'shipper_name', 'shipper_level', 'products_item_id', 'address'];

    public $timestamps = true;

    public function product_item()
    {
    	return $this->belongsTo('App\Models\ProductItem');
    }

    public function photos()
    {
    	return $this->morphMany('App\Models\Photo', 'photo');
    }
}
