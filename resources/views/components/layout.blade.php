<!DOCTYPE html>
<html lang="en" data-theme="dracula">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ isset($title) ? "$title | Postair" : "Postair" }}</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-base-200">

    <header>
        <nav class="navbar bg-base-200 ">
            <div class="navbar-start">
                <a href="{{ route('home') }}"" class="btn btn-ghost text-xl">Postair</a>
            </div>
            <div class="navbar-end"> 
                <a href="/signin" class="btn">Sign in</a>
                <a href="/signup" class="btn btn-primary">Sign Up</a>
            </div>
        </nav>
    </header>

    <main class="flex-1 container mx-auto px-4 py-3">
        {{ $slot }}
    </main>

    <footer class="footer footer-center bg-base-300 py-4">
        Postair {{ date('Y') }}
    </footer>

  
    
</body>
</html>