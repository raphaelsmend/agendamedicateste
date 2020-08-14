<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Agendamento
 * @package App\Models
 * @version August 14, 2020, 1:23 am UTC
 *
 * @property integer $medico_id
 * @property integer $paciente_id
 * @property string $dataagenda
 * @property string $horaagenda
 */
class Agendamento extends Model
{
    use SoftDeletes;

    public $table = 'agendamento';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'medico_id',
        'paciente_id',
        'dataagenda',
        'horaagenda'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'medico_id' => 'integer',
        'paciente_id' => 'integer',
        'dataagenda' => 'date',
        'horaagenda' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'medico_id' => 'required|integer',
        'paciente_id' => 'required|integer',
        'dataagenda' => 'required',
        'horaagenda' => 'nullable|string|max:5',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function Medicos(){
        return $this->hasOne('App\Models\Medicos', 'id', 'medico_id');
    }
    public function Paciente(){
        return $this->hasOne('App\Models\Paciente', 'id', 'paciente_id');
    }
}
