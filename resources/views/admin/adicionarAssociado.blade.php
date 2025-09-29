@extends('admin.template')

@section('content')
@include('components.buttonReturn')

<div class="flex w-[100%] p-4 justify-center items-center">

    <div class="bg-white w-[90%] flex flex-col justify-center rounded-lg shadow ">

        <div
            class="flex items-start justify-between p-4 border-b bg-green-600 rounded-t dark:border-gray-600">
            <h3 class="text-xl font-semibold text-white">
                Adicionar Novo Associado
            </h3>
        </div>

        <form method="post" action="{{route('admin.adicionarAssociado')}}"
            class="w-[100%]  flex flex-col justify-center gap-8 items-center">
            @csrf
            <div class="w-[90%] mb-4 mt-4 text-left">
                <label for="nome-associado" class="font-bold  ">Nome do Associado: </label>
                <input id="nome" type="text" name="nome"
                    class="rounded-md w-full p-2 border" id="nome" placeholder="Digite o Nome Completo do Associado" >
            </div>
            <div class="w-[90%] mb-4 text-left">
                <label for="cpf-associado" class="font-bold">CPF: </label>
                <input type="text" name="cpf"
                    class="rounded-md w-full p-2 border" id="cpf-associado" placeholder="Digite apenas os números do CPF">
            </div>
            <div class="w-[90%] mb-4 text-left">
                <label for="matricula-associado" class="font-bold">Matrícula:</label>
                <input type="text" name="matricula"
                    class="rounded-md w-full p-2 border" id="matricula" placeholder="Digite a matrícula sem o dígito verificador /1" >
            </div>
            <div class="w-[90%] mb-4 text-left">
                <label for="email-associado" class="font-bold">Email:</label>
                <input type="email" name="email"
                    class="rounded-md w-full p-2 border" id="email" placeholder="Digite o e-mail do Associado, se tiver">
            </div>
            <div class="w-[90%] mb-4 text-left">
                <label for="rg-associado" class="font-bold">RG:</label>
                <input type="number" name="rg"
                    class="rounded-md w-full p-2 border" id="rg" placeholder="Digite o RG funcional do Militar">
            </div>
            <div class="w-[90%] mb-4 text-left">
                <div class=" w-[100%]">
                    <label class="font-bold">Situação:</label>
                    <select name="situacao" class="w-[100%] text-black" id="situacao">
                        <option value="" selected>Selecionar...</option>
                        <option value="Ativa">Ativa</option>
                        <option value="Veterano">Veterano</option>
                    </select>
                </div>
            </div>
            <div class="w-[90%] mb-4 text-left">
                <label class="font-bold">Posto/Graduação:</label>
                <select name="posto_graduacao" class="w-[100%] text-black" id="posto_graduacao">
                    <option value="" selected>Selecionar...</option>
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
            <div class="w-[90%] mb-4 text-left">
                <label for="rg-associado" class="font-bold">OPM:</label>
                <input type="text" name="opm"
                    class="rounded-md w-full p-2 border" id="opm" placeholder="Ex.: QCG/BCS">
            </div>
            <div class="w-[90%] mb-4 text-left">
                <label for="rg-associado" class="font-bold">CEP:</label>
                <input type="text" name="cep"
                    class="rounded-md w-full p-2 border" id="cep" placeholder="Digite apenas os números do Cep exato">
            </div>
            <div class="w-[90%] mb-4 text-left">
                <label for="rg-associado" class="font-bold">RUA:</label>
                <input type="text" name="rua"
                    class="rounded-md w-full p-2 border" id="rua">
            </div>
            <div class="w-[90%] mb-4 text-left">
                <label for="rg-associado" class="font-bold">BAIRRO:</label>
                <input type="text" name="bairro"
                    class="rounded-md w-full p-2 border" id="bairro">
            </div>
            <div class="w-[90%] mb-4 text-left">
                <label for="rg-associado" class="font-bold">CIDADE:</label>
                <input type="text" name="cidade"
                    class="rounded-md w-full p-2 border" id="cidade">
            </div>
            <div class="w-[90%] mb-4 text-left">
                <label for="rg-associado" class="font-bold">COMPLEMENTO:</label>
                <input type="text" name="complemento"
                    class="rounded-md w-full p-2 border" id="complemento">
            </div>
            <div class="w-[90%] mb-4 text-left">
                <label for="rg-associado" class="font-bold">NUMERO:</label>
                <input type="text" name="numero"
                    class="rounded-md w-full p-2 border" id="numero">
            </div>
            <div class="w-[90%] mb-4 text-left">
                <label for="uf" class="font-bold">ESTADO: </label>
                <input type="text" name="uf" id="uf"
                    class="rounded-md w-full p-2 border">
            </div>
            <div class="w-[90%] mb-4 text-left">
                <label for="celular" class="font-bold">Celular:</label>
                <input type="text" name="celular"
                    class="rounded-md w-full p-2 border" id="celular" placeholder="Digite apenas os números do seu celular">
            </div>
            <div
                class="flex items-center p-6 space-x-2 w-[100%] border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="submit"
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Salvar</button>
                    <a href="{{route('admin.associado')}}"><button type="button"
                        class="text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">Cancelar Edição</button></a>
            </div>
        </form>
    </div>
</div>
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
