<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    
    protected $table = 'reviews';

    protected $fillable = [
    	'title', 'content', 'user_id', 'updated_at', 'created_at'
    ];

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function comments() {
    	return $this->morphMany('App\Comment', 'commentable');
    }

    public function votes() {
        return $this->morphMany('App\Vote', 'voteable');
    }
}
