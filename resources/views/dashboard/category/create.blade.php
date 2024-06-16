@extends('dashboard.master.app')

@section('content')
<div class="container mx-auto">
    <h1 class="mb-4 text-2xl font-bold">Cadastrar Nova Categoria</h1>
    <form action="{{ route('admin.category.store') }}" method="post" class="max-w-[600px]">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nome:</label>
            <input type="text" name="name" id="name" class="w-full px-2 py-1 border rounded" required>
            @error('name')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>


        <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Cadastrar</button>
    </form>
</div>
@endsection
