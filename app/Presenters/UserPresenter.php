<?php

namespace App\Presenters;

use Carbon\Carbon;
use App\User;
use McCool\LaravelAutoPresenter\BasePresenter;

class UserPresenter extends BasePresenter
{
    public function __construct(User $resource)
    {
        $this->wrappedObject = $resource;
    }

    public function avatar()
    {
    	if ($this->wrappedObject->avatars->last() == null) 
			return $this->wrappedObject->photo = null;
		else 
			return $this->wrappedObject->photo = $this->wrappedObject->avatars->last()->name;
    }
}