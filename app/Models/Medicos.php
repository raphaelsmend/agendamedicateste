<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Medicos
 * @package App\Models
 * @version August 13, 2020, 6:03 pm UTC
 *
 * @property integer $nome
 * @property integer $crm
 * @property integer $especialidade_id
 */
class Medicos extends Model
{
    use SoftDeletes;

    public $table = 'medico';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nome',
        'crm',
        'especialidade_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'crm' => 'integer',
        'especialidade_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required|string',
        'crm' => 'nullable|integer',
        'especialidade_id' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function Especialidade(){
        return $this->hasOne('App\Models\Especialidade', 'id', 'especialidade_id');
    }
}
