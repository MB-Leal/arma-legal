@extends('site.template')

@section('content')
    @if (session('danger'))
        <div id="alert-border-3"
            class="flex p-4 mb-4 text-red-800 lg:w-[75%] mt-4 m-auto border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800"
            role="alert">
            <div class="ml-3 text-sm font-medium">
                {{ session('danger') }}
            </div>
            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:red-green-400 dark:hover:bg-gray-700"
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

    <h2 class="text-center mb-4 mt-4 p-4 text-white text-4xl">Atualização Cadastral</h2>
    @if ($dados != null)
        <div class="w-[80%] m-auto flex mb-4 flex-col rounded-2xl border min-v-[100vh] bg-zinc-900">
            <form action="{{ route('site.updateAction') }}" method="post"
                class="flex flex-col items-center  justify-center ">
                <h3 class="text-white text-2xl mb-4 mt-8 text-center w-[80%]">Informações Pessoais</h3>
                @csrf
                <div class="hidden w-[100%] flex-col items-center">
                    <input type="number" name="id" id="id" class=" rounded-md p-2 mb-4"
                        value="{{ $dados['id'] }}">
                </div>
                <div class=" w-[90%] lg:w-[70%] flex flex-col justify-center">
                    <label for="nome" class="text-left text-white mb-4 font-bold text-xl">Nome:</label>
                    <input type="text" name="nome" id="nome" class=" rounded-md p-2 mb-4"
                        value="{{ $dados['nome'] }}">
                </div>


                <div class="lg:w-[70%] lg:grid w-[100%] lg:grid-cols-3 flex lg:flex-row flex-col  justify-center items-center">
                    <div class=" w-[90%] col-span-1 flex flex-col justify-center">
                        <label for="matricula" class="text-left text-white mb-4 font-bold text-xl">Mat.
                            Funcional.:</label>
                        <input type="text" name="matricula" id="matricula" class="rounded-md p-2 mb-4"
                            value="{{ $dados['matricula'] }}">
                    </div>
                    <div class=" w-[90%] flex flex-col justify-center">
                        <label for="rg" class="text-left text-white mb-4 font-bold text-xl">RG Militar:</label>
                        <input type="number" name="rg" id="rg" class="rounded-md p-2 mb-4"
                            placeholder="DIGITE O RG FUNCIONAL" value="{{ $dados['rg'] }}" required>
                    </div>
                    <div class=" w-[90%] flex flex-col justify-center">
                        <label for="cpf" class="text-left text-white mb-4 font-bold text-xl ">CPF:</label>
                        <input type="text" name="cpf" id="cpf" class=" rounded-md p-2 mb-4"
                            value="{{ $dados['cpf'] }}" readonly>
                    </div>
                    <div class=" w-[90%] flex flex-col col-span-2 justify-center">
                        <label for="email" class="text-left text-white mb-4 font-bold text-xl">E-mail:</label>
                        <input type="email" name="email" id="email" class=" rounded-md p-2 mb-4"
                            placeholder="DIGITE SEU MELHOR E-MAIL" value="{{ $dados['email'] }}">
                    </div>
                    <div class=" w-[90%] flex flex-col justify-center">
                        <label for="telefone" class="text-left text-white mb-4 font-bold text-xl">Telefone/Whatsapp:
                        </label>
                        <input type="number" name="telefone" id="telefone" class=" rounded-md p-2 mb-4"
                            placeholder="(91)988888888" value="{{$dados['celular']}}">
                    </div>
                </div>

                <h3 class="text-white text-2xl mb-4 pt-4 mt-8 border-t text-center w-[80%]">Informações Militares</h3>

                <div class="lg:w-[70%] lg:grid w-[100%] lg:grid-cols-3 flex lg:flex-row flex-col  justify-center items-center">
                    <div class=" w-[90%] flex flex-col justify-center">
                        <label for="posto_graduacao"
                            class="text-left text-white mb-4 font-bold text-xl">Posto/Graduação:</label>
                            <select name="posto_graduacao" class="rounded-md p-2 mb-4" id="posto_graduacao">
                                <option value="{{$dados['posto_graduacao'] ? $dados['posto_graduacao'] : ''}}" selected>{{$dados['posto_graduacao'] ? $dados['posto_graduacao'] : 'Selecionar...'}}</option>
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

                    <div class=" w-[90%] flex flex-col justify-center">
                        <label for="opm" class="text-left text-white mb-4 font-bold text-xl">OPM:</label>
                        <input type="text" name="opm" id="opm" class="rounded-md p-2 mb-4"
                            placeholder="Digite a sigla da sua OPM, Exemplo: QCG/DGA" value="{{$dados['opm']}}">
                    </div>

                    <div class=" w-[90%] flex flex-col justify-center">
                        <label for="situacao" class="text-left text-white mb-4 font-bold text-xl">Situação:</label>
                        <select name="situacao" class=" rounded-md p-2 mb-4" id="situacao">
                            <option value="{{$dados['situacao'] ? $dados['situacao'] : ''}}" selected>{{$dados['situacao'] ? $dados['situacao'] : 'Selecionar...'}}</option>
                            <option value="Ativa">Ativa</option>
                            <option value="Veterano">Veterano</option>
                        </select>
                    </div>
                </div>

                <h3 class="text-white text-2xl mb-4 pt-4 mt-8 border-t text-center w-[80%]">Informações de Endereço</h3>

                <div class="lg:w-[70%] lg:grid w-[100%] lg:grid-cols-3 flex lg:flex-row flex-col  justify-center items-center">
                    <div class=" w-[90%] flex flex-col justify-center">
                        <label class="text-left text-white mb-4 font-bold text-xl w-[100%]">Cep: </label>
                        <input name="cep" type="text" id="cep" size="10" maxlength="9"
                            class=" rounded-md p-2 mb-4 w-[100%]" value="{{$dados['cep']}}"/>
                    </div>
                    <div class=" w-[90%] flex flex-col justify-center col-span-2">
                        <label for="rua" class="text-left  text-white mb-4 font-bold text-xl">Rua: </label>
                        <input type="text" name="rua" id="rua" class=" rounded-md p-2 mb-4" value="{{$dados['logradouro']}}">
                    </div>
                    <div class=" w-[90%] flex flex-col justify-center">
                        <label for="uf" class="text-left text-white mb-4 font-bold text-xl">Estado: </label>
                        <input type="text" name="uf" id="uf" class=" rounded-md p-2 mb-4" value="{{$dados['estado']}}">
                    </div>
                    <div class=" w-[90%] flex flex-col justify-center">
                        <label for="bairro" class="text-left text-white mb-4 font-bold text-xl">Bairro: </label>
                        <input type="text" name="bairro" id="bairro" class=" rounded-md p-2 mb-4" value="{{$dados['bairro']}}">
                    </div>
                    <div class=" w-[90%] flex flex-col justify-center">
                        <label for="cidade" class="text-left text-white mb-4 font-bold text-xl">Cidade: </label>
                        <input type="text" name="cidade" id="cidade" class=" rounded-md p-2 mb-4" value="{{$dados['municipio']}}">
                    </div>
                    <div class=" w-[90%] flex flex-col col-span-2 justify-center">
                        <label for="complemento" class="text-left text-white mb-4 font-bold text-xl">Complemento </label>
                        <input type="text" name="complemento" id="complemento" class=" rounded-md p-2 mb-4" value="{{$dados['complemento']}}">
                    </div>
                    <div class=" w-[90%] flex flex-col justify-center">
                        <label for="numero" class="text-left text-white mb-4 font-bold text-xl">Número/Casa </label>
                        <input type="text" name="numero" id="numero" class=" rounded-md p-2 mb-4" value="{{$dados['numero']}}">
                    </div>


                </div>

                <div class="mb-8 w-[70%] mt-8">
                    <button type="submit"
                        class="p-2 px-4 w-[100%] border rounded-md bg-blue-800 hover:bg-blue-900 text-white">
                        Salvar
                    </button>
                </div>



            </form>
        </div>
    @else
        <div class=" flex justify-center items-center w-[100%]">

            <form method="post" action="{{ route('site.pesquisarAssoc') }}"
                class="flex flex-col items-center  justify-center w-[80%] min-h-[90vh] ">
                @csrf
                <label for="cpf" class="text-left text-white mb-4 font-bold text-xl">CPF:</label>
                <input type="text" name="cpf" id="cpf" class="w-[80%] rounded-md p-2 mb-4"
                    placeholder="SOMENTE OS NÚMEROS DO CPF">
                <button type="submit"
                    class="p-2 px-4 border rounded-md bg-blue-800 hover:bg-blue-900 text-white">Verificar</button>
            </form>
        </div>
    @endif

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
@endsection
