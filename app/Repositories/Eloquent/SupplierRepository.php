<?php

namespace App\Repositories\Eloquent;

use App\Models\Supplier;


class SupplierRepository extends AbstractRepository
{

	protected $supplier;

	public function __construct ($supplier) 
	{
		$this->supplier = $supplier;
	}

	public function findByName($supplierName) 
	{
		return Supplier::where('supplier_name', 'LIKE', $supplierName)->get()->first();
	}

	public function getIdByName($supplierName)
	{
		return $this->findByName($supplierName)->id;
	}

}
