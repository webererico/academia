<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Pessoa;
use Carbon\Carbon;
use App\Cliente;
use App\Treino;
use App\Equipamento;
use App\Profissional;
use App\Endereco;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function login(Request $request){
        $cpf = $request->input('cpf');
        
        $pessoa = Pessoa::where('cpf', $cpf)->first();

        if (!isset($pessoa)) {
            return redirect('/login');
        }

        $pass = Hash::check($request->input('password'), $pessoa->senha);

        if (isset($pessoa) && $pass == true) {
            if ($pessoa->nivel == "1") {
                $admin = false;
                return view('home', compact('admin', 'pessoa'));

            } elseif ($pessoa->nivel == 2) {
                $count_equipamento = Equipamento::all()->count();
                $count_cliente = Cliente::all()->count();
                $count_profissional = Profissional::all()->count();
                $count_treino = Treino::all()->count();
                $admin = true;
                return view('home', compact('admin', 'pessoa', 'count_equipamento', 'count_cliente', 'count_profissional', 'count_treino'));
            }
        }
        if (!isset($pessoa)) {
            return redirect('/login');
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'cpf' =>['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);    

        $endereco = Endereco::create([
            'rua' => $request->input('street'),
            'numero' => $request->input('number'),
            'BAIRRO' => $request->input('neibor'),
            'complemento' => $request->input('comple'),
            'cep' => $request->input('cep'),
        ]);

        
       $pessoa =  Pessoa::create([
            'nome' => $request->input('name'),
            'cpf' => $request->input('cpf'),
            'dataNascimento' => $request->input('birth'),
            'nivel'=> 1,
            'senha' => Hash::make($request->input('password')),
            'idEndereco' => $endereco->idEndereco,
        ]);
        $matricula = hexdec( md5($request->input['cpf']));
        Cliente::create([
            'matricula'=> $matricula,
            'dataInicio'=>  Carbon::now(),
            'statusPagamento'=> 1,
            'idPessoa' => $pessoa->idPessoa
        ]);

        return redirect ('/login');
    }
}
