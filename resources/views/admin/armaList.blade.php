@extends('admin.template')

<x-navbar></x-navbar>

@section('content')

@include('components.buttonReturn')

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

            <main class="flex flex-col w-[100vw] items-center">
                <header class="text-center text-2xl mt-8 mb-8 flex items-center gap-8 text-white">
                    <h1>Arma Legal - Lista Geral</h1>
                </header>

        <table class="text-sm text-left m-auto w-[90%] text-gray-500 mb-8 items-end justify-center ">
            <thead class="text-xs text-white uppercase bg-blue-600  ">
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
                                <span class="text-center">Situação</span>
                            </th>
                            <th scope="col" class="px-6 py-3 border text-center">
                                <span class="text-center">Quant</span>
                            </th>
                            <th scope="col" class="px-6 py-3 border text-center">
                                <span class="text-center">Estoque Min.</span>
                            </th>
                            <th scope="col" class="px-6 py-3 border text-center">
                                <span class="text-center">Ação</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($armas as $arma)
                            <tr
                                class="bg-white border-b border dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td scope="row" class="px-6 py-4 border">
                                    {{ $arma->id }}
                                </td>
                                <td scope="row" class="px-6 py-4 border">
                                    {{ $arma->nome }}
                                </td>
                                <td class="flex justify-center">
                                    <img class="object-cover w-20 h-20" src="{{ $arma->img1 }}">
                                </div>
                                </td>
                                <td class="px-6 py-4 border">
                                    {{ $arma->tipo }}
                                </td>
                                <td class="px-6 py-4 border">
                                    {{ $arma->fabricante }}
                                </td>
                                <td scope="row" class="px-6 border py-4 ">
                                    {{ $arma->calibre }}
                                </td>
                                <td scope="row" class="px-6 border py-4 ">
                                    {{ $arma->preco }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($arma->situacao == 'I')
                                    INATIVA
                                    @else
                                        ATIVA
                                    @endif
                                </td>
                                <td scope="row" class="px-6 border py-4 ">
                                    {{ $arma->quantidade }}
                                </td>
                                <td scope="row" class="px-6 border py-4 ">
                                    {{ $arma->estoque_min }}
                                </td>
                                <td>
                                    <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                            href="{{ route('admin.editarArma', ['id' => $arma->id]) }}">
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
                                    <a href="{{ route('admin.desativar', ['id' => $arma->id]) }}">
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
                <div class="justify-center gap-4 m-4 flex w-[100%]">
                    {{$armas->links()}}
                </div>
    </main>

