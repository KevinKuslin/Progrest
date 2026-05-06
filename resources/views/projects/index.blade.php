@extends('layouts.app') 

@section('title', 'Projects')

@section('content')
    @php
        $avatars = asset('images/profile.jpg')
    @endphp

    {{-- @php
        $avatars = [
            asset('images/profile.jpg'),
            asset('images/profile.jpg'),
            asset('images/profile.jpg'),
        ];

        $projects = [
            [
                'title' => 'AquaVerse',
                'description' => 'Mobile application that focuses on sea creatures education.',
                'progress' => 30,
                'accent' => '#7C2D8E',
            ],
            [
                'title' => 'MindSpace',
                'description' => 'MindSpace Mobile App for mental health and mood tracking.',
                'progress' => 50,
                'accent' => '#0056D2',
            ],
            [
                'title' => 'CookEase',
                'description' => 'CookEase Mobile App for easy recipes and meal planning.',
                'progress' => 10,
                'accent' => '#1F5D3A',
            ],
            [
                'title' => 'PetPal',
                'description' => 'PetPal Mobile App for smart pet care management system.',
                'progress' => 70,
                'accent' => '#0EA5A4',
            ],
            [
                'title' => 'TravelMate',
                'description' => 'TravelMate Mobile App for smart trip planning and itineraries.',
                'progress' => 100,
                'accent' => '#8B5A2B',
            ],
            [
                'title' => 'EcoTrack',
                'description' => 'EcoTrack App for tracking and reducing daily carbon footprint.',
                'progress' => 40,
                'accent' => '#D946A6',
            ],
        ];
    @endphp --}}

    <div class="bg-primary rounded-b-4xl p-8 flex justify-between">
        <div>
            <div class="flex items-center gap-3">
                <div class="bg-surface p-1 flex items-center justify-center rounded-lg w-9 h-9">
                    <x-lucide-folder-git-2 class="w-7 text-text-primary" />
                </div>

                <h1 class="font-monstserrat text-white text-[42px] font-bold">Projects</h1>
            </div>
            <h3 class="font-montserrat text-white/80">What would you work on today?</h3>
        </div>

        <div class="mt-3 flex flex-col justify-center">
            <div>
                <div class="absolute pl-4 mt-2">
                    <x-lucide-search class="w-6 h-6"/>
                </div>
                <input type="text"
                    placeholder="Search project..."
                    class="w-90 py-2 rounded-full bg-white font-montserrat pl-12 focus:outline-none">
            </div>
            <div class="flex mt-3 mr-2 justify-end">
                <x-lucide-folder-open class="w-6 h-6 text-white" />
                <h2 class="ml-2 font-montserrat text-white">{{ count($projects) }} projects</h2>
            </div>
        </div>
        
    </div>
    <div class="p-8 pt-6">
        <div class="flex justify-between items-center">
            <h1 class="font-montserrat text-text-primary text-3xl font-bold">All Projects</h1>
            
            <div class="flex gap-3 px-2">
                <button class="bg-background rounded-2xl p-2 shadow-sm hover:bg-surface transition-colors">
                    <x-lucide-arrow-up-down class="w-5 h-5 text-text-primary" />
                </button>

                <button class="bg-background rounded-3xl px-4 shadow-sm gap-2 hover:bg-surface transition-colors flex items-center justify-center">
                    <span class="font-montserrat font-bold text-text-primary text-sm">Create Project</span>
                    <div class="bg-primary rounded-full text-white p-0.5">
                        <x-lucide-plus class="w-4 h-4 stroke-[2.5px]" />
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
                    'extraCollaborators' => 2,
                    'accentColor' => $project->accent
                ])
            @endforeach
        </div>
    </div>
@endsection 