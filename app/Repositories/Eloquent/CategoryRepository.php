<?php
namespace App\Repositories\Eloquent;

use App\Repositories\CategoryRepositoryInterface;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;

use Illuminate\Http\UploadedFile;
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

class CategoryRepository extends AbstractRepository implements CategoryRepositoryInterface 
{

	/**
	 * Create a new DbCategoryRepository instance
	 * @param \App\Models\Category $category
	 * @return void
	 */
	public function __construct(Category $category) {
		$this->model = $category;
	}

	public function listAll() {
		return Category::all();
	}

	public function findAll($orderColumn = 'created_at', $orderDir = 'desc') {

	}

	public function createNew(Request $request) {

		$images = $request->file('photo');
		$fileName = "";
		if ($request->file('photo')->isValid()) {
			$destinationPath = 'assets/uploads';
			$fileName = $request->photo->getFilename() . "." . $request->photo->extension();
			$request->file('photo')->move($destinationPath, $fileName);
		}

		$category = Category::create([
			'category_name' => $request['category_name'],
        	'category_description' => $request['category_description'],
        	'order_number' => 1,
        	'number_of_products' => 0,
        	'photo' => $fileName
        ]);

        if (!$category->id) {
        	App::abort(500, 'Some Error');
        }

        $message = 'Success';
        return $message;
	}

	public function findById($id) {

		return Category::find($id);
	}

	public function update($request, $id) 
	{

		$category = Category::find($id);

        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
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

	public function findByName($categoryName)
	{
		return Category::where('category_name', 'LIKE', $categoryName)->get()->first();
	}

	public function getIdByName($categoryName) 
	{
		return $this->findByName($categoryName)->id;
	}

}


?>