<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsuariosRequest;
use App\Http\Requests\UpdateUsuariosRequest;
use App\Repositories\UsuariosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\Usuarios;

class UsuariosController extends AppBaseController
{
    /** @var  UsuariosRepository */
    private $usuariosRepository;

    public function __construct(UsuariosRepository $usuariosRepo)
    {
        $this->usuariosRepository = $usuariosRepo;
    }

    /**
     * Display a listing of the Usuarios.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $usuarios = $this->usuariosRepository->paginate(10);

        return view('usuarios.index')
            ->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new Usuarios.
     *
     * @return Response
     */
    public function create()
    {
        $trnMode = 'create';
        return view('usuarios.create', compact('trnMode'));
    }

    /**
     * Store a newly created Usuarios in storage.
     *
     * @param CreateUsuariosRequest $request
     *
     * @return Response
     */
    public function store(CreateUsuariosRequest $request)
    {
        $input = $request->all();

        // $usuarios = $this->usuariosRepository->create($input);
        $nome            = $request->input('nome');
        $email            = $request->input('email');
        $senha            = $request->input('senha');
        $senhanova        = $request->input('senhanova');
        $enhanovaconfirma = $request->input('senhanovaconfirma');

        if ( $enhanovaconfirma == $senha ){

            $senhaCriptografada = md5($senha);

            $Usuarios = new Usuarios();
    
            $Usuarios->nome = $nome;
            $Usuarios->email = $email;
            $Usuarios->senha = $senhaCriptografada;
            $Usuarios->save();

            Flash::success('Usuário criado com Sucesso.');
            return redirect(route('usuarios.index'));
            
        }else{
            Flash::error('Senhas diverventes.');
            return redirect(route('usuarios.create'));
        }

        Flash::success('Usuário salvo com sucesso.');

        return redirect(route('usuarios.index'));
    }

    /**
     * Display the specified Usuarios.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $usuarios = $this->usuariosRepository->find($id);

        if (empty($usuarios)) {
            Flash::error('Usuário não encontrado');

            return redirect(route('usuarios.index'));
        }

        return view('usuarios.show')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for editing the specified Usuarios.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $usuarios = $this->usuariosRepository->find($id);

        if (empty($usuarios)) {
            Flash::error('Usuário não encontrado');

            return redirect(route('usuarios.index'));
        }
        $trnMode = 'edit';
        return view('usuarios.edit', compact('trnMode'))->with('usuarios', $usuarios);
    }

    /**
     * Update the specified Usuarios in storage.
     *
     * @param int $id
     * @param UpdateUsuariosRequest $request
     *
     * @return Response
     */
    public function update($email, UpdateUsuariosRequest $request)
    {
        $usuarios = $this->usuariosRepository->find($email);
        $trnMode = 'edit';
        if (empty($usuarios)) {
            Flash::error('Usuário não encontrado');

            return redirect(route('usuarios.index'));
        }
        $input = $request->all();
        // dd($input);
        // $usuarios = $this->usuariosRepository->update($request->all(), $id);
        $nome             = $request->input('nome');
        $email            = $request->input('email');
        $senha            = $request->input('senha');
        $senhanova        = $request->input('senhanova');
        $enhanovaconfirma = $request->input('senhanovaconfirma');
        if ($enhanovaconfirma == "" && $senhanova == "") {
            if ( strlen($nome) > 0 ){
                $usuarios = Usuarios::where('email', '=', $email)
                ->update(['nome'=>$nome]);
            }else {
                Flash::error('Usuário não informado.');
                return view('usuarios.edit', compact(['usuarios', 'trnMode']));
            }
            
        }else{

            if ( $enhanovaconfirma == $senhanova ){
                
                $senhaCriptografada = md5($senha);
                $senhaNovaCriptografada = md5($senhanova);
                $usuarios = Usuarios::where('email', '=', $email)
                ->first();
                // dd($Usuarios);
                if( isset($usuarios) ){
                    if ($usuarios->senha != $senhaCriptografada) {
                        // dd('Senha Inválida.');
                        Flash::error('Senha Inválida.');
                        return view('usuarios.edit', compact(['usuarios', 'trnMode']));
                    }
                    $usuarios = Usuarios::where('email', '=', $email)
                    ->update(['senha'=>$senhaNovaCriptografada, 'nome'=>$nome]);
                    Flash::success('Dados do Usuário alterado com Sucesso.');
                    return redirect(route('usuarios.index'));
                }else{
                    Flash::error('E-mail Não Encontrado.');
                    return redirect(route('usuarios.index'));
                }
            }else{
                Flash::error('Senhas diverventes.');
                return redirect(route('usuarios.index'));
            }
        }
        
        Flash::success('Usuário atualizado com sucesso.');

        return redirect(route('usuarios.index'));
    }

    /**
     * Remove the specified Usuarios from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $usuarios = $this->usuariosRepository->find($id);

        if (empty($usuarios)) {
            Flash::error('Usuário não encontrado');

            return redirect(route('usuarios.index'));
        }

        $this->usuariosRepository->delete($id);

        Flash::success('Usuário excluído com sucesso.');

        return redirect(route('usuarios.index'));
    }
}
