<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\Category;
use App\Product;

class CategoryController extends Controller
{

    private $user;

    public function __construct() {
        $this->user = Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all()->toArray();

        $data = array (
            'user' => $this->user,
            'categories' => $categories
            );

        return view('admin.index_category')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message = Session::get('message');
        return view('admin.add_category', ['user' => $this->user, 'message' => $message]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CategoryRequest  $Request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category;
        $category['category_name'] = $request['category_name'];
        $category['category_description'] = $request['category_description'];
        $category['number_of_products'] = 0;
        $category->save();
        $message = "Success";

        return Redirect::route('admin.categories.create')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
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
        $category = Category::find($id);
        $data = array (
            'user' => $this->user,
            'category' => $category
            );

        return view('admin.edit_category')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CategoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->save();

        $message = "Success";
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
        $category = Category::destroy($id);
        $message = "Success";
        $data = array (
            'message' => $message,
            'user' => $this->user,
            );
        return Redirect::route('categories.index')->with($data);
    }
}
