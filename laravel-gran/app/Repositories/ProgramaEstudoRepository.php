<?php

namespace App\Repositories;

use App\Models\ProgramaEstudo;

use App\Repositories\BaseRepository;

/**
 * Class ProgramaEstudoRepository
 * @package App\Repositories
 * @version June 28, 2020, 12:00 am -03
*/

class ProgramaEstudoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome_programa',
        'foco_programa',
        'meta_diaria',
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
        return ProgramaEstudo::class;
    }


}
