<?php

namespace App\Http\Requests\Backend\Reclamations;

use Illuminate\Foundation\Http\FormRequest;

class StoreReclamationsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('create-reclamation');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:191',
            'email'   => 'required',
        ];
    }

    /**
     * Show the Messages for rules above.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name field is required.',
            'name.max'      => 'Name may not be grater than 191 character.',
            'email.required'   => 'email field is required.',
        ];
    }
}
