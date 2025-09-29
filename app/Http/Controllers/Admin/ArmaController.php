<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Arma;
use App\Http\Controllers\Controller;
use App\Models\Associado;
use Illuminate\Support\Facades\Storage;

class ArmaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->pesquisa != '') {
            $result = Arma::where('nome', 'like', '%' . $request->pesquisa . '%')
                ->orderBy('nome')
                ->get();


            if ($result) {
                return view('admin.arma', ['resultado' => $result]);
            } else {
                $result = 'Arma não localizada!';
                return view('admin.arma', ['resultado' => $result]);
            }
        } else {
            $result = null;
            return view('admin.arma', ['resultado' => $result]);
        }
    }

    public function edit(Request $request)
    {
        $data = $request->all();

        Arma::where('id', $request->id)
            ->update([
                'nome' => $request->nome,
                'img1' => $request->img1,
                'img2' => $request->img2,
                'img3' => $request->img3,
                'fabricante' => $request->fabricante,
                'tipo' => $request->tipo,
                'calibre' => $request->calibre,
                'acabamento' => $request->acabamento,
                'capacidade_tiro' => $request->capacidade_tiro,
                'sistema_funcionamento' => $request->sistema_funcionamento,
                'qtd_cano' => $request->qtd_cano,
                'comprimento_cano' => $request->comprimento_cano,
                'tipo_alma' => $request->tipo_alma,
                'qtd_raias' => $request->qtd_raias,
                'sentido_raias' => $request->sentido_raias,
                'pais_fabricacao' => $request->pais_fabricacao,
                'preco' => $request->preco,
                'taxa' => $request->taxa,
                'situacao' => $request->situacao,
                'quantidade' => $request->quantidade,
                'estoque_min'=> $request->estoque_min,
                'updated_at'=>date('Y-m-d H:i')
            ]);
        return redirect()->route('admin.arma')->with('success', 'Alterado com Sucesso!');
    }

    public function salvar(Request $request)
    {
        $data = $request->all();

        $arma = new Arma;
        $arma->nome = $data['nome'];
        $arma->img1 = $data['img1'];
        $arma->img2 = $data['img2'];
        $arma->img3 = $data['img3'];
        $arma->fabricante = $data['fabricante'];
        $arma->tipo = $data['tipo'];
        $arma->calibre = $data['calibre'];
        $arma->acabamento = $data['acabamento'];
        $arma->capacidade_tiro = $data['capacidade_tiro'];
        $arma->sistema_funcionamento = $data['sistema_funcionamento'];
        $arma->qtd_cano = $data['qtd_cano'];
        $arma->comprimento_cano = $data['comprimento_cano'];
        $arma->tipo_alma = $data['tipo_alma'];
        $arma->qtd_raias = $data['qtd_raias'];
        $arma->sentido_raias = $data['sentido_raias'];
        $arma->pais_fabricacao = $data['pais_fabricacao'];
        $arma->preco = $data['preco'];
        $arma->taxa = 0.74;
        $arma->situacao = "A";
        $arma->quantidade = $data['quantidade'];
        $arma->estoque_min = $data['estoque_min'];
        $arma->created_at = date('Y-m-d H:i');
        $arma->save();

        return redirect()->route('admin.arma')->with('success', 'Arma Cadastrada com sucesso!');
    }

    public function show($id)
    {
        $arma = Arma::find($id);

        return view('admin.editArma', ['armas' => $arma]);
    }

    public function desativarArma($id){
        $arma = Arma::where('id', $id)->first();

        if($arma['situacao']== 'I'){
            return redirect()->back()->with('danger', 'Esta arma já está inativa no sistema!');
        }else{
        Arma::where('id', $id)
            ->update([
                'situacao' => 'I'
            ]);
        return redirect()->back()->with('success', 'Arma desativada com sucesso, não aparecerá mais no catálogo');
        }
    }

    public function listarArma()
    {
        $armas = Arma::paginate(20);
        return view('admin.armaList', ['armas' => $armas]);
    }

    public function armaDetalhes($id)
    {
        $arma = Arma::find($id);
        return view('admin.armaDetalhes', ['armas'=> $arma]);
    }

    public function simulacao($id)
    {
        $arma = Arma::find($id);
        return view('admin.simulador', ['armas'=>$arma]);
    }

    public function autorizacao(Request $request){
        $dados = $request->only(['id','descArma', 'quantidade', 'parcela', 'totalArma', 'cpf']);

        if($request->cpf != ""){
        $cpf = $request->cpf;

            if (strlen($cpf) > 11) {
                $cpf = trim($cpf);
                $cpf = str_replace(' ', '', $cpf);
                $cpf = str_replace('_', '', $cpf);
                $cpf = str_replace('/', '', $cpf);
                $cpf = str_replace('-', '', $cpf);
                $cpf = str_replace('(', '', $cpf);
                $cpf = str_replace(')', '', $cpf);
                $cpf = str_replace('.', '', $cpf);
            }

        $associado = Associado::where('cpf', $cpf)->first();
        $qtdArma = Arma::where('id', $request->id)->value('quantidade');

        if($qtdArma > 0){
         $qtd = $qtdArma - 1;
         Arma::where('id', $request->id)->update(['quantidade'=>$qtd]);
        }

        return view('admin.autorizacao', [
            'dados'=>$dados,
            'associado'=>$associado
        ]);
    }else{
        return redirect()->back()->with('danger', 'É necessário preencher o campo do CPF do Associado!');
    }
    }
}
