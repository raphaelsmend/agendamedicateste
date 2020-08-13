<?php

namespace App\Repositories;

use App\Models\Medicos;
use App\Repositories\BaseRepository;

/**
 * Class MedicosRepository
 * @package App\Repositories
 * @version August 13, 2020, 6:03 pm UTC
*/

class MedicosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'crm',
        'especialidade_id'
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
        return Medicos::class;
    }
}
