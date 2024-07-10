<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProjects = Project::count();
        $inProgressProjects = Project::where('status', 'Em Andamento')->count();
        $completedProjects = Project::where('status', 'Completo')->count();
        $overdueProjects = Project::where('deadline', '<', now())->where('status', '!=', 'completed')->count();
        
        $projects = Project::latest()->take(5)->get();

        return view('dashboard', compact('totalProjects', 'inProgressProjects', 'completedProjects', 'overdueProjects', 'projects'));
    }
}

