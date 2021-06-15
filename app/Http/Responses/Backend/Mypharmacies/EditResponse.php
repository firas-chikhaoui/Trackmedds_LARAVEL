<?php

namespace App\Http\Responses\Backend\Mypharmacies;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Mypharmacies\Mypharmacy
     */
    protected $mypharmacies;

    /**
     * @param App\Models\Mypharmacies\Mypharmacy $mypharmacies
     */
    public function __construct($mypharmacies)
    {
        $this->mypharmacies = $mypharmacies;
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
        return view('backend.mypharmacies.edit')->with([
            'mypharmacies' => $this->mypharmacies
        ]);
    }
}