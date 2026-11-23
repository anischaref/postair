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
<body class="min-h-screen flex flex-col bg-base-300">

    <header>
        <nav class="navbar bg-base-200 ">
            <div class="navbar-start">
                <a href="{{ route('home') }}" class="btn btn-ghost text-xl">Postair</a>
            </div>
            <div class="navbar-end gap-4"> 
                @auth
                    <span class="text-sm">{{ auth()->user()->name}}</span>
                    <form method="POST" action="{{ route("logout") }}" class="inline">
                        @csrf

                        <button type="submit" class="btn btn-ghost btn-sm">
                            Logout
                        </button>
                    
                    </form>

                @else
                <a href="{{ route("login") }}" class="btn">Sign in</a>
                <a href="{{ route("register") }}" class="btn btn-primary">Sign Up</a>
                @endauth
            </div>
        </nav>
    </header>

    {{-- Sucess message toast --}}
    @if (session('success'))
    <div class="toast toast-top toast-center animate-fade-out">
        <div role="alert" class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    </div>
    @endif

    <main class="flex-1 container mx-auto px-4 py-3">
        {{ $slot }}
    </main>

    <footer class="footer footer-center bg-base-200 py-4">
        Postair {{ date('Y') }}
    </footer>

  
    
</body>
</html>