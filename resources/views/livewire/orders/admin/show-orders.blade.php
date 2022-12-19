<div>
    <header class="flex justify-around items-center mb-4 mt-3">
        <h1 class="text-2xl text-gray-800 font-bold text-center">Orden #{{ $order->id }}</h1>
        @if ($order->shipped_at)
            <span class="text-green-800 bg-green-100 px-3 py-1 rounded-full font-semibold">Despachada</span>
        @else
            <span class="text-red-800 bg-red-100 px-3 py-1 rounded-full font-semibold">Sin despachar</span>
        @endif
    </header>
    <div class="my-4 w-11/12 mx-auto rounded-md bg-white shadow-md px-3 py-1">
        <h2 class="pb-1 border-b-2 text-gray-700 mb-2">Platillos ordenados</h2>
        @foreach ($order->products as $product)
            @php
                $total += $product->price * $product->pivot->quantity;
            @endphp
            <div class="text-left border rounded-sm px-2 py-1 mb-1">
                <div class="text-sm flex justify-between">
                    <p>{{ $product->name }} (${{ $product->price }})</p>
                    <p>x{{ $product->pivot->quantity }}</p>
                </div>
                @if ($product->pivot->notes)
                    <p class="text-gray-500 text-xs">Notas: {{ $product->pivot->notes }}</p>
                @endif
            </div>
        @endforeach
        <p class="mt-2 text-right font-bold">Total: ${{ $total }}</p>
    </div>
    <div class="my-4 w-11/12 mx-auto rounded-md bg-white shadow-md px-3 py-1">
        <h2 class="pb-1 border-b-2 text-gray-700 mb-2">Datos del cliente</h2>
        <div class="grid grid-cols-2 gap-2 text-left border rounded-sm px-2 py-1 text-sm">
            <p>Dirección</p>
            <p>{{ $order->fullAddress() }}</p>
            <p>Nombre</p>
            <p>{{ $order->name }}</p>
            <p>Teléfono</p>
            <p>{{ $order->phone }}</p>
            <p>Correo electrónico</p>
            <p>{{ $order->email }}</p>
        </div>
    </div>
    <div class="flex w-11/12 justify-end mx-auto">
        @if ($order->shipped_at)
            <button wire:click="markAsNoShipped" wire:loading.attr="disabled" wire:target="markAsShipped"
                class="btn-danger mr-2">
                <i wire:loading wire:target="markAsNoShipped" class="fa-solid fa-pizza-slice animate-spin mr-2"></i>
                <span wire:loading wire:target="markAsNoShipped">Procesando...</span>
                <span wire:loading.remove wire:target="markAsNoShipped">Marcar como no despachado</span>
            </button>
        @else
            <button wire:click="markAsShipped" wire:loading.attr="disabled" wire:target="markAsShipped"
                class="btn-primary mr-2">
                <i wire:loading wire:target="markAsShipped" class="fa-solid fa-pizza-slice animate-spin mr-2"></i>
                <span wire:loading wire:target="markAsShipped">Procesando...</span>
                <span wire:loading.remove wire:target="markAsShipped">Marcar como despachado</span>
            </button>
        @endif
        <a role="button" href="{{ route('orders.index') }}" class="btn-secondary">Regresar</a>
    </div>
</div>
