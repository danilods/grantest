<?php

namespace App\Repositories;

use App\Models\Assuntos;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class AssuntosRepository
 * @package App\Repositories
 * @version June 25, 2020, 2:42 pm -03
*/

class AssuntosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo_assunto',
        'raiz_id'
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
        return Assuntos::class;
    }

    public function assuntosQuestoes()
    {
        $resultadoPrograma =  $resultadoPrograma = DB::table('assuntos')
            ->join('questoes', 'assuntos.id', '=', 'questoes.assunto_id')
            ->select(DB::raw('count(*) as num_questoes, assuntos.titulo_assunto, assuntos.id, assuntos.raiz_id'))
            ->where('assuntos.raiz_id', '=', null)

            ->groupBy('assuntos.id')
            ->get();


        return response()->json($resultadoPrograma);
    }
}
