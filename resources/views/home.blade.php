<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="">

    <header class="w-full flex items-center justify-center gap-3">
        <div class="sm:w-full w-60 flex items-center flex-col sm:flex-row gap-2 justify-between mt-10 px-10">
            <form action="#" method="post" class="flex flex-row items-center flex-nowrap gap-2 ">
                @csrf
                <input type="text" placeholder="Informe o nome do Animal" class="sm:px-4 sm:py-3 px-2 py-1 sm:w-lg border-2 border-pink-600 rounded-2xl focus:outline-none text-sm sm:text-base">
                <button type="submit" class="sm:p-3 bg-pink-600 p-1 text-sm sm:text-base text-white rounded-r-2xl cursor-pointer">Buscar</button>
            </form>
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

    <main class="w-full h-full mt-6">
        <article class="w-full items-center justify-center flex flex-row gap-4 flex-wrap">
            <a href="#" class=" group">
                <section class="flex flex-row w-72 shadow-2xl rounded-2xl p-2 cursor-pointer group-hover:scale-110 transition-all ease-in duration-200">
                    <div>
                        <img src="{{asset('assets/img/route.webp')}}" alt="" class="w-40 border-3 border-pink-600 rounded-lg">
                    </div>
                    <div class="flex flex-col gap-2 items-center justify-center w-40">
                        <p class="text-pink-600 text-lg">Brutos da silva</p>
                        <p>Buldog</p>
                    </div>
                </section>
            </a>
            <a href="" class=" group ">
                <section class="flex flex-row w-72 shadow-2xl rounded-2xl p-2 cursor-pointer group-hover:scale-110 transition-all ease-in duration-200">
                    <div>
                        <img src="{{asset('assets/img/tico.jpg')}}" alt="" class="w-40 border-3 border-pink-600 rounded-lg">
                    </div>
                    <div class="flex flex-col gap-2 items-center justify-center w-40">
                        <p class="text-pink-600 text-lg">Tico</p>
                        <p class="">Porquinha da Índia</p>
                    </div>
                </section>
            </a>
            <a href="#" class=" group ">
                <section class="flex flex-row w-72 shadow-2xl rounded-2xl p-2 cursor-pointer group-hover:scale-110 transition-all ease-in duration-200">
                    <div>
                        <img src="{{asset('assets/img/nina.jpg')}}" alt="" class="w-40 border-3 border-pink-600 rounded-lg">
                    </div>
                    <div class="flex flex-col gap-2 items-center justify-center w-40">
                        <p class="text-pink-600 text-lg">Lua</p>
                        <p>Gato</p>
                    </div>
                </section>
            </a>
            <a href="#" class=" group ">
                <section class="flex flex-row w-72 shadow-2xl rounded-2xl p-2 cursor-pointer group-hover:scale-110 transition-all ease-in duration-200">
                    <div>
                        <img src="{{asset('assets/img/lua.jpg')}}" alt="" class="w-40 border-3 border-pink-600 rounded-lg">
                    </div>
                    <div class="flex flex-col gap-2 items-center justify-center w-40">
                        <p class="text-pink-600 text-lg">Luca</p>
                        <p>Arara Azul</p>
                    </div>
                </section>
            </a>
            <a href="#" class="group">
                <section class="flex flex-row w-72 shadow-2xl rounded-2xl p-2 cursor-pointer group-hover:scale-110 transition-all ease-in duration-200">
                    <div>
                        <img src="{{asset('assets/img/caramelo.webp')}}" alt="" class="max-w-40 border-3 border-pink-600 rounded-lg">
                    </div>
                    <div class="flex flex-col gap-2 items-center justify-center w-40">
                        <p class="text-pink-600 text-lg">Zé</p>
                        <p>Caramelo</p>
                    </div>
                </section>
            </a>
        </article>
    </main>
</body>
</html>
