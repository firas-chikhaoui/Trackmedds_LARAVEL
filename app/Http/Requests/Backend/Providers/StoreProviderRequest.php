<?php

namespace App\Http\Requests\Backend\Providers;

use Illuminate\Foundation\Http\FormRequest;

class StoreProviderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('store-provider');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nprovider' => 'required|max:10',
            'adresse'   => 'required|max:15',
            'tel'=>'required|integer',
            'classf'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'nprovider.required' => 'Provider name must required ',
            'nproduct.max'      => 'Provider name may not be greater than 10 characters.',
            'adresse.max'      => 'adresse may not be greater than 10 characters.',
            'tel.required'      => 'phone number must be numeric.',
        ];
    }
}
