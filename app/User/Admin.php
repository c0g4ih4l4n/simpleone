<?php

namespace App\User;

class Admin extends User 
{

	protected $role;

	protected $categoryRepository;

	public function __construct() 
	{
		parent::__construct();
		$this->categoryRepository = new categoryRepository(new Category);
	}

	public function getRole()
	{
		return $this->role;
	}

	public function setRole($role)
	{
		$this->role = $role;
	}

	public function viewIndexCategory()
	{

	}

	public function createCategory()
	{

	}

	public function editCategory()
	{

	}
}

?>