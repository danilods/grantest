<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBancasAPIRequest;
use App\Http\Requests\API\UpdateBancasAPIRequest;
use App\Models\Bancas;
use App\Repositories\BancasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BancasController
 * @package App\Http\Controllers\API
 */

class BancasAPIController extends AppBaseController
{
    /** @var  BancasRepository */
    private $bancasRepository;
    private $objetoBanca;

    public function __construct(BancasRepository $bancasRepo, Bancas $bancas)
    {
        $this->bancasRepository = $bancasRepo;
        $this->objetoBanca = $bancas;
    }

    /**
     * Display a listing of the Bancas.
     * GET|HEAD /bancas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $bancas = $this->objetoBanca->paginate('10');

        return response()->json($bancas);
    }

    /**
     * Store a newly created Bancas in storage.
     * POST /bancas
     *
     * @param CreateBancasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBancasAPIRequest $request)
    {
        $input = $request->all();

        $bancas = $this->bancasRepository->create($input);

        return response()->json($bancas);
    }

    /**
     * Display the specified Bancas.
     * GET|HEAD /bancas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Bancas $bancas */
        $bancas = $this->bancasRepository->find($id);

        if (empty($bancas)) {
            return $this->sendError('Bancas not found');
        }

        return response()->json($bancas);
    }

    /**
     * Update the specified Bancas in storage.
     * PUT/PATCH /bancas/{id}
     *
     * @param int $id
     * @param UpdateBancasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBancasAPIRequest $request)
    {
        $input = $request->all();

        /** @var Bancas $bancas */
        $bancas = $this->bancasRepository->find($id);

        if (empty($bancas)) {
            return $this->sendError('Bancas not found');
        }

        $bancas = $this->bancasRepository->update($input, $id);

        return response()->json($bancas);
    }

    /**
     * Remove the specified Bancas from storage.
     * DELETE /bancas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Bancas $bancas */
        $bancas = $this->bancasRepository->find($id);

        if (empty($bancas)) {
            return $this->sendError('Bancas not found');
        }

        $bancas->this->delete();

        return $this->sendSuccess('Bancas deleted successfully');
    }
}
