<?php


namespace App\Http\Resources;


class ProductsResource
{
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'nproduct'              => $this->nproduct,
            'featured_image'  => $this->featured_image,
            'status'            => $this->status,
            'created_at'        => optional($this->created_at)->toDateString(),
            'updated_at'        => optional($this->updated_at)->toDateString(),
        ];
    }
}