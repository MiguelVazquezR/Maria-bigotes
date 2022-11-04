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
    <body class="antialiased bg-gray-200 min-h-screen relative">
        <section class="px-6 pt-4 pb-12">
            <figure>
              <img src="{{asset('images/Logo–Maria-Bigotes.png')}}" class="h-28 mx-auto" alt="logo">
            </figure>

        {{ $slot }}
        </section>
            
        <footer class="bg-white fixed bottom-2 inset-x-0 flex items-center justify-between space-x-7 shadow-md shadow-gray-600/70 border rounded-lg py-4 px-3">
            <a class="font-bold text-gray-600" href="/"><i class="fa-sharp fa-solid fa-house"></i> Inicio</a>
            <div class="flex justify-center items-center w-14 h-14 rounded-full ring ring-gray-800 bg-white absolute left-[calc(50%-3.5rem)]">
                <a href="#"><img src="{{asset('images/Logo–Maria-Bigotes.png')}}" class="h-12" alt="logo"></a> 
            </div> 
            <a class="font-bold text-gray-600" href="#"><i class="fa-solid fa-arrow-left"></i></i> Regresar</a> 
        </footer>

        @livewireScripts
    </body>

    
</html>