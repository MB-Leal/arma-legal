@extends('site.template')
@section('content')



    <main class="flex lg:flex-row flex-col h-[100vh] overflow-auto " id="logo-catalogo">


        <div class="lg:w-[20%] lg:overflow-hidden lg:h-[100vh] h-[50vh]">
            <img src="/Imgs/soldado.jpg" class="lg:h-[100vh]" alt="">
        </div>

        <div class="lg:w-[80%] lg:h-[100vh] justify-start lg:overflow-auto ">

            <div id="alert-border-4"
            class="flex p-4 mb-4 mt-4 w-[90%] m-auto text-yellow-800 border-t-4 border-yellow-300 bg-yellow-50 dark:text-yellow-300 dark:bg-gray-800 dark:border-yellow-800"
            role="alert">
            <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div class="ml-3 text-sm font-medium uppercase">
                Confira o processo de Autorização para aquisição de armas de fogo da <strong>DAL</strong> <a
                    href="{{ route('admin.infor') }}">
                    <button type="button" class="font-semibold underline hover:no-underline uppercase">
                        clicando aqui </button>
                </a>
            </div>
            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-border-4" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

            <h1 class="text-white text-center text-4xl m-8">Nossos Modelos</h1>
            <!-- TAURUS------------------- -->
            <div id="accordion-collapse" data-accordion="collapse" class="w-[90%] m-auto mb-8 ">
                <h2 id="accordion-collapse-heading-1" class="border-b-2">
                    <button type="button"
                        class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0  border-gray-900  focus:ring-4 bg-gray-900 focus:ring-gray-200 hover:bg-gray-600"
                        data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                        aria-controls="accordion-collapse-body-1">
                        <span class="text-white">
                            TAURUS
                        </span>
                        <img src="/Imgs/taurus.png" alt="cbc-logo" class="w-[50px] border border-white">
                        <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0 text-white" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"> </path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-1" class="hidden bg-transparent-padrao"
                    aria-labelledby="accordion-collapse-heading-1" class="">
                    <!-- Pistolas ---->
                    <div class=" border-gray-800 w-[90%] m-auto pb-8 rounded-xl flex flex-col flex-wrap mb-8">
                        <h2 class="text-center m-4 text-2xl text-white">Pistolas</h2>

                        <div class="grid xl:grid-cols-3 lg:grid-cols-2 gap-8 m-auto">

                            @foreach ($pistolaTaurus as $pistolaT)
                                <!-- Card da arma -->
                                <div
                                    class="border w-[17em] row-span-1 h-[40em] flex flex-nowrap flex-col justify-center items-center border-gray-300  bg-gray-700 p-4 rounded-md ">
                                    <!-- Img da arma -->
                                    <div class="mb-4 w-[15em] h-[50%] flex flex-wrap">
                                        <img class="rounded-md bg-white" src="{{$pistolaT->img1}}" alt="pistola taurus">
                                    </div>
                                    <!-- Corpo do card -->
                                    <div
                                        class="text-center w-[100%] h-[40%] flex justify-center flex-col text-white gap-2">
                                        <p>{{ $pistolaT->nome }}</p>
                                        <span>Calibre: {{ $pistolaT->calibre }}</span>
                                        <span>Capacidade de tiro {{ $pistolaT->capacidade_tiro }}</span>
                                        <span class="uppercase font-bold">Valor à vista: R$ <strong>
                                                {{ number_format(((float) $pistolaT['preco'] / 100) * 0.74 + (float) $pistolaT['preco'], 2, ',', '.') }}</strong>
                                        </span>

                                        <!-- Tooltip de alerte da quantidade -->
                                        @if ($pistolaT->quantidade <= $pistolaT->estoque_min)
                                            @php
                                                $texto = 'Estou%20interessado%20na%20arma:%20' . $pistolaT->nome . '%20Calibre:%20' . $pistolaT->calibre . '%20que%20está%20com%20estoque%20limitado.';
                                                $link = 'https://api.whatsapp.com/send?l=pt-BR&phone=5591988953551&text=' . $texto;
                                            @endphp
                                            <a href="{{ url($link) }}">
                                                <button type="button"
                                                    class="font-semibold rounded-md animate-pulse mt-2 mb-2 p-2 texxt-red bg-red-700">Poucas unidades deste produto. <br> Consulte via Whatsapp
                                                    aqui!</button>
                                            </a>
                                        @endif

                                        <!-- Botão de detalhe -->
                                        <a class="block text-white bg-gray-900  hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            href="{{ route('admin.armaDetalhes', ['id' => $pistolaT->id]) }}">
                                            <button type="button">
                                                Mais detalhes
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Revólveres ---->
                    <div class=" border-gray-800 w-[90%] m-auto pb-8 rounded-xl flex flex-col flex-wrap mb-8">
                        <h2 class="text-center m-4 text-2xl text-white">Revólveres</h2>

                        <div class="grid xl:grid-cols-3 lg:grid-cols-2 gap-8 m-auto">
                            @foreach ($revolverTaurus as $revolverT)
                                <!-- Card da arma -->
                                <div
                                    class="border w-[17em] row-span-1 h-[40em] flex flex-nowrap flex-col justify-center items-center border-gray-300  bg-gray-700 p-4 rounded-md ">
                                    <!-- Img da arma -->
                                    <div class="mb-4 w-[15em] h-[50%] flex flex-wrap">
                                        <img class="rounded-md bg-white" src="{{ $revolverT->img1 }}"  alt="pistola taurus">
                                    </div>
                                    <!-- Corpo do card -->
                                    <div
                                        class="text-center w-[100%] h-[40%] flex justify-center flex-col text-white gap-2">
                                        <p>{{ $revolverT->nome }}</p>
                                        <span>Calibre: {{ $revolverT->calibre }}</span>
                                        <span>Capacidade de tiro {{ $revolverT->capacidade_tiro }}</span>
                                        <span class="uppercase font-bold">Valor à vista: R$ <strong>
                                                {{ number_format(((float) $revolverT['preco'] / 100) * 0.74 + (float) $revolverT['preco'], 2, ',', '.') }}</strong>
                                        </span>

                                        @if ($revolverT->quantidade <= $revolverT->estoque_min)
                                            <a href="http://wa.me/5591988953551">
                                                <button type="button"
                                                    class="font-semibold rounded-md animate-pulse mt-2 mb-2 p-2 texxt-red bg-red-700">Poucas unidades deste produto. <br> Consulte via Whatsapp
                                                    aqui!</button>
                                            </a>
                                        @endif
                                        <!-- Botão de detalhe -->
                                        <a class="block text-white bg-gray-900  hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            href="{{ route('admin.armaDetalhes', ['id' => $revolverT->id]) }}">
                                            <button type="button">
                                                Mais detalhes
                                            </button> </a>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- CBC------------------- -->
            <div id="accordion-collapse" data-accordion="collapse" class="w-[90%] m-auto mb-8">
                <h2 id="accordion-collapse-heading-2" class="border-b-2">
                    <button type="button"
                        class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0  border-gray-900  focus:ring-4 bg-gray-900 focus:ring-gray-200 hover:bg-gray-600"
                        data-accordion-target="#accordion-collapse-body-2" aria-expanded="true"
                        aria-controls="accordion-collapse-body-2">
                        <span class="text-white">
                            CBC
                        </span>
                        <img src="/Imgs/cbc.png" alt="cbc-logo" class="w-[50px] border border-white">
                        <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0 text-white" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"> </path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-2" class="hidden bg-transparent-padrao"
                    aria-labelledby="accordion-collapse-heading-2" class="">

                    <!-- Armas Longas ---->
                    <div class=" border-gray-800 w-[90%] m-auto pb-8 rounded-xl flex flex-col flex-wrap mb-8">
                        <h2 class="text-center m-4 text-2xl text-white">Armas Longas</h2>

                        <div class="grid xl:grid-cols-3 lg:grid-cols-2 gap-8 m-auto">
                            @foreach ($longasCBC as $longasC)
                                <!-- Card da arma -->
                                <div
                                    class="border w-[17em] row-span-1 h-[40em] flex flex-nowrap flex-col justify-center items-center border-gray-300  bg-gray-700 p-4 rounded-md ">
                                    <!-- Img da arma -->
                                    <div class="mb-4 w-[15em] h-[50%] flex flex-wrap">
                                        <img class="rounded-md bg-white" src="{{ $longasC->img1 }}" alt="pistola taurus">
                                    </div>
                                    <!-- Corpo do card -->
                                    <div
                                        class="text-center w-[100%] h-[40%] flex justify-center flex-col text-white gap-2">
                                        <p>{{ $longasC->nome }}</p>
                                        <span>Calibre: {{ $longasC->calibre }}</span>
                                        <span>Capacidade de tiro {{ $longasC->capacidade_tiro }}</span>
                                        <span class="uppercase font-bold">Valor à vista: R$ <strong>
                                                {{ number_format(((float) $longasC['preco'] / 100) * 0.74 + (float) $longasC['preco'], 2, ',', '.') }}</strong>
                                        </span>

                                        @if ($longasC->quantidade <= $longasC->estoque_min)
                                            <a href="http://wa.me/5591988953551">
                                                <button type="button"
                                                    class="font-semibold rounded-md animate-pulse mt-2 mb-2 p-2 texxt-red bg-red-700">Poucas unidades deste produto. <br> Consulte via Whatsapp
                                                    aqui!</button>
                                            </a>
                                        @endif
                                        <!-- Botão de detalhe -->
                                        <a class="block text-white bg-gray-900  hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            href="{{ route('admin.armaDetalhes', ['id' => $longasC->id]) }}">
                                            <button type="button">
                                                Mais detalhes
                                            </button>
                                        </a>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- GLOCK------------------- -->
            <div id="accordion-collapse" data-accordion="collapse" class="w-[90%] m-auto mb-8">
                <h2 id="accordion-collapse-heading-3" class="border-b-2">
                    <button type="button"
                        class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0  border-gray-900  focus:ring-4 bg-gray-900 focus:ring-gray-200 hover:bg-gray-600"
                        data-accordion-target="#accordion-collapse-body-3" aria-expanded="true"
                        aria-controls="accordion-collapse-body-3">
                        <span class="text-white">GLOCK</span>
                        <img src="/Imgs/glock.png" alt="cbc-logo" class="w-[50px] border border-white">
                        <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0 text-white" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"> </path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-3" class="hidden bg-transparent-padrao"
                    aria-labelledby="accordion-collapse-heading-3" class="">

                    <!-- Pistolas ---->
                    <div class=" border-gray-800 w-[90%] m-auto pb-8 rounded-xl flex flex-col flex-wrap mb-8">
                        <h2 class="text-center m-4 text-2xl text-white">Pistolas</h2>

                        <div class="grid xl:grid-cols-3 lg:grid-cols-2 gap-8 m-auto">
                            @foreach ($pistolaGlock as $pistolaG)
                                <!-- Card da arma -->
                                <div
                                    class="border w-[17em] row-span-1 h-[40em] flex flex-nowrap flex-col justify-center items-center border-gray-300  bg-gray-700 p-4 rounded-md ">
                                    <!-- Img da arma -->
                                    <div class="mb-4 w-[15em] h-[50%] flex flex-wrap">
                                        <img class="rounded-md bg-white" src="{{ $pistolaG->img1 }}" alt="pistola taurus">
                                    </div>
                                    <!-- Corpo do card -->
                                    <div
                                        class="text-center w-[100%] h-[40%] flex justify-center flex-col text-white gap-2">
                                        <p>{{ $pistolaG->nome }}</p>
                                        <span>Calibre: {{ $pistolaG->calibre }}</span>
                                        <span>Capacidade de tiro {{ $pistolaG->capacidade_tiro }}</span>
                                        <span class="uppercase font-bold">Valor à vista: R$ <strong>
                                                {{ number_format(((float) $pistolaG['preco'] / 100) * 0.74 + (float) $pistolaG['preco'], 2, ',', '.') }}</strong>
                                        </span>

                                        @if ($pistolaG->quantidade <= $pistolaG->estoque_min)
                                            <a href="http://wa.me/5591988953551">
                                                <button type="button"
                                                    class="font-semibold rounded-md animate-pulse mt-2 mb-2 p-2 texxt-red bg-red-700">Poucas unidades deste produto. <br> Consulte via Whatsapp
                                                    aqui!</button>
                                            </a>
                                        @endif
                                        <!-- Botão de detalhe -->
                                        <a class="block text-white border bg-gray-900  hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            href="{{ route('admin.armaDetalhes', ['id' => $pistolaG->id]) }}">
                                            <button type="button">
                                                Mais detalhes
                                            </button>
                                        </a>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <style>
        .bg-transparent-padrao{
            background-color: rgba(75, 75, 75, 0.2);
        }
    </style>

@endsection
