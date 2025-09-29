<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Models\Associado;
use App\Models\Arma;

use Illuminate\Http\Request;

class AutorizacaoController extends Controller
{

    public function index(Request $request) {

        if (session()->has('associado')) {
        $dados = $request->only(['id','descArma', 'quantidade', 'parcela', 'totalArma']);

       $associado = Associado::where('cpf', session()->get('cpf'))->first();

       $qtdArma = Arma::where('id', $request->id)->value('quantidade');

       if($qtdArma > 0){
        $qtd = $qtdArma - 1;
        Arma::where('id', $request->id)->update(['quantidade'=>$qtd]);
       }


        return view('site.autorizacao', [
            'dados'=> $dados,
            'associado'=> $associado
        ]);

        }else{
            return redirect()->route('site.index');
        }
    }

    public function impressao()
    {
        return view('site.impressao');
    }

}
