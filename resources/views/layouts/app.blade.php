<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>María Bigotes</title>
        {{-- tailwind css cdn --}}
        <script src="https://cdn.tailwindcss.com"></script>
        {{-- fontawesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
          @livewireStyles
    </head>
    <body class="antialiased">
        <section class="px-6 py-4">
            <figure>
              <img src="{{asset('images/Logo–Maria-Bigotes.png')}}" class="h-28 mx-auto" alt="logo">
            </figure>

        {{ $slot }}
            
        @livewireScripts
        <footer class="flex items-center justify-center space-x-7 mt-8">
            <a href="#"><i class="fa-sharp fa-solid fa-house"></i> Inicio</a> 
            <a href="#"><span>Maria Bigotes</span></a> 
            <a href="#"><i class="fa-solid fa-arrow-left"></i></i> Regresar</a> 
    
        </footer>
    </body>

    
</html>