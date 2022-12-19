@php
$products_count = App\Models\Product::all()->count();
$promos_count = App\Models\Promo::all()->count();
$rates_count = App\Models\Rate::all()->count();
$orders_count = App\Models\Order::whereNull('shipped_at')->get('id')->count();
@endphp

<div class="p-6 sm:px-20 border-gray-200">
    <div class="grid grid-cols-2 gap-3">
        <a href="{{ route('menu.admin.index') }}" class="flex flex-col p-4 bg-white shadow-md rounded-md ">
            Menú ({{$products_count}})
        </a>
        <a href="{{ route('promo.admin.index') }}" class="flex flex-col p-4 bg-white shadow-md rounded-md ">
            Promociones ({{$promos_count}})
        </a>
        <a href="{{ route('rate.admin.index') }}" class="flex flex-col p-4 bg-white shadow-md rounded-md ">
            Calificaciones ({{$rates_count}})
        </a>
        <a href="{{ route('calendar.admin') }}" class="flex flex-col p-4 bg-white shadow-md rounded-md ">
            Calendario de eventos
        </a>
        <a href="{{ route('orders.index') }}" class="col-span-full flex flex-col p-4 bg-white shadow-md rounded-md ">
            Órdenes <strong class="text-red-600 inline">({{$orders_count}} sin despachar)</strong>
        </a>
    </div>
</div>
