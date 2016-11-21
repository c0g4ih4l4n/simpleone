<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\CommentRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\ProductItem;
use App\Models\Comment;
use App\User;
use App\Models\Review;
use App\Models\Vote;


class CommentController extends Controller
{

    private $user;

    public function __construct () {
        $this->middleware('auth');
        $this->user = Auth::user();
 
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request) {

        $id = func_get_arg(1);
        $currentPath = Route::getFacadeRoot()->current()->uri();

        if (strpos($currentPath, 'reviews')) {
            return $this->storeReview($request, $id);
        }
        else 
            return $this->storeProduct($request, $id);
    }

    /**
     * Store Comment of Product
     * @param  Request $request request comment
     * @param  int  $id      ProductId
     * @return redirect           back
     */
    public function storeProduct(Request $request, $id)
    {

        $product = Product::find($id);

        $comment = new Comment();
        $comment->user_id = $this->user->id;

        $comment->content = strip_tags($request->content);
        $product->comments()->save($comment);

        return Redirect::back();
    }

    /**
     * Function store for comment in review
     * @param   $request Request
     * @param   $reviews ReviewId
     * @param   $id ProductId
     */
    public function storeReview(Request $request, $id) {
        $review = Review::find($id);

        $comment = new Comment();
        $comment->user_id = $this->user->id;

        $comment->content = strip_tags($request->content);
        $review->comments()->save($comment);

        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
