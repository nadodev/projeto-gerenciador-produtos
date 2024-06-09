<!-- resources/views/dashboard/reports/movements.blade.php -->

@extends('dashboard.master.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Relatório de Movimentação de Estoque</h1>
    <table class="min-w-full divide-y divide-gray-200 ">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produto</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantidade</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 ">
            @foreach ($movements as $movement)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $movement->product->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $movement->product->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($movement->type == 'exit')
                            <span class="text-white bg-red-500 px-2 rounded-lg text-sm">Saída</span>
                        @else
                            <span class="bg-green-500 text-green-800 px-2 rounded-lg text-sm">Entrada</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{  $movement->type == 'exit' ? '- '.$movement->quantity  : '+ '.$movement->quantity }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($movement->created_at)->locale('pt-BR')->isoFormat('DD/MM/YYYY') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
