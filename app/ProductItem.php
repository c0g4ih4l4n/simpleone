<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
    protected $table = "products_item";

    protected $fillable = [
    'color', 'price', 'quantity', 'product_id'
    ];

    public $timestamp = false;
}
