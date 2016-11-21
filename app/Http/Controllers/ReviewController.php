<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;

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

class ReviewController extends Controller
{
    private $product, $user;

    public function __construct () {
        if (Auth::check()) {
            $this->user = Auth::user();
        }
        //$this->product = Product::findOrFail();
        // 
        $this->middleware('auth', ['except' => ['show', 'index']]);
        $id = (int)Request::segment(2);
        $this->product = Product::find($id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, Request $request)
    {

        $reviews = Review::where('product_id', '=', $id)->get();
        foreach ($reviews as $review) {
            $review->author = $review->user->name;            
        }
        $data = array (
            'reviews' => $reviews,
            'product' => $this->product,
            'user' => $this->user,
            );
        return view('interface.review_list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = array (
            'user' => $this->user,
            'product' => $this->product,
            'id' => $id,
            );
        return view('interface.write-review')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $review = new Review();
        $review->title = $request->review_title;
        $review->content = $request->review_content;
        $review->product_id = $id;
        $review->user_id = $this->user->id;
        $review->save();
        return Redirect::route('products.show', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $reviews)
    {
        $review = Review::findOrFail($reviews);
        $comments = $review->comments;
        foreach ($comments as $comment) {
            $comment->user_name = $comment->user->name;
        }
        $data = array (
            'comments' => $comments,
            'product' => $this->product,
            'review' => $review,
            'user' => $this->user,
            );
        return view('interface.review_detail')->with($data);
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
    public function update($id, Request $request)
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
