@extends('site.template')
@section('content')

    <section class="">
        <h2 class="font-bold text-2xl mt-8 mb-8 text-center text-white">Programa Arma Legal</h2>


        <form method="post" action="{{ route('admin.updateAssoc') }}">
            @csrf
            <div class="flex flex-col items-center border flex-wrap p-10 w-[90%] m-auto mb-8" id="formCard">

                <h4 class="text-white md:text-center text-left text-xl">Informações da Arma</h4>
                <div class="md:w-[70%] border-b md:pb-4 mb-4 flex flex-col">

                    <input type="text" class="border-none text-center bg-transparent text-blue-500 md:text-3xl" name="arma" value="{{ $dados['descArma'] }}" readonly></span>

                    <div class="md:flex md:flex-row md:justify-between flex-col md:flex-wrap md:w-[100%]">

                        <div class="flex justify-center flex-col items-center md:w-[33%] w-[100%]">
                            <label class="text-xl font-bold border-none" for="qtd_parcela">
                                Parcelas:
                            </label>
                            <input type="text" name="qtd_parcela" class="text-xl text-center text-green-500 font-bold bg-transparent border-none"  value="{{$dados['quantidade']}}" readonly>
                        </div>

                        <div class="flex justify-center flex-col items-center md:w-[33%] w-[100%]">
                            <label class="text-xl font-bold border-none">
                                Valor Mensal:
                            </label>
                            <input type="text" name="valor_parcela" class="text-xl text-center text-green-500 font-bold bg-transparent border-none" value="{{ $dados['parcela'] }}" readonly>
                        </div>

                        <div class="flex justify-center flex-col items-center md:w-[33%] w-[100%]">
                            <span class="text-xl font-bold border-none">
                                Total:
                            </span>
                            <input type="text" class="text-xl text-center text-green-500 font-bold bg-transparent border-none"  name="valor_total" value="{{ $dados['totalArma'] }}" readonly>
                        </div>
                    </div>

                </div>

                <h4 class="text-white text-left mb-4 text-xl mt-4">Informações do Solicitante</h4>
                <div class="m-auto md:w-[70%] pb-4 mb-4">

                    <div class="flex flex-col md:flex-row justify-between gap-4">

                        <div class="w-[100%]">
                            <span>Nome:</span>
                            <input type="text" name="nome" id="nome" class="w-[100%] text-black" value="{{ $associado['nome'] }}"
                                >
                        </div>

                        <div class="mb-4 w-[100%]">
                            <span>CPF:</span>
                            <input type="text" class="w-[100%] text-black" name="cpf"
                                value="{{ $associado['cpf'] }}" readonly>
                        </div>

                    </div>

                    <div class="flex flex-col mb-4 md:flex-row justify-between gap-4">

                        <div class=" w-[100%]">
                            <span>Matricula</span>
                            <input type="text" class="w-[100%] text-black" name="matricula"
                                value="{{ $associado['matricula'] }}" readonly>
                        </div>

                        <div class=" w-[100%]">
                            <span>Posto/Graduação</span>
                            <select name="posto_graduacao" class="w-[100%] text-black" id="posto_graduacao">
                                <option value="{{$associado['posto_graduacao'] ? $associado['posto_graduacao'] : ''}}" selected>{{$associado['posto_graduacao'] ? $associado['posto_graduacao'] : 'Selecionar...'}}</option>
                                <option value="SD">SD</option>
                                <option value="CB">CB</option>
                                <option value="3º SGT">3º SGT</option>
                                <option value="2º SGT">2º SGT</option>
                                <option value="1º SGT">1º SGT</option>
                                <option value="SUB TEN">SUB TEN</option>
                                <option value="ASP OF">ASP. OF.</option>
                                <option value="2º TEN">2º TEN</option>
                                <option value="1º TEN">1º TEN</option>
                                <option value="CAP">CAP</option>
                                <option value="MAJ">MAJ</option>
                                <option value="TEN CEL">TEN CEL</option>
                                <option value="CEL">CEL</option>
                            </select>
                        </div>

                        <div class=" w-[100%]">
                            <span>Situação</span>
                            <select name="situacao" class="w-[100%] text-black" id="situacao">
                                <option value="{{$associado['situacao'] ? $associado['situacao'] : ''}}" selected>{{$associado['situacao'] ? $associado['situacao'] : 'Selecionar...'}}</option>
                                <option value="Ativa">Ativa</option>
                                <option value="Veterano">Veterano</option>
                            </select>
                        </div>

                    </div>

                    <div class="flex flex-col md:flex-row justify-between gap-4 mb-4">

                        <div class=" w-[100%]">
                            <span>RG Funcional</span>
                            <input type="number" class="w-[100%] text-black" name="rg" value="{{$associado['rg']}}"
                                placeholder="Digite apenas os numeros do RG" required>
                        </div>

                        <div class=" w-[100%]">
                            <span>E-mail</span>
                            <input type="email" class="w-[100%] text-black" name="email" value="{{$associado['email']}}">
                        </div>

                    </div>

                    <div class="flex flex-col md:flex-row justify-between gap-4">

                        <div class=" w-[100%]">
                            <span>OPM</span>
                            <input type="text" class="w-[100%] text-black" name="opm" value="{{$associado['opm']}}" placeholder="Ex: QCG/FASPM"
                                required>
                        </div>

                        <div class=" w-[100%]">
                            <span>Celular</span>
                            <input type="text" class="w-[100%] text-black" name="celular" value="{{$associado['celular']}}" placeholder="91900000000">
                        </div>

                    </div>

                </div>

                <h4 class="text-white text-left mb-4 text-xl">Endereço</h4>
                <div class="m-auto md:w-[70%] pb-4 mb-4">

                    <div class="flex flex-col md:flex-row justify-between gap-4">

                        <div class="w-[100%]">
                            <span>CEP</span>
                            <input class="w-[100%] text-black" name="cep" type="text" id="cep"
                                size="10" maxlength="9" value="{{$associado['cep']}}"
                                placeholder="Digite o cep correto e os demais dados serão preenchidos">
                        </div>

                        <div class="mb-4 w-[100%]">
                            <span>Rua</span>
                            <input type="text" class="w-[100%] text-black" name="rua" id="rua" value="{{$associado['logradouro']}}" required>
                        </div>

                    </div>

                    <div class="flex flex-col mb-4 md:flex-row justify-between gap-4">

                        <div class=" w-[100%]">
                            <span>Cidade</span>
                            <input type="text" class="w-[100%] text-black" name="cidade" id="cidade" value="{{$associado['municipio']}}" required>
                        </div>

                        <div class=" w-[100%]">
                            <span>Bairro</span>
                            <input type="text" class="w-[100%] text-black" name="bairro" id="bairro" value="{{$associado['bairro']}}" required>
                        </div>

                        <div class=" w-[100%]">
                            <span>UF</span>
                            <input type="text" class="w-[100%] text-black" name="uf" id="uf" value="{{$associado['estado']}}">
                        </div>

                    </div>

                    <div class="flex flex-col md:flex-row justify-between gap-4 mb-4">

                        <div class=" w-[100%]">
                            <span>Complemento</span>
                            <input type="text" class="w-[100%] text-black" name="complemento" id="complemento" value="{{$associado['complemento']}}">
                        </div>

                        <div class=" w-[100%]">
                            <span>Número</span>
                            <input type="text" class="w-[100%] text-black" name="numero" id="numero" value="{{$associado['numero']}}">
                        </div>

                    </div>

                </div>

                <button type="submit" class="w-[70%] p-2 bg-blue-800 hover:bg-blue-900 border">Continuar</button>

            </div>

        </form>

        <div id="alert-border-1"
            class="flex p-4 mb-4 text-orange-800 mt-4 w-[90%] m-auto border-t-4 border-orange-300 bg-orange-50 dark:text-orange-400 dark:bg-gray-800 dark:border-orange-800"
            role="alert">
            <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div class="ml-3 text-sm font-medium">
                Observações importantes: <br>
                DOCUMENTAÇÃO EM ANEXO: <br>
                1- Copia do contracheque do mês atual; <br>
                2- Identidade Militar.
            </div>

            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-orange-50 text-orange-500 rounded-lg focus:ring-2 focus:ring-orange-400 p-1.5 hover:bg-orange-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-orange-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-border-1" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>

        </div>

        <x-footer></x-footer>

        <script>
            const inputcep = document.getElementById('cep');
            const rua = document.getElementById('rua');
            const cidade = document.getElementById('cidade');
            const bairro = document.getElementById('bairro');
            const uf = document.getElementById('uf');

            inputcep.addEventListener('blur', () => {
                let cep = inputcep.value;

                if (cep.length !== 8) {
                    alert('Digite apenas os 8 números do CEP, sem traços e sem espaços');
                    return;
                }

                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => response.json())
                    .then(json => {
                        if (json.erro) {
                            limpa_formulário_cep();
                            alert('CEP não localizado! Digite seus dados nos campos.');
                        } else {
                            rua.value = json.logradouro;
                            bairro.value = json.bairro;
                            cidade.value = json.localidade;
                            uf.value = toUpperCase(json.uf);
                        }
                    });
            });

            function limpa_formulário_cep() {
                //Limpa valores do formulário de cep.
                document.getElementById('rua').value = ("");
                document.getElementById('bairro').value = ("");
                document.getElementById('cidade').value = ("");
                document.getElementById('uf').value = ("");
            }
        </script>

        <style>
            body {
                color: white
            }

            #formCard {
                background-color: rgba(255, 255, 255, .2);
            }

        </style>

    </section>
@endsection
