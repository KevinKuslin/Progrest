<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() {
        $projects = [];
        $menu = [];
        return view('projects.tasks.index', compact('projects', 'menu'));
    }
}
