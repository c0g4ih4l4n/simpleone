<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

/**
 * Controller for interact with Photo
 * Photo is saved in Storage/app/uploaded
 */
class PhotoController extends Controller
{
	/**
	 * Function getPhoto 
	 * @param  $name name of photo
	 * @return response   File save in browser for display like an image
	 * Note: if Save another kind of file must to save MIMEtype of file
	 * to generate correct Response for client (by header)
	 */
    public function getPhoto($name)
    {
    	$pathToFile = storage_path(). "/app/uploaded/" . $name;
    	return response()->file($pathToFile);
    }

    
}
