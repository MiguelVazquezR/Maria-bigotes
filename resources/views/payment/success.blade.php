<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100 h-screen">
    <div class="font-sans text-gray-900 antialiased mb-10 h-full">
        <section class="bg-green-600 h-1/5 text-white flex items-center justify-center">
            <i class="far fa-check-circle text-6xl font-bold mr-2"></i>
            <p class="text-2xl">¡Compra exitosa!</p>
        </section>
        <section class="bg-gray-100 h-4/5 py-6 px-10 text-center">
            Gracias por tu compra. Tu órden se despachará en seguida.
            <a href="/" class="underline text-blue-400">Ir al inicio</a>
            <div class="my-3">
                <h1 class="font-bold mb-2">Datos de cliente</h1>
                <div class="grid grid-cols-2 gap-2 text-left border px-2 py-1 text-sm">
                    <p>Dirección</p>
                    <p>{{ $order->fullAddress() }}</p>
                    <p>Nombre</p>
                    <p>{{ $order->name }}</p>
                    <p>Teléfono</p>
                    <p>{{ $order->phone }}</p>
                    <p>Correo electrónico</p>
                    <p>{{ $order->email }}</p>
                </div>
                <h1 class="font-bold mb-2 mt-3">Orden</h1>
                @foreach ($order->products as $product)
                    <div class="text-sm flex justify-between text-left border px-2 py-1 mb-1">
                        <p>{{ $product->name }}</p>
                        <p>x{{ $product->pivot->quantity }}</p>
                        @if ($product->pivot->notes)
                            <p class="text-gray-600">Notas: {{ $product->pivot->notes }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</body>

</html>
