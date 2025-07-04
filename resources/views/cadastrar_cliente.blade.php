@extends('layouts.main_layout')
@section('conteudo')
    <p class="text-2xl text-pink-600">{{ $titulo }}</p>
    <main class="w-full h-full mt-6 flex flex-row px-5">
        <article class=" w-full">
            <section class=" flex items-center justify-center">
                <form action="{{ route('cliente.cadastrar_submit') }}" method="POST" class="grid grid-cols-2 gap-4">
                    @csrf
                    <div class=" flex flex-col">
                        <label for="Nome" class="text-pink-600 font-bold">Nome Cliente:</label>
                        <input type="text" name="nome" id="nome" placeholder="Nome" required
                            class="p-3 w-lg border-2 border-pink-600 rounded-2xl focus:outline-none text-sm sm:text-base">
                    </div>
                    <div class="flex flex-col">
                        <label for="endereço" class="text-pink-600 font-bold">CPF</label>
                        <input type="text" name="cpf" id="cpf" placeholder="CPF" required
                            class="p-3 w-lg border-2 border-pink-600 rounded-2xl focus:outline-none text-sm sm:text-base">
                    </div>
                    <div class="flex flex-row gap-5 justify-end col-span-2 md:mt-10">
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
            $('#cpf').mask("000.000.000-00")
        })
    </script>

    </html>
@endsection
