<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\ReclamationsResource;
use App\Models\Reclamations\Reclamation;
use App\Repositories\Backend\Reclamations\ReclamationsRepository;
use Illuminate\Http\Request;
use Validator;

class ReclamationsController extends APIController
{
    protected $repository;

    /**
     * __construct.
     *
     * @param $repository
     */
    public function __construct(ReclamationsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Return the reclamations.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $limit = $request->get('paginate') ? $request->get('paginate') : 25;
        $orderBy = $request->get('orderBy') ? $request->get('orderBy') : 'ASC';
        $sortBy = $request->get('sortBy') ? $request->get('sortBy') : 'created_at';

        return ReclamationsResource::collection(
            $this->repository->getForDataTable()->orderBy($sortBy, $orderBy)->paginate($limit)
        );
    }

    /**
     * Return the specified resource.
     *
     * @param Reclamation $reclamation
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Reclamation $reclamation)
    {
        return new ReclamationsResource($reclamation);
    }

    /**
     * Creates the Resource for reclamation.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validation = $this->validateReclamations($request);
        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->first());
        }

        $this->repository->create($request->all());

        return new ReclamationsResource(Reclamation::orderBy('created_at', 'desc')->first());
    }

    /**
     * Update reclamation.
     *
     * @param Reclamation     $reclamation
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Reclamation $reclamation)
    {
        $validation = $this->validateReclamation($request);

        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->first());
        }

        $this->repository->update($reclamation, $request->all());

        $reclamation = Reclamation::findOrfail($reclamation->id);

        return new ReclamationsResource($reclamation);
    }

    /**
     * Delete reclamation.
     *
     * @param Reclamation     $reclamation
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Reclamation $reclamation, Request $request)
    {
        $this->repository->delete($reclamation);

        return $this->respond([
            'message' => trans('alerts.backend.reclamations.deleted'),
        ]);
    }

    /**
     * validate Reclamation.
     *
     * @param $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateReclamation(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'email'   => 'required',
        ]);

        return $validation;
    }
}
