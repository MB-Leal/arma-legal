<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="{{ asset('imgs/arma.ico') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Arma Admin</title>
</head>

@section('content')

<body class="bg-zinc-800">

</body>

<main id="login-img" class="w-[100vw] flex items-center justify-around flex-col h-[100vh]">
    <div class=" w-[100%]  justify-end flex items-end mt-8">
        <h1 class="text-orange-400 bg-white h-[90%] border-orange-400 border-b-2 items-center flex p-4 justify-center lg:text-right text-center text-sm lg:text-2xl font-bold uppercase">
            Arma Legal - Painel administrativo
        </h1>
    </div>
    <div class="border-2 lg:w-[50%] w-[90%] h-[30em] mb-4 rounded-md">
        @if (session('danger'))
        <div class="">
            {{session('danger')}}
        </div>
    @endif
        <form method="post" action="{{route('admin.loginAction')}}" class="w-[100%] h-[100%] flex flex-col justify-around items-center">
            @csrf
            <div class="w-[5em]">
                <img src="/Imgs/fas.png" alt="">
            </div>
            <div class="w-[90%]">
                <label class="font-bold uppercase border-t-2 border-orange-400 m-2 lg:text-red-800 text-red-700">E-mail: </label>
                <input type="email" name="email" class="rounded-md w-full border-2 p-2 border-orange-400"
                placeholder="Digite seu e-mail: " value="{{old('email')}}">
            </div>
            <div class="w-[90%]">
                <label class="font-bold uppercase border-t-2 border-orange-400 text-purple-900">Senha: </label>
                <input type="password" name="password" class="rounded-md w-full border-2 p-2 border-orange-400" id="senha-admin" placeholder="Digite sua senha: ">
            </div>
            <div class="bg-orange-600 hover:bg-orange-500 border w-[10em] h-[3em] rounded-md">
                <button type="submit" class="text-white uppercase w-[100%] h-[100%]">Entrar</button>
            </div>
        </form>
    </div>
</main>

<x-footer></x-footer>

@endsection

<style>
    #login-img{
        background-image: url('/Imgs/login.jpg');
        background-size: cover;
    }

    form{

        background-color: rgba(255, 255, 255, .2);
    }
</style>


@yield('content')

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<script src="https://kit.fontawesome.com/fbb934b296.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}"></script>


</body>

</html>
