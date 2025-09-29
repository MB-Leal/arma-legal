<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Associado;
use App\Models\Contador;
use App\Models\Requerimento;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AssociadoController extends Controller
{
    public function index(Request $request){

        if($request->pesquisa != ''){
        $result = Associado::where('nome', 'like', '%'.$request->pesquisa.'%')
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
}

    public function edit(Request $request){

        $dados = $request->all();
        $cpf = $request->cpf;
        $associado = Associado::where('cpf', $cpf)->first();

        $resposta = Associado::where('cpf', $cpf)
                        ->update([
                            'matricula' => $request->matricula,
                            'nome' => $request->nome,
                            'situacao' => $request->situacao,
                            'posto_graduacao' => $request->posto_graduacao,
                            'email' => $request->email,
                            'rg' => $request->rg,
                            'opm' => $request->opm,
                            'cep' => $request->cep,
                            'logradouro' => $request->rua,
                            'bairro' => $request->bairro,
                            'municipio' => $request->cidade,
                            'complemento' => $request->complemento,
                            'numero' => $request->numero,
                            'estado' => $request->uf,
                            'celular' => $request->celular,
                            'updated_at'=> date('Y-m-d H:i')
                        ]);

                        if ($resposta > 0) {

                            $idReq = Requerimento::max('id');
                            if($idReq){
                                $codigo = date('Y').'/'.$idReq;
                            }else{
                                $idReq = 1;
                                $codigo = strval(date('Y').'/'.$idReq);
                            }


                            $req = New Requerimento;
                            $req->codigo = $codigo;
                            $req->arma = $request->arma;
                            $req->numero_parcelas = $request->qtd_parcela;
                            $req->valor_mensal = $request->valor_parcela;
                            $req->valor_total = $request->valor_total;
                            $req->associado_id = $associado->id;
                            $req->data_requerimento = date('Y-m-d H:i');
                            $req->save();

                            $dadosRequerimento = Requerimento::where('codigo', $codigo)->first();
                            return view('admin.impressao', [
                                'dadosReq' => $dados,
                                'requerimento' =>$dadosRequerimento
                            ]);
                        } else {
                            return redirect()->back()->with('danger', 'Não conseguimos atualizar seus dados, contate o suporte.');
                                }
      }
      public function newAssoc(){
        return view('admin.adicionarAssociado');
      }

      public function editarAssociado(Request $request){
        $dados = $request->all();
        $cpf = $request->cpf;
        $associado = Associado::where('cpf', $cpf)->first();

        $resposta = Associado::where('cpf', $cpf)
                        ->update([
                            'matricula' => $request->matricula,
                            'nome' => $request->nome,
                            'situacao' => $request->situacao,
                            'posto_graduacao' => $request->posto_graduacao,
                            'email' => $request->email,
                            'rg' => $request->rg,
                            'opm' => $request->opm,
                            'cep' => $request->cep,
                            'logradouro' => $request->rua,
                            'bairro' => $request->bairro,
                            'municipio' => $request->cidade,
                            'complemento' => $request->complemento,
                            'numero' => $request->numero,
                            'estado' => $request->uf,
                            'celular' => $request->celular,
                            'updated_at'=> date('Y-m-d H:i')
                        ]);
            if ($resposta > 0) {
                return redirect()->route('admin.associado')->with('success', 'Atualização realizada com Sucesso!');
            } else {
                return redirect()->route('admin.associado')->with('danger', 'Não foi possível atualizar o cadastro!');
            }


      }

    public function salvar(Request $request){

        $validator = Validator::make($request->all(), [
            'nome' => 'required|string',
            'cpf' => 'required|string|max:14|unique:associados',
            'matricula' => 'required|string|max:11'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.associado')->with('danger', 'Dados duplicados, já existe esse associado em nosso banco de dados.');
        }else{
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

        $associado = new Associado;
        $associado->cpf = $cpf;
        $associado->matricula = $request->matricula;
        $associado->nome = $request->nome;
        $associado->situacao = $request->situacao;
        $associado->posto_graduacao = $request->posto_graduacao;
        $associado->email = $request->email;
        $associado->rg = $request->rg;
        $associado->opm = strtoupper($request->opm);
        $associado->logradouro = $request->rua;
        $associado->bairro = $request->bairro;
        $associado->municipio = $request->cidade;
        $associado->complemento = $request->complemento;
        $associado->cep = $request->cep;
        $associado->numero = $request->numero;
        $associado->estado = strtoupper($request->uf);
        $associado->celular = $request->celular;
        $associado->created_at = date('Y-m-d H:i');
        $associado->save();

        return redirect()->route('admin.associado')->with('success','Associado cadastrado com sucesso!');
        }
    }

    public function show($id){
        $associado = Associado::find($id);
        return view('admin.editAssoc', ['associado'=>$associado]);
    }

    public function deletar($id){
        $associado = Associado::find($id);
        $associado->delete();
        return redirect()->route('admin.associado')->with('success','Associado excluído com sucesso!');
    }

    public function listarAssociado(){
        $associados = Associado::paginate(50);
        return view('admin.associadoList', ['associados'=> $associados]);
    }

    public function detalharAssociado($id){
        $dadosAssociado = Associado::find($id);
        $dadosAcesso = Contador::where('nome', 'like', $dadosAssociado->nome)->get();
        $dadosRequerimento = Requerimento::where('associado_id', $id)->get();

        //dd($dadosAssociado);

        return view('admin.detalheAssoc', [
            'associado'=>$dadosAssociado,
            'acesso' => $dadosAcesso,
            'requerimento' => $dadosRequerimento
        ]);
    }
}
