<footer class="bg-primary text-text-contrast px-8 md:px-12 py-12 rounded-t-3xl mt-12 border-t-4 border-secondary">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">

        <div class="flex flex-col gap-3 items-start">
            <img src="{{ asset('images/progrest_logo_white.png') }}" alt="Progrest Logo" class="w-36 h-auto">
            <p class="font-montserrat text-sm opacity-90 text-text-contrast pr-4">
                Make progress and let others do the rest.
            </p>
        </div>

        <div>
            <h2 class="font-parkinsans font-bold mb-4 text-text-contrast text-lg">Product</h2>
            <ul class="font-montserrat space-y-2 text-sm opacity-80 text-text-contrast">
                <li><a href="{{ route('dashboard') }}" class="hover:opacity-100 transition-opacity">Dashboard</a></li>
                <li><a href="/projects" class="hover:opacity-100 transition-opacity">Projects</a></li>
                <li><a href="/collab" class="hover:opacity-100 transition-opacity">Collab</a></li>
            </ul>
        </div>

        <div>
            <h2 class="font-parkinsans font-bold mb-4 text-text-contrast text-lg">Social Media</h2>
            <ul class="font-montserrat space-y-2 text-sm opacity-80 text-text-contrast">
                <li><a href="#" class="hover:opacity-100 transition-opacity">Twitter</a></li>
                <li><a href="#" class="hover:opacity-100 transition-opacity">Facebook</a></li>
                <li><a href="#" class="hover:opacity-100 transition-opacity">Instagram</a></li>
            </ul>
        </div>

        <div>
            <h2 class="font-parkinsans font-bold mb-4 text-text-contrast text-lg">Resources</h2>
            <ul class="font-montserrat space-y-2 text-sm opacity-80 text-text-contrast">
                <li><a href="#" class="hover:opacity-100 transition-opacity">Help Center</a></li>
                <li><a href="#" class="hover:opacity-100 transition-opacity">Privacy Policy</a></li>
                <li><a href="#" class="hover:opacity-100 transition-opacity">Terms of Service</a></li>
            </ul>
        </div>

    </div>

    <div class="font-montserrat text-text-contrast border-t border-white/20 mt-12 pt-6 flex flex-col md:flex-row justify-between items-center text-sm opacity-70">
        <p>© 2026 Progrest. All rights reserved.</p>
        <p class="mt-2 md:mt-0">Project Planner Platform</p>
    </div>
</footer>