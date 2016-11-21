<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository 
{

	/**
	 * The model execute queries on
	 * @var \Illuminate\Database\Eloquent\Model
	 */
	protected $model;

	/**
	 * Create a new repository instance
	 * @param \Illuminate\Database\Eloquent\Model $model The model to execute queries on
	 */
	public function __construct(Model $model) 
	{
		$this->model = $model;
	}

	/**
	 * Get a new instance of Model
	 * @param  array  $attributes 
	 * @return \Illuminate\Database\Eloquent\Model The model execute queries on
	 */
	public function getNew(array $attributes = array()) 
	{
		return $this->model->newInstance($attributes);
	}
}
?>