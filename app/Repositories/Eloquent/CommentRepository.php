<?php

namespace App\Repositories\Eloquent;

use App\Repositories\CategoryRepositoryInterface;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Route;

use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Eloquent\AbstractRepository;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\ProductItem;
use App\Models\Comment;
use App\User;
use App\Models\Review;
use App\Models\Vote;

class CommentRepository extends AbstractRepository
{

	protected $model;

	public function __construct(Comment $comment)
	{
		$this->model = $comment;
	}

	public function store(Request $request, $id, $currentPath, $user)
	{

        if (strpos($currentPath, 'reviews')) {
            return $this->storeReview($request, $id, $user);
        }
        else 
            return $this->storeProduct($request, $id, $user);
	}

	public function storeProduct(Request $request, $id, $user) 
	{

		$product = Product::find($id);

        $comment = new Comment();
        $comment->user_id = $user->id;

        $comment->content = strip_tags($request->content);
        $product->comments()->save($comment);

	}

	public function storeReview(Request $request, $id, $user)
	{

		$review = Review::find($id);

        $comment = new Comment();
        $comment->user_id = $user->id;

        $comment->content = strip_tags($request->content);
        $review->comments()->save($comment);

	}

}