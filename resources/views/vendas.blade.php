@extends('layouts.main_layout')
@section('conteudo')
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
                            <th class="py-4 px-5 border-b text-left text-lg font-semibold text-gray-900">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendas as $venda)
                            <tr class="hover:bg-gray-100 transition-colors">
                                <td class="py-4 px-5 border-b text-base text-gray-900">{{ $venda->id }}</td>
                                <td class="py-4 px-5 border-b text-base text-gray-900">
                                    @foreach ($clientes as $cliente)
                                        @if ($cliente->id == $venda->cliente_id)
                                            {{ $cliente->nome }}
                                        @endif
                                    @endforeach
                                </td>
                                <td class="py-4 px-5 border-b text-base text-gray-900">{{ $venda->total }}</td>
                                <td class="py-4 px-5 border-b text-base text-gray-900">{{ $venda->data_venda }}</td>
                                <td class="py-4 px-5 border-b text-base flex flex-row text-gray-900">
                                    <div class="flex flex-row gap-4">
                                        <a href="{{ route('venda.edit', ['id' => $venda->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6 hover:text-blue-400">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('venda.delete', ['id' => $venda->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </article>
    </main>
    </body>

    </html>
@endsection
