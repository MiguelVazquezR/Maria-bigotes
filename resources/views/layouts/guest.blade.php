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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales-all.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="bg-gray-100">
    <div class="font-sans text-gray-900 antialiased mb-10">
        <div class="text-right bg-black py-3 pr-3 rounded-b-xl fixed w-full z-10">
            @if (!request()->routeIs('login'))
                @livewire('cart.cart')
            @endif
        </div>
        <div class="px-6 pt-16">
            {{ $slot }}
        </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    @livewire('footer.footer-bar')
    <script>
        window.onload = function() {
            Livewire.emit('getCartItemsNumber');
            Livewire.emit('getCartItems', 'cart.show-cart');
            Livewire.emit('getCartItems', 'cart.edit-cart');
            Livewire.emit('getCartItems', 'payment.pay');
        };
    </script>

    @livewireScripts
    <script>
        document.addEventListener('livewire:load', guestCalendar);
        Livewire.on('reset-calendar', createGuestCalendar);

        let guest_calendar;

        function guestCalendar() {
            document.addEventListener('DOMContentLoaded', createGuestCalendar);
        }

        function createGuestCalendar() {
            var calendarEl1 = document.getElementById('guest-calendar');
            guest_calendar = new FullCalendar.Calendar(calendarEl1, {
                aspectRatio: 0.6,
                displayEventTime: false,
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next,today',
                    center: 'title',
                    right: 'dayGridMonth',
                },
                locale: 'es',
                events: '/events',
                dateClick: function(info) {
                    Livewire.emitTo('events.guest-calendar', 'openModal', info)
                },
                eventClick: function(info) {
                    Livewire.emitTo('events.guest-calendar', 'openAuthModal', info.event)
                },
            });
            guest_calendar.render();
        }
    </script>
</body>

</html>
