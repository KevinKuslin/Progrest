<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\TaskCollaboration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollabController extends Controller{

    public function index(){
        $menu = [
            [
                'navigations' => [
                    ['name'=>'Dashboard','path'=>'/dashboard'],
                    ['name'=>'Projects','path'=>'/projects'],
                    ['name'=>'Collab','path'=>'/collab'],
                    ['name'=>'Profiles','path'=>'/profile'],
                ]
            ]
        ];

        $user = Auth::user();

        $activeCollabTasks = Task::with([
            'project.leader',
            'project.users',
            'collaborations' => function ($query) {
                $query->where('user_id', auth()->id());
            },
        ])
        ->whereHas('collaborations', function ($query) {
            $query->where('user_id', auth()->id());
        })
        ->latest()
        ->take(3)
        ->get();

        $activeCollabTasksCount = Task::whereHas('collaborations', function ($query) {
            $query->where('user_id', auth()->id());
        })
        ->count();

        $allCollabTasks = Task::with([
            'project.leader',
            'project.users',
            'users',
        ])
        ->where('go_collab_enabled', true)
        ->whereIn('status', ['pending', 'in_progress'])
        ->whereDoesntHave('users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })
        ->whereDoesntHave('project.users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })
        ->whereHas('project', function ($query) use ($user) {
            $query->where('leader_id', '!=', $user->id);
        })
        ->latest()
        ->paginate(9);

        return view('collab.index', compact('menu', 'user', 'allCollabTasks', 'activeCollabTasks', 'activeCollabTasksCount'));
    }

    
}