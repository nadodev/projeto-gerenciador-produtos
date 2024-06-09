@extends('dashboard.master.app')

@section('content')
<div class="container mx-auto">
    <h1 class="mb-4 text-2xl font-bold">Cadastrar Novo Produto</h1>
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nome:</label>
            <input type="text" name="name" id="name" class="w-full px-2 py-1 border rounded"  value="{{ old('name') }}">
            @error('name')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="name" class="block text-gray-700">SKU:</label>
            <input type="text" name="sku" id="sku" class="w-full px-2 py-1 border rounded" value="{{ old('sku') }}" >
            @error('sku')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="category_id" class="block text-gray-700">Categoria:</label>
            <select name="category_id" id="category_id" class="w-full px-2 py-1 border rounded" >
                @if($categories->empty())
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                @else
                    <option value="#">Não há categoria cadastrada</option>
                @endif
            </select>
            @error('category_id')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700">Descrição:</label>
            <textarea name="description" id="description" class="w-full px-2 py-1 border rounded">{{ old('name') }}</textarea>
            @error('description')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700">Preço:</label>
            <input type="number" name="price" id="price" class="w-full px-2 py-1 border rounded" step="0.01" value="{{ old('price') }}" >
            @error('price')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="photo" class="block text-gray-700">Foto:</label>
            <input type="file" name="photo" id="photo" class="w-full px-2 py-1 border rounded">
            @error('photo')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="expiration_date" class="block text-gray-700">Data de Vencimento:</label>
            <input type="date" name="expiration_date" id="expiration_date" class="w-full px-2 py-1 border rounded" value="{{ old('expiration_date') }}">
            @error('expiration_date')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Cadastrar</button>
    </form>
</div>
@endsection
