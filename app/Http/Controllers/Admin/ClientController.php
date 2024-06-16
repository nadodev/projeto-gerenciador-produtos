<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientStoreRequest;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::paginate(10);
        return view('dashboard.client.index', compact('clients'));
    }

    public function create()
    {


        return view('dashboard.client.create');
    }

    public function store(ClientStoreRequest $request)
    {
        $client_data = $request->validated();

        Client::create($client_data);

        return redirect()->route('admin.project.index')->with('success', 'Cliente Cadastrado com sucesso');
    }

    public function edit()
    {
    }
}
