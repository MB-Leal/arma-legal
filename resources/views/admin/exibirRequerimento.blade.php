@extends('site.template')
@section('content')
    <page size="A4">
        <header class="header border-red-800">
            <div class="logo-header border-red-800">
                <img src="{{ asset('Imgs/brasao.png') }}" alt="" class="img-header" />
            </div>

            <h3 class="body-header font-bold">
                GOVERNO DO ESTADO DO PARÁ <br />
                SECRETARIA DE ESTADO DE SEGURANÇA PÚBLICA E DEFESA SOCIAL POLÍCIA
                MILITAR DO PARÁ <br />
                FUNDO DE ASSISTÊNCIA SOCIAL DA POLÍCIA MILITAR
            </h3>

            <div class="logo-header">
                <img src="{{ asset('Imgs/fas.png') }}" alt="" class="img-header" />
            </div>
        </header>

        <h2 style="text-align: center;" class="mt-4 mb-4 font-bold text-2xl">Programa Arma Legal</h2>

        <table class="table">
            <thead class="border">
                <tr class="flex justify-center border-black border">
                    <th class="text-xl">REQUERIMENTO</th>
                </tr>
            </thead>
            <tbody>
                <tr class="flex">
                    <td>
                        AO Ilm.º Sr. DIRETOR DO FASPM</td>
                </tr>
                <tr class="flex">
                    <td>
                        OBJETIVO: Aquisição de ARMA de uso permitido, em consignação.
                    </td>
                </tr>
                <tr class="flex">
                    <td>
                        <ul>
                            DOCUMENTAÇÃO EM ANEXO
                            <li>1- Copia do contracheque do mês atual</li>
                            <li>2- Identidade Militar</li>
                        </ul>

                    </td>
                </tr>
                <tr class="flex ">
                    <td class="w-[60%]">NOME: <br>
                        <span class="uppercase">{{ $dadosAssoc['nome'] }}</span>
                    </td>
                    <td class="w-[40%]">POSTO/GRADUAÇÃO: <br>
                        <span class="uppercase">{{ $dadosAssoc['posto_graduacao'] }}</span>
                    </td>
                </tr>
                <tr class="flex ">
                    <td>RG:<br>
                        <span class="uppercase">{{ $dadosAssoc['rg'] }}</span>
                    </td>
                    <td>MF:<br>
                        <span class="uppercase">{{ $dadosAssoc['matricula'] }}</span>

                    </td>
                    <td>OPM:<br>
                        <span class="uppercase">{{ $dadosAssoc['opm'] }}</span>
                    </td>
                </tr>
                <tr class="flex ">
                    <td colspan="3">End.:
                        <span class="uppercase">{{ $dadosAssoc['logradouro'] }}</span>
                    </td>
                </tr>
                <tr class="flex ">
                    <td colspan="1">BAIRRO:
                        <span class="uppercase">{{ $dadosAssoc['bairro'] }}</span>

                    </td>
                    <td colspan="1">MUNICÍPIO:
                        <span class="uppercase">{{ $dadosAssoc['municipio'] }}</span>

                    </td>
                    <td colspan="1">CEP:
                        <span class="uppercase">{{ $dadosAssoc['cep'] }}</span>

                    </td>
                </tr>
                <tr class="flex ">
                    <td class="w-[33.3%]">TEL:
                        <span class="uppercase">{{ $dadosAssoc['celular'] }}</span>
                    </td>
                    <td>E-MAIL:
                        <span class="uppercase" class="email-td">{{ $dadosAssoc['email'] }}</span>
                    </td>
                </tr>
                <tr class="flex ">
                    <td colspan="3">
                        <p class="w-[100%]">
                            Integrante do Quadro de Associados deste FASPM, vem mui
                            respeitosamente solicitar a V.S.ª., que se digne em AUTORIZAR
                            este Requerente que seja atendido pelo Programa <strong>ARMA LEGAL</strong> o
                            financiamento para AQUISIÇÃO DE 01 um(a) <span
                                class="font-bold">,{{ $dadosReq['arma'] }}</span>
                            , no valor de
                            <span class="font-bold">{{ $dadosReq['valor_total'] }}</span>, junto a Empresa
                            <strong>AMAZON SERVIÇOS
                                DE ARMARIA E LIMPEZA EIRELI</strong>, cujo CNPJ <strong>40.720.043/0001-66</strong>,
                            localizada na Tv. Segunda De Queluz, nº 582, sala 04, CANUDOS,
                            BELÉM-PA, por intermédio do <strong>FUNDO DE ASSISTÊNCIA SOCIAL DA POLÍCIA MILITAR</strong>,
                            de acordo com o Contrato nº 011/2023, oriundo
                            do Processo Licitatório nº 001/2023 – FASPM – CREDENCIAMENTO Nº
                            001/2023 – CPL/FASPM, conforme publicação do D.O nº 35.376, sob
                            consignação REEMBOLSÁVEL cuja as despesas serão RESSARCIDAS ao
                            FASPM em <span class="font-bold">{{ $dadosReq['numero_parcelas'] }} parcelas</span> fixas
                            mensais de <span class="font-bold"> {{ $dadosReq['valor_mensal'] }}</span>, a serem
                            descontadas no <strong>Contra Cheque</strong> deste Signatário. <br><br>
                            Nestes Termos,
                            <br><br>
                            Pede deferimento!
                            <br><br>
                            <span>Assinatura do Requerente/MF: {{ $dadosAssoc['matricula'] }}</span> <br><br><br>
                        <div class="border-t w-[90%] m-auto mb-8 border-black text-center">
                            <span class="uppercase">{{ $dadosAssoc['nome'] }}</span>
                        </div>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="flex flex-col w-[90%] m-auto mt-4 gap-2 ">

            <div class=" border p-2">
               <span>Requerimento: {{ $dadosReq['codigo'] }}    gerado em:   {{ \Carbon\Carbon::parse($dadosReq['data_requerimento'])->format('d/m/Y')}}</span>
           </div>

           <div class="p-2 mt-4 m-auto ">
               <p class="text-xs"><strong>(IMPORTANTE: </strong> Anexar junto a este documento a <strong>Cópia da Identidade Funcional e a Cópia do Comprovante de Residência Atualizado.)</strong> </p><br>
           </div>

       </div>

        <div class="flex w-[90%] m-auto  p-4">
            <p class="">Despacho do setor de armamento: </p><br>
            <div class="border-b border-black w-[60%]"></div>
        </div>
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
                margin-top: 0.5cm;
            }

            page[size="A4"] {
                width: 21cm;
                height: 29.7cm;
            }

            page[size="A4"][layout="portrait"] {
                width: 29.7cm;
                height: 21cm;
            }

            .header {
                display: flex;
                padding: 10px;
                text-align: center;
                border-bottom: 1px solid gray;
                justify-content: center;
                align-items: center;
            }

            .logo-header {
                width: 20%;
                text-align: center;
                justify-content: center;
                display: flex;
                padding: 1em;
            }

            .logo-header .img-header {
                width: 80px;
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
            }

            table tr td {
                padding: 8px;
                border: 1px solid black;
                display: table-row;
                width: 100%;
            }


            @media print {

                body,
                page {
                    margin: 0;
                    box-shadow: 0;
                }
            }
        </style>
    @endsection
