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
}