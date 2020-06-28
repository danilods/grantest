<?php

namespace App\Repositories;

use App\Models\Bancas;
use App\Repositories\BaseRepository;

/**
 * Class BancasRepository
 * @package App\Repositories
 * @version June 25, 2020, 2:41 pm -03
*/

class BancasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome_banca'
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
        return Bancas::class;
    }
}
