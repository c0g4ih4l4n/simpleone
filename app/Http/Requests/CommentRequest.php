<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CommentRequest extends Request
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
            'content' => 'required|filled|max:255'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'content.required' => 'Content is required !',
            'content.filled' => 'Content is required !',
            'content.max' => 'Content is too long !',

        ];
    }
}
