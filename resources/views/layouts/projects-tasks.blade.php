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
        .date-input::-webkit-calendar-picker-indicator {
            opacity: 0;
            cursor: pointer;
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

            {{-- Aksen Hijau I  --}}
            <div class="absolute -top-24 left-1/2
                h-64 w-64 -translate-x-1/2
                rounded-full bg-emerald-300/20
                blur-3xl">
            </div>

            <!-- Aksen Hijau II -->
            <div class="absolute top-10 right-10
                        h-40 w-40 rounded-full
                        bg-green-200/20 blur-3xl">
            </div>

            <!-- Akses Dot Hijau -->
            <div class="absolute top-20 right-32 h-2 w-2
                        rounded-full bg-emerald-300/50">
            </div>

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

                            <input type="hidden" name="theme" id="selectedTheme" value="cyan">

                            {{-- COLOR OPTIONS --}}

                            <div class="grid grid-cols-2 min-[360px]:grid-cols-3 min-[480px]:grid-cols-4 place-items-center gap-y-4">
                                <button
                                    type="button"
                                    onclick="selectTheme('cyan', this)"
                                    class="flex justify-center items-center theme-option w-7 h-7 rounded-full bg-cyan ring-4 ring-offset-2 ring-cyan/20"
                                >
                                    <x-lucide-check class="theme-check-icon w-4 text-text-contrast"/>
                                </button>
                                <button
                                    type="button"
                                    onclick="selectTheme('brown', this)"
                                    class="flex justify-center items-center theme-option w-7 h-7 rounded-full bg-brown ring-brown/20"
                                >
                                    <x-lucide-check class="theme-check-icon w-4 text-text-contrast hidden"/>
                                </button>
                                <button
                                    type="button"
                                    onclick="selectTheme('purple', this)"
                                    class="flex justify-center items-center theme-option w-7 h-7 rounded-full bg-purple ring-purple/20"
                                >
                                    <x-lucide-check class="theme-check-icon w-4 text-text-contrast hidden"/>
                                </button>
                                <button
                                    type="button"
                                    onclick="selectTheme('blue', this)"
                                    class="flex justify-center items-center theme-option w-7 h-7 rounded-full bg-blue ring-blue/20"
                                >
                                    <x-lucide-check class="theme-check-icon w-4 text-text-contrast hidden"/>
                                </button>
                                <button
                                    type="button"
                                    onclick="selectTheme('pink', this)"
                                    class="flex justify-center items-center theme-option w-7 h-7 rounded-full bg-pink ring-pink/20"
                                >
                                    <x-lucide-check class="theme-check-icon w-4 text-text-contrast hidden"/>
                                </button>
                                <button
                                    type="button"
                                    onclick="selectTheme('green', this)"
                                    class="flex justify-center items-center theme-option w-7 h-7 rounded-full bg-green ring-green/20"
                                >
                                    <x-lucide-check class="theme-check-icon w-4 text-text-contrast hidden"/>
                                </button>
                                <button
                                    type="button"
                                    onclick="selectTheme('orange', this)"
                                    class="flex justify-center items-center theme-option w-7 h-7 rounded-full bg-orange ring-orange/20"
                                >
                                    <x-lucide-check class="theme-check-icon w-4 text-text-contrast hidden"/>
                                </button>
                                <button
                                    type="button"
                                    onclick="selectTheme('yellow', this)"
                                    class="flex justify-center items-center theme-option w-7 h-7 rounded-full bg-yellow ring-yellow/20"
                                >
                                    <x-lucide-check class="theme-check-icon w-4 text-text-contrast hidden"/>
                                </button>
                                <button
                                    type="button"
                                    onclick="selectTheme('pink', this)"
                                    class="flex justify-center items-center theme-option w-7 h-7 rounded-full bg-steel ring-steel/20"
                                >
                                    <x-lucide-check class="theme-check-icon w-4 text-text-contrast hidden"/>
                                </button>
                                <button
                                    type="button"
                                    onclick="selectTheme('green', this)"
                                    class="flex justify-center items-center theme-option w-7 h-7 rounded-full bg-teal ring-teal/20"
                                >
                                    <x-lucide-check class="theme-check-icon w-4 text-text-contrast hidden"/>
                                </button>
                                <button
                                    type="button"
                                    onclick="selectTheme('orange', this)"
                                    class="flex justify-center items-center theme-option w-7 h-7 rounded-full bg-lime ring-lime/20"
                                >
                                    <x-lucide-check class="theme-check-icon w-4 text-text-contrast hidden"/>
                                </button>
                                <button
                                    type="button"
                                    onclick="selectTheme('yellow', this)"
                                    class="flex justify-center items-center theme-option w-7 h-7 rounded-full bg-rose ring-rose/20"
                                >
                                    <x-lucide-check class="theme-check-icon w-4 text-text-contrast hidden"/>
                                </button>
                            </div>
                        </div>

                        {{-- HIDDEN INPUT KHUSUS ICON --}}

                        <input type="hidden" name="icon" id="selectedIcon" value="folder">

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
                                        onclick="selectIcon('folder', this)"
                                        class="icon-option bg-quartiary/80 p-2 rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-folder class="icon-icon w-4 h-4 text-text-contrast"/>
                                    </button>

                                    <button type="button"
                                        onclick="selectIcon('clock', this)"
                                        class="icon-option bg-background p-2 rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-clock class="icon-icon w-4 h-4 text-text-secondary"/>
                                    </button>

                                    <button type="button"
                                    onclick="selectIcon('book-open', this)"
                                        class="icon-option bg-background p-2 rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-book-open class="icon-icon w-4 h-4 text-text-secondary"/>
                                    </button>

                                    <button type="button"
                                        onclick="selectIcon('chart-column', this)"
                                        class="icon-option bg-background p-2 rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-chart-column class="icon-icon w-4 h-4 text-text-secondary"/>
                                    </button>

                                    <button type="button"
                                        onclick="selectIcon('trees', this)"
                                        class="icon-option bg-background p-2 rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-trees class="icon-icon w-4 h-4 text-text-secondary"/>
                                    </button>

                                    <button type="button"
                                        onclick="selectIcon('calendar', this)"
                                        class="icon-option bg-background p-2 rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-calendar class="icon-icon w-4 h-4 text-text-secondary"/>
                                    </button>

                                    <button type="button"
                                        onclick="selectIcon('backpack', this)"
                                        class="icon-option p-2 bg-background rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-backpack class="icon-icon w-4 h-4 text-text-secondary"/>
                                    </button>

                                    <button type="button"
                                        onclick="selectIcon('camera', this)"
                                        class="icon-option p-2 bg-background rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-camera class="icon-icon w-4 h-4 text-text-secondary"/>
                                    </button>

                                    <button type="button"
                                        onclick="selectIcon('shopping-cart', this)"
                                        class="icon-option p-2 bg-background rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-shopping-cart class="icon-icon w-4 h-4 text-text-secondary"/>
                                    </button>

                                    <button type="button"
                                        onclick="selectIcon('gamepad-2', this)"
                                        class="icon-option p-2 bg-background rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-gamepad-2 class="icon-icon w-4 h-4 text-text-secondary"/>
                                    </button>

                                    <button type="button"
                                        onclick="selectIcon('cat', this)"
                                        class="icon-option p-2 bg-background rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-cat class="icon-icon w-4 h-4 text-text-secondary"/>
                                    </button>

                                    <button type="button"
                                        onclick="selectIcon('cooking-pot', this)"
                                        class="icon-option bg-background p-2 rounded-lg border border-border hover:bg-secondary transition">
                                        <x-lucide-cooking-pot class="icon-icon w-4 h-4 text-text-secondary"/>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- PROJECT TIMELINE INPUT --}}

                    <div class="space-y-4 p-4 flex flex-col border-[1.5px] rounded-xl border-border">
                        <div class="flex flex-row gap-2 items-center">
                            <div class="shadow-2xl shadow-pastel-green-background">
                                <x-lucide-calendar-clock class="w-5 text-pastel-green-text"/>
                            </div>
                            <p class="font-montserrat font-semibold text-[14px] text-text-primary">Timeline</p>
                        </div>

                        <div class="flex flex-col gap-1">
                            <p class="font-montserrat font-semibold text-[12px] text-text-primary">Due date (Optional)</p>

                            <div class="relative">

                                {{-- CUSTOM ICON --}}
                                <x-lucide-calendar
                                    class="absolute right-4 top-1/2 -translate-y-1/2
                                        w-4.5 h-4.5 text-text-primary pointer-events-none"
                                />

                                <input
                                    type="date"
                                    name="due-date"
                                    class="date-input w-full rounded-lg
                                        border-[1.5px] border-text-primary/50
                                        bg-background
                                        px-3 py-2.5
                                        text-sm placeholder:text-sm
                                        text-text-primary"
                                >
                            </div>
                        </div>
                    </div>

                    {{-- TEAM MEMBERS --}}

                    <div class="space-y-4 p-4 flex flex-col border-[1.5px] rounded-xl border-border">
                        <div class="flex flex-row gap-2 items-center">
                            <div class="shadow-2xl shadow-pastel-green-background">
                                <x-lucide-calendar-clock class="w-5 text-pastel-green-text"/>
                            </div>
                            <p class="font-montserrat font-semibold text-[14px] text-text-primary">Team Members</p>
                        </div>
                    </div>

                    <button
                        class="flex items-center justify-center w-full rounded-2xl bg-primary  hover:bg-primary-hover gap-3 py-3 text-text-contrast font-montserrat text-sm"
                    >
                        <x-lucide-rocket class="w-5 text-text-contrast"/>
                        Create Project
                    </button>

                </form>
            </div>

    </div>
</body>
</html>