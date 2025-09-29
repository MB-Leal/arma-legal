@extends('admin.template')

<x-navbar></x-navbar>

@section('content')
    @include('components.buttonReturn')
    <main class="flex flex-col w-[100vw] items-center">

        <header class="text-center text-2xl mt-8 mb-8 flex items-center gap-8 text-white">
            <h1>Arma Legal - Lista Geral</h1>
        </header>
        <table class="text-sm text-left m-auto w-[90%] text-gray-500 items-end justify-center ">
            <thead class="text-xs text-gray-700 uppercase bg-green-600  ">
                <tr>
                    <th scope="col" class="px-6 py-3 text-white border">ID</th>
                    <th scope="col" class="px-6 py-3 text-white border">Nome</th>
                    <th scope="col" class="px-6 py-3 text-white border">CPF</th>
                    <th scope="col" class="px-6 py-3 text-white border">Matrícula</th>
                    <th scope="col" class="px-6 py-3 text-white border text-center">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($associados as $associado)
                    <tr class="bg-white border-b   hover:bg-gray-50 ">
                        <td class="px-6 py-4 border">{{ $associado->id }}</td>
                        <td class="px-6 py-4 border">{{ $associado->nome }}</td>
                        <td class="px-6 py-4 border">{{ $associado->cpf }}</td>
                        <td class="px-6 py-4 border">{{ $associado->matricula }}</td>
                        <td class="px-6 py-4 border text-center flex flex-col items-center justify-center gap-2">
                            <a href="{{ route('admin.detalheAssoc', ['id' => $associado->id]) }}">
                                Ver detalhes
                            </a>
                            <a href="{{ route('admin.editarAssoc', ['id' => $associado->id]) }}">Editar</a>

                            <form class="d-inline" action="{{ route('admin.deletarAssoc', ['id' => $associado->id]) }}"
                                method="post" onsubmit="return confirm('Tem certeza que deseja excluir este associado?')">
                                @method('DELETE')
                                @csrf
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    <div class="justify-center gap-4 m-4 flex w-[100%]">
        {{ $associados->links() }}
    </div>

    <x-footer></x-footer>
    <hr>
@endsection
