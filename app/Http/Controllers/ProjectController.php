<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $totalProjects = $projects->count();
        $inProgressProjects = $projects->where('status', 'Em Andamento')->count();
        $completedProjects = $projects->where('status', 'Concluído')->count();
        $overdueProjects = $projects->where('status', 'Atrasado')->count();

        return view('dashboard', compact('projects', 'totalProjects', 'inProgressProjects', 'completedProjects', 'overdueProjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
        ]);

        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => 'Em Andamento', // Default status
            'progress' => 0, // Default progress
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('projects.index')->with('success', 'Projeto criado com sucesso!');
    }

    public function create()
    {
        return view('projects.create');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string',
            'progress' => 'required|integer|min:0|max:100',
            'deadline' => 'nullable|date',
        ]);

        $project->update($request->all());

        return redirect()->route('projects.index')->with('success', 'Projeto atualizado com sucesso!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Projeto excluído com sucesso!');
    }
}
