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
            <h1 class="text-4xl text-pink-600 font-bold">Cadastrar Produto</h1>
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
                <form action="{{route('cadastrar_produto_submit')}}" method="POST" class="grid grid-cols-2 gap-4">
                    @csrf
                    <div class=" flex flex-col">
                        <label for="Nome" class="text-pink-600 font-bold">Nome Produto:</label>
                        <input type="text" name="nome" id="nome" placeholder="Nome" required
                            class="p-3 w-lg border-2 border-pink-600 rounded-2xl focus:outline-none text-sm sm:text-base">
                    </div>
                    <div class="flex flex-col">
                        <label for="endereço" class="text-pink-600 font-bold">Valor R$:</label>
                        <input type="text" name="valor" id="valor" placeholder="Valor" required
                            class="p-3 w-lg border-2 border-pink-600 rounded-2xl focus:outline-none text-sm sm:text-base">
                    </div>
                    <div class="flex flex-row gap-5 justify-end col-span-2 md:mt-10">
                        <a href="#" class="p-3 bg-red-600 rounded-2xl w-40 text-center text-lg text-white">Voltar</a>
                        <button type="submit"
                            class="p-3 bg-pink-600 cursor-pointer rounded-2xl w-40 text-lg text-white">Cadastrar</button>
                    </div>
                </form>
            </section>
        </article>
    </main>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
    integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function() {
        // ao carregar a pagina - ONLOAD
        $('#telefone').mask("(00) 00000-0000") //pega o elemto com ID CPF
        $('#cpf').mask("000.000.000-00")
    })
</script>
<script>
    // máscara para formato monetário 
    document.getElementById('valor').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        value = (value / 100).toLocaleString('pt-BR', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
        e.target.value = value;
    });

    
</script>

</html>
