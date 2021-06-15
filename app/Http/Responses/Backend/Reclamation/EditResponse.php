<?php

namespace App\Http\Responses\Backend\Reclamation;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var \App\Models\Reclamations\Reclamation
     */
    protected $reclamation;

    /**
     * @param \App\Models\Reclamation\Reclamation $reclamation
     */
    public function __construct($reclamation)
    {
        $this->reclamation = $reclamation;
    }

    /**
     * toReponse.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.reclamations.edit')
            ->with('reclamation', $this->reclamation);
    }
}
