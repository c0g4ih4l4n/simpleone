<?php

namespace App\Presenters;

use Carbon\Carbon;
use App\Models\Category;
use McCool\LaravelAutoPresenter\BasePresenter;

class CategoryPresenter extends BasePresenter
{
    public function __construct(Category $resource)
    {
        $this->wrappedObject = $resource;
    }

    public function parent() 
    {
        $parent = Category::find($this->wrappedObject->parent_id);

        // if not found 
        if ($parent == null) {
            return 0;
        }
        return $parent->category_name;
    }

    public function photo() {
        if ($this->wrappedObject->photos->last() == null) 
            $this->wrappedObject->photo = null;
        else $this->wrappedObject->photo = $this->wrappedObject->photos->last()->name;
        return $this->wrappedObject->photo;
    }
}