<?php 

namespace App\Http\Traits;

use App\Models\Vote;
use App\Http\Requests\VoteRequest;

trait Votingable {

	/**
	 * use to save votes for object like product, review, comment
	 * @return relation polymorphs-Many
	 */
	public function votes() {
		return $this->morphMany(Vote::class, 'voteable');
	}

	/**
	 * query DB and take average votes
	 * @return array     1 phan tu averageVote
	 */
	public function averageVote() {
		return floatval($this->votes()
			->selectRaw('AVG(vote_val) as averageVote')
			->value('averageVote'));
	}

	public function sumVote() {
		return intval($this->votes()
			->selectRaw('sum(vote_val) as sumVote')
			->value('sumVote'));
	}

	public function countVote() {
		return intval($this->votes()
			->selectRaw('count(id) as numberVote')
			->value('numberVote'));
	}

	public function updateVote(VoteRequest $request) {
		
	}

	public function deleteVote()
	{
		
	}
	
	public function hello() {
		return 'Hello';
	}
}

 ?>