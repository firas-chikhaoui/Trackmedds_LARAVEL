<?php

namespace App\Http\Requests\Backend\Products;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('store-product');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nproduct' => 'required|max:10',
            'featured_image'   => 'required',
            'status'=>'required',
            'quantité'=>'required|integer',
            'price'=>'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'nproduct.required' => 'Product name must required',
            'nproduct.max'      => 'Product name may not be greater than 10 characters.',
            'quantité.required'      => 'quantity must be numeric.',
            'price.required'      => 'price must be numeric.',
        ];
    }
}
