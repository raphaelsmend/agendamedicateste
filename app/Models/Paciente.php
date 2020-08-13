<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Paciente
 * @package App\Models
 * @version August 13, 2020, 6:29 pm UTC
 *
 * @property string $nome
 * @property string $datanascimento
 * @property string $genero
 * @property string $telefone1
 * @property string $telefone2
 * @property string $cep
 * @property string $endereco
 * @property integer $numero
 * @property string $complemento
 * @property string $bairro
 * @property string $cidade
 * @property string $uf
 */
class Paciente extends Model
{
    use SoftDeletes;

    public $table = 'paciente';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nome',
        'datanascimento',
        'genero',
        'telefone1',
        'telefone2',
        'cep',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'uf'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'datanascimento' => 'date',
        'genero' => 'string',
        'telefone1' => 'string',
        'telefone2' => 'string',
        'cep' => 'string',
        'endereco' => 'string',
        'numero' => 'integer',
        'complemento' => 'string',
        'bairro' => 'string',
        'cidade' => 'string',
        'uf' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'nullable|string|max:100',
        'datanascimento' => 'nullable',
        'genero' => 'nullable|string|max:1',
        'telefone1' => 'nullable|string|max:14',
        'telefone2' => 'nullable|string|max:15',
        'cep' => 'nullable|string|max:9',
        'endereco' => 'nullable|string|max:200',
        'numero' => 'nullable|integer',
        'complemento' => 'nullable|string|max:100',
        'bairro' => 'nullable|string|max:100',
        'cidade' => 'nullable|string|max:100',
        'uf' => 'nullable|string|max:2',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
