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
    <h1 class="mb-4 text-2xl font-bold">Listagem de Cleintes</h1>
    <div class="mb-4">
        <a href="{{  route('admin.client.create') }}" class="p-2 text-white transition-colors rounded-lg bg-sky-500 hover:bg-sky-600">Novo Cliente</a>
    </div>
    <div class="overflow-x-auto">
        <table class="text-center bg-white border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b">#</th>
                    <th class="px-4 py-2 border-b">Nome</th>
                    <th class="px-4 py-2 border-b">Email</th>
                    <th class="px-4 py-2 border-b">Telefone</th>
                    <th class="px-4 py-2 border-b">Tipo</th>
                    <th class="px-4 py-2 border-b">Documento</th>
                    <th class="px-4 py-2 border-b">Descrição</th>
                    <th class="px-4 py-2 border-b">Endereço</th>
                    <th class="px-4 py-2 border-b">Ações</th>
                </tr>
            </thead>
            <tbody>
                @if($clients->isEmpty())
                <p>Não há projeto cadastrado</p>
                @else
                @foreach ($clients as $client)

                    <tr>
                        <td class="px-4 py-2 border-b">#{{  $client->id }}</td>
                        <td class="px-4 py-2 border-b">{{  $client->name }}</td>
                        <td class="px-4 py-2 border-b">{{ $client->email }}</td>
                        <td class="px-4 py-2 border-b">{{ $client->phone }}</td>
                        <td class="px-4 py-2 border-b">{{ $client->type }}</td>
                        <td class="px-4 py-2 border-b">{{ $client->document }}</td>
                        <td class="px-4 py-2 border-b">{{ $client->description }}</td>
                        <td class="px-4 py-2 border-b">{{ $client->address }}</td>
                        <td class="flex items-center justify-center px-4 py-2 space-x-2 border-b">
                            <a href="#" class="px-2 py-1 font-bold text-white bg-yellow-500 rounded hover:bg-yellow-700">Ver</a>
                            <a href="#" class="px-2 py-1 font-bold text-white bg-yellow-500 rounded hover:bg-yellow-700">Editar</a>
                            <button id="showModalBtn-43" type="button" class="flex gap-2 px-2 py-1 font-bold text-white bg-red-500 rounded hover:bg-red-700" data-toggle="modal" data-target="#confirmDeleteModal43">
                                Excluir
                            </button>
                        </td>
                    </tr>
                @endforeach
                @endif
                <!-- Modal -->
                <div id="confirmDeleteModal43" class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50 modal">
                    <div class="w-full p-10 m-auto modal-dialog lg:w-1/3">
                        <div class="bg-white rounded shadow-lg modal-content">
                            <div class="flex justify-between px-4 py-3 text-white bg-red-500 modal-header">
                                <h5 class="font-bold modal-title">Confirmar Exclusão</h5>
                                <button type="button" class="text-2xl text-white modal-close" data-dismiss="modal" data-id="43">&times;</button>
                            </div>
                            <div class="p-4 modal-body">
                                <p>Tem certeza de que deseja excluir esta categoria?</p>
                            </div>
                            <div class="flex gap-2 px-4 py-4 bg-gray-100 modal-footer">
                                <button type="button" class="px-4 py-1 text-white rounded-lg bg-zinc-400" id="cancelBtn43">Cancelar</button>
                                <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-1 text-white bg-red-500 rounded-lg">Excluir</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </tbody>
        </table>
    </div>
</div>
@endsection
