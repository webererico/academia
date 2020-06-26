<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Pessoa;
use Carbon\Carbon;
use App\Cliente;
use App\Endereco;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'cpf' =>['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $endereco = Endereco::create([
            'rua' => $data['street'],
            'numero' => $data['number'],
            'BAIRRO' => $data['neibor'],
            'complemento' => $data['comple'],
            'cep' => $data['cep'],
        ]);

        
       $pessoa =  Pessoa::create([
            'nome' => $data['name'],
            'cpf' => $data['cpf'],
            'dataNascimento' => $data['birth'],
            'nivel'=> 1,
            // 'senha'=> $data['password'],
            'senha' => Hash::make($data['password']),
            'idEndereco' => $endereco->idEndereco,
        ]);
        $matricula = hexdec( md5($data['cpf']));
        return Cliente::create([
            'matricula'=> $matricula,
            'dataInicio'=>  Carbon::now(),
            'statusPagamento'=> 1,
            'idPessoa' => $pessoa->idPessoa
        ]);
    }
}
