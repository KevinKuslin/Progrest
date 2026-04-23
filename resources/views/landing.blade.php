<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progrest</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-800">

<!-- NAVBAR -->
<nav class="fixed w-full flex justify-between items-center px-10 py-5 bg-white shadow-sm z-50">
    <div class="w-30 h-8 bg-no-repeat bg-cover" style="background-image: url('images/progrest_logo_green.png')"></div>

    <div class="flex gap-4 items-center">
        <a href="#" class="text-gray-600">Sign In</a>
        <a href="#" class="bg-[#14452F] hover:bg-[#217750]  text-white px-5 py-2 rounded-lg font-semibold">
            Get Started Free
        </a>
    </div>
</nav>

<div class="pt-20"></div>


<!-- HERO -->
<section class="px-10 py-20 grid md:grid-cols-2 xl:grid-cols-[2fr_3fr] gap-6 items-center bg-linear-to-r from-white to-[#E9F2EE]">

    <!-- LEFT -->
    <div>
        <div class="text-white inline-block font-medium mb-4 px-6 py-2 bg-[#217750] rounded-2xl shadow-md">
            ⚙︎ Designed for teams. Built for progress.
        </div>

        <h1 class="text-5xl md:text-6xl font-bold leading-tight mb-6">
            Plan. Collaborate. <br>
            <span class="text-[#217750]">Deliver Results.</span>
        </h1>

        <p class="text-lg text-gray-600 mb-8 max-w-lg">
            Progrest helps teams plan, track, and complete projects with clarity.
            Stay aligned, meet deadlines, and achieve more—together.
        </p>

        <div class="flex gap-4 mb-6">
            <a href="#" class="bg-[#217750] hover:bg-[#14452F] transition text-white px-6 py-3 rounded-lg font-semibold shadow-md">
                Get Started Free
            </a>

            <a href="#" class="border-2 border-gray-300  hover:bg-gray-100 px-6 py-3 rounded-lg font-medium shadow-md">
                See How It Works
            </a>
        </div>

        <div class="flex gap-6 text-sm text-gray-500">
            <span>✔ No credit card required</span>
            <span>✔ Easy setup</span>
            <span>✔ Free plan</span>
        </div>
    </div>

    <!-- RIGHT (Dashboard Mock) -->
    <img 
        src="images/progrest_dashboard.png"
        class="w-full h-auto mx-auto rotate-3 shadow-2xl hover:rotate-0 transition duration-300 rounded-2xl"
    />

</section>

<section class="px-5 py-5 bg-white">
    <div class="px-5 py-15 flex flex-col items-center bg-no-repeat bg-cover gap-7 rounded-2xl" style="background-image: url('images/background_landing.jpg')">
        <img src="images/progrest_logo_white.png" alt="" class="h-38 w-auto">
        <div class="px-4 py-1 rounded-md bg-white text-[#14452F] font-montserrat font-bold opacity-90">🗪 Our Slogan:</div>
        <h1 class="text-5xl md:text-5xl font-semibold italic text-white w-7/8 text-center opacity-90">
                "Make Progress and Let Others do the Rest"
        </h1>
    </div>
</section>


<!-- FEATURES -->
<section class="px-10 py-20 bg-linear-to-r from-white to-[#E9F2EE] text-center">
    <p class="text-[#217750] font-medium mb-2">
        Everything you need to deliver
    </p>

    <h2 class="text-3xl font-bold mb-12">
        Powerful features for
        <span class="underline decoration-dotted decoration-5 underline-offset-5">modern teams</span>
    </h2>

    <div class="grid md:grid-cols-3 sm:grid-cols-1 gap-6">

        <div class="p-6 border-2 border-[#217750] rounded-xl hover:shadow-md transition">
            <h3 class="font-semibold text-lg mb-2">Smart Task Management</h3> 
            {{-- <div class="h-0.5 w-full bg-[#217750] rounded-xl"></div> --}}
            <p class="text-gray-600 mt-4">
                Organize tasks, set priorities, and track progress in real time.
            </p>
        </div>

        <div class="p-6 border-2 border-[#217750] rounded-xl hover:shadow-md transition">
            <h3 class="font-semibold text-lg mb-2">Team Collaboration</h3>
            {{-- <div class="h-0.5 w-full bg-[#217750] rounded-xl"></div> --}}
            <p class="text-gray-600 mt-4">
                Communicate, share files, and work together seamlessly.
            </p>
        </div>

        <div class="p-6 border-2 border-[#217750] rounded-xl hover:shadow-md transition">
            <h3 class="font-semibold text-lg mb-2">Insights & Reports</h3>
            {{-- <div class="h-0.5 w-full bg-[#217750] rounded-xl"></div> --}}
            <p class="text-gray-600 mt-4">
                Get clear insights into progress, performance, and deadlines.
            </p>
        </div>

    </div>
</section>


<!-- CTA -->
<section class="px-10 py-16">
    <div class="bg-[#14452F] text-white rounded-2xl p-10 flex flex-col md:flex-row justify-between items-center gap-6">

        <div>
            <h2 class="text-2xl font-bold mb-2">
                Ready to bring clarity to your projects?
            </h2>
            <p class="text-green-100">
                Join teams already using Progrest to get things done.
            </p>
        </div>

        <a href="#" class="bg-white text-green-700 px-6 py-3 rounded-lg font-semibold">
            Get Started Free
        </a>

    </div>
</section>

<footer class="px-8 py-10 bg-[#14452F]">

</footer>

</body>
</html>