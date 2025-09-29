@extends('admin.template')

<x-navbar></x-navbar>

@section('content')

    @include('components.buttonReturn')

    <body>

        <main class="flex flex-col w-[100vw] items-center min-h-[100vh] overflow-x-hidden">
            <header class="text-center w-[100%] justify-center text-3xl mt-8 mb-8 flex items-center gap-8 text-white">
                <h1>Arma Legal - Armas</h1>
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

            <form action="{{ route('admin.arma') }}" method="post" class="w-[90%]  mb-8">
                @csrf
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only bg-blue-600">Pesquisar
                </label>
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
                        placeholder="Pesquisa geral de armas" required>
                    <button type="submit" onclick="aparecer()"
                        class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Pesquisar</button>
                </div>
            </form>

            <div class="md:w-[15%] border p-2 md:p-0 mb-4 rounded-md text-center bg-orange-700 hover:bg-orange-600">
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
            <div class="w-[70%] flex flex-col md:flex-row mb-4 gap-4 justify-center rounded-md text-center ">
                <!-- Botão para chamar modal Novo armamento-->
                <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                    class="p-4 text-white rounded-md text-center border w-full bg-blue-700 hover:bg-blue-600"
                    type="button">
                    Adicionar Novo Armamento
                </button>

                <a class="p-4 text-white rounded-md border text-center w-full bg-blue-700 hover:bg-blue-600"
                    href="{{ route('admin.armaList') }}">Lista Geral de Armamento</a>

            </div>

            @if ($resultado != null)
                <div id="tableRes"
                    class="overflow-auto shadow-md mr-4 md:mr-0 w-[90%] mt-8 mb-4 justify-center items-center">
                    <table
                        class="text-sm text-left m-auto md:w-[100%] text-gray-500  items-end justify-center overflow-x-hidden ">
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
                                <th scope="col" class="px-6 py-3 border">
                                    Situação
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
                                    <td scope="row" class="px-6 border py-4 ">
                                        {{ $result->situacao == 'I' ? 'Inativa' : 'Ativa' }}
                                    </td>
                                    <td class="h-[100%] bg-transparent border text-center">


                                        <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                            href="{{ route('admin.editarArma', ['id' => $result->id]) }}">
                                            <button data-tooltip-target="tooltip-default" type="button"
                                                class="text-white "><svg width="30px" height="30px"
                                                    viewBox="0 0 1024 1024" class="icon" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M823.3 938.8H229.4c-71.6 0-129.8-58.2-129.8-129.8V215.1c0-71.6 58.2-129.8 129.8-129.8h297c23.6 0 42.7 19.1 42.7 42.7s-19.1 42.7-42.7 42.7h-297c-24.5 0-44.4 19.9-44.4 44.4V809c0 24.5 19.9 44.4 44.4 44.4h593.9c24.5 0 44.4-19.9 44.4-44.4V512c0-23.6 19.1-42.7 42.7-42.7s42.7 19.1 42.7 42.7v297c0 71.6-58.2 129.8-129.8 129.8z"
                                                        fill="#3688FF" />
                                                    <path
                                                        d="M483 756.5c-1.8 0-3.5-0.1-5.3-0.3l-134.5-16.8c-19.4-2.4-34.6-17.7-37-37l-16.8-134.5c-1.6-13.1 2.9-26.2 12.2-35.5l374.6-374.6c51.1-51.1 134.2-51.1 185.3 0l26.3 26.3c24.8 24.7 38.4 57.6 38.4 92.7 0 35-13.6 67.9-38.4 92.7L513.2 744c-8.1 8.1-19 12.5-30.2 12.5z m-96.3-97.7l80.8 10.1 359.8-359.8c8.6-8.6 13.4-20.1 13.4-32.3 0-12.2-4.8-23.7-13.4-32.3L801 218.2c-17.9-17.8-46.8-17.8-64.6 0L376.6 578l10.1 80.8z"
                                                        fill="#5F6379" />
                                                </svg></button>
                                            <div id="tooltip-default" role="tooltip"
                                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                Editar
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                        </a>

                                        <a href="{{ route('admin.desativar', ['id' => $result->id]) }}">
                                            <button data-tooltip-target="tooltip-default1" type="submit"
                                            class="text-red-700"><svg height="30px" width="30px" version="1.1"
                                                id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 508.4 508.4"
                                                xml:space="preserve">
                                                <path style="fill:#AEB1B4;"
                                                    d="M108.8,453.2c2,25.6,24.8,47.2,49.6,47.2h204c24.8,0,47.6-21.6,49.2-47.2l16.8-336.8H80.8
L108.8,453.2z" />
                                                <path style="fill:#E36D60;"
                                                    d="M447.2,112.4c0-6,0-14.4,0-26c0-15.2-12.4-26-29.2-26H90c-15.6,0-31.2,10-31.2,26v26H447.2z" />
                                                <path style="fill:#CCCCCC;"
                                                    d="M54.4,114.4c0,1.2,0,2,0,2h2C55.2,116.4,54.4,115.6,54.4,114.4z" />
                                                <path style="fill:#E36D60;"
                                                    d="M175.2,42.8l-3.6,15.6h165.2l-3.6-15.6c-4.8-20-25.6-36.4-46.8-36.4h-64
C200.8,6.4,180,22.8,175.2,42.8z" />
                                                <polygon style="fill:#CCCCCC;"
                                                    points="340.8,56.4 175.2,56.4 175.2,56.4 341.2,57.2 341.2,57.2 " />
                                                <path
                                                    d="M362.4,508.4h-204c-28,0-53.2-24.4-55.6-53.6L75.2,119.2c0-2.4,1.6-4,3.6-4.4c2.4,0,4,1.6,4.4,3.6L110.8,454
c2,25.2,23.6,46,47.6,46h204c24,0,45.6-21.2,47.2-46l16.8-337.2c0-2.4,2-4,4-3.6c2.4,0,4,2,3.6,4l-16.8,337.6
C415.6,484,390.4,508.4,362.4,508.4z" />
                                                <path
                                                    d="M450,120H58c-2.4,0-4-1.6-4-4V86c0-19.6,20-30,39.2-30h328c20.4,0,33.2,11.6,33.2,30v30C454,118,452.4,120,450,120z M62,112
h384V86c0-14-9.2-22-25.2-22h-328c-15.2,0-31.2,7.6-31.2,22v26H62z" />
                                                <path
                                                    d="M338.8,60.8c-2,0-3.6-1.2-4-3.2l-4-16c-4.4-19.2-24-34-45.2-34h-64c-20.8,0-40.8,14.8-45.2,34l-4,15.2
c-0.4,2-2.8,3.6-4.8,2.8c-2-0.4-3.6-2.8-2.8-4.8l4-14.8c5.2-22.4,28.4-40,52.8-40h64c24.4,0,47.6,17.6,52.8,40l4,16
c0.4,2-0.8,4.4-2.8,4.8C339.6,60.8,339.2,60.8,338.8,60.8z" />
                                                <path
                                                    d="M250.8,472c-2.4,0-4-1.6-4-4V232c0-2.4,1.6-4,4-4s4,1.6,4,4v236C254.8,470,253.2,472,250.8,472z" />
                                                <path
                                                    d="M250.8,208c-2.4,0-4-1.6-4-4v-56c0-2.4,1.6-4,4-4s4,1.6,4,4v56C254.8,206,253.2,208,250.8,208z" />
                                                <path
                                                    d="M177.6,472c-2,0-4-1.6-4-4l-12-320c0-2.4,1.6-4,4-4s4,1.6,4,4l12,320C182,470,180,472,177.6,472C178,472,178,472,177.6,472z
" />
                                                <path
                                                    d="M329.6,472C329.2,472,329.2,472,329.6,472c-2.4,0-4-2-4-4l8-212c0-2.4,2-4,4-4c2.4,0,4,2,4,4l-8,212
C333.2,470.4,331.6,472,329.6,472z" />
                                                <path
                                                    d="M338.8,232.4L338.8,232.4c-2.4,0-4-2-4-4l3.2-80.8c0-2.4,2-4,4-4c2.4,0,4,2,4,4l-3.2,80.8
C342.8,230.8,340.8,232.4,338.8,232.4z" />
                                            </svg></button>
                                        <div id="tooltip-default1" role="tooltip"
                                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            Excluir
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                        </a>
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
                        <form method="post" action="{{ route('admin.cadArma') }}"
                            class="w-[100%] flex flex-col justify-around items-center" enctype="multipart/form-data">
                            @csrf
                            <table
                                class="text-sm text-left text-gray-500 dark:text-gray-400 items-end justify-center mt-4 mb-4 w-[90%]">
                                <thead
                                    class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                        <th scope="col" class="p-1 border  w-[30%]">
                                            Nome da Arma
                                        </th>
                                        <td class="text-black">
                                            <input class="border w-[100%] p-2" type="text" name="nome"
                                                id="nome" required>
                                        </td>
                                    </tr>
                                    <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                        <th scope="col" class="p-1 border  w-[30%]">
                                            Imagem Principal
                                        </th>
                                        <td class="text-black">
                                            <input class="border w-[100%] text-black p-2" type="text" name="img1"
                                                id="img1" required>
                                        </td>
                                    </tr>
                                    <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                        <th scope="col" class="p-1 border  w-[30%]">
                                            Segunda imagem
                                        </th>
                                        <td class="text-black">
                                            <input class="border w-[100%] text-black p-2" type="text" name="img2"
                                                id="img2">
                                        </td>
                                    </tr>
                                    <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                        <th scope="col" class="p-1 border  w-[30%]">
                                            Terceira imagem
                                        </th>
                                        <td class="text-black">
                                            <input class="border w-[100%] text-black p-2" type="text" name="img3"
                                                id="img3">
                                        </td>
                                    </tr>
                                    <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                        <th scope="col" class="p-1 border  w-[30%]">
                                            Fabricante
                                        </th>
                                        <td class="text-black">
                                            <select name="fabricante" id="fabricante"
                                                class="border w-[100%] p-2 text-xl">
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
                                            <input class="border w-[100%] p-2" type="text" name="calibre"
                                                id="calibre" required>
                                        </td>
                                    </tr>
                                    <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                        <th scope="col" class="p-1 border  w-[30%]">
                                            Acabamento
                                        </th>
                                        <td class="text-black">
                                            <input class="border w-[100%] p-2" type="text" name="acabamento"
                                                id="acabamento" value="Oxidado" required>
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
                                            <input class="border w-[100%] p-2" type="text"
                                                name="sistema_funcionamento" id="sistema_funcionamento" value="Repetição"
                                                required>
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
                                            <select name="sentido_raias" id="sentido_raias"
                                                class="border w-[100%] p-2 text-xl">
                                                <option value="Direita">Direita</option>
                                                <option value="Esquerda">Esquerda</option>
                                                <option value="Sem Raia">Sem Raia</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                        <th scope="col" class="p-1 border  w-[30%]">
                                            País de fabricação
                                        </th>
                                        <td class="text-black">
                                            <input class="border w-[100%] p-2" type="text" name="pais_fabricacao"
                                                id="pais_fabricacao" value="Brasil" required>
                                        </td>
                                    </tr>
                                    <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                        <th scope="col" class="p-1 border  w-[30%]">
                                            Preço
                                        </th>
                                        <td class="text-black">
                                            <input class="border w-[100%] p-2" type="number" name="preco"
                                                id="preco" placeholder="5000.00" step="any" required>
                                        </td>
                                    </tr>
                                    <tr class="bg-blue-900 border-b hidden hover:bg-blue-700 ">
                                        <th scope="col" class="p-1 border  w-[30%]">
                                            Taxa
                                        </th>
                                        <td class="text-black">
                                            <input class="border w-[100%] p-2" type="number" name="taxa"
                                                id="taxa" value="0.74" readonly>
                                        </td>
                                    </tr>
                                    <tr class="bg-blue-900 border-b hover:bg-blue-700 ">
                                        <th scope="col" class="p-1 border  w-[30%]">
                                            Quantidade
                                        </th>
                                        <td class="text-black">
                                            <input class="border w-[100%] p-2" type="number" name="quantidade"
                                                id="quantidade" value="999">
                                        </td>
                                    </tr>
                                    <tr class="bg-blue-900 border-b hover:bg-blue-700 ">
                                        <th scope="col" class="p-1 border  w-[30%]">
                                            Estoque Mínimo
                                        </th>
                                        <td class="text-black">
                                            <input class="border w-[100%] p-2" type="number" name="estoque_min"
                                                id="estoque_min" value="10">
                                        </td>
                                    </tr>
                                </thead>
                            </table>

                            <!-- Modal footer -->
                            <div
                                class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
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
        var tableLimpa = document.getElementById('tableRes');
        tableLimpa.classList.add('hidden');
        var limparbutton = document.getElementById('limpar');
        limparbutton.classList.add('hidden');
    }
</script>
