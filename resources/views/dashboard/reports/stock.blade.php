<!-- resources/views/reports/stock.blade.php -->

@extends('dashboard.master.app')

@section('content')
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Sucesso!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Relatório de Estoque</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b">Produto</th>
                    <th class="py-2 px-4 border-b">Estoque</th>
                    <th class="py-2 px-4 border-b">Baixa de Estoque</th>
                    <th class="py-2 px-4 border-b">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $product->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $product->stock }}</td>
                        <td class="py-2 px-4 border-b">
                            <form action="{{ route('stock.update', $product) }}" method="post" class="flex items-center">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" id="quantity" class="w-16 border rounded px-2 py-1 mr-2" min="1">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Baixar</button>
                            </form>
                        </td>
                        <td class="py-2 px-4 border-b flex space-x-2">
                            <a href="{{ route('products.edit', $product) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Editar</a>
                            <form action="{{ route('products.destroy', $product) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
