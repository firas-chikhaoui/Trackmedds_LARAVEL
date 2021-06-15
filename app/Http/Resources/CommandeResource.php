<?php


namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
class CommandeResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'etat'        => ($this->isActive()) ? 'Livred' : 'Not Livred',
            'qte'    => $this->qte,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];
    }
}