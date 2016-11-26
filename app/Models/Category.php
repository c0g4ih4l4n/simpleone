<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    protected $fillable = ['id', 'category_name', 'order_number', 'category_description', 'number_of_products'];

    public $timestamps = true;

    public function photos()
    {
    	return $this->morphMany('App\Models\Photo', 'photo');
    }
}
