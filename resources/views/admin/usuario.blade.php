@extends('admin.template')

<x-navbar></x-navbar>

@section('content')


    @include('components.buttonReturn')

    <body>

        <main class="flex flex-col w-[100vw] items-center h-[98vh]">

            <header class="text-center text-2xl mt-8 mb-8 flex items-center gap-8 text-white">
                <h1>Arma Legal - Usuários</h1>
            </header>

            @if (session('success'))
                <div id="alert-border-3"
                    class="flex p-4 mb-4 text-blue-800 mt-4 w-[90%] m-auto border-t-4 border-blue-300 bg-blue-50 dark:text-blue-400 dark:bg-gray-800 dark:border-blue-800"
                    role="alert">
                    <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div class="ml-3 text-sm font-medium">
                        <p>{{ session('success') }}</p>
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
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

            <form method="post" class="w-[90%] mb-4 rounded-md">
                @csrf
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">
                    Pesquisar
                </label>

                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" name="pesquisa" id="default-search"
                        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-purple-500 focus:border-purple-500  dark:focus:ring-purple-500 dark:focus:border-purple-500"
                        placeholder="Pesquisar usuário por Nome" required>
                    <button type="submit"
                        class="text-white absolute right-2.5 bottom-2.5 bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-4 py-2 ">Pesquisar</button>
                </div>
            </form>


            <!-- Div do botão de limpar -->
            <div class="md:w-[15%] p-2 md:p-0 border mb-4 rounded-md text-center bg-orange-700 hover:bg-orange-600">
                <!-- Botão de limpar-->
                <button class=" flex items-center justify-center gap-4 text-white text-center w-full" type="button"
                    onclick="limpartable()">
                    <svg width="30px" height="30px" viewBox="0 0 48 48" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0)">
                            <rect width="48" height="48" fill="white" fill-opacity="0.01" />
                            <path d="M44.7818 24.1702L31.918 7.09938L14.1348 20.5L27.5 37L30.8556 34.6644L44.7818 24.1702Z"
                                fill="#2F88FF" stroke="#000000" stroke-width="4.30201" stroke-linejoin="round" />
                            <path
                                d="M27.4998 37L23.6613 40.0748L13.0978 40.074L10.4973 36.6231L4.06543 28.0876L14.4998 20.2248"
                                stroke="#000000" stroke-width="4.30201" stroke-linejoin="round" />
                            <path d="M13.2056 40.0721L44.5653 40.072" stroke="#000000" stroke-width="4.5"
                                stroke-linecap="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0">
                                <rect width="48" height="48" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <p>Limpar Pesquisa</p>
                </button>
            </div>

            <!-- Botões de adicionar novo e listagem -->
            <div class="w-[70%] flex flex-col md:flex-row mb-4 gap-4 justify-center rounded-md text-center">
                <button data-modal-target="staticModal" data-modal-toggle="staticModal"
                    class="p-4 text-white rounded-md text-center border w-full bg-purple-700 hover:bg-purple-600""
                    type="button">
                    Adicionar Novo Usuário
                </button>
                <a href="{{ route('admin.usuarioList') }}"
                    class="p-4 text-white rounded-md border text-center w-full bg-purple-700 hover:bg-purple-600"
                    type="button">
                    Visualizar lista de usuários
                </a>
            </div>

            @if ($resultado != null)
                <div class="overflow-auto shadow-md w-[100%] mt-8 mb-4 rounded-md justify-center items-center sm:rounded-lg"
                    id="tableLimpa">
                    <table class="text-sm text-left m-auto w-[90%] text-gray-500 items-end justify-center ">
                        <thead class="text-xs text-gray-700 uppercase bg-purple-600  ">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-white border">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3 text-white border">
                                    NOME
                                </th>
                                <th scope="col" class="px-6 py-3 text-white border">
                                    E-MAIL
                                </th>
                                <th scope="col" class="px-6 py-3 text-white border">
                                    AÇÃO
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resultado as $res)
                                <tr class="bg-white border-b   hover:bg-gray-50 ">

                                    <td scope="row" class="px-6 py-4 border">
                                        {{ $res->id }}
                                    </td>
                                    <td class="px-6 py-4 border">
                                        {{ $res->name }}
                                    </td>
                                    <td class="px-6 py-4 border">
                                        {{ $res->email }}
                                    </td>
                                    <td class="px-6 py-4 border text-right">
                                        <a href="{{ route('admin.editUser', ['id' => $res->id]) }}"><button
                                                class="font-medium text-purple-600 dark:text-purple-500 hover:underline"type="button">
                                                Editar
                                            </button></a>
                                        <form class="d-inline" action="{{ route('admin.deletarUser', ['id' => $res->id]) }}"
                                            method="post"
                                            onsubmit="return confirm('Tem certeza que deseja excluir este usuário?')">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif


            <!-- Main modal cadastro-->
            <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-[60%] max-h-full">
                    <!-- Modal content -->
                    <div class="relative flex flex-col items-center bg-white rounded-lg shadow ">
                        <!-- Modal header -->
                        <div
                            class="flex items-start bg-purple-600  justify-between p-4 border-b rounded-t w-[100%] dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-white">
                                Adicionar Novo Usuário
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  dark:hover:text-white"
                                data-modal-hide="staticModal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form method="post" action="{{ route('admin.cadUser') }}"
                            class="w-[100%] p-2 flex flex-col justify-around items-center">
                            @csrf
                            <div class="w-[90%] mb-4 mt-4">
                                <label for="nome" class="font-bold  ">Nome: </label>
                                <input type="text" name="name" class="rounded-md bg-red w-full p-2 border">
                            </div>
                            <div class="w-[90%] mb-4">
                                <label for="cpf" class="font-bold">E-mail: </label>
                                <input type="text" name="email" class="rounded-md w-full p-2 border">
                            </div>
                            <div class="w-[90%] mb-4">
                                <label for="matricula" class="font-bold">Senha: </label>
                                <input type="password" name="password" class="rounded-md w-full p-2 border">
                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="staticModal" type="submit"
                                    class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Cadastrar</button>

                                <button data-modal-hide="staticModal" type="button"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-purple-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10  dark:text-gray-300 dark:border-gray-500 dark:hover:text-white  dark:focus:ring-gray-600">Fechar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </main>


    </body>


    <style>
        body {
            overflow-x: hidden;
        }
    </style>



    <x-footer></x-footer>

@endsection

<script type="text/javascript">
    function limpartable() {
        var tableLimpa = document.getElementById('tableLimpa');
        tableLimpa.classList.add('hidden');
        var limparbutton = document.getElementById('limpar');
        limparbutton.classList.add('hidden');
    }
</script>
