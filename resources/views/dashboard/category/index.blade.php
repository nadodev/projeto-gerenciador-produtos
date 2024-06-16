@extends('dashboard.master.app')

@section('content')
@if(session('success'))
    <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
        <strong class="font-bold">Sucesso!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif
@if(session('error'))
    <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
@endif
<div class="container mx-auto">
    <h1 class="mb-4 text-2xl font-bold">Listagem de Categoria</h1>
    <div class="overflow-x-auto">
        <table class="bg-white border border-gray-200 text-center max-w-[900px]">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b">#</th>
                    <th class="px-4 py-2 border-b">Nome</th>
                    <th class="px-4 py-2 border-b">Ações</th>
                </tr>
            </thead>
            <tbody>
                @if($categories->empty())
                    @foreach ($categories as $category)
                        <tr>
                            <td class="px-4 py-2 border-b">{{ $category->id }}</td>
                            <td class="w-full px-4 py-2 border-b">{{ $category->name }}</td>
                            <td class="flex items-center justify-center px-4 py-2 space-x-2 border-b">
                                <a href="{{ route('admin.category.edit', $category) }}" class="px-2 py-1 font-bold text-white bg-yellow-500 rounded hover:bg-yellow-700">Editar</a>
                                <button id="showModalBtn-{{ $category->id }}" type="button" class="flex gap-2 px-2 py-1 font-bold text-white bg-red-500 rounded hover:bg-red-700" data-toggle="modal" data-target="#confirmDeleteModal{{ $category->id }}">
                                    Excluir
                                </button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div id="confirmDeleteModal{{ $category->id }}" class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50 modal">
                            <div class="w-full p-10 m-auto modal-dialog lg:w-1/3">
                                <div class="bg-white rounded shadow-lg modal-content">
                                    <div class="flex justify-between px-4 py-3 text-white bg-red-500 modal-header">
                                        <h5 class="font-bold modal-title">Confirmar Exclusão</h5>
                                        <button type="button" class="text-2xl text-white modal-close" data-dismiss="modal" data-id="{{ $category->id }}">&times;</button>
                                    </div>
                                    <div class="p-4 modal-body">
                                        <p>Tem certeza de que deseja excluir esta categoria?</p>
                                    </div>
                                    <div class="flex gap-2 px-4 py-4 bg-gray-100 modal-footer">
                                        <button type="button" class="px-4 py-1 text-white rounded-lg bg-zinc-400" id="cancelBtn{{ $category->id }}">Cancelar</button>
                                        <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-1 text-white bg-red-500 rounded-lg">Excluir</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Não há categoria cadastrada</p>
                @endif
            </tbody>
        </table>
        <div class="mt-10  max-w-[900px]">
            {{ $categories->links() }}
        </div>
    </div>
</div>

<script>
    function showModal(categoryId) {
        const modalId = 'confirmDeleteModal' + categoryId;
        document.getElementById(modalId).classList.remove('hidden');
    }

    function hideModal(categoryId) {
        const modalId = 'confirmDeleteModal' + categoryId;
        document.getElementById(modalId).classList.add('hidden');
    }

    @if($categories)
        @foreach($categories as $category)
            document.getElementById("showModalBtn-{{ $category->id }}").addEventListener('click', function () {
                showModal('{{ $category->id }}');
            });
            document.getElementById("cancelBtn{{ $category->id }}").addEventListener('click', function () {
                hideModal('{{ $category->id }}');
            });
        @endforeach
    @endif


    const buttonCloseModal = document.querySelectorAll('.modal-close');

    buttonCloseModal.forEach(function(closeButton) {
        closeButton.addEventListener('click', function () {
            var modalId = this.dataset.id;
            document.getElementById('confirmDeleteModal'+modalId).classList.add('hidden');
        });
    });
</script>
@endsection
