<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateItensQuestoesAPIRequest;
use App\Http\Requests\API\UpdateItensQuestoesAPIRequest;
use App\Models\ItensQuestoes;
use App\Repositories\ItensQuestoesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ItensQuestoesController
 * @package App\Http\Controllers\API
 */

class ItensQuestoesAPIController extends AppBaseController
{
    /** @var  ItensQuestoesRepository */
    private $itensQuestoesRepository;

    public function __construct(ItensQuestoesRepository $itensQuestoesRepo)
    {
        $this->itensQuestoesRepository = $itensQuestoesRepo;
    }

    /**
     * Display a listing of the ItensQuestoes.
     * GET|HEAD /itensQuestoes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $itensQuestoes = $this->itensQuestoesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return response()->json($itensQuestoes);
    }

    /**
     * Store a newly created ItensQuestoes in storage.
     * POST /itensQuestoes
     *
     * @param CreateItensQuestoesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateItensQuestoesAPIRequest $request)
    {
        $input = $request->all();

        $itensQuestoes = $this->itensQuestoesRepository->create($input);

        return response()->json($itensQuestoes);
    }

    /**
     * Display the specified ItensQuestoes.
     * GET|HEAD /itensQuestoes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ItensQuestoes $itensQuestoes */
        $itensQuestoes = $this->itensQuestoesRepository->find($id);

        if (empty($itensQuestoes)) {
            return $this->sendError('Itens Questoes not found');
        }

        return response()->json($itensQuestoes);
    }

    /**
     * Update the specified ItensQuestoes in storage.
     * PUT/PATCH /itensQuestoes/{id}
     *
     * @param int $id
     * @param UpdateItensQuestoesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateItensQuestoesAPIRequest $request)
    {
        $input = $request->all();

        /** @var ItensQuestoes $itensQuestoes */
        $itensQuestoes = $this->itensQuestoesRepository->find($id);

        if (empty($itensQuestoes)) {
            return $this->sendError('Itens Questoes not found');
        }

        $itensQuestoes = $this->itensQuestoesRepository->update($input, $id);

        return response()->json($itensQuestoes);
    }

    /**
     * Remove the specified ItensQuestoes from storage.
     * DELETE /itensQuestoes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ItensQuestoes $itensQuestoes */
        $itensQuestoes = $this->itensQuestoesRepository->find($id);

        if (empty($itensQuestoes)) {
            return $this->sendError('Itens Questoes not found');
        }

        $itensQuestoes->this->delete();

        return $this->sendSuccess('Itens Questoes deleted successfully');
    }
}
