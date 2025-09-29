@extends('site.template')
@section('content')
<!-- Main modal -->
<main class="flex flex-col">
    <h1 class="text-center text-2xl text-white m-8">{{$armas->tipo}} - {{$armas->fabricante}} - {{$armas['nome']}}</h1>
    <!-- Modal content -->
    <div class="lg:w-[50%] m-auto bg-white rounded-lg shadow mb-4 dark:bg-gray-700">
        <!-- Modal body -->
        <div class="p-6 rounded-t space-y-6">

            <div class="lg:block hidden relative w-full"
                data-carousel="slide">
                <!-- Carousel wrapper -->
                <div
                    class="relative  w-full overflow-hidden rounded-lg lg:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out"
                        data-carousel-item>
                        <img src="{{ $armas['img1'] }}"
                            class="absolute w-[20em] block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>

                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out"
                        data-carousel-item>
                        <img src="{{ $armas['img2'] }}"
                            class="absolute w-[20em] block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out"
                        data-carousel-item>
                        <img  src="{{ $armas['img3'] }}"
                            class="absolute w-[20em] block  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>
                </div>
                <!-- Slider indicators -->
                <div
                    class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2 bg-black p-4 rounded-lg">
                    <button type="button" class="w-3 h-3 rounded-full"
                        aria-current="true" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full"
                        aria-current="false" aria-label="Slide 2"
                        data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full"
                        aria-current="false" aria-label="Slide 3"
                        data-carousel-slide-to="2"></button>
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-black group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg aria-hidden="true"
                            class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800"
                            fill="none" stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2"
                                d="M15 19l-7-7 7-7"></path>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-black group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg aria-hidden="true"
                            class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800"
                            fill="none" stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2"
                                d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>

            <div class="flex lg:flex-row flex-col gap-4 justify-center">
                <div>
                    <H3 class="text-black text-center font-bold">DETALHES TÉCNICOS</H3>
                    <table
                        class=" m-auto text-sm text-white bg-gray-800 text-left">


                        <tr class=" text-center">
                            <th scope="row" class="px-6 py-3 border">
                                DESCRIÇÃO
                            </th>
                            <th scope="row" class="px-6 py-3 border">
                                DETALHE
                            </th>

                        </tr>

                        <tr class="text-center">
                            <td scope="row" class="px-6 py-4 border">
                                CALIBRE
                                </th>
                            <td scope="row" class="px-6 py-4 border">
                                {{$armas['calibre']}}
                            </td>
                        </tr>

                        <tr class="text-center">
                            <td scope="row" class="px-6 py-4 border">
                                ACABAMENTO</th>
                            <td scope="row" class="px-6 py-4 border">
                                {{$armas['acabamento']}}
                            </td>
                        </tr>

                        <tr class="text-center">
                            <td scope="row" class="px-6 py-4 border">
                                CAPACIDADE DE TIRO</th>
                            <td scope="row" class="px-6 py-4 border">
                                {{$armas['capacidade_tiro']}}
                            </td>
                        </tr>

                        <tr class="text-center">
                            <td scope="row" class="px-6 py-4 border">SIST.
                                DE FUNCIONAMENTO</th>
                            <td scope="row" class="px-6 py-4 border">
                                {{$armas['sistema_funcionamento']}}
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td scope="row" class="px-6 py-4 border">
                                RAIAS/SENTIDO</th>
                            <td scope="row" class="px-6 py-4 border">
                                {{$armas['qtd_raias']}} /
                                {{$armas['sentido_raias']}}
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td scope="row" class="px-6 py-4 border">QTD
                                CANO / COMPRIMENTO</th>
                            <td scope="row" class="px-6 py-4 border">
                                {{$armas['qtd_cano']}} /
                                {{$armas['comprimento_cano']}}
                            </td>
                        </tr>

                    </table>
                </div>

                <div>
                    <H3 class="text-black font-bold text-center">INFORMAÇÕES</H3>
                    <table
                        class=" m-auto text-sm text-white bg-gray-800 text-left">


                        <tr class=" text-center">
                            <th scope="row" class="px-6 py-3 border">
                                DESCRIÇÃO
                            </th>
                            <th scope="row" class="px-6 py-3 border">
                                DETALHE
                            </th>

                        </tr>

                        <tr class="text-center">
                            <td scope="row" class="px-6 py-4 border">PAÍS
                                DE FABRICAÇÃO
                                </th>
                            <td scope="row" class="px-6 py-4 border">
                                {{$armas['pais_fabricacao']}}
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td scope="row" class="px-6 py-4 border">
                                ESPÉCIE
                                </th>
                            <td scope="row" class="px-6 py-4 border">
                                {{$armas['tipo']}}
                            </td>
                        </tr>

                        <tr class="text-center">
                            <td scope="row" class="px-6 py-4 border">MARCA
                                </th>
                            <td scope="row" class="px-6 py-4 border">
                                {{$armas['fabricante']}}
                            </td>
                        </tr>

                        <tr class="text-center">
                            <td scope="row" class="px-6 py-4 border">PREÇO
                                À VISTA</th>
                            <td scope="row" class="px-6 py-4 border font-bold"> R$
                                {{ number_format(((float)$armas['preco']/100*0.74)+(float)$armas['preco'],2,",",".")}}
                            </td>
                        </tr>


                    </table>
                </div>
            </div>
        </div>
        <!-- Modal footer -->
        <div
            class="flex items-center gap-4 lg:gap-0 lg:flex-row flex-col justify-around p-6 space-x-2 border-t border-gray-200 rounded-b w-[100%]">
            <a class="text-white w-[100%] bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  dark:focus:ring-blue-800" href="{{route('admin.catalogo')}}">
                <i class="fa-solid fa-rotate-left"> </i>
                    Retornar ao Catálogo
            </a>

            <a class="text-white w-[100%] bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 text-center" href="{{route('admin.simulador', ['id' => $armas['id']])}}">
                <i class="fa-solid fa-chart-line"> - </i>
                    Simular Financiamento
            </a>
        </div>
    </div>
</main>
@endsection
