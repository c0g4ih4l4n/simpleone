<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = "photos";

    protected $fillable = ['id', 'photo_id', 'photo_type', 'name'];

    public $timestamps = true;

    public function photo() 
    {
    	return $this->morphTo();
    }
}
