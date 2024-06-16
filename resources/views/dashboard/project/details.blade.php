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
<div>
<div class="flex items-center pb-4 border-b border-zinc-200">
    <h1 class="text-2xl font-normal text-sky-400 w-[900px]"> <strong class="text-zinc-400">{{ $project->id }} </strong>{{ $project->name }}</h1>
    <div>
        <p>Responsável:{{ $project->assignedUser->name }}</p>
        <p>Projeto criado em :{{ $project->created_at }} por: {{ $project->assignedUser->name }}</p>
        <p>Cliente : {{ $project->client->name }}</p>
    </div>
</div>
</div>
    <div class="grid grid-cols-2 mt-4 overflow-x-auto">
      <div class="flex flex-col">
        <a href="#" id="addTasks" class="px-4 py-1 mb-2 rounded-md bg-sky-200 text-sky-500 w-fit">+ Adicionar Job</a>
        <h2 class="w-full p-2 text-green-700 bg-green-200 rounded-md">Jobs</h2>
      </div>
      <div>

      </div>
    </div>
</div>
<!-- Modal -->
<div id="addJobId" class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50 modal">
    <div class="w-full p-10 m-auto modal-dialog lg:w-3/5">
        <div class="bg-white rounded shadow-lg modal-content">
            <div class="flex justify-between px-4 py-3 text-white bg-zinc-200 text-zinc-500 modal-header">
                <h5 class="font-bold modal-title">Adicionar Job</h5>
                <button type="button" class="text-2xl text-white modal-close" data-dismiss="modal" data-id="">&times;</button>
            </div>
            <div class="p-4 modal-body">
                <div class="flex flex-col w-full mb-4">
                    <label>Titulo</label>
                    <input type="text" class="w-full px-2 py-1 border rounded">
                </div>
                <div class="flex gap-6 mb-4">
                    <div class="flex flex-col w-full">
                        <label>Cliente</label>
                        <select type="text" class="w-full px-2 py-1 border rounded">
                            <option>Cliente 01</option>
                        </select>
                    </div>
                    <div class="flex flex-col w-full">
                        <label>Projeto</label>
                        <select type="text" class="w-full px-2 py-1 border rounded">
                            <option>Projeto 01</option>
                        </select>
                    </div>
                </div>
                <div class="flex gap-6 mb-4">
                    <div class="flex flex-col w-full">
                        <label>Responsavel</label>
                        <select type="text" class="w-full px-2 py-1 border rounded">
                            <option>Cliente 01</option>
                        </select>
                    </div>
                    <div class="flex flex-col w-full">
                        <label>Prazo</label>
                        <input type="date" class="w-full px-2 py-1 border rounded">
                    </div>
                </div>
                <div class="flex flex-col w-full">
                    <label>Briefing</label>
                    <textarea class="w-full px-2 py-1 border rounded"></textarea>
                </div>

            </div>
            <div class="flex gap-2 px-4 py-4 bg-gray-100 modal-footer">
                <button type="button" class="px-4 py-1 text-white rounded-lg bg-zinc-400" id="cancelBtn">Cancelar</button>
                <form action="#" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-1 text-white rounded-lg bg-sky-500">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function showModal(categoryId) {
        document.getElementById('addJobId').classList.remove('hidden');
    }

    function hideModal(categoryId) {
        const modalId = 'confirmDeleteModal' + categoryId;
        document.getElementById(modalId).classList.add('hidden');
    }
    document.getElementById("addTasks").addEventListener('click', function (e) {
        e.preventDefault()
        console.log('teste')
       showModal('addJobId');
    });
    document.getElementById("cancelBtn").addEventListener('click', function () {
        hideModal('');
    });


    const buttonCloseModal = document.querySelectorAll('.modal-close');

    buttonCloseModal.forEach(function(closeButton) {
        closeButton.addEventListener('click', function () {
            var modalId = this.dataset.id;
            document.getElementById('confirmDeleteModal'+modalId).classList.add('hidden');
        });
    });
</script>
@endsection
