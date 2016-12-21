<?php

namespace App\Presenters;

use Carbon\Carbon;
use App\Models\Product;
use McCool\LaravelAutoPresenter\BasePresenter;

class ProductPresenter extends BasePresenter
{
    public function __construct(Product $resource)
    {
        $this->wrappedObject = $resource;
    }

    /**
     * take Price of Product to view
     * @return [type] [description]
     */
    public function price()
    {
		return $this->wrappedObject->item->price;
    }

    public function photo() {
        if ($this->wrappedObject->photos->last() == null) 
            $this->wrappedObject->photo = null;
        else $this->wrappedObject->photo = $this->wrappedObject->photos->last()->name;
        return $this->wrappedObject->photo;
    }
}