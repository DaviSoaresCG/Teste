@extends('layouts.main_layout')
@section('conteudo')
    <p class="text-2xl text-pink-600">{{ $titulo }}</p>

    <main class="w-full h-full mt-6 flex flex-col px-5">
        @error('parcelas')
            <p class="p-3 w-52 flex items-center rounded justify-center bg-red-600 text-white">Erro: {{ $message }}</p>
        @enderror
        <article class=" w-full">
            <section class=" flex items-center justify-center">
                <form action="{{ route('venda.forma_pagamento') }}" method="POST" class=" grid grid-cols-2 gap-4">
                    @csrf
                    <div class="flex flex-col col-span-2">
                        <label for="Nome" class="text-pink-600 font-bold">Nome Cliente:</label>
                        <select name="cliente" required
                            class="w-lg p-3 focus:outline-none border-2 border-pink-600 rounded-2xl">
                            <option value="" selected>Não selecionado</option>
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="produtosContainer">
                        <div class="produto-row flex items-center gap-3 mb-3">
                            <a href="#" class="add-produto hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </a>
                            <div class="flex flex-col">
                                <label for="">Produto</label>
                                <select name="produto[]" required class="p-3 border-2 border-pink-600 rounded-2xl">
                                    <option value="" selected>Não selecionado</option>
                                    @foreach ($produtos as $produto)
                                        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <label for="">Valor Unitario R$</label>
                                <input type="text" name="valor_unitario[]" readonly
                                    class="p-3 border-2 border-pink-600 rounded-2xl" placeholder="R$ 0,00">
                            </div>
                            <div class="flex flex-col">
                                <label for="">Quantidade</label>
                                <input type="number" placeholder="Quantidade" value="1" name="quantidade[]" required
                                    class="p-3 border-2 border-pink-600 rounded-2xl">
                            </div>
                            <a href="#" class="remove-produto text-red-600 ml-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="flex flex-row gap-5 justify-end col-span-2 md:mt-10">
                        <button type="submit"
                            class="p-3 bg-pink-600 cursor-pointer rounded-2xl w-50 text-lg text-white">Forma de
                            Pagamento</button>
                    </div>
                </form>
            </section>
        </article>
    </main>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // mostrar o preço unitario
        $('#produtosContainer').on('change', 'select[name="produto[]"]', function() {
            const select = $(this);
            const valInput = select.closest('.produto-row').find('input[name="valor_unitario[]"]');
            const id = select.val();

            if (!id) {
                valInput.val('');
                return;
            }

            fetch(`/produto/preco/${id}`)
                .then(res => res.json())
                .then(data => {
                    valInput.val(parseFloat(data.valor).toFixed(2));
                })
                .catch(() => {
                    valInput.val('Erro');
                });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            // Ao clicar no "+"
            $('#produtosContainer').on('click', '.add-produto', function(e) {
                e.preventDefault();
                const row = $(this).closest('.produto-row');
                const newRow = row.clone();
                newRow.find('select').val('');
                newRow.find('input').val('');
                $('#produtosContainer').append(newRow);
            });

            // Ao clicar no "–"
            $('#produtosContainer').on('click', '.remove-produto', function(e) {
                e.preventDefault();
                if ($('#produtosContainer .produto-row').length > 1) {
                    $(this).closest('.produto-row').remove();
                }
            });
        });
    </script>

    </html>
@endsection
