<div>
    <div class="flex justify-between items-center mt-5">
        <h1 class="font-bold">Carrito</h1>
        <div class="flex justify-end">
            @if ($total)
                <a role="button" class="btn-primary" href="{{ route('pay') }}">Comprar (${{ number_format($total, 2) }})</a>
            @endif
        </div>
    </div>
    <div class="mx-auto">
        <div class="flex items-center justify-center">
            <div class="max-w-sm w-full sm:w-1/2 lg:w-1/3 py-4 px-3">
                @forelse ($cart_items as $index => $item)
                    <div class="bg-gray-100 border border-gray-300 shadow-xl rounded-lg overflow-hidden mb-6 relative">
                        <div class="bg-cover bg-center h-56 p-4"
                            style="background-image: url(https://images.unsplash.com/photo-1475855581690-80accde3ae2b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80)">
                        </div>
                        <div class="p-4">
                            <p class="uppercase tracking-wide text-sm font-bold text-gray-700">{{ $item['product']['name'] }}</p>
                            <p class="text-lg text-gray-900">
                                ${{ $item['product']['price'] }} x {{ $item['quantity'] }} = ${{ $item['product']['price'] * $item['quantity'] }}
                            </p>
                            <p class="text-gray-700 text-xs">Especificaciones: {{ $item['notes'] != '' ? $item['notes'] : '--' }}</p>
                        </div>
                        <a href="{{ route('cart.edit', ['index' => $index]) }}" class="flex justify-center items-center w-8 h-8 rounded-full bg-white absolute top-1 opacity-75 right-11" title="Editar"><i class="fa-solid fa-pencil text-blue-600"></i></a>
                        <button wire:click="deleteCartItem({{ $index }})" class="w-8 h-8 rounded-full bg-white absolute top-1 opacity-75 right-1" title="Eliminar"><i class="fa-solid fa-trash-can text-red-600"></i></button>
                    </div>
                    @empty
                    <p class="py-4 text-center text-sm text-gray-500">
                        No has agregado nada al carrito.
                        <a href="{{ route('menu') }}" class="underline text-blue-500">Ver el menú</a>
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</div>