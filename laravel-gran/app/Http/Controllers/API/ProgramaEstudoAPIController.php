<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProgramaEstudoAPIRequest;
use App\Http\Requests\API\UpdateProgramaEstudoAPIRequest;
use App\Models\Assuntos;
use App\Repositories\ProgramaEstudoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Models\ProgramaEstudo;
use Illuminate\Http\Response;

/**
 * Class ProgramaEstudoController
 * @package App\Http\Controllers\API
 */

class ProgramaEstudoAPIController extends AppBaseController
{
    /** @var  ProgramaEstudoRepository */
    private $programaEstudoRepository;
    private $objetoPrograma;

    public function __construct(ProgramaEstudoRepository $programaEstudoRepo, ProgramaEstudo $programa)
    {
        $this->programaEstudoRepository = $programaEstudoRepo;
        $this->objetoPrograma = $programa;

    }

    /**
     * Display a listing of the ProgramaEstudo.
     * GET|HEAD /programaEstudos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $assuntos = $this->objetoPrograma->with(['programaAssuntos'])->get();

        return response()->json($assuntos);
    }


    /**
     * Store a newly created ProgramaEstudo in storage.
     * POST /programaEstudos
     *
     * @param CreateProgramaEstudoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProgramaEstudoAPIRequest $request)
    {
        $input = $request->all();

        $programaEstudo = $this->programaEstudoRepository->create($input);

        return $this->sendResponse($programaEstudo->toArray(), 'Programa Estudo saved successfully');
    }

    /**
     * Display the specified ProgramaEstudo.
     * GET|HEAD /programaEstudos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProgramaEstudo $programaEstudo */
        $programaEstudo = $this->programaEstudoRepository->find($id);

        if (empty($programaEstudo)) {
            return $this->sendError('Programa Estudo not found');
        }

        return $this->sendResponse($programaEstudo->toArray(), 'Programa Estudo retrieved successfully');
    }

    /**
     * Update the specified ProgramaEstudo in storage.
     * PUT/PATCH /programaEstudos/{id}
     *
     * @param int $id
     * @param UpdateProgramaEstudoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProgramaEstudoAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProgramaEstudo $programaEstudo */
        $programaEstudo = $this->programaEstudoRepository->find($id);

        if (empty($programaEstudo)) {
            return $this->sendError('Programa Estudo not found');
        }

        $programaEstudo = $this->programaEstudoRepository->update($input, $id);

        return $this->sendResponse($programaEstudo->toArray(), 'ProgramaEstudo updated successfully');
    }

    /**
     * Remove the specified ProgramaEstudo from storage.
     * DELETE /programaEstudos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProgramaEstudo $programaEstudo */
        $programaEstudo = $this->programaEstudoRepository->find($id);

        if (empty($programaEstudo)) {
            return $this->sendError('Programa Estudo not found');
        }

        $programaEstudo->delete();

        return $this->sendSuccess('Programa Estudo deleted successfully');
    }
}
