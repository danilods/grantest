<?php

namespace App\Repositories;

use App\Models\Orgaos;
use App\Repositories\BaseRepository;

/**
 * Class OrgaosRepository
 * @package App\Repositories
 * @version June 25, 2020, 2:42 pm -03
*/

class OrgaosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'sigla_orgao'
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
        return Orgaos::class;
    }
}
