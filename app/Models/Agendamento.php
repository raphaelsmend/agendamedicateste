<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Agendamento
 * @package App\Models
 * @version August 13, 2020, 6:25 pm UTC
 *
 * @property integer $medico_id
 * @property integer $paciente_id
 * @property string|\Carbon\Carbon $datahoraagenda
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
        'datahoraagenda'
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
        'datahoraagenda' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'medico_id' => 'required|integer',
        'paciente_id' => 'required|integer',
        'datahoraagenda' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
