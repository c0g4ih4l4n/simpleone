<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shoppingcart extends Model
{
    protected $table = 'shoppingcart';

    protected $fillable = ['identifier', 'instance', 'content'];

    public $timestamp = false;
}
