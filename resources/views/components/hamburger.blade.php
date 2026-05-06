@props(['menu'])

<nav class="md:hidden relative bg-background border-b border-border shadow-sm z-50">
    <div class="flex items-center justify-between p-4">
        <button id="mobile-menu-btn" class="p-2 text-text-primary rounded-lg hover:bg-tertiary focus:outline-none rotate-0 hover:rotate-90 transition duration-300">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
        </button>

        <img id="mobile-logo" src="images/progrest_logo_green.png" alt="Progrest" class="h-7 mt-1 w-auto transition-all duration-300">

        <div class="relative">
            <button id="mobile-profile-btn" class="focus:outline-none flex items-center">
                <img src="images/profile.jpg" alt="Profile" class="h-10 rounded-full border border-border object-cover">
            </button>

            <div id="mobile-profile-dropdown" class="hidden absolute right-0 mt-3 w-48 bg-background border border-border rounded-xl shadow-lg p-4 text-center">
                <p class="font-montserrat font-bold text-text-primary text-lg">Reeders</p>
                <p class="font-montserrat text-sm text-text-secondary">Reeders Rere</p>
            </div>
        </div>
    </div>

    <div id="mobile-dropdown-menu" class="hidden absolute w-full left-0 top-full bg-background border-b border-border shadow-lg flex-col px-4 py-2">
        @foreach ($menu as $group)
            @foreach ($group['navigations'] as $item)
                @php
                    $isActive = request()->is(ltrim($item['path'], '/'));
                @endphp 
                <a href="{{ $item['path'] }}" class="flex items-center gap-3 py-3 group @if(!$loop->parent->last || !$loop->last) border-b border-border @endif">
                    <div class="p-1.5 rounded-md transition-colors {{ $isActive ? 'bg-tertiary text-primary' : 'bg-surface text-text-secondary group-hover:bg-tertiary group-hover:text-primary' }}">
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
                    <span class="font-montserrat text-sm font-semibold transition-colors {{ $isActive ? 'text-primary' : 'text-text-primary group-hover:text-primary' }}">{{ $item['name'] }}</span>
                </a>
            @endforeach
        @endforeach

        <div class="w-full h-[2px] bg-border my-2"></div>

        <button id="mobile-theme-btn" class="w-full flex items-center justify-between py-3 focus:outline-none group">
            <div class="flex items-center gap-3">
                <div class="p-1.5 rounded-md bg-surface group-hover:bg-tertiary transition-colors">
                    <x-lucide-palette class="w-4 h-4 text-text-secondary group-hover:text-primary transition-colors" />
                </div>
                <span class="font-montserrat text-sm font-semibold text-text-primary group-hover:text-primary transition-colors">Themes</span>
            </div>
            
            <div class="p-2 bg-surface group-hover:bg-tertiary rounded-lg text-text-primary group-hover:text-primary transition-colors flex items-center gap-2">
                <span id="mobile-theme-text" class="font-montserrat text-xs font-bold capitalize">Light</span>
                <x-lucide-sun id="mobile-icon-light" class="w-4 h-4" />
                <x-lucide-moon id="mobile-icon-dark" class="w-4 h-4 hidden" />
                <x-lucide-monitor id="mobile-icon-system" class="w-4 h-4 hidden" />
            </div>
        </button>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const menuBtn = document.getElementById('mobile-menu-btn');
        const dropdownMenu = document.getElementById('mobile-dropdown-menu');
        const profileBtn = document.getElementById('mobile-profile-btn');
        const profileDropdown = document.getElementById('mobile-profile-dropdown');
        const mobileLogo = document.getElementById('mobile-logo');

        menuBtn.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
            dropdownMenu.classList.toggle('flex');
            profileDropdown.classList.add('hidden');
        });

        profileBtn.addEventListener('click', () => {
            profileDropdown.classList.toggle('hidden');
            dropdownMenu.classList.add('hidden');
            dropdownMenu.classList.remove('flex');
        });

        const themeBtn = document.getElementById('mobile-theme-btn');
        const themeText = document.getElementById('mobile-theme-text');
        const iconLight = document.getElementById('mobile-icon-light');
        const iconDark = document.getElementById('mobile-icon-dark');
        const iconSystem = document.getElementById('mobile-icon-system');

        let currentTheme = localStorage.getItem('theme') || 'light';
        updateThemeUI(currentTheme);
        applyTheme(currentTheme);

        themeBtn.addEventListener('click', () => {
            if (currentTheme === 'light') {
                currentTheme = 'dark';
            } else if (currentTheme === 'dark') {
                currentTheme = 'system';
            } else {
                currentTheme = 'light';
            }

            localStorage.setItem('theme', currentTheme);
            applyTheme(currentTheme);
            updateThemeUI(currentTheme);
        });

        function applyTheme(theme) {
            const html = document.documentElement;
            const isDark = theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches);
            
            if (isDark) {
                html.classList.add('dark');
                html.setAttribute('data-theme', 'dark');
                if(mobileLogo) mobileLogo.src = 'images/progrest_logo_white.png';
            } else {
                html.classList.remove('dark');
                html.setAttribute('data-theme', 'light');
                if(mobileLogo) mobileLogo.src = 'images/progrest_logo_green.png';
            }
        }

        function updateThemeUI(theme) {
            iconLight.classList.add('hidden');
            iconDark.classList.add('hidden');
            iconSystem.classList.add('hidden');
            themeText.textContent = theme;

            if (theme === 'light') iconLight.classList.remove('hidden');
            if (theme === 'dark') iconDark.classList.remove('hidden');
            if (theme === 'system') iconSystem.classList.remove('hidden');
        }
    });
</script>