<?php
namespace App\Repositories\Eloquent;

use App\User;
use App\Models\Photo;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\UserUpdateRequest;

class UserRepository extends AbstractRepository
{

	protected $model;

	protected $type = 'user';

	public function __construct (User $user)
	{
		$this->model = $user;
	}

	public function update(UserUpdateRequest $request, $id)
	{
        $userEdit = $this->model->findOrFail($id);

        $userEdit->name = $request->user_name;

        if ($request->hasFile('photo'))
        {
			$photoRepository = new PhotoRepository(new Photo);
			$file = $request->file('photo');

        	if ($photoRepository->checkValidPhoto($file))
        	{
        		$photoRepository->savePhoto($file, $this->type, $id);
        	}
        }

        $userEdit->save();
	}

	public function updatePassword(Request $request, $id)
	{
		$userChangePass = $this->model->find($id);

        if (Hash::check($request->password, $userChangePass->password)) 
        {
            if ($request->new_password != $request->confirm_password) 
            {
	            $errors []= 'Password Not Match !!';

	            return Redirect::back()->with($errors);
            }

            if (strcmp($request->password, $request->new_password) == 0)
            {
            	$errors []= 'Password Not Changed !!';

            	return Redirect::back()->with($errors);
            }

            $userChangePass->password = bcrypt($request->new_password);
            $userChangePass->save();

            return Redirect::route('users.show', $id);
        }

        $errors []= 'Password not correct !';

        return Redirect::back()->with($errors);
	}

}