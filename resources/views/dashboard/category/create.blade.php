@extends('dashboard.master.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Cadastrar Nova Categoria</h1>
    <form action="{{ route('category.store') }}" method="post" class="max-w-[600px]">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nome:</label>
            <input type="text" name="name" id="name" class="w-full border rounded px-2 py-1" required>
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>


        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Cadastrar</button>
    </form>
</div>
@endsection
