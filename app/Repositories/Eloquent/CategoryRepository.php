<?php
namespace App\Repositories\Eloquent;

use App\Repositories\CategoryRepositoryInterface;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Requests\ProductRequest;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

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

class CategoryRepository extends AbstractRepository implements CategoryRepositoryInterface 
{

	protected $type = 'category';

	/**
	 * Create a new DbCategoryRepository instance
	 * @param \App\Models\Category $category
	 * @return void
	 */
	public function __construct(Category $category) 
	{
		$this->model = $category;
	}

	public function listAll() 
	{
		return Category::all();
	}

	public function findAll($orderColumn = 'created_at', $orderDir = 'desc') 
	{

	}

	public function createNew(CategoryRequest $request) 
	{
		$photoRepository = new PhotoRepository(new Photo);

		$fileName = "";
		if ($request->hasFile('photo'))
		{
			$file = $request->file('photo');
			if (!$photoRepository->checkValidPhoto($file))
			{
				$errors []= 'File Type isn\'t not supported';
				return $errors;
			}
			$fileName = $photoRepository->getFileName($file);
		}


		$category = Category::create([
			'category_name' => $request['category_name'],
        	'category_description' => $request['category_description'],
        	'order_number' => 1,
        	'number_of_products' => 0
        ]);

        if (!$category->id) 
        {
        	App::abort(500, 'Some Error');
        }

        $photoRepository->savePhoto($file, $this->type, $category->id);

        $message = 'Success';
        return $message;
	}

	public function update(CategoryUpdateRequest $request, $id) 
	{
		$category = Category::find($id);

		if (($this->getIdByName($request->category_name) != null) && ($id != $this->getIdByName($request->category_name))) 
		{
			$errors []= 'Category Name has already exists';
			return $errors;
		}

        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->order_number = $request->order_number;

        if ($request->hasFile('photo'))
        {
        	$photoRepository = new PhotoRepository(new Photo);
        	$file = $request->file('photo');

        	if (!$photoRepository->checkValidPhoto($file))
			{
				$errors []= 'File Type isn\'t not supported';
				return $errors;
			}

			$fileName = $photoRepository->getFileName($file);

        	$photoRepository->savePhoto($file, $this->type, $category->id);
        }

        $category->save();

        return "Success";
	}

	public function delete($id)
	{
		$category = Category::destroy($id);

        return "Success";
	}

	public function increaseNumOfProduct($categoryName) 
	{
		$category = $this->findByName($categoryName);
        $category->number_of_products ++;
        if ($category->save())
        	return true;
        return false;
	}

	public function decreaseNumOfProduct($categoryId)
	{
		$category = Category::find($categoryId);
		if ($category->number_of_products > 0)
			$category->number_of_products--;
		$category->save();
	}

	public function findByName($categoryName)
	{
		return Category::where('category_name', 'LIKE', $categoryName)->get()->first();
	}

	public function getIdByName($categoryName) 
	{
		return $this->findByName($categoryName)['id'];
	}

	public function findById($id) 
	{
		$category = Category::find($id);

		if ($category->photos->last() == null) 
			$category->photo = null;
		else $category->photo = $category->photos->last()->name;
		return $category;
	}
}
