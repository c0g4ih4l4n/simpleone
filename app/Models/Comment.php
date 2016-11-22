<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    protected $table = 'comments';

    protected $fillable = ['content', 'user_id', 'commentable_id', 'commentable_type', 'created_at', 'updated_at'];

    public function User() {
    	return $this->belongsTo('App\User');
    }

    // public function Product() {
    // 	return $this->belongsTo('App\Product');
    // }

    public function commentable() {
    	return $this->morphTo();
    }

    public function votes() {
        return $this->morphMany('App\Models\Vote', 'voteable');
    }
}
