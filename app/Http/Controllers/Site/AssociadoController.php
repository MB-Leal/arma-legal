<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use App\Models\Associado;
use Illuminate\Http\Request;
use App\Models\Contador;
use App\Models\Requerimento;
use App\Models\Arma;

class AssociadoController extends Controller
{
    //função que autentica o usuario no sistema do associado
    public function store(Request $request)
    {
        $request->validate([
            'cpf' => 'required|string|min:10|max:14',
            'matricula' => 'required|string|min:6|max:12',
            'nome' => 'required|string',
        ]);

        $request->only(['cpf', 'matricula', 'nome']);

        if (session()->has('associado') && session()->get('associado') == $request->nome && session()->get('matricula' == $request->matricula)) {
            return redirect()->route('site.catalogo');
        } else {
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

            $associado = Associado::where('cpf', $cpf)
                ->where('matricula', $request->matricula)
                //->where('nome', $request->nome)
                ->first();

            if ($associado) {
                session()->put('cpf', $cpf);
                session()->put('associado', $request->nome);
                session()->put('matricula', $request->matricula);

                $contador = new Contador;
                $contador->nome = $request->nome;
                $contador->cpf = $cpf;
                $contador->data_acesso = date("Y-m-d H:i:s");
                $contador->associado = 'S';
                $contador->save();

                return redirect()->route('site.catalogo');
            } else {
                $contador = new Contador;
                $contador->nome = $request->nome;
                $contador->cpf = $cpf;
                $contador->data_acesso = date("Y-m-d H:i:s");
                $contador->associado = 'N';
                $contador->save();
                return redirect()->back()->with('danger', 'Dados Incorretos! Atualize seus dados clicando aqui, e depois faça login!');
            }
        }
    }
    //**Fim da função que autentica o usuario no sistema do associado*/

    //função que desloga o associado e encerra todas as seções
    public function logout()
    {
        session()->remove('associado');
        session()->remove('matricula');
        session()->remove('cpf');
        session()->remove('perfil');
        session()->remove('danger');
        session()->remove('success');
        return redirect()->route('site.index');
    }
    //fim da função logout

    /*public function salvarEditado(Request $request)
    {
        if (session()->has('associado')) {
            $dados = $request->all();

            $cpf = $request->cpf;

            if ($cpf != "") {
                $request->validate([
                    'cpf' => 'required|string|min:11|max:14'
                ]);

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

                if ($associado) {
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
                            'celular' => $request->celular
                        ]);

                    $qtdArma = Arma::where('id', $request->id)->value('quantidade');

                    if ($qtdArma > 0) {
                        $qtd = $qtdArma - 1;
                        Arma::where('id', $request->id)->update(['quantidade' => $qtd]);
                    }

                    if ($resposta > 0) {

                        $idReq = Requerimento::max('id');
                        if ($idReq) {
                            $codigo = date('Y') . '/' . $idReq;
                        } else {
                            $idReq = 1;
                            $codigo = strval(date('Y') . '/' . $idReq);
                        }


                        $req = new Requerimento;
                        $req->codigo = $codigo;
                        $req->arma = $request->arma;
                        $req->numero_parcelas = $request->qtd_parcela;
                        $req->valor_mensal = $request->valor_parcela;
                        $req->valor_total = $request->valor_total;
                        $req->associado_id = $associado->id;
                        $req->data_requerimento = date('Y-m-d H:i');
                        $req->save();

                        $dadosRequerimento = Requerimento::where('codigo', $codigo)->first();
                        return view('site.impressao', [
                            'dadosReq' => $dados,
                            'requerimento' => $dadosRequerimento
                        ]);
                    } else {
                        return redirect()->back()->with('danger', 'Não conseguimos atualizar seus dados, contate o suporte.');
                    }
                } else {
                    return redirect()->back()->with('danger', 'Associado não encontrado em nossa base de dados.');
                }
            } else {
                return redirect()->back()->with('danger', 'CPF vazio, preencha o campo CPF para continuar');
            }
        } else {
            return redirect()->route('site.index');
        }
    }*/

    //função que atualiza os dados do associado na hora de gerar o requerimento
    public function atualizarDadosReq(Request $request)
    {
        $dados = $request->all();
        $cpf = $request->cpf;

        if ($cpf != "") {
            $request->validate([
                'cpf' => 'required|string|min:11|max:14'
            ]);

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

            if ($associado) {
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
                        'celular' => $request->celular
                    ]);

                $qtdArma = Arma::where('id', $request->id)->value('quantidade');

                if ($qtdArma > 0) {
                    $qtd = $qtdArma - 1;
                    Arma::where('id', $request->id)->update(['quantidade' => $qtd]);
                }

                if ($resposta > 0) {

                    $idReq = Requerimento::max('id');
                    if ($idReq) {
                        $codigo = date('Y') . '/' . $idReq;
                    } else {
                        $idReq = 1;
                        $codigo = strval(date('Y') . '/' . $idReq);
                    }

                    $req = new Requerimento;
                    $req->codigo = $codigo;
                    $req->arma = $request->arma;
                    $req->numero_parcelas = $request->qtd_parcela;
                    $req->valor_mensal = $request->valor_parcela;
                    $req->valor_total = $request->valor_total;
                    $req->associado_id = $associado->id;
                    $req->data_requerimento = date('Y-m-d H:i');
                    $req->save();

                    $dadosRequerimento = Requerimento::where('codigo', $codigo)->first();

                    return view('site.impressao', [
                        'dadosReq' => $dados,
                        'requerimento' => $dadosRequerimento
                    ]);
                } else {
                    return redirect()->back()->with('danger', 'Não conseguimos atualizar seus dados, contate o suporte.');
                }
            } else {
                return redirect()->back()->with('danger', 'Associado não encontrado em nossa base de dados.');
            }
        } else {
            return redirect()->back()->with('danger', 'CPF vazio, preencha o campo CPF para continuar');
        }
    }

    //função que renderiza o form pra pegar o CPF do associado
    public function atualizarLogin()
    {
        $dados = null;
        return view('site.update', ['dados' => $dados]);
    }

    //função que busca o associado pelo CPF
    public function pesquisarAssoc(Request $request)
    {
        $cpf = $request->cpf;
        $associado = Associado::where('cpf', $cpf)->first();
        if ($associado) {
            return view('site.update', ['dados' => $associado]);
        } else {
            return redirect()->route('site.index')->with('danger', 'Não encontramos seus dados no nosso sistema, se você é realmente nosso associado, faça contato conosco');
        }
    }

    public function updateDadosAssoc(Request $request)
    {
        $cpf = $request->cpf;

        if ($cpf != "") {

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
                    'celular' => $request->telefone,
                    'updated_at'=> date('Y-m-d H:i')
                ]);

            if ($resposta) {
                session()->put('cpf', $request->cpf);
                session()->put('associado', $request->nome);
                session()->put('matricula', $request->matricula);

                $contador = new Contador;
                $contador->nome = $request->nome;
                $contador->cpf = $request->cpf;
                $contador->data_acesso = date("Y-m-d H:i:s");
                $contador->associado = 'S';
                $contador->save();

                return redirect()->route('site.catalogo');
            }
        }
    }
}
