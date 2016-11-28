<?php
namespace App\Repositories\Eloquent;

use App\User;

class UserRepository extends AbstractRepository
{

	protected $model;

	public function __construct (User $user)
	{
		$this->model = $user;
	}



}