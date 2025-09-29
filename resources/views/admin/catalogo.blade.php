@extends('site.template')
@section('content')

    <main class="flex lg:flex-row flex-col h-[100vh] overflow-auto " id="logo-catalogo">
        <div class="lg:w-[20%] lg:overflow-hidden lg:h-[100vh] h-[50vh]">
            <img src="/Imgs/soldado.jpg" class="lg:h-[100vh]" alt="">
        </div>

        <div class="lg:w-[80%] lg:h-[100vh] justify-start lg:overflow-auto ">

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
                                                {{ number_format(((float) $pistolaT['preco'] / 100) * 0.90 + (float) $pistolaT['preco'], 2, ',', '.') }}</strong>
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
                                                {{ number_format(((float) $revolverT['preco'] / 100) * 0.90 + (float) $revolverT['preco'], 2, ',', '.') }}</strong>
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
                                                {{ number_format(((float) $longasC['preco'] / 100) * 0.90 + (float) $longasC['preco'], 2, ',', '.') }}</strong>
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
                                                {{ number_format(((float) $pistolaG['preco'] / 100) * 0.90 + (float) $pistolaG['preco'], 2, ',', '.') }}</strong>
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
