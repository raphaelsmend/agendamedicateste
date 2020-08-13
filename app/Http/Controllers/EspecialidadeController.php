<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEspecialidadeRequest;
use App\Http\Requests\UpdateEspecialidadeRequest;
use App\Repositories\EspecialidadeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class EspecialidadeController extends AppBaseController
{
    /** @var  EspecialidadeRepository */
    private $especialidadeRepository;

    public function __construct(EspecialidadeRepository $especialidadeRepo)
    {
        $this->especialidadeRepository = $especialidadeRepo;
    }

    /**
     * Display a listing of the Especialidade.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $especialidades = $this->especialidadeRepository->paginate(10);

        return view('especialidades.index')
            ->with('especialidades', $especialidades);
    }

    /**
     * Show the form for creating a new Especialidade.
     *
     * @return Response
     */
    public function create()
    {
        return view('especialidades.create');
    }

    /**
     * Store a newly created Especialidade in storage.
     *
     * @param CreateEspecialidadeRequest $request
     *
     * @return Response
     */
    public function store(CreateEspecialidadeRequest $request)
    {
        $input = $request->all();

        $especialidade = $this->especialidadeRepository->create($input);

        Flash::success('Especialidade salva com sucesso.');

        return redirect(route('especialidades.index'));
    }

    /**
     * Display the specified Especialidade.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $especialidade = $this->especialidadeRepository->find($id);

        if (empty($especialidade)) {
            Flash::error('Especialidade não encontrada');

            return redirect(route('especialidades.index'));
        }

        return view('especialidades.show')->with('especialidade', $especialidade);
    }

    /**
     * Show the form for editing the specified Especialidade.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $especialidade = $this->especialidadeRepository->find($id);

        if (empty($especialidade)) {
            Flash::error('Especialidade não encontrada');

            return redirect(route('especialidades.index'));
        }

        return view('especialidades.edit')->with('especialidade', $especialidade);
    }

    /**
     * Update the specified Especialidade in storage.
     *
     * @param int $id
     * @param UpdateEspecialidadeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEspecialidadeRequest $request)
    {
        $especialidade = $this->especialidadeRepository->find($id);

        if (empty($especialidade)) {
            Flash::error('Especialidade não encontrada');

            return redirect(route('especialidades.index'));
        }

        $especialidade = $this->especialidadeRepository->update($request->all(), $id);

        Flash::success('Especialidade atualizada com sucesso.');

        return redirect(route('especialidades.index'));
    }

    /**
     * Remove the specified Especialidade from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $especialidade = $this->especialidadeRepository->find($id);

        if (empty($especialidade)) {
            Flash::error('Especialidade não encontrada');

            return redirect(route('especialidades.index'));
        }

        $this->especialidadeRepository->delete($id);

        Flash::success('Especialidade Excluída com sucesso.');

        return redirect(route('especialidades.index'));
    }
}
