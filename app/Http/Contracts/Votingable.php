<?php 

namespace App\Http\Contracts;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\VoteRequest;


interface Votingable {

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function votes();

	public function averageVote();

	public function sumVote();

	public function countVote();

	public function updateVote(VoteRequest $request);

	public function delete();

}

 ?>