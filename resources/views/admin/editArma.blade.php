@extends('admin.template')

@section('content')
@include('components.buttonReturn')
<div class="flex w-[100%] p-4 justify-center items-center">

    <div class="bg-white w-[90%] flex flex-col justify-center rounded-lg shadow ">
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Editar dados
                    </h3>
                </div>

                <form method="post" action="{{route('admin.salvarEdicao')}}"
                class="w-[100%] flex flex-col justify-around items-center" enctype="multipart/form-data">
                    @csrf
                    <table
                        class="text-sm text-left text-gray-500 dark:text-gray-400 items-end justify-center mt-4 mb-4 w-[90%]">
                        <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                <th scope="col" class="p-1 border  w-[30%]">
                                    Id
                                </th>
                                <td class="text-black">
                                    <input class="border w-[100%] p-2" type="number" name="id" id="id"
                                        value="{{ $armas['id'] }}" readonly>
                                </td>
                            </tr>
                            <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                <th scope="col" class="p-1 border  w-[30%]">
                                    Arma
                                </th>
                                <td class="text-black">
                                    <input class="border w-[100%] p-2" type="text" name="nome" id="nome"
                                        value="{{ $armas['nome'] }}">
                                </td>
                            </tr>
                            <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                <th scope="col" class="p-1 border  w-[30%]">
                                    Imagem Princ.
                                </th>
                                <td class="text-black">
                                    <input class="border w-[100%] p-2" type="text" name="img1" id="img1" value="{{$armas['img1']}}" required>
                                </td>
                            </tr>
                            <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                <th scope="col" class="p-1 border  w-[30%]">
                                    Imagem Sec.
                                </th>
                                <td class="text-black">
                                    <input class="border w-[100%] p-2" type="text" name="img2" id="img2" value="{{$armas['img2']}}" required>
                                </td>
                            </tr>
                            <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                <th scope="col" class="p-1 border  w-[30%]">
                                    Imagem Terc.
                                </th>
                                <td class="text-black">
                                    <input class="border w-[100%] p-2" type="text" name="img3" id="img3" value="{{$armas['img3']}}" required>
                                </td>
                            </tr>
                            <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                <th scope="col" class="p-1 border  w-[30%]">
                                    Fabricante
                                </th>
                                <td class="text-black">
                                    <input class="border w-[100%] p-2" type="text" name="fabricante" id="fabricante"
                                        value="{{ $armas['fabricante'] }}">
                                </td>
                            </tr>
                            <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                <th scope="col" class="p-1 border  w-[30%]">
                                    Tipo
                                </th>
                                <td class="text-black">
                                    <input class="border w-[100%] p-2" type="text" name="tipo" id="tipo"
                                        value="{{ $armas['tipo'] }}">
                                </td>
                            </tr>
                            <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                <th scope="col" class="p-1 border  w-[30%]">
                                    Calibre
                                </th>
                                <td class="text-black">
                                    <input class="border w-[100%] p-2" type="text" name="calibre" id="calibre"
                                        value="{{ $armas['calibre'] }}">
                                </td>
                            </tr>
                            <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                <th scope="col" class="p-1 border  w-[30%]">
                                    Acabamento
                                </th>
                                <td class="text-black">
                                    <input class="border w-[100%] p-2" type="text" name="acabamento" id="acabamento"
                                        value="{{ $armas['acabamento'] }}">
                                </td>
                            </tr>
                            <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                <th scope="col" class="p-1 border  w-[30%]">
                                    Capacidade de tiros
                                </th>
                                <td class="text-black">
                                    <input class="border w-[100%] p-2" type="text" name="capacidade_tiro"
                                        id="capacidade_tiro" value="{{ $armas['capacidade_tiro'] }}">
                                </td>
                            </tr>
                            <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                <th scope="col" class="p-1 border  w-[30%]">
                                    Sist. de funcionamento
                                </th>
                                <td class="text-black">
                                    <input class="border w-[100%] p-2" type="text" name="sistema_funcionamento"
                                        id="sistema_funcionamento" value="{{ $armas['sistema_funcionamento'] }}">
                                </td>
                            </tr>
                            <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                <th scope="col" class="p-1 border  w-[30%]">
                                    Qnt de canos
                                </th>
                                <td class="text-black">
                                    <input class="border w-[100%] p-2" type="number" name="qtd_cano" id="qtd_cano"
                                        value="{{ $armas['qtd_cano'] }}">
                                </td>
                            </tr>
                            <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                <th scope="col" class="p-1 border  w-[30%]">
                                    Comprimento do cano
                                </th>
                                <td class="text-black">
                                    <input class="border w-[100%] p-2" type="text" name="comprimento_cano"
                                        id="comprimento_cano" value="{{ $armas['comprimento_cano'] }}">
                                </td>
                            </tr>
                            <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                <th scope="col" class="p-1 border  w-[30%]">
                                    Tipo de alma
                                </th>
                                <td class="text-black">
                                    <input class="border w-[100%] p-2" type="text" name="tipo_alma" id="tipo_alma"
                                        value="{{ $armas['tipo_alma'] }}">
                                </td>
                            </tr>
                            <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                <th scope="col" class="p-1 border  w-[30%]">
                                    Qnt de raias
                                </th>
                                <td class="text-black">
                                    <input class="border w-[100%] p-2" type="number" name="qtd_raias" id="qtd_raia"
                                        value="{{ $armas['qtd_raias'] }}">
                                </td>
                            </tr>
                            <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                <th scope="col" class="p-1 border  w-[30%]">
                                    Sentido de raias
                                </th>
                                <td class="text-black">
                                    <input class="border w-[100%] p-2" type="text" name="sentido_raias"
                                        id="sentido_raias" value="{{ $armas['sentido_raias'] }}">
                                </td>
                            </tr>
                            <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                <th scope="col" class="p-1 border  w-[30%]">
                                    País de fabricação
                                </th>
                                <td class="text-black">
                                    <input class="border w-[100%] p-2" type="text" name="pais_fabricacao"
                                        id="pais_fabricacao" value="{{ $armas['pais_fabricacao'] }}">
                                </td>
                            </tr>
                            <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                <th scope="col" class="p-1 border  w-[30%]">
                                    Preço Fab.
                                </th>
                                <td class="text-black">
                                    <input class="border w-[100%] p-2" type="number" name="preco" id="preco" step="any" value="{{$armas['preco']}}">
                                </td>
                            </tr>
                            <tr class="bg-blue-900 border-b  hover:bg-blue-700 ">
                                <th scope="col" class="p-1 border  w-[30%]">
                                    Taxa Base
                                </th>
                                <td class="text-black">
                                    <input class="border w-[100%] p-2" type="number" name="taxa" id="taxa"
                                        value="{{ $armas['taxa'] }}" readonly>
                                </td>
                            </tr>
                            <tr class="bg-blue-900 border-b hover:bg-blue-700 ">
                                <th scope="col" class="p-1 border  w-[30%]">
                                    Quantidade
                                </th>
                                <td class="text-black">
                                    <input class="border w-[100%] p-2" type="number" name="quantidade"
                                        id="quantidade" value="{{ $armas['quantidade'] }}">
                                </td>
                            </tr>
                            <tr class="bg-blue-900 border-b hover:bg-blue-700 ">
                                <th scope="col" class="p-1 border  w-[30%]">
                                    Estoque Mínimo
                                </th>
                                <td class="text-black">
                                    <input class="border w-[100%] p-2" type="number" name="estoque_min"
                                        id="estoque_min" value="{{ $armas['estoque_min'] }}">
                                </td>
                            </tr>
                            <tr class="bg-blue-900 border-b hover:bg-blue-700 ">
                                <th scope="col" class="p-1 border  w-[30%]">
                                    Situação
                                </th>
                                <td class="text-black">
                                    <select name="situacao" class="w-[100%] text-black" id="situacao" required>
                                        <option value="" selected>Selecionar...</option>
                                        <option value="A">Ativa</option>
                                        <option value="I">Inativa</option>
                                    </select>
                                </td>
                            </tr>
                        </thead>
                    </table>
                    <div
                class="flex items-center p-6 space-x-2 w-[100%] border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Salvar</button>
                    <a href="{{route('admin.arma')}}"><button type="button"
                    class="text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">Cancelar Edição</button></a>
            </div>
                </form>
            </div>
        </div>
@endsection
