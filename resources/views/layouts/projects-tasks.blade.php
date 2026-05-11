<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="images/progrest_p_logo_green.png">
    
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
    <script>
        const isCollapsed = localStorage.getItem("sidebarCollapsed") === "true";

        if (isCollapsed) {
            document.documentElement.classList.add("sidebar-collapsed");
        }

        document.documentElement.classList.add("no-transition");
    </script>
    <style>
        #sidebar {
            width: 16rem;
            overflow: hidden;
            will-change: width; 
            z-index: 50; 
            position: fixed; 
        }
        .sidebar-collapsed .sidebar-theme {
            margin-top: 2rem; 
        }
        .sidebar-collapsed .sidebar-theme > .flex.flex-row {
            flex-direction: column;
            align-items: center;
        }
        .sidebar-collapsed #sidebar {
            width: 5rem;
        }
        .sidebar-collapsed .sidebar-text {
            display: none;
        }
        .sidebar-collapsed .sidebar-indicator {
            display: none;
        }
        .sidebar-collapsed .sidebar-item {
            justify-content: center !important;
        }
        .sidebar-collapsed #app-logo {
            display: none;
        }
        .sidebar-collapsed #app-logo-p {
            display: block;
        }
        .no-transition * {
            transition: none !important;
        }
        #sidebarFiller{
            width: 16rem;
        }
        .sidebar-collapsed #sidebarFiller {
            width: 5rem;
        }
        /* --- TAMBAHAN UNTUK THEME COLLAPSE --- */
        .sidebar-collapsed .sidebar-theme-title {
            text-align: center;
            font-size: 0.65rem; /* Mengecilkan teks "THEMES" agar pas di tengah */
            margin-bottom: 0.2rem;
        }
        .sidebar-collapsed .sidebar-expanded-theme {
            display: none !important; /* Sembunyikan 3 tombol saat collapse */
        }
        .sidebar-collapsed .sidebar-collapsed-theme {
            display: flex !important; /* Tampilkan 1 tombol siklus saat collapse */
        }
    </style>
</head>
<body>
    <div class="flex min-h-screen bg-surface">
        
        <aside class="hidden md:flex md:shrink-0">
            <x-sidebar :menu="$menu"/>
            <div id="sidebarFiller"></div>
        </aside>
        
        <div class="flex flex-col flex-1 min-w-0">
            <x-hamburger :menu="$menu"/>
            
            <main class="flex-1 relative focus:outline-none">
                @yield('content')

                @include('components.footer')
            </main>
        </div>

        
    </div>

    {{-- OPENED PANEL OVERLAY --}}

    <div id="overlay" class="fixed inset-0 hidden bg-black/50 z-40"></div>

    {{-- SLIDE PANEL --}}

    <div id="panel" class="fixed flex flex-col top-0 right-0 z-50 h-full w-full max-w-lg
        translate-x-full bg-background shadow-2xl
        transition-transform duration-300 p-4 rounded-l-2xl">
            <div class="flex flex-col items-end justify-between pb-4 mb-3">
                <button onclick="closePanel()" class="text-xl font-semibold hover:rotate-90 rotate-0 transition duration-300 text-text-primary">
                    ✕
                </button>
                <div class="flex gap-5 items-center w-full -mt-1">
                    <div class="flex justify-center items-center w-14 h-14 border-pastel-green-text bg-pastel-green-background border-2 p-2 rounded-2xl shadow-3xl shadow-[0_10px_30px_rgba(0,0,0,0.12)]">
                        <x-lucide-folder-plus class="w-8 text-pastel-green-text"/>
                    </div>
                    <div class="flex flex-col text-text-secondary text-sm max-w-70">
                        <p class="font-montserrat font-bold text-2xl text-text-primary">Create New Project</p>
                        <p>Start a Project and Collab with Team Members!</p>
                    </div>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto">
                <form class="flex flex-col gap-4">

                    <div class="space-y-4 p-4 flex flex-col border-[1.5px] rounded-xl border-border">
                        <div class="flex flex-row gap-2 items-center">
                            <div class="shadow-2xl shadow-pastel-green-background">
                                <x-lucide-folder-git-2 class="w-5 text-pastel-green-text"/>
                            </div>
                            <p class="font-montserrat font-semibold text-[14px] text-text-primary">Project Details</p>
                        </div>

                        <div class="flex flex-col gap-1">
                            <p class="font-montserrat font-semibold text-[12px] text-text-primary">Project Title</p>

                            {{-- PROJECT TITLE INPUT --}}

                            <input
                                name="project-title"
                                type="text"
                                placeholder="e.g. AquaVerse"
                                class="w-full rounded-lg border-[1.5px] border-text-primary/50 px-3 py-2 text-sm text-text-primary placeholder:text-placeholder"
                            >
                        </div>

                        <div class="flex flex-col gap-1">
                            <p class="font-montserrat font-semibold text-[12px] text-text-primary">Project Description</p>

                            {{-- PROJECT DESCRIPTION INPUT --}}

                            <textarea
                                placeholder="Describe your project goals, purpose, and plans..."
                                class="w-full rounded-lg border-[1.5px] border-text-primary/50 px-3 py-2 text-sm text-text-primary placeholder:text-placeholder"
                            ></textarea>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">

                        {{-- APPEARANCE INPUT (COLOR THEME) --}}

                        <div class="space-y-4 p-4 flex flex-col border-[1.5px] rounded-xl border-border">
                            <div class="flex flex-row gap-2 items-center">
                                <div class="shadow-2xl shadow-pastel-green-background">
                                    <x-lucide-palette class="w-5 text-pastel-green-text"/>
                                </div>
                                <p class="font-montserrat font-semibold text-[14px] text-text-primary">Project Theme</p>
                            </div>

                            {{-- HIDDEN INPUT --}}

                            <input type="hidden" name="theme" id="selectedTheme" value="green">

                            {{-- COLOR OPTIONS --}}

                            <div class="grid grid-cols-2 min-[360px]:grid-cols-3 min-[480px]:grid-cols-4 place-items-center gap-y-4">
                                <button
                                    type="button"
                                    onclick="selectTheme('cyan', this)"
                                    class="theme-option w-7 h-7 rounded-full bg-cyan ring-4 ring-cyan/20"
                                ></button>
                                <button
                                    type="button"
                                    onclick="selectTheme('brown', this)"
                                    class="theme-option w-7 h-7 rounded-full bg-brown ring-brown/20"
                                ></button>
                                <button
                                    type="button"
                                    onclick="selectTheme('purple', this)"
                                    class="theme-option w-7 h-7 rounded-full bg-purple ring-purple/20"
                                ></button>
                                <button
                                    type="button"
                                    onclick="selectTheme('blue', this)"
                                    class="theme-option w-7 h-7 rounded-full bg-blue ring-blue/20"
                                ></button>
                                <button
                                    type="button"
                                    onclick="selectTheme('pink', this)"
                                    class="theme-option w-7 h-7 rounded-full bg-pink ring-pink/20"
                                ></button>
                                <button
                                    type="button"
                                    onclick="selectTheme('green', this)"
                                    class="theme-option w-7 h-7 rounded-full bg-green ring-green/20"
                                ></button>
                                <button
                                    type="button"
                                    onclick="selectTheme('orange', this)"
                                    class="theme-option w-7 h-7 rounded-full bg-orange ring-orange/20"
                                ></button>
                                <button
                                    type="button"
                                    onclick="selectTheme('yellow', this)"
                                    class="theme-option w-7 h-7 rounded-full bg-yellow ring-yellow/20"
                                ></button>
                                <button
                                    type="button"
                                    onclick="selectTheme('pink', this)"
                                    class="theme-option w-7 h-7 rounded-full bg-steel ring-steel/20"
                                ></button>
                                <button
                                    type="button"
                                    onclick="selectTheme('green', this)"
                                    class="theme-option w-7 h-7 rounded-full bg-teal ring-teal/20"
                                ></button>
                                <button
                                    type="button"
                                    onclick="selectTheme('orange', this)"
                                    class="theme-option w-7 h-7 rounded-full bg-lime ring-lime/20"
                                ></button>
                                <button
                                    type="button"
                                    onclick="selectTheme('yellow', this)"
                                    class="theme-option w-7 h-7 rounded-full bg-rose ring-rose/20"
                                ></button>
                            </div>
                        </div>

                        {{-- ICONS SELECTION INPUT --}}

                        <div class="space-y-4 p-4 flex flex-col border-[1.5px] rounded-xl border-border"
                        >
                            <div class="flex flex-col gap-3">

                                {{-- HEADER --}}
                                <div class="flex flex-row gap-2 items-center">
                                    <div class="shadow-2xl shadow-pastel-green-background">
                                        <x-lucide-loader-pinwheel class="w-5 text-pastel-green-text"/>
                                    </div>

                                    <p class="font-montserrat font-semibold text-[14px] text-text-primary">
                                        Project Icon
                                    </p>
                                </div>

                                {{-- DEFAULT ICONS --}}
                                <div class="grid grid-cols-2 min-[360px]:grid-cols-3 min-[480px]:grid-cols-4 place-items-center gap-y-4">

                                    <button type="button"
                                        class="p-2 rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-folder class="w-4 h-4 text-text-secondary"/>
                                    </button>

                                    <button type="button"
                                        class="p-2 rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-clock class="w-4 h-4 text-text-secondary"/>
                                    </button>

                                    <button type="button"
                                        class="p-2 rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-book-open class="w-4 h-4 text-text-secondary"/>
                                    </button>

                                    <button type="button"
                                        class="p-2 rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-chart-column class="w-4 h-4 text-text-secondary"/>
                                    </button>

                                    <button class="p-2 rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-trees class="w-4 h-4"/>
                                    </button>

                                    <button class="p-2 rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-calendar class="w-4 h-4"/>
                                    </button>

                                    <button class="p-2 rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-backpack class="w-4 h-4"/>
                                    </button>

                                    <button class="p-2 rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-camera class="w-4 h-4"/>
                                    </button>

                                    <button class="p-2 rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-shopping-cart class="w-4 h-4"/>
                                    </button>

                                    <button class="p-2 rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-gamepad-2 class="w-4 h-4"/>
                                    </button>

                                    <button class="p-2 rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-cat class="w-4 h-4"/>
                                    </button>

                                    <button class="p-2 rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-cooking-pot class="w-4 h-4"/>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button
                        class="w-full rounded-lg bg-black py-3 text-white"
                    >
                        Create
                    </button>

                </form>
            </div>

    </div>
</body>
</html>