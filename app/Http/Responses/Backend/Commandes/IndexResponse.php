<?php


namespace App\Http\Responses\Backend\Commandes;


class IndexResponse
{
    protected $status;
    public function __construct($status)
    {
        $this->status = $status;
    }
    public function toResponse($request)
    {
        return view('backend.commandes.index')->with([
            'status'=> $this->status,
        ]);
    }

}