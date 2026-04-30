@props(['menu'])

<aside class="w-64 bg-background text-black p-4 h-screen rounded-r-2xl shadow-r-xl flex flex-col gap-3">

    <img id="app-logo" src="images/progrest_logo_green.png" alt="" class="w-30 h-auto mt-2">

    <div class="w-full h-px bg-border rounded-xl"></div>

    <div class="flex gap-3 border-[1.5px] p-2 border-border rounded-xl shadow-sm">
        <img src="images/profile.jpg" alt="" class="w-12 rounded-4xl">
        <div class="flex flex-col justify-center">
            <p class="font-montserrat font-bold text-text-primary">Reeders</p>
            <p class="font-montserrat -mt-px text-s text-text-secondary">Reeders Rere</p>
        </div>
    </div>

    <p class="pt-3 font-montserrat text-xs uppercase tracking-wide font-semibold text-text-secondary opacity-80">Menus</p>

    @foreach ($menu as $group)

        @foreach ($group['navigations'] as $item)
            @php
                $isActive = request()->is(ltrim($item['path'], '/'));
            @endphp 

            <div class="group w-full h-10 {{ $isActive ? 'bg-tertiary shadow-sm ring-1 ring-gray-100' : 'bg-background hover:bg-tertiary' }} transition duration-300 rounded-xl text-center flex items-center gap-2">
                
                <div class="h-full w-2 -ml-px {{ $isActive ? 'bg-primary opacity-100' : 'bg-primary opacity-0 group-hover:opacity-100' }} transition duration-300 rounded-l-xl"></div>

                <div class="mr-1 p-1 rounded-md {{ $isActive ? 'bg-secondary' : 'bg-gray-300 group-hover:bg-secondary' }}">
                    @if ($loop->first)
                        <x-lucide-layout-dashboard class="w-4 h-4 text-black group-hover:text-primary" />
                    @elseif ($loop->index == 1)
                        <x-lucide-folder-git-2 class="w-4 h-4 text-black group-hover:text-primary" />
                    @elseif ($loop->index == 2)
                        <x-lucide-users class="w-4 h-4 text-black group-hover:text-primary" />
                    @else
                        <x-lucide-user-pen class="w-4 h-4 text-black group-hover:text-primary" />
                    @endif 
                </div>

                <a href="{{ $item['path'] }}" class="block py-2 font-montserrat font-semibold {{ $isActive ? 'text-primary' : 'text-text-primary group-hover:text-primary' }} text-text-primary">
                    {{ $item['name'] }}
                </a>

            </div>
        @endforeach
    @endforeach

    <p class="pt-3 font-montserrat text-xs uppercase tracking-wide font-semibold text-text-secondary opacity-80">Themes</p>

    <div class="w-full rounded-xl bg-background border-[1.5px] p-3 border-border flex flex-col gap-3 items-center">

        <div class="flex gap-3 items-center">
            <x-lucide-palette class="w-6 h-6 text-primary"/>
            <div class="flex flex-col">
                <p class="font-montserrat text-sm font-semibold text-text-primary">Select Theme</p>
                <p class="font-montserrat text-[12px] text-text-secondary">Pick your desired theme</p>
            </div>
        </div>

        <!-- Theme Options -->
        <div class="flex flex-row gap-2">

            <!-- Light -->
            <button class="theme-btn group flex flex-col items-center gap-3 p-2 rounded-lg hover:bg-tertiary transition" data-theme="light">
                <div class="w-8 h-8 rounded-2xl overflow-hidden flex">
                    <div class="w-1/2 bg-[#FFFFFF]"></div>
                    <div class="w-1/2 bg-[#F5F4F1]"></div>
                </div>
                <span class="font-montserrat text-sm font-medium text-text-secondary">Light</span>
            </button>

            <!-- Dark -->
            <button class="theme-btn group flex flex-col items-center gap-3 p-2 rounded-lg hover:bg-tertiary transition" data-theme="dark">
                <div class="w-8 h-8 rounded-2xl overflow-hidden flex">
                    <div class="w-1/2 bg-[#0F172A]"></div>
                    <div class="w-1/2 bg-[#1E293B]"></div>
                </div>
                <span class="font-montserrat text-sm font-medium text-text-secondary">Dark</span>
            </button>

            <!-- System -->
            <button class="theme-btn group flex flex-col items-center gap-3 p-2 rounded-lg hover:bg-tertiary transition" data-theme="system">
                <div class="w-8 h-8 rounded-2xl overflow-hidden flex">
                    <div class="w-1/2 bg-white"></div>
                    <div class="w-1/2 bg-[#0F172A]"></div>
                </div>
                <span class="font-montserrat text-sm font-medium text-text-secondary">System</span>
            </button>

        </div>
    </div>
</aside>
