<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="images/progrest_p_logo_green.png">
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
</head>
<body>
    <div class="flex min-h-screen bg-surface">
    <x-sidebar :menu="$menu" />

    <main class="flex-1 p-6">
        @yield('content')
    </main>
</div>
</body>
</html>