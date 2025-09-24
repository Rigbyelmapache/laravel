<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
       <main class="flex items-center justify-center min-h-screen p-8 bg-white">
    <div class="w-full max-w-lg space-y-6 bg-white rounded-lg shadow-md p-8">
        @yield('content')
    </div>
</main>
      @stack('scripts') <!-- Permite agregar scripts adicionales -->
    
    
</body>
</html>