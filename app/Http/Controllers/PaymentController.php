<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;
use App\Payment;
use App\User;
use Session;

class PaymentController extends Controller
{
    private $cards;

    public function __construct()
    {
       $this->cards = [
           ['card_number' => '4893111111111111', 'card_expiration' => '12/26', 'card_cvv' => '111', 'status' => 'always_active'],
           ['card_number' => '4893222222222222', 'card_expiration' => '12/23', 'card_cvv' => '222', 'status' => 'always_inactive'],
           ['card_number' => '4893333333333333', 'card_expiration' => '09/22', 'card_cvv' => '333', 'status' => 'random'],
       ];
    }

    public function index()
    {
        return Payment::all();
    }

    public function checkout(PaymentRequest $request)
    {
        $data = $request->all();

        if ($this->checkCard($data)){
            $user = User::find($data['user_id']);
            $user->update(['plan_id' => $data['plan_id']]);
            if($this->savePayment($data)){
                return response()->json(['ret' => 1, 'msg' => 'Pagamento realizado com sucesso!', 'url' => route('user.success')],200);
            }else{
                return response()->json(['ret' => 0, 'msg' => 'Ops, ocorreu um erro no pagamento. Verifique os dados e tente novamente.', 'url' => route('user.error')],404);
            }
        }else{
            $this->savePayment($data);
            return response()->json(['ret' => 0, 'msg' => 'Ops, cartão reprovado. Verifique os dados e tente novamente.'],404);
        }
    }

    private function savePayment($data)
    {
        try{
            $create = Payment::create($data);

            if($create){
                return true;
            } else {
                return false;
            }
        }catch (\Exception $e){
            return false;
        }
    }

    private function checkCard($data)
    {
        foreach($this->cards as $card){
            if ($card['card_number'] == cleanCard($data['card_number']) && $card['card_expiration'] == $data['card_expiration'] && $card['card_cvv'] == $data['card_cvv'] && $card['status'] == 'always_active'){
                return true;
            }else if($card['card_number'] == cleanCard($data['card_number']) && $card['card_expiration'] == $data['card_expiration'] && $card['card_cvv'] == $data['card_cvv'] && $card['status'] == 'always_inactive'){
                return false;
            }else if($card['card_number'] == cleanCard($data['card_number']) && $card['card_expiration'] == $data['card_expiration'] && $card['card_cvv'] == $data['card_cvv'] && $card['status'] == 'random') {
                return rand(0,1);
            }
        }
        return false;
    }
}
