<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deliver extends Model
{
    protected $table = "delivers";

    protected $fillable = ['id', 'checkout_id', 'identifier', 'instance', 'content'];

    public $timestamps = false;
}
