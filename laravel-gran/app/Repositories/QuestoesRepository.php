<?php

namespace App\Repositories;

use App\Models\Questoes;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class QuestoesRepository
 * @package App\Repositories
 * @version June 25, 2020, 2:42 pm -03
*/

class QuestoesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cod_questao',
        'enunciado',
        'modalidade',
        'ano',
        'assunto_id',
        'banca_id',
        'orgao_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Questoes::class;
    }

    public function programaQuestoes($bancaId, $orgaoId){
        $resultadoPrograma = DB::table('questoes')
            ->join('assuntos', 'questoes.assunto_id', '=', 'assuntos.id')
                ->select(DB::raw('count(*) as num_questoes, raiz_id as root')
                , 'assuntos.titulo_assunto', 'assuntos.id')
                    ->where('questoes.banca_id', '=', $bancaId)
                        ->where('orgao_id', '=', $orgaoId)
                    ->groupBy('assuntos.id')
                        ->get();
                        return response()->json($resultadoPrograma);
                    }

}
