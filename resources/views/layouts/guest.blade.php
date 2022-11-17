<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body>
    <div class="font-sans text-gray-900 antialiased px-6 mb-10">
        <div class="text-right mt-2">
            @livewire('cart.cart')
        </div>
        {{ $slot }}
    </div>

    @livewire('footer.footer-bar')
    @livewireScripts
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        window.onload = function() {
            Livewire.emit('getCartItemsNumber');
            Livewire.emit('getCartItems', 'cart.show-cart');
            Livewire.emit('getCartItems', 'cart.edit-cart');
            Livewire.emit('getCartItems', 'payment.pay');
        };
    </script>
</body>

</html>
