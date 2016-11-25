<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductEditRequest extends Request
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
            'product_name' => 'required|max:20|exists:products,product_name',
            'category_name' => 'required|max:20|exists:categories,category_name',
            'color' => 'required|max:20',
            'price' => 'required|numeric|between:0,100000',
            'quantity' => 'required|numeric|between:1,1000',
            'supplier_name' => 'required|exists:suppliers,supplier_name',
            'product_description' => 'required|max:200',
        ];
    }
}
