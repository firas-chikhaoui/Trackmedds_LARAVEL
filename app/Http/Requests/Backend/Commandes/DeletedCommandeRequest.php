<?php


namespace App\Http\Requests\Backend\Commandes;
use App\Http\Requests\Request;

class DeletedCommandeRequest  extends Request

{
    public function authorize()
    {
        return access()->allow('delete-commande');
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}