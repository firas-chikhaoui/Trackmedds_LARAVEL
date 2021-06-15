<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ReclamationsResource extends Resource
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
            'name'      => $this->name,
            'email'        => $this->email,
            'status'        => ($this->isActive()) ? 'Traité' : 'Non traité',
            'phone'    => $this->phone,
            'subject'    => $this->subject,
            'message'    => $this->message,
            'pharmacie'    => $this->pharmacie,
            'medicament'    => $this->medicament,
        ];
    }
}
