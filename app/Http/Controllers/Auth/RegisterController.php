<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'cpf' => ['required', 'string'],
            'cep' => ['required', 'string'],
            'address' => ['required', 'string'],
            'number' => ['required', 'int'],
            'district' => ['required', 'string'],
            'uf' => ['required', 'string', 'max:2'],
            'city' => ['required', 'string'],
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
        try{
            $create = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'cpf' => $data['cpf'],
                'password' => Hash::make($data['password']),
                'cep' => $data['cep'],
                'address' => $data['address'],
                'complement' => $data['complement'],
                'number' => $data['number'],
                'district' => $data['district'],
                'uf' => $data['uf'],
                'city' => $data['city'],
            ]);

            if($create){
                return response()->json(['ret' => 0, 'msg' => 'Cadastro realizado com sucesso!', 'url' => route('plans')],200);
            } else {
                return response()->json(['ret' => 0, 'msg' => 'Ops, ocorreu um erro no cadastro. Por favor tente mais tarde.'],500);
            }
        }catch (\Exception $e){
            return response()->json(['ret' => 0, 'msg' => 'Ops, ocorreu um erro no cadastro. Por favor tente mais tarde.'],500);
        }
    }
}
