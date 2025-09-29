<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requerimento;
use App\Models\Associado;

class RequerimentoController extends Controller
{
    public function index(Request $request){
        if($request->pesquisa != ''){
            $result = Requerimento::where('nome', 'like', '%'.$request->pesquisa.'%')
            ->orderBy('nome')
            ->limit(10)
            ->get();

            if($result){
                return view('admin.associado', ['resultado' => $result]);
            }else{
                $result = 'Associado Não localizado!';
            return view('admin.associado', ['resultado' => $result]);
            }

        }else{
            $result = null;
            return view('admin.associado', ['resultado' => $result]);
        }
        return view('admin.requerimento');
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
