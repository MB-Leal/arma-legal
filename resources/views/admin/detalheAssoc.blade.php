@extends('admin.template')

@section('content')
@include('components.buttonReturn')
    <x-navbar></x-navbar>
    <main class="flex flex-col w-[100vw] items-center min-h-[100vh]">
        <header class="text-center text-4xl mt-8 mb-8 flex items-center gap-8 text-white">
            <h1>Arma Legal - Detalhes </h1>
        </header>
        <section class="bg-gray-200 bg-opacity-20 border border-emerald-600 p-8 rounded-md w-[70%] mb-8">
            <h1 class="text-center text-white text-3xl">Nome do associado </h1>
            <div class="   lg:h-[25em] p-8 flex justify-center items-center rounded-t-md">
                <div class="md:w-[20em] h-[20em]  border-emerald-600 flex flex-nowrap justify-center items-center border rounded-3xl  bg-white p-4">
                    <img src="{{ asset('imgs/perfil.png') }}" alt="perfil"
                        class="md:w-[17em] md:h-[17em] w-[15em] h-[15em] bg-cover">
                </div>
            </div>


            <div
            class="flex md:justify-between flex-col justify-center items-center  ">
            <div class="border mb-4 mt-4 w-[90%]"></div>

                <!-- Inf. Pessoais -->
                <div class="md:w-[100%] flex flex-col justify-center items-center  rounded-md ">
                    <h2 class="text-white uppercase font-bold">Informações Pessoais</h2>
                    <form class="md:w-[90%]" action="">
                        @csrf
                        <table class="text-sm bg-white p-4 rounded-md text-left bg-transparent items-end justify-center mt-4 mb-4 w-[100%]">
                            <thead class="text-xs uppercase ">
                                <tr class="">
                                    <th scope="col" class="p-2  w-[15%] rounded-md">
                                        ID:
                                    </th>
                                    <td class="text-black">
                                        <input class=" border-none w-[100%] p-2 bg-emerald-600 rounded-md" readonly
                                            type="text" name="id" id="id" value={{ $associado['id']}}>
                                    </td>
                                </tr>

                                <tr class="">
                                    <th scope="col" class="p-2  w-[15%] rounded-md">
                                        Posto/Graduação:
                                    </th>
                                    <td class="text-black">
                                        <input class=" border-none w-[100%] p-2 bg-emerald-700 rounded-md" readonly
                                            type="text" name="posto_graduacao" id="posto_graduacao" value={{$associado['posto_graduacao'] ? $associado['posto_graduacao'] : 'Sem Dados'}}>
                                    </td>
                                </tr>

                                <tr class="">
                                    <th scope="col" class="p-2  w-[15%] rounded-md">
                                        Nome:
                                    </th>
                                    <td class="text-black">
                                        <input class=" border-none w-[100%] p-2 bg-emerald-600 rounded-md" readonly
                                            type="text" name="nome" id="nome" value={{$associado['nome']}}>
                                    </td>
                                </tr>

                                <tr class="">
                                    <th scope="col" class="p-2  w-[15%] rounded-md">
                                        Matrícula:
                                    </th>
                                    <td class="text-black">
                                        <input class=" border-none w-[100%] p-2 bg-emerald-700 rounded-md" readonly
                                            type="text" name="nome" id="nome" value={{$associado['matricula']}}>
                                    </td>
                                </tr>

                                <tr class="">
                                    <th scope="col" class="p-2  w-[15%] rounded-md">
                                        CPF:
                                    </th>
                                    <td class="text-black">
                                        <input class=" border-none w-[100%] p-2 bg-emerald-600 rounded-md" readonly
                                            type="text" name="cpf" id="cpf" value={{$associado['cpf']}}>
                                    </td>
                                </tr>

                                <tr class="">
                                    <th scope="col" class="p-2  w-[15%] rounded-md">
                                        RG:
                                    </th>
                                    <td class="text-black">
                                        <input class=" border-none w-[100%] p-2 bg-emerald-700 rounded-md" readonly
                                            type="text" name="rg" id="rg" value={{$associado['rg'] ? $associado['rg'] : 'Sem RG cadastrado'}}>
                                    </td>
                                </tr>
                                <tr class="">
                                    <th scope="col" class="p-2  w-[15%] rounded-md">
                                        Situação:
                                    </th>
                                    <td class="text-black">
                                        <input class=" border-none w-[100%] p-2 bg-emerald-600 rounded-md" readonly
                                            type="text" name="situacao" id="situacao" value={{$associado['situacao'] ? $associado['situacao'] : 'Não atualizado'}}>
                                    </td>
                                </tr>

                                <tr class="">
                                    <th scope="col" class="p-2  w-[15%] rounded-md">
                                        Email:
                                    </th>
                                    <td class="text-black">
                                        <input class=" border-none w-[100%] p-2 bg-emerald-700 rounded-md" readonly type="text"
                                            name="email" id="email" value={{$associado['email'] ? $associado['email'] : 'E-mail não cadastrado'}}>
                                    </td>
                                </tr>

                                <tr class="">
                                    <th scope="col" class="p-2  w-[15%] rounded-md">
                                        Celular:
                                    </th>
                                    <td class="text-black">
                                        <input class=" border-none w-[100%] p-2 bg-emerald-600 rounded-md" readonly
                                            type="text" name="celular" id="celular"
                                            value={{$associado['celular'] ? $associado['celular']: 'celular não cadastrado'}}>
                                    </td>
                                </tr>
                                    <tr class="">
                                        <th scope="col" class="p-2  w-[15%] rounded-md">
                                        OPM:
                                    </th>
                                    <td class="text-black">
                                        <input class=" border-none w-[100%] p-2 bg-emerald-700 rounded-md" readonly
                                            type="text" name="opm" id="opm" value={{$associado['opm'] ? $associado['opm'] : 'OPM não cadastrada'}}>
                                    </td>
                                </tr>

                                <tr class="">
                                    <th scope="col" class="p-2  w-[15%] rounded-md">
                                        Cadastro:
                                    </th>
                                    <td class="text-black">
                                        <input class=" border-none w-[100%] p-2 bg-emerald-600 rounded-md" readonly
                                            type="text" name="cadastro" id="cadastro" value={{$associado['created_at'] ? $associado['created_at'] : ' '}}>
                                    </td>
                                </tr>

                                <tr class="">
                                    <th scope="col" class="p-2  w-[15%] rounded-md">
                                        Atualização:
                                    </th>
                                    <td class="text-black">
                                        <input class=" border-none w-[100%] p-2 bg-emerald-700 rounded-md" readonly
                                            type="text" name="atualizacao" id="atualizacao" value={{$associado['updated_at'] ? $associado['updated_at'] : 'Seus dados estão desatualizados'}}>
                                    </td>
                                </tr>

                            </thead>
                        </table>
                    </form>
                </div>

                <div class="border mb-4 mt-4 w-[90%]"></div>

                <!-- Inf. Endereços -->
                <div class="md:w-[100%] flex flex-col justify-center items-center  rounded-md ">

                    <h2 class="text-white uppercase font-bold">Informações de Localidade</h2>
                    <form class="md:w-[90%]">
                        @csrf
                        <table class="text-sm text-left bg-white rounded-md items-end justify-center mt-4 mb-4 w-[100%]">
                            <thead class="text-xs uppercase ">
                                <tr class="">
                                    <th scope="col" class="p-2 bg-white rounded-md">
                                        Logradouro/Rua:
                                    </th>
                                    <td class="text-black">
                                        <input class=" border-none w-[100%] p-2 bg-emerald-600 rounded-md" readonly
                                            type="text" name="logradouro" id="logradouro" required value={{$associado['logradouro'] ? $associado['logradouro'] : 'Não cadastrado' }}>
                                    </td>
                                </tr>

                                <tr class="">
                                    <th scope="col" class="p-2 bg-white w-[15%] rounded-md">
                                        Bairro:
                                    </th>
                                    <td class="text-black">
                                        <input class=" border-none w-[100%] p-2 bg-emerald-700 rounded-md" readonly
                                            type="text" name="bairro" id="bairro" required value={{$associado['bairro'] ? $associado['bairro'] : 'Não cadastrado' }}>
                                    </td>
                                </tr>

                                <tr class="">
                                    <th scope="col" class="p-2 bg-white w-[15%] rounded-md">
                                        Estado:
                                    </th>
                                    <td class="text-black">
                                        <input class=" border-none w-[100%] p-2 bg-emerald-600 rounded-md" readonly
                                            type="text" name="estado" id="estado" value={{$associado['estado'] ? $associado['estado'] : 'Não cadastrado' }}>
                                    </td>
                                </tr>

                                <tr class="">
                                    <th scope="col" class="p-2 bg-white rounded-md w-[15%]">
                                        Município:
                                    </th>
                                    <td class="text-black">
                                        <input class=" border-none w-[100%] p-2 bg-emerald-700 rounded-md" readonly
                                            type="text" name="municipio" id="municipio" required value={{$associado['mmunicipio'] ? $associado['mmunicipio'] : 'Não cadastrado' }}>
                                    </td>
                                </tr>

                                <tr class="">
                                    <th scope="col" class="p-2  w-[15%] rounded-md">
                                        CEP:
                                    </th>
                                    <td class="text-black">
                                        <input class=" border-none w-[100%] bg-emerald-600 rounded-md p-2" readonly type="text"
                                            name="cep" id="cep" required value={{$associado['cep'] ? $associado['cep'] : 'Não cadastrado' }}>
                                    </td>
                                </tr>

                                <tr class="">
                                    <th scope="col" class="p-2 w-[15%] rounded-md">
                                        Número:
                                    </th>
                                    <td class="text-black">
                                        <input class="border-none w-[100%] p-2 bg-emerald-700 rounded-md" readonly
                                            type="text" name="numero" id="numero" required value={{$associado['numero'] ? $associado['numero'] : 'Não cadastrado' }}>
                                    </td>
                                </tr>
                                <tr class="">
                                    <th scope="col" class="p-2 bg-white w-[15%] rounded-md">
                                        Complemento:
                                    </th>
                                    <td class="text-black">
                                        <input class=" border-none overflow-x-auto w-[100%] p-2 bg-emerald-600 rounded-md" readonly
                                            type="text" name="complemento" id="complemento" required value={{$associado['complemento'] ? $associado['complemento'] : 'Sem Complemento' }}>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </form>


                </div>

                <div class="border mb-4 mt-4 w-[90%]"></div>

            </div>



            <!-- Inf. Endereços -->
            <div class="md:w-[100%] flex flex-col justify-center items-center  rounded-md ">

                <h2 class="text-white uppercase font-bold">Outros</h2>
                <form class="md:w-[90%]">
                    @csrf

                <table class="text-sm text-left bg-white rounded-md items-end justify-center mt-4 mb-4 w-[100%]">
                    <thead class="text-xs uppercase ">
                        <tr class="flex flex-col">
                            <th scope="col" class="p-2 bg-white text-center w-[100%] rounded-md">
                                Acessos
                            </th>
                            <td class="text-black">
                                <input class=" border-none w-[100%] p-2 text-center bg-emerald-600 rounded-md" readonly
                                    type="text" name="logradouro" id="logradouro" required value={{$acesso ? Str::length($acesso) : 'Nenhum Acesso ainda'}}>
                            </td>
                        </tr>
                    </thead>
                </table>

                <table class="text-sm text-left bg-white rounded-md items-end justify-center mt-4 mb-4 w-[100%]">
                    <thead class="text-xs uppercase ">

                        <tr class=" flex flex-col">
                            <th scope="col" class="p-2 bg-white text-center w-[100%] rounded-md">
                                Requirimentos
                            </th>
                            <td class="text-black">
                                @if (Str::length($requerimento))
                                @foreach ($requerimento as $req)
                                <a href="{{route('admin.detalheReq',['id'=>$req->id])}}" class="cursor-pointer">
                                    <input class=" border-none w-[100%] text-center p-2 bg-emerald-700 hover:bg-emerald-800 rounded-md mb-1 cursor-pointer"  readonly
                                    type="text" name="bairro" id="bairro" required value={{$req->codigo}}>
                                     </a>
                                @endforeach

                                @else
                                    <span>Nenhum Requerimento cadastrado</span>
                                @endif

                            </td>
                        </tr>


                    </thead>
                </table>

                </form>

            </div>



        </section>
    </main>

    <x-footer></x-footer>
@endsection
