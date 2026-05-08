@extends('layouts.app') 

@section('title', 'Projects')

@section('content')
    @php
        $avatars = asset('images/profile.jpg')
    @endphp

    {{-- HEADER --}}

    <div class="bg-primary rounded-b-4xl px-8 py-5 flex justify-between">
        <div>
            <div class="flex items-center gap-3">
                <div class="bg-surface p-1 flex items-center justify-center rounded-lg w-9 h-9">
                    <x-lucide-folder-git-2 class="w-7 text-text-primary" />
                </div>

                <h1 class="font-montserrat text-white text-[40px] font-bold">Projects</h1>
            </div>
            <h3 class="font-montserrat text-white/80">What would you work on today?</h3>
        </div>

        <div class="mt-1 flex flex-col justify-center">
            <div>
                <div class="absolute pl-4 mt-2">
                    <x-lucide-search class="w-5 h-5"/>
                </div>
                <input type="text"
                    placeholder="Search project..."
                    class="w-90 py-1.5 rounded-full bg-white font-montserrat pl-12 focus:outline-none">
            </div>
            <div class="flex mt-3 mr-2 justify-end">
                <button class="bg-quartiary rounded-3xl px-4 py-1.75 shadow-sm gap-2 hover:bg-quartiary-hover flex items-center justify-center">
                    <span class="font-montserrat text-text-contrast text-sm">Create Project</span>
                    <div class="bg-primary rounded-full text-white p-0.5">
                        <x-lucide-plus class="w-4 h-4 stroke-[2.5px]" />
                    </div>
                </button>
            </div>
        </div>
        
    </div>

    {{-- PROJECT STATISTICS --}}

    <div class="grid grid-cols-2 md:grid-cols-4 gap-5 px-8 py-4">
        <div class="rounded-lg bg-primary shadow-md h-15">
            Test
        </div>
        <div class="rounded-lg bg-primary shadow-md h-15">
            Test
        </div>
        <div class="rounded-lg bg-primary shadow-md h-15">
            Test
        </div>
        <div class="rounded-lg bg-primary shadow-md h-15">
            Test
        </div>
    </div>

    {{-- PROJECTS LIST --}}

    <div class="px-8">
        <div class="flex justify-between items-center">
            <h1 class="font-montserrat text-text-primary text-2xl font-bold">All Projects</h1>
            
            <div class="flex gap-3 px-2">
                <button class="bg-background rounded-2xl p-2 shadow-sm hover:bg-surface transition-colors">
                    <x-lucide-arrow-up-down class="w-5 h-5 text-text-primary" />
                </button>

                <button class="bg-background rounded-3xl px-4 shadow-sm gap-2 hover:bg-surface transition-colors flex items-center justify-center">
                    <span class="font-montserrat font-bold text-text-primary text-sm">Recently Updated</span>
                    <div class="bg-primary rounded-full text-white p-0.5">
                        <x-lucide-chevron-down class="w-4 h-4 stroke-[2.5px]" />
                    </div>
                </button>
            </div>
        </div>

        <div class="mt-4 grid grid-cols-1 gap-4 lg:grid-cols-3">
            @foreach ($projects as $project)
                @include('projects.card', [
                    'title' => $project->title,
                    'description' => $project->description,
                    'progress' => $project->progress,
                    'collaborators' => $project->members,
                    'accentColor' => $project->accent, 
                    'icon' => $project->icon
                ])
            @endforeach
        </div>
    </div>
@endsection 