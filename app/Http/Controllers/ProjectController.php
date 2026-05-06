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

        $projects = Project::where('leader_id', auth()->id())
            ->orWhereHas('members', function ($q) {
                $q->where('user_id', auth()->id());
            })
            ->latest()
            ->get();

        return view('projects.index', compact('menu', 'projects')); 
    }

    public function show(Project $project){
        $user_id = auth()->id(); 

        $isLeader = $project->leader_id === $user_id; 
        $isMember = $project->members()->where('user_id', $user_id)->exists(); 

        abort_if(!($isLeader || $isMember), 403); 

        return view('projects.show', compact('project')); 
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $user_id = auth()->id(); 

        Project::create([
            'leader_id' => $user_id,
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
        ]);

        $project->members()->attach($userId); 

        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }
}
