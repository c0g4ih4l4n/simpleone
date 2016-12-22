<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CheckoutRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|max:40',
            'last_name' => 'required|max:40',
            'address' => 'required|max:80',
            'post_code' => 'required|max:32',
            'method' => 'required|digits:1|in:1,2,3'
        ];
    }

    public function messages()
    {
        return [
            'first_name' => 'First Name is required',
            'last_name' => 'Last Name is required',
            'address' => 'Address is required',
            'post_code' => 'Post Code is required',
            'method' => 'Method not valid'
        ];
    }
}
