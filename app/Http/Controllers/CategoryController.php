<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\CategoryUpdateRequest;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\Repositories\Eloquent\CategoryRepository;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\ProductItem;
use App\Models\Comment;
use App\User;
use App\Models\Review;
use App\Models\Vote;
use App\Models\Photo;

class CategoryController extends Controller
{

    protected $user;

    protected $categoryRepository;

    public function __construct() {
        $this->middleware('admin');
        $this->user = Auth::user();
        $this->categoryRepository = new CategoryRepository(new Category);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepository->listAll();

        $data = array (
            'user' => $this->user,
            'categories' => $categories
            );

        return view('admin.cate_list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message = Session::get('message');

        return view('admin.cate_add', ['user' => $this->user, 'message' => $message]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CategoryRequest  $Request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $message = $this->categoryRepository->createNew($request);

        return Redirect::route('admin.categories.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->findById($id);

        // Thay bang class ProductRepository
        $popular_products = Product::where('category_id', '=', $id)->get();

        $data = array (
            'category' => $category,
            'user' => $this->user,
            'popular_products' => $popular_products,
            );

        return view('interface.view_category')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->findById($id);

        $data = array (
            'user' => $this->user,
            'category' => $category
            );

        return view('admin.cate_edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CategoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {

        $message = $this->categoryRepository->update($request, $id);

        $data = array (
            'message' => $message,
            'user' => $this->user,
            );

        return Redirect::route('categories.index')->with($data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = $this->categoryRepository->delete($id);

        $data = array (
            'message' => $message,
            'user' => $this->user,
            );

        return Redirect::route('admin.categories.index')->with($data);
    }
}
