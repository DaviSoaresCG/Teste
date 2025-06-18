<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="h-screen w-screen flex items-center justify-center 50 bg-gray-200  p-3">
    <main class="w-72 m-auto sm:w-96">
        <div class="text-center">
            <h1 class="font-bold text-2xl ">Login</h1>
        </div>
        <br>
        <form action="{{route('loginSubmit')}}" method="POST">
            @csrf

        <section class="space-y-4 bg-white rounded-2xl w-full h-full shadow-lg px-8 py-10">
            <div class="flex flex-col">
                <label for="email" class="ml-1 ">Email</label>
                <input type="text" name="email"
                    class=" border-2 border-gray-500 rounded-2xl py-2 px-2 00">
                @error('email')
                    <p class="text-sm text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="senha" class="ml-1 ">Senha</label>
                <input type="text" name="senha"
                    class="border-2  border-gray-500 rounded-2xl py-2 px-2 00">
            </div>
            <div class="flex gap-2 flex-col">
                <p>
                    <a href="#"
                        class=" hover:text-blue-600 transition-all duration-100 ease-in-out">
                        Esqueci minha senha
                    </a>
                </p>
                <button class="cursor-pointer text-white bg-pink-600 w-full rounded-2xl px-4 py-2 hover:bg-blue-600 
                    transition-all duration-300 ease mt-2">Login
                </button>
        </form>

            </div>
        </section>
    </main>
</body>

</html>