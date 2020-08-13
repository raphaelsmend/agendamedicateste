<?php

namespace App\Repositories;

use App\Models\Especialidade;
use App\Repositories\BaseRepository;

/**
 * Class EspecialidadeRepository
 * @package App\Repositories
 * @version August 13, 2020, 4:00 pm UTC
*/

class EspecialidadeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome'
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
        return Especialidade::class;
    }
}
