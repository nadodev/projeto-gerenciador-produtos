@extends('dashboard.master.app')

@section('content')
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Sucesso!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif
@if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
@endif
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Editar Produto</h1>
    <form action="{{ route('products.update', $product) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nome:</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}" class="w-full border rounded px-2 py-1">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Stock:</label>
            <input type="text" name="stock" id="stock" value="{{ $product->stock }}" class="w-full border rounded px-2 py-1">
            @error('stock')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="category_id" class="block text-gray-700">Categoria:</label>
            <select name="category_id" id="category_id" class="w-full border rounded px-2 py-1" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700">Descrição:</label>
            <textarea name="description" id="description" class="w-full border rounded px-2 py-1">{{ $product->description }}</textarea>
            @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700">Preço:</label>
            <input type="number" name="price" id="price" class="w-full border rounded px-2 py-1" step="0.01" required value="{{ $product->price }}">
            @error('price')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="photo" class="block text-gray-700">Foto:</label>
            <input type="file" name="photo" id="photo" class="w-full border rounded px-2 py-1">
            @error('photo')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="expiration_date" class="block text-gray-700">Data de Vencimento:</label>
            <input type="date" name="expiration_date" id="expiration_date" class="w-full border rounded px-2 py-1" value="{{ $product->expiration_date }}">
            @error('expiration_date')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Salvar</button>
    </form>
</div>
@endsection
