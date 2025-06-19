<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="">

    <header class="bg-amber-300 w-full flex items-center justify-center gap-3">
        <div class="sm:w-full flex items-center justify-between px-5 mt-10">
            <h1 class="text-4xl text-pink-600 font-bold">Cadastrar Dono</h1>
            <div class="">
                <ul class="flex flex-row flex-wrap gap-4">
                    <li><a href="{{ route('home') }}" class="hover:text-pink-600 ">Home</a></li>
                    <li><a href="{{ route('cadastrar') }}" class="hover:text-pink-600 ">Cadastrar Animal</a></li>
                    <li><a href="{{ route('cadastrar_dono') }}" class="hover:text-pink-600 ">Cadastrar Dono</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="cursor-pointer hover:text-pink-600 ">Sair</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <hr class="border-pink-600 border-1 mt-8">

</body>

<main class="w-full h-full mt-6 flex flex-row px-5">
    <article
        class="p-10 w-52 max-h-52 flex items-center justify-center border-2 border-dashed border-pink-600 cursor-pointer">
        <section class="">
            <div class="flex flex-col items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-20 text-pink-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
                <p></p>
            </div>
        </section>
    </article>
    <article class=" w-full">
        <section class=" flex items-center justify-center">
            <form action="#" method="POST" class="grid grid-cols-2 gap-4">
                <div class=" flex flex-col">
                    <label for="Nome" class="text-pink-600 font-bold">Nome do animal</label>
                    <input type="text" disabled name="nome" id="nome" value="Brutos" required
                        class="p-3 w-lg border-2 border-pink-600 bg-pink-100 rounded-2xl focus:outline-none text-sm sm:text-base">
                </div>
                <div class="flex flex-col">
                    <label for="Nome" class="text-pink-600 font-bold">Tratamento</label>
                    <select name="dono" required id="" class="w-lg p-3 bg-pink-600 text-white rounded-2xl">
                        <option value="" selected>Não selecionado</option>
                        <option value="dono1">Vacinação antirábica</option>
                        <option value="dono2">Banho</option>
                        <option value="dono3">Banho e Tosa</option>
                        <option value="dono3">Castração</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="Nome" class="text-pink-600 font-bold">Data</label>
                    <input type="date" name="data" id="data"
                        class="p-2 focus:outline-none border-2 border-pink-600 rounded">
                </div>
                <div class="flex flex-col col-span-2">
                    <label for="Nome" class="text-pink-600 font-bold">Observações</label>
                    <textarea name="observacao" id="observacao" cols="20" rows="10"
                        class="w-full focus:outline-none border-pink-600 border-2 rounded h-40 p-2"></textarea>
                </div>

                <div class="flex flex-row gap-5 justify-end col-span-2 md:mt-10">
                    <a href="{{ route('home') }}"
                        class="p-3 bg-red-600 rounded-2xl w-40 text-center text-lg text-white">Voltar</a>
                    <button type="submit"
                        class="p-3 bg-pink-600 cursor-pointer rounded-2xl w-40 text-lg text-white">Registrar</button>
                </div>

            </form>
        </section>
    </article>
</main>

</html>
