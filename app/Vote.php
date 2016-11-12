<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    
    protected $table = 'votes';

    protected $fillable = [
    'id', 'vote_val', 'user_id', 'voteable_id', 'voteable_type', 'created_at', 'updated_at'
    ];

    public function voteable() {
    	return $this->morphTo();
    }

    public function sumVote() {
        
    }

    public function totalVote() {

    }

    public function averageVote() {

    }

    public function updateVote($id, $data) {
    	$vote = static::find($id);

    	$vote->update($data);

    	return $vote;
    }

    
}
