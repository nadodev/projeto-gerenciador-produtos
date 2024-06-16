@extends('dashboard.master.app')

@section('content')
<div class="container mx-auto">
    <h1 class="mb-4 text-2xl font-bold">Cadastrar Novo Cliente</h1>
    <form action="{{ route('admin.client.store') }}" method="post" class="max-w-[600px]">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nome:</label>
            <input type="text" name="name" id="name" class="w-full px-2 py-1 border rounded">
            @error('name')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email:</label>
            <input type="text" name="email" id="email" class="w-full px-2 py-1 border rounded">
            @error('email')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-gray-700">Telefone:</label>
            <input type="text" name="phone" id="phone" class="w-full px-2 py-1 border rounded">
            @error('phone')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="type" class="block text-gray-700">Tipo:</label>
            <select class="w-full px-2 py-1 border rounded" name="type">
                <option value="juridica">Pessoa Juridica</option>
                <option value="fisica">Pessoa Fisica</option>
            </select>
            @error('type')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="document" class="block text-gray-700">Documento:</label>
            <input type="text" name="document" id="document" class="w-full px-2 py-1 border rounded">
            @error('document')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="address" class="block text-gray-700">Endereço:</label>
            <input type="text" name="address" id="address" class="w-full px-2 py-1 border rounded">
            @error('address')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Descrição:</label>
            <textarea type="text" name="description" id="description" class="w-full px-2 py-1 border rounded"></textarea>
            @error('description')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>


        <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Cadastrar</button>
    </form>
</div>
@endsection
