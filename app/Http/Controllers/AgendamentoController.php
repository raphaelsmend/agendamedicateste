<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAgendamentoRequest;
use App\Http\Requests\UpdateAgendamentoRequest;
use App\Repositories\AgendamentoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;
use App\Models\Agendamento;
class AgendamentoController extends AppBaseController
{
    /** @var  AgendamentoRepository */
    private $agendamentoRepository;

    public function __construct(AgendamentoRepository $agendamentoRepo)
    {
        $this->agendamentoRepository = $agendamentoRepo;
    }

    /**
     * Display a listing of the Agendamento.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $agendamentos = $this->agendamentoRepository->paginate(10);
        $agendamentos = Agendamento::orderBy('dataagenda', 'asc')
        ->paginate(10);
        // dd($agendamentos);
        return view('agendamentos.index')
            ->with('agendamentos', $agendamentos);
    }

    /**
     * Show the form for creating a new Agendamento.
     *
     * @return Response
     */
    public function create()
    {
        $medicos = DB::table('medico')->get();
        
        $medicosArray = array();
        $medicosArray[''] = 'Selecione';
        if( count($medicos) > 0 ){
            foreach ($medicos as $key => $value) {
                $medicosArray[$value->id] = $value->nome;
            }
        }

        $pacientes = DB::table('paciente')->get();
        
        $pacientesArray = array();
        $pacientesArray[''] = 'Selecione';
        if( count($pacientes) > 0 ){
            foreach ($pacientes as $key => $value) {
                $pacientesArray[$value->id] = $value->nome;
            }
        }
        
        return view('agendamentos.create')
        ->with('pacientesArray', $pacientesArray)
        ->with('medicosArray', $medicosArray);
    }

    /**
     * Store a newly created Agendamento in storage.
     *
     * @param CreateAgendamentoRequest $request
     *
     * @return Response
     */
    public function store(CreateAgendamentoRequest $request)
    {
        $input = $request->all();

        $agendamento = $this->agendamentoRepository->create($input);

        Flash::success('Agendamento salvo com sucesso.');

        return redirect(route('agendamentos.index'));
    }

    /**
     * Display the specified Agendamento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $agendamento = $this->agendamentoRepository->find($id);

        if (empty($agendamento)) {
            Flash::error('Agendamento não encontrado');

            return redirect(route('agendamentos.index'));
        }

        return view('agendamentos.show')->with('agendamento', $agendamento);
    }

    /**
     * Show the form for editing the specified Agendamento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $agendamento = $this->agendamentoRepository->find($id);

        if (empty($agendamento)) {
            Flash::error('Agendamento não encontrado');

            return redirect(route('agendamentos.index'));
        }

        return view('agendamentos.edit')->with('agendamento', $agendamento);
    }

    /**
     * Update the specified Agendamento in storage.
     *
     * @param int $id
     * @param UpdateAgendamentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgendamentoRequest $request)
    {
        $agendamento = $this->agendamentoRepository->find($id);

        if (empty($agendamento)) {
            Flash::error('Agendamento não encontrado');

            return redirect(route('agendamentos.index'));
        }

        $agendamento = $this->agendamentoRepository->update($request->all(), $id);

        Flash::success('Agendamento atualizado com sucesso.');

        return redirect(route('agendamentos.index'));
    }

    /**
     * Remove the specified Agendamento from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $agendamento = $this->agendamentoRepository->find($id);

        if (empty($agendamento)) {
            Flash::error('Agendamento não encontrado');

            return redirect(route('agendamentos.index'));
        }

        $this->agendamentoRepository->delete($id);

        Flash::success('Agendamento ecluído com sucesso.');

        return redirect(route('agendamentos.index'));
    }
}
