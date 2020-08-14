<?php

namespace App\Repositories;

use App\Models\Agendamento;
use App\Repositories\BaseRepository;

/**
 * Class AgendamentoRepository
 * @package App\Repositories
 * @version August 14, 2020, 1:23 am UTC
*/

class AgendamentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'medico_id',
        'paciente_id',
        'dataagenda',
        'horaagenda'
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
        return Agendamento::class;
    }
}
