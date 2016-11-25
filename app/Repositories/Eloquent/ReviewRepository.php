<?php

namespace App\Repositories\Eloquent;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductEditRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

use App\Repositories\Eloquent\ProductRepository;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\ProductItem;
use App\Models\Comment;
use App\User;
use App\Models\Review;
use App\Models\Vote;

class ReviewRepository extends AbstractRepository
{

	protected $model;

	public function __construct(Review $reivew) 
	{
		$this->model = $review;
	}

	public function 

}