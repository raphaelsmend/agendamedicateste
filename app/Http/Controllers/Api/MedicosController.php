<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class MedicosController extends Controller
{
    public function listarMedicos(){
        $medicos = DB::table('medico')->get();
        if ( count($medicos) == 0 ){
            $retorno['erro'] = 'Nenhum registro encontrado.';
            return json_encode($retorno);
        }
        return json_encode($medicos);
    }
    
}
