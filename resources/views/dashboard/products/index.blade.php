<!-- resources/views/reports/stock.blade.php -->

@extends('dashboard.master.app')

@section('content')
@if(session('success'))
    <div class="relative px-4 py-3 mb-6 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
        <strong class="font-bold">Sucesso!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif
@if(session('error'))
    <div class="relative px-4 py-3 mb-6 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
@endif
<div class="container mx-auto">
    <div class="relative inline-block text-left">
        <div>
            <button type="button" class="inline-flex items-center justify-center w-full gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm drop hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100">
                Ordenar por
                <i class="text-[20px] ri-filter-line"></i>
            </button>
        </div>
        <div class="absolute left-0 hidden w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5" id="dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-menu">
            <div class="py-1" role="none">
                <a href="/products?sort=name" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">name</a>
                <a href="/products?sort=stock" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">stock</a>
                <a href="/products?sort=price" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">price</a>
            </div>
        </div>
    </div>
    <div class="flex flex-col justify-between md:flex-row md:items-center">
        <h1 class="mb-4 text-2xl font-bold">Relatório de Estoque</h1>

        <div class="flex items-end gap-10 mb-6 md:items-center">
            <form action="{{ route('products.index') }}" method="GET">
                <div class="flex flex-col items-start gap-2 md:items-center md:flex-row">
                    <label for="category_id" class="mr-2">Filtrar por Categoria:</label>
                   <div>
                    <select name="category_id" id="category_id" class="px-2 py-1 border rounded ">
                        <option value="">Todas as Categorias</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"  {{ request()->query('category_id') ==  $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="px-4 py-2 ml-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Filtrar</button>
                   </div>
                </div>
            </form>
            <a href="{{ route('export.products') }}" class="flex items-center h-8 px-4 text-sm text-white transition-all bg-blue-400 rounded-lg hover:bg-blue-700">Exportar</a>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full text-center bg-white border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b">Produto</th>
                    <th class="px-4 border-b py">Preço</th>
                    <th class="px-4 py-2 border-b">Estoque</th>
                    <th class="px-4 py-2 border-b">Categoria</th>
                    <th class="px-4 border-b py">Data de Expiração</th>
                    <th class="px-4 py-2 border-b">Baixa de Estoque</th>
                    <th class="px-4 py-2 border-b">Ações</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($products as $product)
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $product->name }}</td>
                        <td class="px-4 py-2 border-b">{{ $product->price }}</td>
                        <td class="px-4 py-2 border-b">{{ $product->stock }}</td>
                        <td class="px-4 py-2 border-b">{{ $product->category->name }}</td>
                        <td class="px-4 border-b py">{{  \Carbon\Carbon::parse($product->expiration_date)->locale('pt-BR')->isoFormat('DD/MM/YYYY') }}</td>
                        <td class="px-4 py-2 border-b">
                            <form action="{{ route('stock.update', $product) }}" method="post" class="flex items-center justify-center">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" id="quantity" class="w-16 px-2 py-1 mr-2 border rounded" min="1">
                                <button type="submit" class="px-2 py-1 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Baixar</button>
                            </form>
                        </td>
                        <td class="flex items-center justify-center px-4 py-2 space-x-2 border-b">
                            <a href="{{ route('products.edit', $product) }}" class="px-2 py-1 font-bold text-white bg-yellow-500 rounded hover:bg-yellow-700">Editar</a>
                            <form action="{{ route('products.destroy', $product) }}" method="post" class="">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 font-bold text-white bg-red-500 rounded hover:bg-red-700">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-10">
            {{ $products->links() }}
        </div>
    </div>
</div>
<script>

const dropButton = document.querySelector('.drop');




document.addEventListener('DOMContentLoaded', function() {
  const dropdown = document.getElementById('dropdown-menu');
  const options = dropdown.querySelectorAll('a');

  dropButton.addEventListener('click', () => {
    dropdown.classList.toggle('hidden');
})
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
      dropdown.classList.remove('hidden');
    }
  });
  options.forEach(option => {
    option.addEventListener('click', function(event) {
      event.preventDefault(); // Impede o comportamento padrão do link
      const sortBy = option.textContent.toLowerCase();
      const url = window.location.href.split('?')[0]; // Remove os parâmetros existentes
      window.location.href = `${url}?sort=${sortBy}`;
    });
  });


});

</script>
@endsection
