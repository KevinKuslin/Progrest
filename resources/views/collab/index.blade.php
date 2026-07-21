@extends('layouts.app') 

@section('title', 'Collab')

@section('content')
    {{-- HEADER --}}

    <div class="bg-primary rounded-b-4xl px-8 py-6 flex flex-col lg:flex-row gap-4 justify-between shadow-md">
        <div>
            <h1 class="font-montserrat text-white text-4xl font-bold">Collaboration</h1>
            <h3 class="font-montserrat text-white/80 text-md mt-2">Collab with other users to complete a project together.</h3>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-end items-center">

            {{-- Search Bar --}} 
            <form method="GET" class="relative">

                {{-- Simpan Hasil Sort Dulu --}}
                <input type="hidden"
                    name="sort"
                    value="{{ request('sort', 'deadline') }}"
                >

                {{-- Simpan Hasil Direction Dulu --}}
                <input type="hidden"
                    name="direction"
                    value="{{ request('direction', 'desc') }}"
                >
                
                <div class="absolute pl-4 mt-2.5">
                    <x-lucide-search class="w-5 text-white"/>
                </div>

                <input type="text"
                    name="search"
                    value="{{ request('search') }}" 
                    placeholder="Search collabs..."
                    class="w-80 md:w-90 py-2 rounded-xl text-white text-md bg-white/10 font-montserrat pl-12 focus:outline-none transition-all duration-300"
                    onchange="this.form.submit()"
                >
            </form>
        </div>
    </div>

    {{-- Collab STATISTICS --}}
    <div class="grid grid-cols-2 md:grid-cols-3 gap-6 px-8 py-6">

        {{-- Active Collabs --}}

        <div class="rounded-3xl bg-background shadow-sm flex flex-col p-4 gap-1 items-center">
            <div class="flex gap-3">
                <div class="w-10 h-10 rounded-3xl bg-pastel-green-background flex justify-center items-center">
                    <x-lucide-folder-open class="w-5 text-pastel-green-text"/> 
                </div>
                <p class="text-text-primary text-3xl font-montserrat font-semibold">??</p>
            </div>
            <p class="text-text-primary text-sm font-montserrat">Active Collabs</p>
        </div>
        
        {{-- Collabs Completed --}}

        <div class="rounded-3xl bg-background shadow-sm flex flex-col p-4 gap-1 items-center">
            <div class="flex gap-3">
                <div class="w-10 h-10 rounded-3xl bg-pastel-blue-background flex justify-center items-center">
                    <x-lucide-folder-check class="w-5 text-pastel-blue-text"/> 
                </div>
                <p class="text-text-primary text-3xl font-montserrat font-semibold">??</p>
            </div>
            <p class="text-text-primary text-sm font-montserrat">Collabs Completed</p>
        </div>

        {{-- Points Gained --}}

        <div class="rounded-3xl bg-background shadow-sm flex flex-col p-4 gap-1 items-center col-span-2 md:col-span-1">
            <div class="flex gap-3">
                <div class="w-10 h-10 rounded-3xl bg-pastel-yellow-background flex justify-center items-center">
                    <x-lucide-hand-coins class="w-5 text-pastel-yellow-text"/> 
                </div>
                <p class="text-text-primary text-3xl font-montserrat font-semibold">??</p>
            </div>
            <p class="text-text-primary text-sm font-montserrat">Points Gained</p>
        </div>
    </div>

    {{-- Active Collabs --}}

    <h1 class="font-montserrat text-text-primary text-2xl font-bold px-8">
        Your Active Collabs
    </h1>

    @if ($activeCollabTasks->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4 items-start px-8">
            @foreach ($activeCollabTasks as $task)
                @include('collab.active-collab-card', [
                    'task' => $task,
                ])
            @endforeach
        </div>
        @if ($activeCollabTasksCount > 3)
            <div class="px-8 mt-4 flex justify-end">
                <a href="#"
                    class="font-montserrat font-semibold text-primary hover:underline flex items-center gap-2">
                    View All ({{ $activeCollabTasksCount }})
                    <x-lucide-arrow-right class="w-4 h-4"/>
                </a>
            </div>
        @endif

    @else

        <div class="mx-8 mt-4 rounded-3xl bg-background p-8 text-center shadow-sm">
            <x-lucide-users class="w-10 h-10 mx-auto text-text-secondary mb-3"/>
            <h2 class="font-montserrat font-semibold text-text-primary">
                No active collaborations
            </h2>
            <p class="font-montserrat text-sm text-text-secondary mt-2">
                Join a collaboration below to start working with other teams.
            </p>
        </div>
    @endif

    {{-- All Collabs --}}

    <div class="flex justify-between items-center px-8 mt-10">
        <h1 class="font-montserrat text-text-primary text-2xl font-bold">All Available Collabs</h1>
        
        <div class="relative gap-4">

            {{-- SORT BUTTON --}}

            <form method="GET" class="flex gap-3">

                <input
                    id="directionInput"
                    type="hidden"
                    name="direction"
                    value="{{ request('direction', 'desc') }}"
                >

                <button
                    type="submit"
                    name="direction"
                    value="{{ request('direction') === 'asc' ? 'desc' : 'asc' }}"
                    onclick="document.getElementById('directionInput').disabled = true"
                    class="bg-background rounded-2xl p-2 shadow-sm hover:bg-surface transition-colors cursor-pointer"
                >
                    <x-lucide-arrow-up-down class="w-5 h-5 text-text-primary"/>
                </button>

                {{-- Sort Dropdown --}}
                <select
                    name="sort"
                    onchange="this.form.submit()"
                    class="bg-background rounded-3xl pr-7 pl-4 shadow-sm font-montserrat text-sm text-text-primary hover:bg-surface transition-colors focus:outline-none cursor-pointer appearance-none"
                >
                    
                    <option value="deadline" class="outline-none"
                        {{ request('sort') === 'deadline' ? 'selected' : '' }}>
                        {{ __('main.proj.sort-due') }}
                    </option>

                    <option value="alphabetical"
                        {{ request('sort') === 'alphabetical' ? 'selected' : '' }}>
                        {{ __('main.proj.sort-alpha') }}
                    </option>

                    <option value="progress"
                        {{ request('sort') === 'progress' ? 'selected' : '' }}>
                        {{ __('main.proj.sort-progress') }}
                    </option>
                </select>

                <x-lucide-chevron-down class="w-3.5 h-3.5 absolute right-2 top-1/2 -translate-y-1/2 text-text-primary"/>

            </form>
        </div>
    </div>

    {{-- Display All Collaborable Tasks --}}

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4 items-start px-8 mb-8">
        @foreach ($allCollabTasks as $task)
            @include('collab.all-collab-card', [
                'task' => $task,
            ]) 
        @endforeach
    </div>
@endsection
