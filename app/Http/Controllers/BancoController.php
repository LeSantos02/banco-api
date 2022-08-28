<?php

namespace App\Http\Controllers;

use App\Models\Banco;
use Illuminate\Http\Request;

class BancoController extends Controller
{

    public function saldo(Request $request)
    {

        if (Banco::whereConta($request->num_conta)->exists()) {
            return [
                "Saldo" =>$this->verSaldo($request->num_conta)
            ];
        } else {
            return [
                "Erro" => "Conta não existe"
            ];
        }
    }

    public function sacar(Request $request)
    {

        $saldo_conta = 0;

        if (Banco::whereConta($request->conta)->exists()) {
            $saldo_conta = $this->verSaldo($request->conta);
        } else {
            return [
                "Erro" => "Conta não existe"
            ];
        }

        if ($request->valor > $saldo_conta) {
            return [
                "Erro" => "Saldo insuficiente"
            ];
        } else {
            $conta = Banco::whereConta($request->conta)->first();
            $saldo_conta = $saldo_conta - $request->valor;
            $conta->saldo = $saldo_conta;
            $conta->save();

            return [
                "conta" =>  $conta->conta,
                "saldo" =>  $conta->saldo
            ];
        }
    }

    public function depositar(Request $request)
    {

        $saldo_conta = 0;

        if (Banco::whereConta($request->conta)->exists()) {
            $saldo_conta = $this->verSaldo($request->conta);
        } else {
            return [
                "Erro" => "Conta não existe"
            ];
        }

        $conta = Banco::whereConta($request->conta)->first();
        $saldo_conta = $saldo_conta + $request->valor;
        $conta->saldo = $saldo_conta;
        $conta->save();

        return [
            "conta" =>  $conta->conta,
            "saldo" =>  $conta->saldo
        ];
    }


    public function verSaldo($num_conta)
    {
        $conta = Banco::whereConta($num_conta)->first();
        return $conta['saldo'];
    }
}
