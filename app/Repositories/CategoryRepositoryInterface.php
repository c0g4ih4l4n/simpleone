<?php
namespace App\Repositories;

interface CategoryRepositoryInterface 
{

	/**
	 * Get an array of key-value (id => name) pairs of all categories
	 *
	 * @return   array
	 */
	public function listAll();

	/**
	 * Find all categories
	 * @param  string $orderColumn [description]
	 * @param  string $orderDir    [description]
	 * @return \Repositories\Category
	 */
	public function findAll($orderColumn = 'created_at', $orderDir = 'desc');



}

?>