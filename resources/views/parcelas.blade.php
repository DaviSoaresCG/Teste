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
            <h1 class="text-4xl text-pink-600 font-bold">Personalização das Parcelas</h1>
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
            <section class=" flex items-center justify-center flex-col">
                @error('parcelas')
                    <p>{{ $message }}</p>
                @enderror
                <div class="">
                    <p>Total da Venda: <strong>R$ {{ number_format($valor_total, 2, ',', '.') }}</strong></p>

                    <label class="block mt-4">Número de Parcelas:</label>
                    <input type="number" id="numParcelas" min="1" max="48" value="1"
                        class="p-2 border-2 border-pink-600 rounded-lg w-20" />

                    <button type="button" id="btnGerar"
                        class="ml-4 px-4 cursor-pointer py-2 bg-pink-600 text-white rounded-lg">
                        Gerar Parcelas
                    </button>
                </div>

                <form action="{{ route('venda.finalizar_venda') }}" method="POST" class="mt-6">
                    @csrf
                    <div id="parcelaContainer" class="space-y-4"></div>

                    {{-- enviar os dados --}}
                    <input type="hidden" name="venda_total" value="{{ $valor_total }}">
                    <input type="hidden" name="parcela" id="numParcelasHidden" value="1">
                    @foreach ($produtos as $prodId)
                        <input type="hidden" name="produtos[]" value="{{ $prodId }}">
                    @endforeach
                    @foreach ($valor_unitario as $valor)
                        <input type="hidden" name="valor_unitario[]" value="{{ $valor }}">
                    @endforeach
                    @foreach ($quantidade as $quant)
                        <input type="hidden" name="quantidade[]" value="{{ $quant }}">
                    @endforeach
                    <input type="hidden" name="cliente" value="{{ $cliente }}">
                    <button type="submit" class="mt-6 cursor-pointer px-6 py-2 bg-green-600 text-white rounded-lg">
                        Finalizar Venda
                    </button>
                </form>
            </section>
        </article>
    </main>
</body>
<script>
    // gerar parcelas
    document.getElementById('btnGerar').addEventListener('click', function() {
        const total = parseFloat("{{ $valor_total }}".replace(/,/g, '.'));
        const n = parseInt(document.getElementById('numParcelas').value);
        const container = document.getElementById('parcelaContainer');
        container.innerHTML = '';
        document.getElementById('numParcelasHidden').value = n;

        if (isNaN(total) || total <= 0 || isNaN(n) || n <= 0) {
            container.innerHTML = '<p class="text-red-600">Total ou número de parcelas inválido.</p>';
            return;
        }

        const base = Math.floor((total / n) * 100) / 100;
        let diff = Math.round((total - base * n) * 100) / 100;

        for (let i = 1; i <= n; i++) {
            let valor = base + (diff > 0 ? 0.01 : 0);
            diff = Math.round((diff - 0.01) * 100) / 100;

            const venc = new Date();
            venc.setMonth(venc.getMonth() + i);

            const vencStr = venc.toISOString().split('T')[0];

            const bloco = document.createElement('div');
            bloco.classList.add('parcela-item', 'grid', 'grid-cols-3', 'gap-4', 'items-center');

            bloco.innerHTML = `
          <label>Parcela ${i}</label>
          <input type="number" name="parcelas[${i}][valor]" step="0.01"
                 value="${valor.toFixed(2)}" required
                 class="p-2 border-2 border-pink-600 rounded-lg"/>
          <input type="date" name="parcelas[${i}][vencimento]" value="${vencStr}"
                 class="p-2 border-2 border-pink-600 rounded-lg"/>
        `;

            container.appendChild(bloco);
        }
    });
</script>

<script>
    // ajustar o valor das parcelas
    const total = parseFloat("{{ $valor_total }}".replace(/,/g, '.'));

    document.getElementById('parcelaContainer').addEventListener('input', function(e) {
        if (!e.target.name.endsWith('[valor]')) return;

        const valorEls = Array.from(this.querySelectorAll('input[name$="[valor]"]'));
        const soma = valorEls.reduce((acc, el) => acc + (parseFloat(el.value) || 0), 0);
        let diff = parseFloat((total - soma).toFixed(2));

        const lastEl = valorEls[valorEls.length - 1];
        let lastVal = parseFloat(lastEl.value) || 0;

        // Se a diferença for negativa (excedeu o total)
        if (soma > total) {
            const excess = soma - total;
            const adjusted = Math.max(0, lastVal - excess);
            lastEl.value = adjusted.toFixed(2);

        } else if (soma < total) {
            // Se ainda faltar, soma na última
            lastEl.value = (lastVal + diff).toFixed(2);
        }
    });
</script>




</html>
