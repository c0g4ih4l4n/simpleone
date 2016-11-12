<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\VoteRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\Category;
use App\Product;
use App\Supplier;
use App\ProductItem;
use App\Comment;
use App\User;
use App\Review;
use App\Vote;

use App\Http\Contracts\Votingable;
use App\Http\Traits\Votingable as VoteTrait;

class VotingController extends Controller implements Votingable
{

	use VoteTrait;

	private $user;
    
    public function __construct() {
    	$this->user = Auth::user();
    }

    public function test() {
    	$product = Product::find(1);
    	$product->setAttribute('aveVote', $product->averageVote());
    	// var_dump($product->votes);
    	return $product;
    }

    public function index() {
    	return view('interface.rating');
    }

	public function store(VoteRequest $request) {

		$condition = array (
			'user_id' 		=> $this->user->id,
			'voteable_type' => 'App\Product',
			'voteable_id' 	=> $request->voteable_id,
			);
		$vote = Vote::where($condition)->get();

		if ($vote != null) {
			return $this->update($request);
		}

		if ($request->voteable_type == 'product') 
			return $this->storeVoteProduct($request);
		else if ($request->voteable_type == 'review') 
			return $this->storeVoteReview($request);
		else 
			return $this->storeVoteComment($request);
	}

	private function storeVoteProduct(Request $request) {
		$product = Product::findOrFail($request->voteable_id);
		$vote = new Vote();
		$vote->vote_val = $request->vote_val;

		// Kiem tra tinh bao mat ?
		$vote->user_id = $this->user->id;
		$product->votes()->save($vote);
	}

	private function storeVoteComment(Request $request) {
		$comment = Comment::findOrFail($request->voteable_id);
		$vote = new Vote();
		$vote->vote_val = $request->vote_val;

		// Kiem tra tinh bao mat ?
		$vote->user_id = $this->user->id;
		$comment->votes()->save($vote);
	}

	private function storeVoteReview(Request $request) {
		$review = Review::findOrFail($request->voteable_id);
		$vote = new Vote();
		$vote->vote_val = $request->vote_val;

		// Kiem tra tinh bao mat ?
		$vote->user_id = $this->user->id;
		$review->votes()->save($vote);	
	}

	public function update(VoteRequest $request) {
		if ($request->voteable_type == 'product') 
			return $this->updateVoteProduct($request);
		else if ($request->voteable_type == 'review') 
			return $this->updateVoteReview($request);
		else 
			return $this->updateVoteComment($request);
	}

	private function updateVoteProduct(Request $request){
		$type = 'App\Product';
		// Xem lai
		$vote = Vote::find(1);


		$product = $vote->voteable;
		$vote->vote_val = $request->vote_val;

		$product->votes()->save($vote);

		return;
	}

	private function updateVoteReview(Request $request) {
		$type = 'App\Review';
		$vote = Vote::where('user_id', '=', $this->user->id)
					->where('voteable_id', '=', $request->voteable_id)
					->where('voteable_type', 'LIKE', $request->voteable_type)->get();

		$review = Review::findOrFail($request->voteable_id);
		$vote->vote_val = $request->vote_val;

		$review->votes()->save($vote);

		return;

	}

	private function updateVoteComment(Request $request) {
		$type = 'App\Comment';
		$vote = Vote::where('user_id', '=', $this->user->id)
					->where('voteable_id', '=', $request->voteable_id)
					->where('voteable_type', 'LIKE', $request->voteable_type)->get();

		$comment = Comment::findOrFail($request->voteable_id);
		$vote->vote_val = $request->vote_val;

		$comment->votes()->save($vote);
		return;
	}

}
