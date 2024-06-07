@extends('app')

@section('content')
    <section class="flex container mx-auto h-screen w-full justify-center items-center p-2 md:p-0">
        <form method="post" action="{{ route('login.authenticate') }}" class="rounded-md bg-slate-400 w-[400px] h-[250px] flex justify-center items-center flex-col sm:p-10 p-4">
            @csrf()
            <div class="flex flex-col w-full mb-4">
                <label for="#">Usuario</label>
                <input type="text" class="py-1 rounded-md pl-2" name="email">
            </div>
            <div class="flex flex-col w-full mb-4">
                <label for="#">Senha</label>
                <input type="password" name="password" class="py-1 rounded-md pl-2">
            </div>
            <div class="w-full flex items-center justify-start">
                <button class="bg-zinc-100 px-6 py-1 rounded-md transition-all hover:bg-zinc-200">Entrar</button>
            </div>
        </form>
    </section>
@endsection
