<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
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

        return view('dashboard.index', [
            'menu' => $menu, 
            'projects' => $user->projects()->latest()->get()
        ]); 
    }
}
