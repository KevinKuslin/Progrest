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
                <h1 class="font-montserrat text-white text-[40px] font-bold">Projects</h1>
                <div class="bg-surface p-1 flex items-center justify-center rounded-lg w-9 h-9">
                    <x-lucide-folder-git-2 class="w-7 text-text-primary" />
                </div>

            </div>
            <h3 class="font-montserrat text-white/80">What would you work on today?</h3>
        </div>

        <div class="mt-1 flex flex-col justify-center">

            {{-- Search Bar --}} 
            <form method="GET" class="relative">

                {{-- Simpan Hasil Sort Dulu --}}
                <input type="hidden"
                    name="sort"
                    value="{{ request('sort', 'recent') }}"
                >

                {{-- Simpan Hasil Direction Dulu --}}
                <input type="hidden"
                    name="direction"
                    value="{{ request('direction', 'desc') }}"
                >
                
                <div class="absolute pl-4 mt-2">
                    <x-lucide-search class="w-5 text-black"/>
                </div>

                <input type="text"
                    name="search"
                    value="{{ request('search') }}" 
                    placeholder="Search project..."
                    class="w-90 py-1.5 rounded-full bg-white font-montserrat pl-12 focus:outline-none"
                    onchange="this.form.submit()"
                >
                    
            </form>

            <div class="flex mt-3 mr-2 justify-end">
                <button class="bg-quartiary rounded-3xl px-4 py-1.75 shadow-sm gap-2 hover:bg-quartiary-hover flex items-center justify-center">
                    <span class="font-montserrat text-white text-sm">Create Project</span>
                    <div class="bg-primary rounded-full text-white p-0.5">
                        <x-lucide-plus class="w-4 h-4 stroke-[2.5px]" />
                    </div>
                </button>
            </div>
        </div>
        
    </div>

    {{-- PROJECT STATISTICS --}}

    <div class="grid grid-cols-2 md:grid-cols-4 gap-5 px-8 py-4">

        {{-- Active Projects --}}

        <div class="rounded-3xl bg-background shadow-sm h-20 flex flex-row p-3 items-center justify-start">
            <div class="flex flex-row justify-center items-center gap-3">
                <div class="w-10 h-10 rounded-3xl bg-pastel-green-background flex justify-center items-center">
                    <x-lucide-book-open-check class="w-5.25 text-pastel-green-text"/> 
                </div>
                <div class="flex flex-col text-sm gap-1">
                    <p class="text-text-primary font-semibold">Active Projects ({{ count($projects) }})</p>
                    <div class="flex gap-1">
                        <x-lucide-arrow-up class="text-pastel-green-text w-3" />
                        <p class="text-text-secondary text-[12px]">20% from last week</p>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Projects Completed --}}

        <div class="rounded-3xl bg-background shadow-sm h-20 flex flex-row p-3 items-center justify-start">
            <div class="flex flex-row justify-center items-center gap-3">
                <div class="w-10 h-10 rounded-3xl bg-pastel-blue-background flex justify-center items-center">
                    <x-lucide-folder-git-2 class="w-5.25 text-pastel-blue-text"/> 
                </div>
                <div class="flex flex-col text-sm gap-1">
                    <p class="text-text-primary font-semibold">Projects Done (5)</p>
                    <div class="flex gap-1">
                        <x-lucide-arrow-up class="text-pastel-blue-text w-3" />
                        <p class="text-text-secondary text-[12px]">100% from last week</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Projects Led --}}

        <div class="rounded-3xl bg-background shadow-sm h-20 flex flex-row p-3 items-center justify-start">
            <div class="flex flex-row justify-center items-center gap-3">
                <div class="w-10 h-10 rounded-3xl bg-pastel-yellow-background flex justify-center items-center">
                    <x-lucide-briefcase-business class="w-5.25 text-pastel-yellow-text"/> 
                </div>
                <div class="flex flex-col text-sm gap-1">
                    <p class="text-text-primary font-semibold">Projects Led (5)</p>
                    <div class="flex gap-1">
                        <x-lucide-arrow-up class="text-pastel-yellow-text w-3" />
                        <p class="text-text-secondary text-[12px]">10% from last week</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Team Members --}}

        <div class="rounded-3xl bg-background shadow-sm h-20 flex flex-row p-3 items-center justify-start">
            <div class="flex flex-row justify-center items-center gap-3">
                <div class="w-10 h-10 rounded-3xl bg-pastel-purple-background flex justify-center items-center">
                    <x-lucide-book-open-check class="w-5.25 text-pastel-purple-text"/> 
                </div>
                <div class="flex flex-col text-sm gap-1">
                    <p class="text-text-primary font-semibold">Team Members (5)</p>
                    <div class="flex gap-1">
                        <x-lucide-arrow-up class="text-pastel-purple-text w-3" />
                        <p class="text-text-secondary text-[12px]">20% from last week</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- PROJECTS LIST --}}

    <div class="px-8">
        <div class="flex justify-between items-center">
            <h1 class="font-montserrat text-text-primary text-2xl font-bold">All Projects</h1>
            
            <div class="flex gap-3">

                {{-- SORT BUTTON --}}

                <form method="GET" class="flex gap-3">

                    {{-- Direction Toggle --}}
                    <button
                        type="submit"
                        name="direction"
                        value="{{ request('direction') === 'asc' ? 'desc' : 'asc' }}"
                        class="bg-background rounded-2xl p-2 shadow-sm hover:bg-surface transition-colors"
                    >
                        <x-lucide-arrow-up-down class="w-5 h-5 text-text-primary" />
                    </button>

                    {{-- Keep current sort --}}
                    <input type="hidden"
                        name="sort"
                        value="{{ request('sort', 'recent') }}">

                    {{-- Sort Dropdown --}}
                    <select
                        name="sort"
                        onchange="this.form.submit()"
                        class="bg-background rounded-3xl px-3 shadow-sm font-montserrat text-sm text-text-primary hover:bg-surface transition-colors focus:outline-none"
                    >
                        <option value="recent"
                            {{ request('sort') === 'recent' ? 'selected' : '' }}>
                            Recently Updated
                        </option>

                        <option value="alphabetical"
                            {{ request('sort') === 'alphabetical' ? 'selected' : '' }}>
                            Alphabetical
                        </option>

                        <option value="progress"
                            {{ request('sort') === 'progress' ? 'selected' : '' }}>
                            Progress
                        </option>
                    </select>

                </form>
            </div>
        </div>

        <div class="mt-3 grid  grid-cols-1 md:grid-cols-2 gap-4 lg:grid-cols-3">
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