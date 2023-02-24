<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Projeto</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Entrar</a>

                        @if (Route::has('preregister'))
                            <a href="{{ route('preregister') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Se Cadastrar</a>
                        @endif
                    @endauth
                </div>
            @endif
            
<div class="flex justify-center  bg-blue-900 p-5 md:p-16 lg:p-28">
    <div class="flex flex-col text-right justify-center items-end max-w-7xl  text-white">
        <span class="underline underline-offset-2 text-white -mt-3"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; </span>
        <div class="flex flex-col text-white mt-5">
            <h1 class="text-4xl md:text-[50px] font-semibold">Bem Vindo!</h1>
            <p class="text-xl mt-2 md:mt-4 tracking-wide">Você ainda não está autenticado!</p>
        </div>
        <p class="mt-4 text-sm md:w-[52%] tracking-wide leading-7">Caso já tenha cadastro pode entrar na sua conta, se ainda não esta cadastrado pode se cadastrar.</p>
    </div>
</div>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://kit.fontawesome.com/290d4f0eb4.js" crossorigin="anonymous"></script>
        </div>
    </body>
</html>
