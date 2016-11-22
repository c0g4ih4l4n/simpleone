<?php

namespace App\User;

class User {

	protected $id;
	protected $name;
	protected $email;

	public function getId() 
	{
		return $this->id;
	}

	public function setId($id) 
	{
		$this->id = $id;
	}

	public function getName() 
	{
		return $this->name;
	}

	public function setName($name) 
	{
		$this->name = $name;
	}

	public function getEmail() 
	{
		return $this->email;
	}

	public function setEmail($email) 
	{
		$this->email = $email;
	} 

	public function reviewProduct() 
	{

	}

	public function Comment() 
	{

	}

	public function editProfile() 
	{

	}

	public function themSanPham() 
	{

	}

	public function thanhToan() 
	{

	}
}


?>