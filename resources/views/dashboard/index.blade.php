@extends('dashboard.master.app')

@section('content')
    <section class="container flex items-center p-10 mx-auto rounded-lg bg-zinc-100">

        <div class="flex gap-4">
            <div class="p-4 text-center rounded-lg bg-sky-500">
                <span class="block mb-2 text-5xl font-black text-white">5</span>
                <p class="font-bold text-white text-1xl">PRODUTOS CADASTRADO</p>
            </div>
            <div class="p-4 text-center rounded-lg bg-emerald-500">
                <span class="block mb-2 text-5xl font-black text-white">{{ $totalCategorias }}</span>
                <p class="font-bold text-white text-1xl">CATEGORIAS CADASTRADO</p>
            </div>

        </div>
    </section>
@endsection
