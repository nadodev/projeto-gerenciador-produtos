@extends('dashboard.master.app')

@section('content')
<div class="container mx-auto">
    <h1 class="mb-4 text-2xl font-bold">Cadastrar Novo Projeto</h1>
    <form action="{{ route('admin.project.store') }}" method="post" class="max-w-[600px]">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nome:</label>
            <input type="text" name="name" id="name" class="w-full px-2 py-1 border rounded">
            @error('name')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="client_id" class="block text-gray-700">Cliente:</label>
            <select class="w-full px-2 py-1 border rounded" name="client_id">
                @if($clients->isEmpty())
                    <option value="juridica">Não há Usuarios cadastrada</option>
                @else
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}"> {{ $client->name }}</option>
                @endforeach
                @endif
            </select>
            @error('client_id')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="category_id" class="block text-gray-700">Categoria:</label>
            <select class="w-full px-2 py-1 border rounded" name="category_id">
                @if($categories->isEmpty())
                    <option value="juridica">Não há categoria cadastrada</option>
                @else
                   @foreach ($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                   @endforeach
                @endif
            </select>
            @error('category_id')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="user_id" class="block text-gray-700">Atribuir há:</label>
            <select class="w-full px-2 py-1 border rounded" name="user_id">
                @if($users->isEmpty())
                    <option value="juridica">Não há Usuarios cadastrada</option>
                @else
                @foreach ($users as $user)
                    <option value="{{ $user->id }}"> {{ $user->name }}</option>
                @endforeach
                @endif
            </select>
            @error('user_id')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="status" class="block text-gray-700">Status:</label>
            <select class="w-full px-2 py-1 border rounded" name="status">
                <option value="active">Ativo</option>
                <option value="inactive">Inativo</option>
            </select>
            @error('status')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="start_date" class="block text-gray-700">Data Inicial:</label>
            <input type="date" name="start_date" id="start_date" class="w-full px-2 py-1 border rounded" >
            @error('start_date')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="end_date" class="block text-gray-700">Data Final:</label>
            <input type="date" name="end_date" id="end_date" class="w-full px-2 py-1 border rounded" >
            @error('end_date')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>


        <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Cadastrar</button>
    </form>
</div>
@endsection
