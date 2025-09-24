<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Document</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
 
    <header class="p-4">
        <div class="container mx-auto">
            <h1 class="text-2xl text-center font-bold">IBCORP</h1>
        </div>
    </header>
    <nav class="bg-blue-500 p-2">
        <div class="container mx-auto">
            <ul class="flex space-x-4">
                <li><a href="/" class="text-white">Inicio</a></li>
                <li><a href="/index" class="text-white">Productos</a></li>
                <li><a href="/listar" class="text-white">Listar productos</a></li>
            </ul>
        </div>
    </nav>
    <main class=" container w-9/11 mx-auto min-h-dvh ">

        @yield('content') <!-- Aquí se inyectará el contenido específico de cada vista -->

    <!-- Pie de página -->
    </main>
    <footer class="bg-gray-600 text-white text-center py-4">
    <p>&copy; {{ date('Y') }} Mi Aplicación. Todos los derechos reservados.</p>
    </footer>
  

    @stack('scripts') <!-- Permite agregar scripts adicionales -->
    
</body>
</html>