<?php

namespace App\Repositories\Eloquent;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Checkout;
use App\User;

class CheckoutRepository extends AbstractRepository
{

	public function __construct(Checkout $checkout) 
	{
		$this->model = $checkout;
	}

	public function createNew(Request $request, User $user, $identifier) 
	{
		$this->model->insert([
			'owner' => $user->id,
			'identifier' => $identifier,
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'email' => $user->email,
			'address' => $request->address,
			'post_code' => $request->post_code,
			'paid' => true,
			'recieved' => false
			]);
	}
}