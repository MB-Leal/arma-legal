@extends('site.template')
@section('content')
@if (session('danger'))
                <div id="alert-border-3"
                    class="flex p-4 mb-4 text-red-800 mt-4 w-[90%] m-auto border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                    role="alert">
                    <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div class="ml-3 text-sm font-medium">
                        <p>{{ session('danger') }}</p>
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-border-3" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif
    <main class="w-[100%] flex flex-col">
        <h1 class="text-white text-center mt-4 text-2xl">ARMA LEGAL</h1>
        <div class="bg-zinc-800 flex items-center justify-center flex-col lg:w-[90%] mt-4 mb-8 m-auto">
            <div id="title" class="w-[100%] h-[5em] flex justify-center items-center text-gray-300 flex-col bg-zinc-950">
                <h1 class="text-bold text-2xl">SIMULADOR DE PREÇOS</h1>
                <small class="text-sm mb-2">(OBS: Os valores podem variar)</small>
            </div>

            <form method="POST"
                action="{{ route('admin.autorizacao') }}"class="w-[100%] min-h-[70vh] p-4 bg-zinc-400 flex flex-col justify-between items-center">
                @csrf
                <div class=" justify-between items-center flex lg:flex-row flex-col w-[90%] overflow-hidden lg:gap-8">
                    <input type="hidden" name="id" id="id" value="{{$armas->id}}">
                    <Label class="font-bold text-xl lg:w-[30%] " for="arma">Arma Escolhida: </Label>
                    <input
                        class="outline-none w-[100%] border-none bg-transparent rounded-lg text-blue-700 text-xl p-2 font-bold text-center"
                        type="text" value=" {{ $armas->nome }} - {{ $armas->calibre }}" name="descArma">
                </div>

                <div class=" justify-between items-center flex w-[90%] lg:flex-row flex-col overflow-hidden lg:gap-8">
                    <input
                        class="outline-none hidden w-[70%] bg-transparent  rounded-lg text-xl p-2 border-none font-bold text-center"
                        readonly type="number" name="arma" id="armaCalculada" value="" id="armaCalculada">
                    <input
                        class="outline-none hidden w-[70%] bg-transparent  rounded-lg text-xl p-2 border-none font-bold text-center"
                        readonly type="number" name="arma" id="arma" value="{{ $armas->preco }}">
                </div>

                <div class="justify-between items-center flex w-[90%] lg:flex-row flex-col overflow-hidden lg:gap-8">

                    <Label class="font-bold text-xl lg:w-[30%] " for="tooltip" data-toggle="tooltip" data-placement="top"
                        title="
            / 1 - 20% / 2 a 5 - 30% / 6 a 8 - 40% / 9 a 12 - 50% / 12 em diante - 70% / ">Número
                        de Parcelas: </Label>
                    <div class="w-[70%] flex justify-center">
                        <input class="outline-none rounded-lg lg:w-[15%] text-xl p-2 border-none font-bold text-center"
                            type="number" name="quantidade" id="quantidade" max="24" min="1">
                    </div>
                </div>

                <div class="w-[90%] flex justify-center">
                    <span class="text-orange-600 font-bold" id="span-infor">(Máximo 24 vezes)</span>
                </div>

                <div class="hidden w-[90%] lg:flex-row flex-col overflow-hidden lg:gap-8">
                    <Label class="font-bold text-xl" for="lucro">Taxa Aplicada: </Label>
                    <input
                        class="outline-none w-[70%] bg-transparent  rounded-lg text-xl p-2 border-none font-bold text-center"
                        type="text" name="lucro" id="lucro" readonly>

                </div>
                <div class=" justify-between items-center flex w-[90%] lg:flex-row flex-col overflow-hidden lg:gap-8">
                    <Label class="font-bold text-xl" for="mes">Valor Mensal: </Label>
                    <input
                        class="outline-none w-[70%] bg-transparent  rounded-lg text-xl p-2 border-none font-bold text-center"
                        type="text" name="parcela" id="mes" readonly>
                </div>
                <div class=" justify-between mb-4 items-center flex w-[90%] lg:flex-row flex-col overflow-hidden lg:gap-8">
                    <Label class="font-bold text-xl" for="total" id="totalpago">Valor total a ser pago: </Label>
                    <input
                        class="outline-none w-[70%] bg-transparent  rounded-lg text-xl p-2 border-none font-bold text-center"
                        type="text" name="totalArma" id="total" readonly>

                </div>
                <div class=" justify-between mb-4 items-center flex w-[90%] lg:flex-row flex-col overflow-hidden lg:gap-8">
                    <Label class="font-bold text-xl" for="cpf" id="cpf">CPF do associado para geração do documento </Label>
                    <input
                    class="outline-none w-[50%] rounded-lg text-xl p-2 border-none font-bold text-center"
                        type="text" name="cpf" id="cpf">

                </div>
                <div class="flex lg:flex-row flex-col justify-around items-center w-[100%]">

                    <a class="lg:w-[30%] w-[100%] gap-8 text-center font-semibold outline-none hover:no-underline uppercase bg-blue-600 hover:bg-blue-700 border p-4 rounded-md mb-8 border-blue-700 text-white"
                        href="{{ route('admin.catalogo') }}">
                        <i class="fa-solid fa-rotate-left"></i>
                        Retornar para o Catálogo
                    </a>

                    <button type="submit" id="simulacao"
                        class=" lg:w-[65%] w-[100%] outline-none font-semibold hover:no-underline uppercase bg-zinc-800 hover:bg-zinc-700 border p-4 rounded-md mb-8 border-zinc-700 text-white"
                        >
                        Prosseguir financiamento
                    </button>
                </div>
                <div>
                    <span class="text-orange-600 font-bold"><strong>Aviso!</strong> Só clique em proseguir se realmento for dar proseguimento no processo de aquisição, pois será reservada arma que você escolheu.</span>
                </div>
            </form>
        </div>

        <footer class="flex w-[100%] flex-col border-t  text-white">
            <div class="flex p-4 bg-gray-900 flex-col lg:flex-row">
                <div class="lg:w-[50%] flex flex-col items-center lg:border-r lg:border-b-0 border-b-2 mb-4 lg:mb-0">
                    <h2 class=" mb-4 font-bold text-xl">Contatos</h2>
                    <a href="https://wa.me/5591988953551" target="_blank" class="mb-2">Whatsapp do Setor de Armamento: 91
                        98895-3551</a>
                    <a href="mailto: projetoarmalegal@faspmpa.com.br" target="_blank" class="mb-2 text-center">E-mail do
                        setor de armamento: projetoarmalegal@faspmpa.com.br</a>
                    <a href="https://wa.me/5591988953560" target="_blank" class="mb-2">Whatsapp do Setor de Consignação:
                        91 98895-3560</a>
                    <a href="mailto:cadastroecobranca@faspmpa.com.br" class="mb-2 text-center">E-mail do Setor de
                        Consignação: cadastroecobranca@faspmpa.com.br</a>
                </div>
                <div class="lg:w-[50%] flex flex-col items-center">
                    <h2 class="mb-4 font-bold text-xl">Links Importantes</h2>
                    <a href="https://pagtesouro.tesouro.gov.br/portal-gru/#/emissao-gru/formulario?ug=167086&codigoRecolhimento=11300-0" target="_blank" 
                        class="mb-2">Site da GRU</a>
                    <!-- <a href="https://www.pm.pa.gov.br/component/content/article/91-artigos-gerais/171-aquisicao-de-armas-de-fogo.html" 
                        class="mb-2" target="_blank">Site da PM / Aquisição de Armas</a>-->
                    <a href="https://faspmpa.com.br/" class="mb-2" target="_blank">Site FASPM</a>
                </div>
            </div>
            <x-footer></x-footer>
        </footer>
    </main>



    <script>
        function calcularMontanteTotal(principal, taxa, quantidade) {
            return principal * (1 + taxa);
        }

        function calcularValorMensal(montanteTotal, quantidade) {
            return montanteTotal / quantidade;
        }

        function simulador() {
            var arma = parseFloat(document.querySelector("input[id=arma]").value);
            console.log('Valor base: ' + arma.toFixed(2));

            var quantidade = parseInt(document.getElementById("quantidade").value);
            console.log("Quantidade de parcelas: " + quantidade);

            if (quantidade > 24) {
                alert("Parcela incorreta - Parcelamos de 1 em até 24x");
                return;
            }

            var taxa;
            if (quantidade === 1) {
                taxa = 0.0090; // 0.90% em formato decimal
            } else if (quantidade === 2) {
                taxa = 0.0136; // 1.36% em formato decimal
            } else if (quantidade === 3) {
                taxa = 0.0180; // 1.80% em formato decimal
            } else if (quantidade === 4) {
                taxa = 0.0226; // 2.26% em formato decimal
            } else if (quantidade === 5) {
                taxa = 0.0272; // 2.72% em formato decimal
            } else if (quantidade === 6) {
                taxa = 0.0319; // 3.19% em formato decimal
            } else if (quantidade === 7) {
                taxa = 0.0384; // 3.84% em formato decimal
            } else if (quantidade === 8) {
                taxa = 0.0432; // 4.30% em formato decimal
            } else if (quantidade === 9) {
                taxa = 0.0482; // 4.80% em formato decimal
            } else if (quantidade === 10) {
                taxa = 0.0530; // 5.30% em formato decimal
            } else if (quantidade === 11) {
                taxa = 0.0579; // 5.80% em formato decimal
            } else if (quantidade === 12) {
                taxa = 0.0629; // 6.30% em formato decimal
            } else if (quantidade === 13) {
                taxa = 0.0714; // 7.20% em formato decimal
            } else if (quantidade === 14) {
                taxa = 0.0767; // 7.70% em formato decimal
            } else if (quantidade === 15) {
                taxa = 0.0819; // 8.20% em formato decimal
            } else if (quantidade === 16) {
                taxa = 0.0871; // 8.70% em formato decimal
            } else if (quantidade === 17) {
                taxa = 0.0924; // 9.30% em formato decimal
            } else if (quantidade === 18) {
                taxa = 0.0977; // 9.80% em formato decimal
            } else if (quantidade === 19) {
                taxa = 0.1083; // 10.80% em formato decimal
            } else if (quantidade === 20) {
                taxa = 0.1140; // 11.40% em formato decimal
            } else if (quantidade === 21) {
                taxa = 0.1196; // 12.00% em formato decimal
            } else if (quantidade === 22) {
                taxa = 0.1252; // 12.50% em formato decimal
            } else if (quantidade === 23) {
                taxa = 0.1309; // 13.10% em formato decimal
            } else if (quantidade === 24) {
                taxa = 0.1366; // 13.70% em formato decimal
            }

            console.log(`Taxa de juros: ${taxa * 100}%`);

            // Calculando o montante total
            var montanteTotal = calcularMontanteTotal(arma, taxa, quantidade);

            // Calculando o valor mensal
            var valorMensal = calcularValorMensal(montanteTotal, quantidade);

            // Exibindo os resultados formatados
            document.querySelector("input[id=total]").value = isNaN(montanteTotal) ? '' : montanteTotal.toLocaleString('pt-br', {
                style: 'currency',
                currency: 'BRL'
            });
            document.querySelector("input[id=mes]").value = isNaN(valorMensal) ? '' : valorMensal.toLocaleString('pt-br', {
                style: 'currency',
                currency: 'BRL'
            });
        }

        window.onload = function() {
            simulador(); // Chamando a função simulador uma vez no carregamento da página
            document.getElementById("quantidade").addEventListener("change", function() {
                simulador(); // Chamando a função simulador quando houver mudança na quantidade de parcelas
            });
        };
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <style>
        #totalpago {
            text-transform: uppercase;
            color: rgb(3, 88, 3);
        }


        #total {
            color: rgb(3, 88, 3);
        }
    </style>
@endsection
