<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table = "checkouts";

    protected $fillable = ['id', 'owner', 'identifier', 'first_name', 'last_name', 'email', 'address', 'post_code', 'country', 'paid', 'recieved'];

    public $timestamps = false;
}
