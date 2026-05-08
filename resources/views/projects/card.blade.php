<div class="project-container bg-background rounded-3xl p-6 shadow-sm relative pl-9 w-full max-w-sm">
    <div class="project-line absolute left-4 top-6 bottom-24 w-1 rounded-full" style="background-color: {{ $accentColor ?? 'bg-primary' }};"></div>

    <div class="flex justify-between items-start mb-2">
        <div class="pr-2 p-2 rounded-xl flex justify-center items-center" style="background-color: {{ $accentColor }}">
            {{-- <x-lucide-{{ $icon }} class="w-7 text-text-contrast" /> --}}
            <x-dynamic-component 
                :component="'lucide-' . $icon"
                class="w-6 text-text-contrast" 
            />
        </div>
        @if ($progress < 100)
            <div class="text-[#EAB308] flex flex-row gap-3">
                <div class="bg-[#FEF2D8] px-3 rounded-lg">
                    <span class="font-montserrat text-[#EAB308] text-[12px] font-semibold">In Progress</span>
                </div>
                <x-lucide-clock class="w-7" />
            </div>
        @else
            <div class="text-[#22C55E] flex flex-row gap-3">
                <div class="bg-[#E4F7EC] px-3 rounded-lg">
                    <span class="font-montserrat text-[#22C55E] text-[12px] font-semibold">Completed</span>
                </div>
                <x-lucide-circle-check-big class="w-7" />
            </div>
        @endif
    </div>

    <div class="pr-2 flex flex-col">
        <h2 class="text-text-primary text-xl font-semibold font-parkinsans">{{ $title }}</h2>
        <p class="text-text-primary text-sm mt-1 leading-snug">{{ $description }}</p>
    </div>

    <div class="mb-4 mt-6">
        <div class="flex justify-between items-center mb-2">
            <h3 class="text-text-primary font-semibold font-parkinsans text-sm">Progress</h3>
            <span class="text-text-primary font-semibold font-parkinsans text-sm">{{ $progress }}%</span>
        </div>
        <div class="w-full bg-gray-200 h-1.5 rounded-full overflow-hidden">
            <div class="h-full rounded-full" style="width: {{ $progress }}%; background-color: {{ $accentColor }}"></div>
        </div>
    </div>

    <div class="mb-3">
        <h3 class="text-text-primary font-semibold font-parkinsans mb-2 text-sm">Collaborators</h3>
        <div class="flex items-center -space-x-2">
            @foreach ($collaborators->take(3) as $avatar)
                <img src="images/profile.jpg" alt="Collaborator" class="w-8 h-8 rounded-full border-2 border-white object-cover relative z-0">
            @endforeach
            
            @php
                $extraCollaborators = $collaborators->count() - 3; 
            @endphp

            @if ($extraCollaborators > 0)
                <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center text-xs font-semibold relative z-10 shadow-sm">
                    +{{ $extraCollaborators }}
                </div>
            @endif
        </div>
    </div>

    <div class="flex flex-row items-center justify-between mb-3">
        <div class="flex flox-row gap-1.5">
            <x-lucide-calendar class="w-3 text-text-secondary"/> 
            <p class="text-text-secondary text-sm">Due in 10 days</p>
        </div>
        <div class="flex flox-row gap-1.5">
            <x-lucide-message-circle class="w-3 text-text-secondary"/> 
            <p class="text-text-secondary text-sm">10</p>
        </div>
    </div>

    <button class="text-text-primary w-full py-1.5 border-2 border-gray-100 shadow-sm rounded-full flex items-center justify-center gap-1 font-semibold text-sm hover:bg-surface transition-colors font-montserrat">
        Continue <x-lucide-eye class="w-5 h-5" />
    </button>
</div>