<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectStoreRequest;
use App\Models\Category;
use App\Models\Client;
use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{
    public function index()
    {

        $projects = Project::where('status', 'active')->simplePaginate(10);

        return view('dashboard.project.index', compact('projects'));
    }

    public function show($id)
    {
        $project = Project::where('id', $id)->first();

        return view('dashboard.project.details', compact('project'));
    }

    public function create()
    {
        $categories = Category::get();
        $users = User::get();
        $clients = Client::get();

        return view('dashboard.project.create', compact('categories', 'users', 'clients'));

    }


    public function store(ProjectStoreRequest $request)
    {
        $data_project = $request->validated();

        Project::create($data_project);

        return redirect()->route('admin.project.index')->with('success', 'Projeto Cadastrado com sucesso');
    }
}
