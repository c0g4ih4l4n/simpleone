<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';

    protected $fillable = [
    'id', 'supplier_name'
    ];

    protected $timestamp = true;

    public function photos()
    {
    	return $this->morphMany('App\Models\Photo', 'photo');
    }
}
