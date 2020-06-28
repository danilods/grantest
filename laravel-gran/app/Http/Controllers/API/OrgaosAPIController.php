<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOrgaosAPIRequest;
use App\Http\Requests\API\UpdateOrgaosAPIRequest;
use App\Models\Orgaos;
use App\Repositories\OrgaosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OrgaosController
 * @package App\Http\Controllers\API
 */

class OrgaosAPIController extends AppBaseController
{
    /** @var  OrgaosRepository */
    private $orgaosRepository;
    private $objetoOrgao;

    public function __construct(OrgaosRepository $orgaosRepo, Orgaos $orgaos)
    {
        $this->orgaosRepository = $orgaosRepo;
        $this->objetoOrgao = $orgaos;
    }

    /**
     * Display a listing of the Orgaos.
     * GET|HEAD /orgaos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $orgaos = $this->objetoOrgao->with(['questoes'])->paginate('10');

        return response()->json($orgaos);
    }

    /**
     * Store a newly created Orgaos in storage.
     * POST /orgaos
     *
     * @param CreateOrgaosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOrgaosAPIRequest $request)
    {
        $input = $request->all();

        $orgaos = $this->orgaosRepository->create($input);

        return response()->json($orgaos);
    }

    /**
     * Display the specified Orgaos.
     * GET|HEAD /orgaos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Orgaos $orgaos */
        $orgaos = $this->orgaosRepository->find($id);

        if (empty($orgaos)) {
            return $this->sendError('Orgaos not found');
        }

        return response()->json($orgaos);
    }

    /**
     * Update the specified Orgaos in storage.
     * PUT/PATCH /orgaos/{id}
     *
     * @param int $id
     * @param UpdateOrgaosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrgaosAPIRequest $request)
    {
        $input = $request->all();

        /** @var Orgaos $orgaos */
        $orgaos = $this->orgaosRepository->find($id);

        if (empty($orgaos)) {
            return $this->sendError('Orgaos not found');
        }

        $orgaos = $this->orgaosRepository->update($input, $id);

        return response()->json($orgaos);
    }

    /**
     * Remove the specified Orgaos from storage.
     * DELETE /orgaos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Orgaos $orgaos */
        $orgaos = $this->orgaosRepository->find($id);

        if (empty($orgaos)) {
            return $this->sendError('Orgaos not found');
        }

        $orgaos->this->delete();

        return $this->sendSuccess('Orgaos deleted successfully');
    }
}
