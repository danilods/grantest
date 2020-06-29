<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAssuntosAPIRequest;
use App\Http\Requests\API\UpdateAssuntosAPIRequest;
use App\Models\Assuntos;
use App\Repositories\AssuntosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AssuntosController
 * @package App\Http\Controllers\API
 */

class AssuntosAPIController extends AppBaseController
{
    /** @var  AssuntosRepository */
    private $assuntosRepository;
    private $objetoAssunto;

    public function __construct(AssuntosRepository $assuntosRepo, Assuntos $assunto)
    {
        $this->assuntosRepository = $assuntosRepo;
        $this->objetoAssunto=$assunto;
    }

    /**
     * Display a listing of the Assuntos.
     * GET|HEAD /assuntos
     *
     * @param Request $request
     * @return Response
     */
    public function index()
    {

        $assuntos = $this->objetoAssunto->with(['assuntos'])->where('raiz_id', '=',null)->get();
        return response()->json($assuntos);
    }

    /**
     * Display a listing of the Assuntos.
     * GET|HEAD /assuntos
     *
     * @param Request $request
     * @return Response
     */
    public function getSubjectsTree()
    {

        $assuntos = $this->objetoAssunto->with(['assuntos'])->where('raiz_id', '=',null)->get();

        return response()->json($assuntos);
    }

    /**
     * Store a newly created Assuntos in storage.
     * POST /assuntos
     *
     * @param CreateAssuntosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAssuntosAPIRequest $request)
    {

        $input = $request->all();

        $assuntos = $this->assuntosRepository->create($input);

        return response()->json($assuntos);
    }

    /**
     * Display the specified Assuntos.
     * GET|HEAD /assuntos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Assuntos $assuntos */
        $assuntos = $this->assuntosRepository->find($id);

        if (empty($assuntos)) {
            return $this->sendError('Assuntos not found');
        }

        return response()->json($assuntos);
    }

    /**
     * Update the specified Assuntos in storage.
     * PUT/PATCH /assuntos/{id}
     *
     * @param int $id
     * @param UpdateAssuntosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAssuntosAPIRequest $request)
    {
        $input = $request->all();

        /** @var Assuntos $assuntos */
        $assuntos = $this->assuntosRepository->find($id);

        if (empty($assuntos)) {
            return $this->sendError('Assuntos not found');
        }

        $assuntos = $this->assuntosRepository->update($input, $id);

        return response()->json($assuntos);
    }

    /**
     * Remove the specified Assuntos from storage.
     * DELETE /assuntos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Assuntos $assuntos */
        $assuntos = $this->assuntosRepository->find($id);

        if (empty($assuntos)) {
            return $this->sendError('Assuntos not found');
        }

        $assuntos->this->delete();

        return $this->sendSuccess('Assuntos deleted successfully');
    }
}
