<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMedicosRequest;
use App\Http\Requests\UpdateMedicosRequest;
use App\Repositories\MedicosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;
class MedicosController extends AppBaseController
{
    /** @var  MedicosRepository */
    private $medicosRepository;

    public function __construct(MedicosRepository $medicosRepo)
    {
        $this->medicosRepository = $medicosRepo;
    }

    /**
     * Display a listing of the Medicos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $medicos = $this->medicosRepository->paginate(10);

        return view('medicos.index')
            ->with('medicos', $medicos);
    }

    /**
     * Show the form for creating a new Medicos.
     *
     * @return Response
     */
    public function create()
    {
        $especialidade = DB::table('especialidade')->get();
        
        $especialidadeArray = array();
        $especialidadeArray[''] = 'Selecione';

        if ( count($especialidade) > 0 ){
            foreach ($especialidade as $key => $value) {
                $especialidadeArray[$value->id] = $value->nome;
            }
        }

        return view('medicos.create')->with('especialidadeArray', $especialidadeArray);
    }

    /**
     * Store a newly created Medicos in storage.
     *
     * @param CreateMedicosRequest $request
     *
     * @return Response
     */
    public function store(CreateMedicosRequest $request)
    {
        $input = $request->all();

        $medicos = $this->medicosRepository->create($input);

        Flash::success('Médico salvo com sucesso.');

        return redirect(route('medicos.index'));
    }

    /**
     * Display the specified Medicos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $medicos = $this->medicosRepository->find($id);

        if (empty($medicos)) {
            Flash::error('Médico não encontrado');

            return redirect(route('medicos.index'));
        }

        return view('medicos.show')->with('medicos', $medicos);
    }

    /**
     * Show the form for editing the specified Medicos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $medicos = $this->medicosRepository->find($id);

        if (empty($medicos)) {
            Flash::error('Médico não encontrado');

            return redirect(route('medicos.index'));
        }

        $especialidade = DB::table('especialidade')->get();
        
        $especialidadeArray = array();
        $especialidadeArray[''] = 'Selecione';

        if ( count($especialidade) > 0 ){
            foreach ($especialidade as $key => $value) {
                $especialidadeArray[$value->id] = $value->nome;
            }
        }

        return view('medicos.edit')
        ->with('especialidadeArray', $especialidadeArray)
        ->with('medicos', $medicos);
    }

    /**
     * Update the specified Medicos in storage.
     *
     * @param int $id
     * @param UpdateMedicosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMedicosRequest $request)
    {
        $medicos = $this->medicosRepository->find($id);

        if (empty($medicos)) {
            Flash::error('Médico não encontrado');

            return redirect(route('medicos.index'));
        }

        $medicos = $this->medicosRepository->update($request->all(), $id);

        Flash::success('Médico atualizado com sucesso.');

        return redirect(route('medicos.index'));
    }

    /**
     * Remove the specified Medicos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $medicos = $this->medicosRepository->find($id);

        if (empty($medicos)) {
            Flash::error('Médico não encontrado');

            return redirect(route('medicos.index'));
        }

        $this->medicosRepository->delete($id);

        Flash::success('Médico excluído com sucesso.');

        return redirect(route('medicos.index'));
    }
}
