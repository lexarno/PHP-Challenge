<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Session;
use App\User;
use App\Plan;

class UserController extends Controller
{
    public function index() 
    {
        $user = Session::has('user_id') ? Session::get('user_id') : null;
        if(empty($user)){
            return view('user.index');
        }else{
            return redirect()->route('user.plans');
        }
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();
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
                Session::put('user_id', $create->id);
                return response()->json(['ret' => 1, 'msg' => 'Cadastro realizado com sucesso!', 'url' => route('user.plans')],200);
            } else {
                return response()->json(['ret' => 0, 'msg' => 'Ops, ocorreu um erro no cadastro. Por favor tente mais tarde.'],500);
            }
        }catch (\Exception $e){
            return response()->json(['ret' => 0, 'msg' => 'Ops, ocorreu um erro no cadastro. Por favor tente mais tarde.'],500);
        }
    }

    public function plans()
    {
        $user_id = Session::has('user_id') ? Session::get('user_id') : null;
        if(empty($user_id)){
            return redirect()->route('user.index');
        }else{
            $plans = Plan::all();
            $user = User::find($user_id);
            return view('plan.index', compact('user','plans'));
        }
    }

    public function success()
    {
        return view('user.success');
    }

    public function error()
    {

    }
}
