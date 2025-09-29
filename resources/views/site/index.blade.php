@extends('site.template')
@section('content')
    <div id="alert-border-3"
        class="flex absolute p-4 mb-4 text-orange-800 mt-4 lg:w-[65%] lg:left-5 m-auto border-t-4 border-orange-300 bg-orange-50 dark:text-orange-400 dark:bg-gray-800 dark:border-orange-800"
        role="alert">
        <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                clip-rule="evenodd"></path>
        </svg>
        <div class="ml-3 text-sm font-medium">
            IMPORTANTE: <a href="http://wa.me/5591988953551">Caso seja <strong>associado</strong> mas não consiga entrar no
                sistema, favor, entre em contato conosco pelo Whatsapp: 9198895-3551</a>
        </div>
        <button type="button"
            class="ml-auto -mx-1.5 -my-1.5 bg-orange-50 text-orange-500 rounded-lg focus:ring-2 focus:ring-orange-400 p-1.5 hover:bg-orange-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:orange-green-400 dark:hover:bg-gray-700"
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
    <main class="flex flex-col lg:flex-row lg:h-[100vh] h-[100%]  text-white">
        <section class=" w-[100vw] lg:w-[70vw] h-[50vh] lg:h-[100vh] mb-4 lg:mb-0 flex  lg:border-b-0 border-b-2">
            <img src="/Imgs/fuzil.jpg" class="bg-cover bg-transparent lg:border-r-2" alt="">
        </section>
        <section class="items-center flex flex-col overflow-auto h-[100vh] p-4 lg:p-0 lg:w-[30vw] w-[100%] justify-center">

            <!-- MSG de atualização -->
            @if (session('danger'))
            <div id="alert-border-3"
                class="flex p-4 mb-4 text-blue-800 lg:w-[95%] border-t-4 border-blue-300 bg-blue-50 dark:text-blue-400 dark:bg-gray-800 dark:border-blue-800"
                role="alert">
                <div class="ml-3 text-sm font-medium">
                    <a class="p-2 rounded-md  w-[90%]" href="{{ route('site.updatelogin')}}">
                        {{ session('danger') }}
                    </a>
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:blue-green-400 dark:hover:bg-gray-700"
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
            <div class="w-[100px]"><img src="/Imgs/fas.png" alt=""></div>
            <div class="m-8">
                <h2>Entre com suas credenciais</h2>
                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="bg-red-900 p4">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <span>{{session('success')}}</span>
                @endif
            </div>
            <form action="{{ route('site.login') }}" class=" w-[100%] flex flex-col gap-4">
                @csrf
                <div class="flex flex-col justify-between items-center">
                    <label for="nome">Nome Completo:</label>
                    <input type="text" id="nome" name="nome" class="w-[70%] rounded-xl text-black"
                        value="{{ old('nome') }}" required>
                </div>
                <div class="flex  flex-col justify-between items-center">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" class="w-[70%] rounded-xl text-black"
                        value="{{ old('cpf') }}" max="11" min="10"
                        placeholder="DIGITE APENAS OS NÚMEROS DO CPF" required>
                </div>
                <div class="flex  flex-col justify-between items-center">
                    <label for="matricula">Matrícula:</label>
                    <input type="text" id="matricula" name="matricula" class="w-[70%] rounded-xl text-black"
                        value="{{ old('matricula') }}" min="6" max="12"
                        placeholder="Digite a MF sem o dígito verificador" required>
                </div>
                <div class="flex mt-4 flex-col mb-4 justify-between items-center">
                    <button type="submit"
                        class="font-bold bg-white border w-[70%] text-slate-950 p-4 rounded-xl hover:bg-transparent hover:text-white">
                        Entrar
                    </button>
                </div>
                <small class="text-center font-bold">(ACESSO SOMENTE PARA QUEM É ASSOCIADO)</small>


            </form>
        </section>
    </main>
    <x-footer></x-footer>
@endsection
