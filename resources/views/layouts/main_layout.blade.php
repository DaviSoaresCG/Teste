<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="">

    <header class="w-full flex items-center justify-center gap-3">
        <div class="sm:w-full flex items-center justify-between px-5 mt-10">
            <h1 class="text-4xl text-pink-600 font-bold"></h1>
            <div class="">
                <ul class="flex flex-row flex-wrap gap-4">
                    <li><a href="{{ route('cliente.cadastrar_submit') }}" class="hover:text-pink-600 ">Cadastrar Cliente</a>
                    </li>
                    <li><a href="{{ route('produto.cadastrar') }}" class="hover:text-pink-600 ">Cadastrar Produto</a>
                    </li>
                    <li><a href="{{ route('venda.create') }}" class="hover:text-pink-600">Realizar Venda</a></li>
                    <li><a href="{{ route('venda') }}" class="hover:text-pink-600">Histórico de Vendas</a></li>
                    <li><a href="{{ route('logout') }}" class="hover:text-pink-600">logout</a></li>
                </ul>
            </div>
        </div>
    </header>
    <hr class="border-pink-600 border-1 mt-8">

    <body>
        @yield('conteudo')
