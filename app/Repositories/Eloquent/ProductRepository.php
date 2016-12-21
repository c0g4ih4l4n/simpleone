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
use App\Repositories\Eloquent\PhotoRepository;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\ProductItem;
use App\Models\Comment;
use App\User;
use App\Models\Review;
use App\Models\Vote;
use App\Models\Photo;

class ProductRepository extends AbstractRepository
{

	protected $product;

    protected $categoryRepository;

    protected $model;

    protected $type = 'product';

	public function __construct(Product $product)
	{
		$this->model = $product;
        $this->categoryRepository = new CategoryRepository(new Category);
	}

	public function listAll() 
	{
		$products = Product::all();
        
        foreach ($products as $product) {
            $product['category_name'] = $product->category->category_name;
            $product['supplier_name'] = $product->supplier->supplier_name;
            $product['price'] = $product->item['price'];
        }

        return $products;
	}

    public function findByName($productName)
    {
        return Product::where('product_name', '=', $productName)->first();
    }

    public function getIdByName($productName)
    {
        return $this->findByName($productName)->id;
    }

    public function getById($id) 
    {
        $product = Product::findOrFail($id);

        $product->category_name = $product->category->category_name;
        $product->supplier_name = $product->supplier->supplier_name;

        $product->color = $product->item->color;
        $product->price = $product->item->price;
        $product->quantity = $product->item->quantity;

        $product->vote = $product->votes;
        $product->vote->aveVote = $product->averageVote();

        if ($product->photos->last() != null) 
        {
            $product->photo = $product->photos->last()->name;
        }

        return $product;
    }

	public function store(ProductRequest $request) 
	{
		$product = Product::withRequest($request);
        if (!$product->save())
            App::abort(500, 'Error');

        $this->checkRequestHasFileAndSave($request, $product->id);

        if (!($this->categoryRepository->increaseNumOfProduct($request->category_name)))
        {
        	App::abort(500, 'Error');
        }

        // Add Product Item
        $product_item = ProductItem::withRequest($request);

        if (!$product_item->save())
            App::abort(500, 'Error');

        // Message to notify that added successful
        $message = "Success";
        return $message;
	}

    private function checkRequestHasFileAndSave(Request $request, $id) 
    {
        if ($request->hasFile('photo'))
        {
            $photoRepository = new PhotoRepository(new Photo);
            $file = $request->file('photo');
            if (!$photoRepository->checkValidPhoto($file))
            {
                $errors []= 'File type isn\'t not allowed';
                return $errors;
            }
            $photoRepository->savePhoto($file, $this->type, $id);
        }
    }

    public function updateProduct(ProductEditRequest $request, $id)
    {
        if ($this->findByName($request->product_name) != null && $this->findByName($request->product_name)->id != $id) 
        {
            $errors []= 'Product Name has already existed !';
            return $errors;
        }

        $this->checkRequestHasFileAndSave($request, $id);

        $this->impleUpdate($request, $id);

        $message = 'Success';
        return $message;
    }

    public function impleUpdate(ProductEditRequest $request, $id)
    {
        $product = Product::find($id);

        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->quantity = $request->quantity;

        $product = $this->checkUpdateSupplier($product, $request);
        $product = $this->checkUpdateCategory($product, $request);

        $product->save();
    }

    public function checkUpdateSupplier(Product $product, Request $request) 
    {
        if ($product->supplier->supplier_name != $request->supplier_name)
        {
            $supplierRepository = new SupplierRepository(new Supplier);
            $product->supplier_id = $supplierRepository->getIdByName($request->supplier_name);
        }
        return $product;
    }

    public function checkUpdateCategory(Product $product, Request $request)
    {
        if ($product->category->category_name != $request->category_name) 
        {
            $this->categoryRepository->decreaseNumOfProduct($product->category->category_id);
            $categoryRepository = new CategoryRepository(new Category);
            $this->categoryRepository->increaseNumOfProduct($request->category_name);
            $product->category_id = $categoryRepository->getIdByName($request->category_name);
        }
        return $product;
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword != '') {
            $query->where(function ($query) use ($keyword) {
                $query->where("product_name", "LIKE","%$keyword%")
                    ->orWhere("category_name", "LIKE", "%$keyword%")
                    ->orWhere("supplier_name", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }

    public function deleteById($id) 
    {
        ProductItem::where('product_id', '=', $id)->delete();
        // Xoa product xong => giam so san pham trong category
        $this->categoryRepository->decreaseNumOfProduct($id);

        Product::destroy($id); 
        return 'Success';
    }
}