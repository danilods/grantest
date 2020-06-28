<?php

namespace App\Repositories;

use App\Models\Assuntos;
use App\Repositories\BaseRepository;

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
}
