<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Bonjour</title>
</head>
<body class="h-screen" style="background-color: {{ $color }}">

    
<main class="h-full w-full flex place-items-center align-center justify-center">

    
        <h1 class="text-9xl">Bonjour, {{ $name }}!</h1>
    

</main>
    
</body>
</html>


