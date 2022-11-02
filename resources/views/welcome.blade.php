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
        @livewire('order-now.index')
        @livewireScripts
    </body>
</html>
