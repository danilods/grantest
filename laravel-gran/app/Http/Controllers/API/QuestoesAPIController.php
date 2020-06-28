<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateQuestoesAPIRequest;
use App\Http\Requests\API\UpdateQuestoesAPIRequest;
use App\Models\Questoes;
use App\Repositories\QuestoesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class QuestoesController
 * @package App\Http\Controllers\API
 */

class QuestoesAPIController extends AppBaseController
{
    /** @var  QuestoesRepository */
    private $questoesRepository;
    private $objetoQuestao;

    public function __construct(QuestoesRepository $questoesRepo, Questoes $questoes)
    {
        $this->questoesRepository = $questoesRepo;
        $this->objetoQuestao = $questoes;
    }

    /**
     * Display a listing of the Questoes.
     * GET|HEAD /questoes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, $idBanca=null, $idOrgao=null)
    {
        if(($idBanca==null) || ($idOrgao==null)){
            $questoes = $this->objetoQuestao->with(['assuntos', 'bancas', 'orgaos', 'itemQuestoes'])->paginate('10');
            return response()->json($questoes);

        } else {
            $program = $this->questoesRepository->programaQuestoes($idBanca, $idOrgao);
            return response()->json($program);
        }


    }



    /**
     * Store a newly created Questoes in storage.
     * POST /questoes
     *
     * @param CreateQuestoesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateQuestoesAPIRequest $request)
    {
        $input = $request->all();

        $questoes = $this->questoesRepository->create($input);

        return response()->json($questoes);
    }

    /**
     * Display the specified Questoes.
     * GET|HEAD /questoes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Questoes $questoes */
        $questoes = $this->questoesRepository->find($id);

        if (empty($questoes)) {
            return $this->sendError('Questoes not found');
        }

        return response()->json($questoes);
    }

    /**
     * Update the specified Questoes in storage.
     * PUT/PATCH /questoes/{id}
     *
     * @param int $id
     * @param UpdateQuestoesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuestoesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Questoes $questoes */
        $questoes = $this->questoesRepository->find($id);

        if (empty($questoes)) {
            return $this->sendError('Questoes not found');
        }

        $questoes = $this->questoesRepository->update($input, $id);

        return response()->json($questoes);
    }

    /**
     * Remove the specified Questoes from storage.
     * DELETE /questoes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Questoes $questoes */
        $questoes = $this->questoesRepository->find($id);

        if (empty($questoes)) {
            return $this->sendError('Questoes not found');
        }

        $questoes->this->delete();

        return $this->sendSuccess('Questoes deleted successfully');
    }
}
