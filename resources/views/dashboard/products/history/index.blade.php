@extends('dashboard.master.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="mb-4 text-3xl font-semibold">Histórico de Alterações de Produto</h1>
        <div class="mb-4">
            <label for="product" class="block text-sm font-medium text-gray-700">Filtrar por Produto:</label>
            <div class="mt-1">
                <select id="product" name="product" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Todos</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ $product->id == $selectedProductId ? 'selected' : '' }}>{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Produto</th>
                        <th class="px-4 py-2 text-left">Campo</th>
                        <th class="px-4 py-2 text-left">Valor Antigo</th>
                        <th class="px-4 py-2 text-left">Novo Valor</th>
                        <th class="px-4 py-2 text-left">Data da Alteração</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productHistory as $history)
                        <tr>
                            <td class="px-4 py-2 border">{{ $history->id }}</td>
                            <td class="px-4 py-2 border">{{ $history->product->name }}</td>
                            <td class="px-4 py-2 border">{{ $history->field }}</td>
                            <td class="px-4 py-2 border">{{ $history->old_value }}</td>
                            <td class="px-4 py-2 border">{{ $history->new_value }}</td>
                            <td class="px-4 py-2 border">{{ $history->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $productHistory->links() }}
        </div>
    </div>
    <script>
        document.getElementById('product').addEventListener('change', function() {
            var selectedProductId = this.value;

            // Redirecionar para a página de histórico de produtos com o produto selecionado como parâmetro
            window.location = '{{ route("product-history.index") }}?product=' + selectedProductId;
        });
    </script>
@endsection
