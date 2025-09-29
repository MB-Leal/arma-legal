<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="{{ asset('Imgs/arma.ico') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Arma Admin</title>
</head>

<body class="bg-zinc-950" id="body-backg">


@yield('content')

<style>
    #body-backg {
        background-image: url({{ asset('Imgs/body.jpg') }});
        background-repeat: no-repeat;
        background-position: center center;

    }

    #logo-header {
        background-image: url({{ asset('Imgs/header.jpg') }});
        background-repeat: no-repeat;
        background-position: center left;
        background-size: cover;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<script src="https://kit.fontawesome.com/fbb934b296.js" crossorigin="anonymous"></script>
</body>

</html>
