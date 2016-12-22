<?php

namespace App\Repositories\Eloquent;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Deliver;

use Gloudemans\Shoppingcart\Cart;

class DeliverRepository extends AbstractRepository
{

	public function __construct(Deliver $deliver) 
	{
		$this->model = $deliver;
	}

	public function createNew($id, Cart $cart, $identifier)
	{
		$this->model->insert([
			'checkout_id' => $id,
			'identifier' => $identifier,
			'instance' => 'deliver',
			'content' => serialize($cart->content())
			]);

	}

}

