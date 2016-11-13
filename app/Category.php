<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    protected $fillable = ['id', 'category_name', 'order_number', 'category_description', 'number_of_products'];

    public $timestamps = false;
}
