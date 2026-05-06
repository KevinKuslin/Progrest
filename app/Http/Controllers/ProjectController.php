<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project; 
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $menu = [
            [
                'navigations' => [
                    ['name' => 'Dashboard', 'path' => '/dashboard'], 
                    ['name' => 'Projects', 'path' => '/projects'], 
                    ['name' => 'Collab', 'path' => '/collab'], 
                    ['name' => 'Profiles', 'path' => '/profile']
                ]
            ]
        ]; 

        $user = auth()->user(); 
        $projects = $user->projects()->latest()->get(); 

        return view('projects.index', compact('menu', 'projects')); 
    }

    public function show(Project $project){
        if($project->user_id != auth()->id()){
            abort(403); 
        }

        return view('projects.show', compact('project')); 
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Project::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project created sccessfully!');
    }
}
