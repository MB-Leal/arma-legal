@extends('admin.template')

@section('content')

<x-navbar></x-navbar>

@include('components.buttonReturn')

<main class="flex flex-col w-[100vw] items-center h-[100vh]">
        <header class="text-center w-[100%] justify-center text-3xl mt-8 mb-8 flex items-center gap-8 text-white">
            <h1>Arma Legal - Requerimento</h1>
        </header>

        @if (session('success'))
        <div id="alert-border-3" class="flex p-4 mb-4 text-blue-800 mt-4 w-[90%] m-auto border-t-4 border-blue-300 bg-blue-50 dark:text-blue-400 dark:bg-gray-800 dark:border-blue-800" role="alert">
            <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="ml-3 text-sm font-medium">
                <p>{{session('success')}}</p>
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
              <span class="sr-only">Dismiss</span>
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        @endif

        <form action="{{ route('admin.arma') }}" method="post" class="w-[90%]  mb-8">
            @csrf
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Pesquisar</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" name="pesquisa" id="default-search"
                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Pesquisar arma" required>
                <button type="submit" onclick="aparecer()"
                    class="text-white absolute right-2.5 bottom-2.5 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pesquisar</button>
            </div>
        </form>

        <div class="w-[15%] border mb-4 rounded-md text-center bg-orange-700 hover:bg-orange-600" >
            <!-- Botão de limpar-->
            <button  class=" flex items-center justify-center gap-4 text-white text-center w-full" type="button" onclick="limpartable()">
                <svg width="30px" height="30px" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0)">
                    <rect width="48" height="48" fill="white" fill-opacity="0.01"/>
                    <path d="M44.7818 24.1702L31.918 7.09938L14.1348 20.5L27.5 37L30.8556 34.6644L44.7818 24.1702Z" fill="#2F88FF" stroke="#000000" stroke-width="4.30201" stroke-linejoin="round"/>
                    <path d="M27.4998 37L23.6613 40.0748L13.0978 40.074L10.4973 36.6231L4.06543 28.0876L14.4998 20.2248" stroke="#000000" stroke-width="4.30201" stroke-linejoin="round"/>
                    <path d="M13.2056 40.0721L44.5653 40.072" stroke="#000000" stroke-width="4.5" stroke-linecap="round"/>
                    </g>
                    <defs>
                    <clipPath id="clip0">
                    <rect width="48" height="48" fill="white"/>
                    </clipPath>
                    </defs>
                    </svg>
                <p>Limpar Pesquisa</p>
            </button>
        </div>

        <!-- Botões de adicionar novo e listagem -->
        <div class="w-[70%] flex mb-4 gap-4 justify-center rounded-md text-center ">
            <!-- Botão para chamar modal Novo armamento-->
            <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                class="p-4 text-white rounded-md text-center border w-full bg-blue-700 hover:bg-blue-600" type="button">
                Adicionar Novo Armamento
            </button>

            <a  class="p-4 text-white rounded-md border text-center w-full bg-blue-700 hover:bg-blue-600" href="{{route('admin.armaList')}}">Lista Geral de Armamento</a>

        </div>

        @if ($resultado != null)
        <div id="tableRes" class="overflow-auto shadow-md w-[100%] mt-8 mb-4 rounded-md justify-center items-center sm:rounded-lg">
            <table class="text-sm text-left m-auto w-[90%] text-gray-500  items-end justify-center ">
                <thead class="text-xs text-gray-100 uppercase bg-blue-700">
                    <tr>
                        <th scope="col" class="px-6 py-3 border">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3 border">
                            Arma
                        </th>
                        <th scope="col" class="px-6 py-3 border">
                            Imagem Princ.
                        </th>
                        <th scope="col" class="px-6 py-3 border">
                            Tipo
                        </th>
                        <th scope="col" class="px-6 py-3 border">
                            Fabricante
                        </th>
                        <th scope="col" class="px-6 py-3 border">
                            Calibre
                        </th>
                        <th scope="col" class="px-6 py-3 border">
                            Preço
                        </th>
                        <th scope="col" class="px-6 py-3 border text-center">
                            <span class="text-center">Ação</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resultado as $result)
                        <tr
                            class="bg-white border-b border dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td scope="row" class="px-6 py-4 border">
                                {{ $result->id }}
                            </td>
                            <td scope="row" class="px-6 py-4 border">
                                {{ $result->nome }}
                            </td>
                            <td class="flex items-center justify-center">
                                <img class="object-cover w-20 h-20" src="{{$result->img1}}">
                            </div>
                            </td>
                            <td class="px-6 py-4 border">
                                {{ $result->tipo }}
                            </td>
                            <td class="px-6 py-4 border">
                                {{ $result->fabricante }}
                            </td>
                            <td scope="row" class="px-6 border py-4 ">
                                {{ $result->calibre }}
                            </td>
                            <td scope="row" class="px-6 border py-4 ">
                                {{ $result->preco }}
                            </td>
                            <td class="px-6 py-4 bg-transparent border text-center">
                                <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{route('admin.editarArma', ['id'=>$result->id])}}">
                                    Editar </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif


        <!-- Main modal Novo armamento -->
        <div id="defaultModal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Adicionar Novo Armamento
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="defaultModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form method="post" action="{{route('admin.cadArma')}}" class="w-[100%] flex flex-col justify-around items-center"
                    enctype="multipart/form-data">
                        @csrf
                        <table
                            class="text-sm text-left text-gray-500 dark:text-gray-400 items-end justify-center mt-4 mb-4 w-[90%]">
                            <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                    <th scope="col" class="p-1 border  w-[30%]">
                                        Nome da Arma
                                    </th>
                                    <td class="text-black">
                                        <input class="border w-[100%] p-2" type="text" name="nome" id="nome" required>
                                    </td>
                                </tr>
                                <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                    <th scope="col" class="p-1 border  w-[30%]">
                                        Imagem Principal
                                    </th>
                                    <td class="text-black">
                                        <!--<input class="border w-[100%] text-black p-2"
                                        type="text"
                                        name="img1"
                                        id="img1" required> -->
                                        <input type="file" name="img1" class="form-control">
                                    </td>
                                </tr>
                                <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                    <th scope="col" class="p-1 border  w-[30%]">
                                        Segunda imagem
                                    </th>
                                    <td class="text-black">
                                        <!--<input class="border w-[100%] text-black p-2"
                                        type="text"
                                        name="img2"
                                        id="img2"> -->
                                        <input type="file" name="img2" class="form-control">
                                    </td>
                                </tr>
                                <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                    <th scope="col" class="p-1 border  w-[30%]">
                                        Terceira imagem
                                    </th>
                                    <td class="text-black">
                                        <!--<input class="border w-[100%] text-black p-2"
                                        type="text"
                                        name="img3"
                                        id="img3">-->
                                        <input type="file" name="img1" class="form-control">
                                    </td>
                                </tr>
                                <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                    <th scope="col" class="p-1 border  w-[30%]">
                                        Fabricante
                                    </th>
                                    <td class="text-black">
                                        <select name="fabricante" id="fabricante" class="border w-[100%] p-2 text-xl">
                                            <option value="Taurus">Taurus</option>
                                            <option value="Glock">Glock</option>
                                            <option value="CBC">CBC</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                    <th scope="col" class="p-1 border  w-[30%]">
                                        Tipo
                                    </th>
                                    <td class="text-black">
                                        <select name="tipo" id="tipo" class="border w-[100%] p-2 text-xl">
                                            <option value="Pistola">Pistola</option>
                                            <option value="Revolver">Revolver</option>
                                            <option value="Arma Longa">Arma Longa</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                    <th scope="col" class="p-1 border  w-[30%]">
                                        Calibre
                                    </th>
                                    <td class="text-black">
                                        <input class="border w-[100%] p-2" type="text" name="calibre" id="calibre" required>
                                    </td>
                                </tr>
                                <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                    <th scope="col" class="p-1 border  w-[30%]">
                                        Acabamento
                                    </th>
                                    <td class="text-black">
                                        <input class="border w-[100%] p-2" type="text" name="acabamento"
                                            id="acabamento" required>
                                    </td>
                                </tr>
                                <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                    <th scope="col" class="p-1 border  w-[30%]">
                                        Capacidade de tiros
                                    </th>
                                    <td class="text-black">
                                        <input class="border w-[100%] p-2" type="text" name="capacidade_tiro"
                                            id="capacidade_tiro" required>
                                    </td>
                                </tr>
                                <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                    <th scope="col" class="p-1 border  w-[30%]">
                                        Sist. de funcionamento
                                    </th>
                                    <td class="text-black">
                                        <input class="border w-[100%] p-2" type="text" name="sistema_funcionamento"
                                            id="sistema_funcionamento" required>
                                    </td>
                                </tr>
                                <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                    <th scope="col" class="p-1 border  w-[30%]">
                                        Qnt de canos
                                    </th>
                                    <td class="text-black">
                                        <input class="border w-[100%] p-2" type="number" name="qtd_cano"
                                            id="qtd_cano" required>
                                    </td>
                                </tr>
                                <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                    <th scope="col" class="p-1 border  w-[30%]">
                                        Comprimento do cano
                                    </th>
                                    <td class="text-black">
                                        <input class="border w-[100%] p-2" type="text" name="comprimento_cano"
                                            id="comprimento_cano" required>
                                    </td>
                                </tr>
                                <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                    <th scope="col" class="p-1 border  w-[30%]">
                                        Tipo de alma
                                    </th>
                                    <td class="text-black">
                                            <select name="tipo_alma" id="tipo_alma" class="border w-[100%] p-2 text-xl">
                                                <option value="Raiada">Raiada</option>
                                                <option value="Lisa">Lisa</option>
                                            </select>
                                    </td>
                                </tr>
                                <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                    <th scope="col" class="p-1 border  w-[30%]">
                                        Qnt de raias
                                    </th>
                                    <td class="text-black">
                                        <input class="border w-[100%] p-2" type="number" name="qtd_raias"
                                            id="qtd_raias" required>
                                    </td>
                                </tr>
                                <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                    <th scope="col" class="p-1 border  w-[30%]">
                                        Sentido de raias
                                    </th>
                                    <td class="text-black">
                                            <select name="sentido_raias" id="sentido_raias" class="border w-[100%] p-2 text-xl">
                                                <option value="Direita">Direita</option>
                                                <option value="Esquerda">Esquerda</option>
                                            </select>
                                    </td>
                                </tr>
                                <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                    <th scope="col" class="p-1 border  w-[30%]">
                                        País de fabricação
                                    </th>
                                    <td class="text-black">
                                        <input class="border w-[100%] p-2" type="text" name="pais_fabricacao" id="pais_fabricacao" required>
                                    </td>
                                </tr>
                                <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                    <th scope="col" class="p-1 border  w-[30%]">
                                        Preço
                                    </th>
                                    <td class="text-black">
                                        <input class="border w-[100%] p-2" type="number" name="preco" id="preco" required>
                                    </td>
                                </tr>
                                <tr class="bg-blue-900 border-b hidden hover:bg-blue-700 ">
                                    <th scope="col" class="p-1 border  w-[30%]">
                                        Taxa
                                    </th>
                                    <td class="text-black">
                                        <input class="border w-[100%] p-2" type="number" name="taxa" id="taxa" value="0.74" readonly>
                                    </td>
                                </tr>
                                <tr class="bg-blue-900 border-b hover:bg-blue-700 ">
                                    <th scope="col" class="p-1 border  w-[30%]">
                                        Situação
                                    </th>
                                    <td class="text-black">
                                        <select name="situacao" id="situacao" class="border w-[100%] p-2 text-xl">
                                            <option value="A">Ativa</option>
                                            <option value="I">Inativa</option>
                                        </select>
                                </tr>
                                <tr class="bg-blue-900 border-b hover:bg-blue-700 ">
                                    <th scope="col" class="p-1 border  w-[30%]">
                                        Quantidade
                                    </th>
                                    <td class="text-black">
                                        <input class="border w-[100%] p-2" type="number" name="quantidade" id="quantidade">
                                    </td>
                                </tr>
                                <tr class="bg-blue-900 border-b hover:bg-blue-700 ">
                                    <th scope="col" class="p-1 border  w-[30%]">
                                        Estoque Mínimo
                                    </th>
                                    <td class="text-black">
                                        <input class="border w-[100%] p-2" type="number" name="estoque_min" id="estoque_min">
                                    </td>
                                </tr>
                            </thead>
                        </table>

                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="defaultModal" type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cadastrar</button>

                        <button data-modal-hide="defaultModal" type="button"
                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-white focus:z-10 ">Cancelar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>


    </main>

    <x-footer></x-footer>

@endsection

<script type="text/javascript">

    function limpartable(){
        var tableLimpa = document.getElementById('tableRes');
        tableLimpa.classList.add('hidden');
        var limparbutton = document.getElementById('limpar');
        limparbutton.classList.add('hidden');
    }


    </script>
