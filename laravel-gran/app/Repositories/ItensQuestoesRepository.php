<?php

namespace App\Repositories;

use App\Models\ItensQuestoes;
use App\Repositories\BaseRepository;

/**
 * Class ItensQuestoesRepository
 * @package App\Repositories
 * @version June 25, 2020, 2:43 pm -03
*/

class ItensQuestoesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descricao_item',
        'correcao_item',
        'questao_id'
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
        return ItensQuestoes::class;
    }
}
