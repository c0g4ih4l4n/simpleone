<?php

namespace App\Repositories\Eloquent;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Response;

use App\Models\Photo;
use App\Models\Category;
use App\Models\Product;
use App\User;

class PhotoRepository extends AbstractRepository
{

	protected $model;

	protected $allow_type = array ('jpeg', 'jpg', 'png', 'bmp');

	public function __construct(Photo $photo)
	{
		return $this->model = $photo;
	}


	public function checkValidPhoto(UploadedFile $file)
	{
		if ($file->isValid()) 
		{
			// take extension and check
			$extension = $file->extension();

			if (in_array($extension, $this->allow_type)) 
			{
				return true;	
			}
		}

		return false;
	}

	public function getFileName(UploadedFile $file)
	{
		return $file->getFilename() . "." . $file->extension();
	}

	public function savePhoto(UploadedFile $file, $fileType, $id)
	{
		$this->savePhotoToStorage($file);

		$fileName = $this->getFilename($file);

		if ($fileType == 'category')
			$this->savePhotoCategory($fileName, $id);
		else if ($fileType == 'product')
			$this->savePhotoProduct($fileName, $id);
		else if ($fileType == 'user')
			$this->savePhotoUser($fileName, $id);
	}

	public function savePhotoCategory($fileName, $id)
	{
		$category = Category::find($id);

		$photo = $this->getNew();
		$photo->name = $fileName;
		$category->photos()->save($photo);
	}

	public function savePhotoProduct($fileName, $id)
	{
		$product = Product::find($id);

		$photo = $this->getNew();
		$photo->name = $fileName;
		$product->photos()->save($photo);
	}

	public function savePhotoUser($fileName, $id)
	{
		$user = User::findOrFail($id);

		$photo = $this->getNew();
		$photo->name = $fileName;
		$user->avatars()->save($photo);
	}

	public function savePhotoToStorage(UploadedFile $file) 
    {
		if ($this->checkValidPhoto($file)) 
		{
			$fileName = $this->getFilename($file);
			// Save file using driver uploaded 
			// defined in filesystem
			Storage::disk('uploaded')->put($fileName, File::get($file));
		}
    }

}