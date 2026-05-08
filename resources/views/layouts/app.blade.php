<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="images/progrest_p_logo_green.png">
    
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400..800;1,400..800&family=Parkinsans:wght@400..800&display=swap" rel="stylesheet"> --}}
    
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
    <div class="flex h-screen bg-surface overflow-hidden">
        
        <aside class="hidden md:flex md:shrink-0">
            <x-sidebar :menu="$menu"/>
            <div id="sidebarFiller"></div>
        </aside>
        
        <div class="flex flex-col flex-1 min-w-0 overflow-hidden">
            <x-hamburger :menu="$menu"/>
            
            <main class="flex-1 relative overflow-y-auto focus:outline-none">
                @yield('content')

                <footer class="bg-primary text-[#F5F7F6] px-10 py-16 flex mt-10 flex-col">
                    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
        
                        <!-- brand -->
                        <div class="flex flex-col gap-2 items-start">
                            <img id="logo-footer" src="images/progrest_logo_white.png" alt="" class="w-40 h-auto">
                            <p class="font-montserrat text-sm opacity-80 text-text-contrast">
                                Make progress and let others do the rest.
                            </p>
        
                            <!-- CTA -->
                            <a href="/register" 
                                class="font-montserrat inline-block px-4 py-1.5 mt-2 bg-background text-primary 
                                        rounded-xl font-semibold hover:bg-light-border-hover
                                        transition-transform duration-300">
                                    Get Started
                            </a>
                        </div>
        
                        <!-- Product -->
                        <div>
                            <h2 class="font-parkinsans font-semibold mb-3 text-text-contrast">Product</h2>
                            <ul class="font-montserrat space-y-3 text-sm opacity-80 text-text-contrast">
                                <li><a href="/dashboard" class="hover:opacity-100">Dashboard</a></li>
                                <li><a href="/projects" class="hover:opacity-100">Projects</a></li>
                                <li><a href="/collab" class="hover:opacity-100">Collaboration</a></li>
                            </ul>
                        </div>
        
                        <!-- Company -->
                        <div>
                            <h2 class="font-parkinsans font-semibold mb-3 text-text-contrast">Social Media</h2>
                            <ul class="font-montserrat space-y-3 text-sm opacity-80 text-text-contrast">
                                <li><a href="#" class="hover:opacity-100">Twitter</a></li>
                                <li><a href="#" class="hover:opacity-100">Facebook</a></li>
                                <li><a href="#" class="hover:opacity-100">Instagram</a></li>
                            </ul>
                        </div>
        
                        <!-- Resources -->
                        <div>
                            <h2 class="font-parkinsans font-semibold mb-3 text-text-contrast">Resources</h2>
                            <ul class="font-montserrat space-y-3 text-sm opacity-80 text-text-contrast">
                                <li><a href="#" class="hover:opacity-100">Help Center</a></li>
                                <li><a href="#" class="hover:opacity-100">Privacy Policy</a></li>
                                <li><a href="#" class="hover:opacity-100">Terms of Service</a></li>
                            </ul>
                        </div>
        
                    </div>
        
                    <!-- Bawah Footer -->
                    <div class="font-montserrat text-text-contrast border-t border-white/20 mt-12 pt-6 flex flex-col md:flex-row justify-between items-center text-sm opacity-70">
                        <p>© 2026 Progrest. All rights reserved.</p>
        
                        <p>Project Planner Platform</p>
                    </div>
                </footer>
            </main>
        </div>

        
    </div>
</body>
{{-- @stack('styles') --}}
</html>