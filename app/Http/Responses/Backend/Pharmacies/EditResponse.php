<?php

namespace App\Http\Responses\Backend\Pharmacies;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Pharmacies\Pharmacy
     */
    protected $pharmacies;

    /**
     * @param App\Models\Pharmacies\Pharmacy $pharmacies
     */
    public function __construct($pharmacies)
    {
        $this->pharmacies = $pharmacies;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.pharmacies.edit')->with([
            'pharmacies' => $this->pharmacies
        ]);
    }
}