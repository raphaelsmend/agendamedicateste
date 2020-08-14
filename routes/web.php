<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Usuarios;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    // return view('welcome');
    // dd('Route::get("/", function () {');
    return view('auth.login');
});

Route::post('/entrar', function(Request $request) {

    $request->session()->forget('Usuarios_login');
    $request->session()->forget('Usuarios_nome');
    $request->session()->forget('Usuarios_create_at');

    $input = $request->All();
    // dd($input);
    $email = $request->input('email');
    // echo '$email:'.$email.'<br>';
    $senha = $request->input('senha');
    // echo '$senha:'.$senha.'<br>';
    $senhaCriptografada = md5($senha);
    // echo '$senhaCriptografada:'.$senhaCriptografada.'<br>';
    // dd($email);
    // die;
    $Usuarios = Usuarios::where('email', '=', $email)
    ->first();
    // dd($Usuarios);
    if( isset($Usuarios) ){
        if ($Usuarios->senha != $senhaCriptografada) {
            Flash::error('Senha Inválida.');
            return view('auth.login');
        }
        // echo '$Usuarios->create_at:'.$Usuarios->created_at;
        // echo '$Usuarios->create_at:'. date('m-Y',strtotime($Usuarios->created_at));
        // die;
        $request->session()->put('Usuarios_login','SiM');
        $request->session()->put('Usuarios_nome',$Usuarios->nome);
        $request->session()->put('Usuarios_create_at',date('m/Y',strtotime($Usuarios->created_at)));
        return redirect()->action('HomeController@index');
        // return  view('welcome');
    }else{
        Flash::error('E-mail Não Encontrado.');
        return view('auth.login');
    }

// });
})->name('login.submit');

Route::get('/alterarSenha', function () {
    
    return view('auth.alterarSenha');
});

Route::post('/alterarSenha', function(Request $request) {
    $input = $request->All();
    // dd($input);
    $email            = $request->input('email');
    $senhaatual       = $request->input('senhaatual');
    $senhanova        = $request->input('senhanova');
    $senhanovaconfirma = $request->input('senhanovaconfirma');
    if ( $senhanovaconfirma == $senhanova ){

        $senhaCriptografada = md5($senhaatual);
        $senhaNovaCriptografada = md5($senhanova);

        $Usuarios = Usuarios::where('email', '=', $email)
        ->first();
        // dd($Usuarios);
        if( isset($Usuarios) ){
            if ($Usuarios->senha != $senhaCriptografada) {
                Flash::error('Senha Inválida.');
                return view('auth.login');
            }
            $Usuarios = Usuarios::where('email', '=', $email)
            ->update(['senha'=>$senhaNovaCriptografada]);

            Flash::success('Senha Alterada com Sucesso.');
            return view('auth.login');
        }else{
            Flash::error('E-mail Não Encontrado.');
            return view('auth.login');
        }
    }else{
        Flash::error('Senhas diverventes.');
        return view('auth.alterarSenha');
    }

})->name('senha.altera');

Route::get('/novoUsuario', function () {

    return view('auth.novoUsuario');
});
Route::post('/novoUsuario', function(Request $request) {
    // $input = $request->all();
    $nome              = $request->input('nome');
    $email             = $request->input('email');
    $senhanova         = $request->input('senhanova');
    $senhanovaconfirma = $request->input('senhanovaconfirma');
    if ( $senhanovaconfirma == $senhanova ){

        $senhaCriptografada = md5($senhanova);

        $Usuarios = new Usuarios();
        
        $Usuarios->nome = $nome;
        $Usuarios->email = $email;
        $Usuarios->senha = $senhaCriptografada;
        $Usuarios->save();

        Flash::success('Usuário criado com Sucesso.');
        return view('auth.login');
    }else{
        Flash::error('Senhas diverventes.');
        return view('auth.novoUsuario');
    }
})->name('senha.novo');

Route::get('/sair', function (Request $request) {
    $request->session()->forget('Usuarios_login');
    $request->session()->forget('Usuarios_nome');
    $request->session()->forget('Usuarios_create_at');
    
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->middleware('verified');

Route::resource('especialidades', 'EspecialidadeController');

Route::resource('medicos', 'MedicosController');

Route::resource('agendamentos', 'AgendamentoController');

Route::resource('pacientes', 'PacienteController');

Route::resource('usuarios', 'UsuariosController');