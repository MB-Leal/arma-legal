@extends('admin.template')

@section('content')
@include('components.buttonReturn')

<div class="flex w-[100%] h-[100vh] justify-center items-center">
    <div class="bg-white w-[90%] flex flex-col justify-center rounded-lg shadow ">
        <div class="flex items-start justify-between p-4 border-b bg-purple-600 rounded-t dark:border-gray-600">
            <h3 class="text-xl font-semibold text-white">Editar dados de usuário</h3>
        </div>

        <form method="post" action="{{route('admin.updateUser')}}" class="w-[100%]  flex flex-col justify-center gap-8 items-center">
            @csrf
            <div class="w-[90%] mb-4 mt-4 text-left">
                <label for="id-usuario" class="font-bold  ">ID: </label>
                <input id="nomeEdit" type="number" name="id" class="rounded-md w-full p-2 border" value="{{$usuario['id']}}" readonly>
            </div>
            <div class="w-[90%] mb-4 mt-4 text-left">
                <label for="nome-usuario" class="font-bold  ">Usuário: </label>
                <input type="text" name="name" class="rounded-md w-full p-2 border" value="{{$usuario['name']}}">
            </div>
            <div class="w-[90%] mb-4 text-left">
                <label for="Email-usuario" class="font-bold">E-mail: </label>
                <input type="email" name="email" class="rounded-md w-full p-2 border" id="cpf-associado" value="{{$usuario['email']}}">
            </div>
            <div class="w-[90%] mb-4 text-left">
                <label for="senha-usuario" class="font-bold">Senha: </label>
                <input type="password" name="password" class="rounded-md w-full p-2 border" placeholder="Insira uma nova senha Aqui">
            </div>
            <div
                class="flex items-center p-6 space-x-2 w-[100%] border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="submit"
                    class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Salvar</button>
            </div>
        </form>
    </div>
</div>
@endsection
