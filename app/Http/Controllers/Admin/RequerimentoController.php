<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requerimento;
use App\Models\Associado;

class RequerimentoController extends Controller
{
    public function index(Request $request){
        $requerimentos = Requerimentos::paginate(50);
        return view('admin.listaRequerimento', ['requerimentos'=> $requerimentos]);
    }

    public function show(){
        return view('admin.reqDetalhe');
    }

    public function impressao()
    {
        return view('site.impressao');
    }

    public function detalheReq($id){
        $dadosRequerimento = Requerimento::where('id', $id)->first();

        $dadosAssocReq = Associado::where('id', $dadosRequerimento['associado_id'])->first();

        return view('admin.exibirRequerimento', [
            'dadosReq'=>$dadosRequerimento,
            'dadosAssoc'=>$dadosAssocReq
        ]);
    }

    public function exibirRequerimento(){
        return view('admin.exibirRequerimento');
    }
}
