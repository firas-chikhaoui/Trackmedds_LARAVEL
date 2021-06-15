<?php

namespace App\Http\Responses\Backend\Allpharmacies;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Allpharmacies\Allpharmacy
     */
    protected $allpharmacies;

    /**
     * @param App\Models\Allpharmacies\Allpharmacy $allpharmacies
     */
    public function __construct($allpharmacies)
    {
        $this->allpharmacies = $allpharmacies;
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
        return view('backend.allpharmacies.edit')->with([
            'allpharmacies' => $this->allpharmacies
        ]);
    }
}