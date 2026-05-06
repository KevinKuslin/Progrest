@props(['menu'])

<aside id="sidebar"
    class="bg-background text-text-primary p-4 h-screen rounded-r-2xl shadow-r-xl flex flex-col gap-3 fixed transition-[width] duration-300 hidden md:flex z-40">

    <button id="sidebar-toggle"
        class="absolute top-4 right-5 p-2 text-text-primary rounded-lg hover:bg-surface w-10 h-10 flex items-center justify-center rotate-0 hover:rotate-90 transition duration-300 focus:outline-none z-50">
        <x-lucide-menu class="w-6 h-6 text-text-primary pointer-events-none" />
    </button>

    <img id="app-logo"
        src="images/progrest_logo_green.png"
        class="w-30 h-auto mt-2 transition-all duration-300">

    <img id="app-logo-p"
        src="images/progrest_p_logo_green.png"
        class="hidden w-9 h-auto mt-13 mx-auto transition-all duration-300">

    <div class="w-full h-px bg-border rounded-xl"></div>

    <div class="flex gap-3 border-[1.5px] p-2 border-border rounded-xl shadow-sm items-center bg-background">
        <img src="images/profile.jpg" class="w-12 h-12 rounded-full sidebar-icon object-cover border border-border">
        <div class="flex flex-col justify-center sidebar-text">
            <p class="font-montserrat font-bold text-text-primary">
                @auth
                    {{ auth()->user()->username }}
                @endauth
            </p>
            <p class="font-montserrat -mt-px text-s text-text-secondary">
                @auth
                    {{ auth()->user()->name }}
                @endauth
            </p>
        </div>
    </div>

    <p class="pt-3 font-montserrat text-xs uppercase tracking-wide font-semibold text-text-secondary opacity-80 sidebar-text">
        Menu
    </p>

    @foreach ($menu as $group)
        @foreach ($group['navigations'] as $item)
            @php
                $isActive = request()->is(ltrim($item['path'], '/'));
            @endphp 

            <a href="{{ $item['path'] }}"
               class="sidebar-item group w-full h-10 
               {{ $isActive ? 'bg-surface shadow-sm ring-1 ring-border' : 'bg-background hover:bg-surface' }} 
               transition duration-300 rounded-xl flex items-center gap-2 justify-start px-2">

                <div class="h-full w-2 -ml-2.25 
                    {{ $isActive ? 'bg-primary opacity-100' : 'opacity-0 group-hover:opacity-100' }} 
                    transition duration-300 rounded-l-xl sidebar-indicator">
                </div>

                <div class="sidebar-icon p-1.5 rounded-md flex items-center justify-center transition-colors
                    {{ $isActive ? 'bg-background shadow-sm text-primary border border-border' : 'bg-surface text-text-secondary group-hover:bg-background group-hover:text-primary group-hover:border group-hover:border-border' }}">
                    
                    @if ($loop->first)
                        <x-lucide-layout-dashboard class="w-4 h-4" />
                    @elseif ($loop->index == 1)
                        <x-lucide-folder-git-2 class="w-4 h-4" />
                    @elseif ($loop->index == 2)
                        <x-lucide-users class="w-4 h-4" />
                    @else
                        <x-lucide-user-pen class="w-4 h-4" />
                    @endif 

                </div>

                <span class="sidebar-text block py-2 font-montserrat font-semibold text-sm transition-colors
                    {{ $isActive ? 'text-primary' : 'text-text-primary group-hover:text-primary' }}">
                    {{ $item['name'] }}
                </span>

            </a>
        @endforeach
    @endforeach

    <p class="pt-3 font-montserrat text-xs uppercase tracking-wide font-semibold text-text-secondary opacity-80 sidebar-text">
        Theme
    </p>

    <div class="sidebar-theme w-full rounded-xl bg-background border-[1.5px] p-3 border-border flex flex-col gap-3 items-center">

        <div class="sidebar-text flex gap-3 items-center w-full">
            <div class="p-1.5 rounded-md bg-surface">
                <x-lucide-palette class="w-4 h-4 text-text-secondary"/>
            </div>
            <div class="flex flex-col">
                <p class="font-montserrat text-sm font-semibold text-text-primary">Select Theme</p>
                <p class="font-montserrat text-[10px] text-text-secondary">Pick your desired theme</p>
            </div>
        </div>

        <div class="flex flex-row gap-2 w-full justify-center">
            <button class="theme-btn flex flex-col items-center gap-2 p-2 rounded-lg hover:bg-surface transition focus:outline-none" data-theme="light">
                <div class="w-8 h-8 rounded-full overflow-hidden flex border border-border">
                    <div class="w-1/2 bg-white"></div>
                    <div class="w-1/2 bg-gray-100"></div>
                </div>
                <span class="sidebar-text font-montserrat text-xs font-semibold text-text-secondary transition-colors">Light</span>
            </button>

            <button class="theme-btn flex flex-col items-center gap-2 p-2 rounded-lg hover:bg-surface transition focus:outline-none" data-theme="dark">
                <div class="w-8 h-8 rounded-full overflow-hidden flex border border-border">
                    <div class="w-1/2 bg-gray-800"></div>
                    <div class="w-1/2 bg-gray-900"></div>
                </div>
                <span class="sidebar-text font-montserrat text-xs font-semibold text-text-secondary transition-colors">Dark</span>
            </button>

            <button class="theme-btn flex flex-col items-center gap-2 p-2 rounded-lg hover:bg-surface transition focus:outline-none" data-theme="system">
                <div class="w-8 h-8 rounded-full overflow-hidden flex border border-border">
                    <div class="w-1/2 bg-white"></div>
                    <div class="w-1/2 bg-gray-900"></div>
                </div>
                <span class="sidebar-text font-montserrat text-xs font-semibold text-text-secondary transition-colors">System</span>
            </button>
        </div>
    </div>
</aside>

@once
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const themeBtns = document.querySelectorAll('.theme-btn');
        const appLogos = document.querySelectorAll('[id="app-logo"]');
        const appLogoPs = document.querySelectorAll('[id="app-logo-p"]');
        const sidebarToggles = document.querySelectorAll('[id="sidebar-toggle"]');

        sidebarToggles.forEach(toggle => {
            toggle.addEventListener('click', () => {
                const isCollapsed = document.documentElement.classList.toggle('sidebar-collapsed');
                localStorage.setItem('sidebarCollapsed', isCollapsed);
            });
        });

        function applySidebarTheme(theme) {
            const html = document.documentElement;
            const isDark = theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches);

            if (isDark) {
                html.classList.add('dark');
                html.setAttribute('data-theme', 'dark');
                appLogos.forEach(logo => logo.src = 'images/progrest_logo_white.png');
                appLogoPs.forEach(logo => logo.src = 'images/progrest_p_logo_white.png');
            } else {
                html.classList.remove('dark');
                html.setAttribute('data-theme', 'light');
                appLogos.forEach(logo => logo.src = 'images/progrest_logo_green.png');
                appLogoPs.forEach(logo => logo.src = 'images/progrest_p_logo_green.png');
            }

            themeBtns.forEach(btn => {
                const span = btn.querySelector('span');
                if (btn.getAttribute('data-theme') === theme) {
                    btn.classList.add('bg-surface', 'ring-1', 'ring-border');
                    span.classList.remove('text-text-secondary');
                    span.classList.add('text-primary');
                } else {
                    btn.classList.remove('bg-surface', 'ring-1', 'ring-border');
                    span.classList.add('text-text-secondary');
                    span.classList.remove('text-primary');
                }
            });
        }

        let currentTheme = localStorage.getItem('theme') || 'light';
        applySidebarTheme(currentTheme);

        themeBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const selectedTheme = btn.getAttribute('data-theme');
                localStorage.setItem('theme', selectedTheme);
                applySidebarTheme(selectedTheme);
                
                const mobileThemeText = document.getElementById('mobile-theme-text');
                if(mobileThemeText) {
                    mobileThemeText.textContent = selectedTheme;
                    document.getElementById('mobile-icon-light')?.classList.add('hidden');
                    document.getElementById('mobile-icon-dark')?.classList.add('hidden');
                    document.getElementById('mobile-icon-system')?.classList.add('hidden');
                    if (selectedTheme === 'light') document.getElementById('mobile-icon-light')?.classList.remove('hidden');
                    if (selectedTheme === 'dark') document.getElementById('mobile-icon-dark')?.classList.remove('hidden');
                    if (selectedTheme === 'system') document.getElementById('mobile-icon-system')?.classList.remove('hidden');
                }
                
                const mobileLogo = document.getElementById('mobile-logo');
                const isDark = selectedTheme === 'dark' || (selectedTheme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches);
                if(mobileLogo) mobileLogo.src = isDark ? 'images/progrest_logo_white.png' : 'images/progrest_logo_green.png';
            });
        });
    });
</script>
@endonce