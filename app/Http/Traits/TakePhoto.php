<?php 

namespace App\Http\Traits;

trait TakePhoto {

	public function getPhotoName($product) 
	{
        if ($product->photos->last() == null) 
            $product->photo = null;
        else $product->photo = $product->photos->last()->name;

        return $product->photo;
	}	


}
?>