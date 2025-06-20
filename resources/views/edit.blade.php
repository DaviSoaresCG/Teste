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
            <h1 class="text-4xl text-pink-600 font-bold">Editar Venda (Cliente)</h1>
            <div class="">
                <ul class="flex flex-row flex-wrap gap-4">
                    <li><a href="{{ route('cadastrar_cliente') }}" class="hover:text-pink-600 ">Cadastrar Cliente</a></li>
                    <li><a href="{{ route('cadastrar_produto') }}" class="hover:text-pink-600 ">Cadastrar Produto</a></li>
                    <li><a href="{{route('venda.create')}}" class="hover:text-pink-600">Realizar Venda</a></li>
                    <li><a href="{{route('venda')}}" class="hover:text-pink-600">Histórico de Vendas</a></li>
                    <li><a href="{{route('logout')}}" class="hover:text-pink-600">logout</a></li>
                </ul>
            </div>
        </div>
    </header>
    <hr class="border-pink-600 border-1 mt-8">

    <main class="w-full h-full mt-6 flex flex-row px-5">
        <article class=" w-full">
            <section class=" flex items-center justify-center">
                <table class="w-full bg-white border border-gray-300 shadow-lg rounded-lg overflow-hidden">
                    <thead class="bg-gray-100">
                        <tr class="">
                            <th class="py-4 px-5 border-b text-left text-lg font-semibold text-gray-900">ID</th>
                            <th class="py-4 px-5 border-b text-left text-lg font-semibold text-gray-900">Cliente</th>
                            <th class="py-4 px-5 border-b text-left text-lg font-semibold text-gray-900">Total</th>
                            <th class="py-4 px-5 border-b text-left text-lg font-semibold text-gray-900">Data</th>
                            <th class="py-4 px-5 border-b text-left text-lg font-semibold text-gray-900">Salvar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-100 transition-colors">
                            <td class="py-4 px-5 border-b text-base text-gray-900">{{ $venda->id }}</td>
                            <td class="py-4 px-5 border-b text-base text-gray-900">
                                <form action="{{route('venda.edit_submit')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="vendaId" value="{{$venda->id}}">
                                    <select name="cliente" id="cliente">
                                        @foreach ($clientes as $cliente)
                                            <option value="{{$cliente->id}}" @if($cliente->id == $venda->cliente->id) selected @endif>{{$cliente->nome}}</option>
                                        @endforeach
                                    </select>
                            </td>
                            <td class="py-4 px-5 border-b text-base text-gray-900">{{ $venda->total }}</td>
                            <td class="py-4 px-5 border-b text-base text-gray-900">{{ $venda->data_venda }}</td>
                            <td class="py-4 px-5 border-b text-base text-gray-900">
                                <button type="submit" class="cursor-pointer hover:text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                </button>
                                </form>
                            </td>


                        </tr>
                    </tbody>
                </table>
            </section>
        </article>
    </main>
</body>

</html>
