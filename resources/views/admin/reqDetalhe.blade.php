@extends('site.template')
@section('content')
<body>
    <page size="A4">
      <div class="header">
        <div class="logo-header">
          <img src="../Imgs/brasao.png" alt="" class="img-header" />
        </div>

        <h3 class="body-header font-bold">
          GOVERNO DO ESTADO DO PARÁ <br />
          SECRETARIA DE ESTADO DE SEGURANÇA PÚBLICA E DEFESA SOCIAL POLÍCIA
          MILITAR DO PARÁ <br />
          FUNDO DE ASSISTÊNCIA SOCIAL DA POLÍCIA MILITAR
        </h3>

        <div class="logo-header">
            <img src="../Imgs/fas.png" alt="" class="img-header" />
        </div>
      </div>

      <h2 style="text-align: center;" class="mt-4 mb-4 font-bold text-2xl">Programa Arma Legal</h2>

      <table class="table">
        <thead class="theader">
          <tr>
            <th colspan="3" class="text-xl">REQUERIMENTO</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="3">
                AO Ilm.º Sr. DIRETOR DO FASPM</td>
          </tr>
          <tr>
            <td colspan="3">
              OBJETIVO: Aquisição de ARMA de uso permitido, em consignação.
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <ul>
                DOCUMENTAÇÃO EM ANEXO
                <li>1- Copia do contracheque do mês atual</li>
                <li>2- Identidade Militar</li>
              </ul>
            </td>
          </tr>
          <tr>
            <td colspan="2">NOME: <br>
                <span class="uppercase">{{session()->get('associado')}}</span>
            </td>
            <td colspan="1">POSTO/GRADUAÇÃO: <br>

            </td>
          </tr>
          <tr>
            <td colspan="1">RG:

            </td>
            <td colspan="1">MF:<br>
                <span>{{session()->get('matricula')}}</span>

            </td>
            <td colspan="1">OPM:

            </td>
          </tr>
          <tr>
            <td colspan="3">End.:

            </td>
          </tr>
          <tr>
            <td colspan="1">BAIRRO:

            </td>
            <td colspan="1">MUNICÍPIO:

            </td>
            <td colspan="1">CEP:

            </td>
          </tr>
          <tr>
            <td colspan="1">TEL:
            </td>
            <td colspan="2">E-MAIL:
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <p class="w-[100%]">
                Integrante do Quadro de Associados deste FASPM, vem mui
                respeitosamente solicitar a V.S.ª., que se digne em AUTORIZAR
                este Requerente que seja atendido pelo Programa <strong>ARMA LEGAL</strong> o
                financiamento para AQUISIÇÃO DE 01 um (a)<span class="font-bold">,{{$dados['descArma']}}</span>
                , no valor de R$
                <span class="font-bold">{{$dados['totalArma']}}</span>, junto a Empresa <strong>AMAZON SERVIÇOS
                DE ARMARIA E LIMPEZA EIRELI</strong>, cujo CNPJ <strong>40.720.043/0001-66</strong>,
                localizada na Tv. Segunda De Queluz, nº 582, sala 04, CANUDOS,
                BELÉM-PA, por intermédio do <strong>FUNDO DE ASSISTÊNCIA SOCIAL DA POLÍCIA MILITAR</strong>, de acordo com o Contrato nº 011/2023, oriundo
                do Processo Licitatório nº 001/2023 – FASPM – CREDENCIAMENTO Nº
                001/2023 – CPL/FASPM, conforme publicação do D.O nº 35.376, sob
                consignação REEMBOLSÁVEL cuja as despesas serão RESSARCIDAS ao
                FASPM em <span class="font-bold">{{$dados['quantidade']}} parcelas</span>  fixas mensais de <span class="font-bold">R$ {{ $dados['parcela']}}</span>, a serem
                descontadas no <strong>Contra Cheque</strong> deste Signatário. <br><br>
                Nestes Termos,
                <br><br>
                Pede deferimento!
                <br><br><br>
                <span>Assinatura do Requerente/MF:</span>  <br><br><br>
                <div class="border-t w-[90%] m-auto mb-6 border-black text-center">
                    <span class="uppercase">{{session()->get('associado')}}</span>
                </div>
              </p>
            </td>
          </tr>
        </tbody>
      </table>

      <div class="p-2 mt-2 w-[90%] m-auto">
        <p class="mr-2"><strong>IMPORTANTE: </strong> Anexar junto a este documento a <strong>Cópia da Identidade Funcional e a Cópia do Comprovante de Residência Atualizado.</strong> </p><br>
      </div>
      <div class="flex border border-black p-8 mt-2 w-[90%] m-auto">
        <p class="mr-2">Despacho do setor de armamento: </p>
        <div class="border-b border-black w-[60%]"></div>
      </div>


    </page>
  </body>

  <script>
     window.print()
  </script>

  <style>

  page {
    background: white;
    display: block;
    margin: 0 auto;
    margin-bottom: 0.5cm;
  }

  page[size="A4"] {
    width: 21cm;
    height: 29.7cm;
  }

  page[size="A4"][layout="portrait"] {
    width: 29.7cm;
    height: 21cm;
  }

  @media print {
    body,
    page {
      margin: 0;
      box-shadow: 0;
    }
  }

  .header {
    display: flex;
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid gray;
    justify-content: center;
    align-items: center;
  }

  .logo-header{
    width: 20%;
    text-align: center;
    justify-content: center;
    display: flex;
    padding: 1em;
  }

  .logo-header .img-header{
    width: 80px;
  }

  .header .body-header{
    width: 60%;
  }

  table {
    border-collapse: collapse;
    width: 90%;
    font-size: 80%;
    display: flex;
    margin: 0 auto;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border: 1px solid black;
  }

  table tr td{
    padding: 8px;
    border: 1px solid black;
  }

</style>
@endsection
