<div>
    <section class="flex items-center justify-center mt-2">
        <p class="ml-2 border-b-2 border-black">
            Producto seleccionado: <span class="text-blue-500">{{ $product->name }}</span>
        </p>
    </section>

    <section class="mt-4">
        <p>{{ $product->description }}</p>
        <div class="mt-3 w-full">
            <x-jet-label value="Indicaciones especiales" />
            <textarea wire:model="notes" class="input" rows="5" placeholder="Ejemplo: Sin queso"></textarea>
        </div>
        <div class="mt-3">
            <x-jet-label value="Cantidad" />
            <div class="flex items-center">
                <input wire:model="quantity" type="number" class="input">
                <button wire:click="decrement"
                    class="w-7 rouded-lg bg-gray-800 text-lg text-white font-bold mx-1 rounded-sm">-</button>
                <button wire:click="increment"
                    class="w-7 rouded-lg bg-gray-800 text-lg text-white font-bold rounded-sm">+</button>
            </div>
        </div>

        <p class="my-2 font-semibold">Total: ${{ number_format($total, 2) }}</p>

        @if ($quantity)
            <button wire:click="addToCart({{ $product->id }}, {{ $quantity }}, '{{ $notes }}')"
                wire:loading.attr="disabled" wire:target="addToCart" class="btn-primary mt-3 mr-2">
                <i wire:loading wire:target="addToCart" class="fa-solid fa-pizza-slice animate-spin mr-2"></i>
                <span wire:loading wire:target="addToCart">Agregando...</span>
                <span wire:loading.remove wire:target="addToCart">Agregar al carrito</span>
            </button> 
        @else
            <button wire:click="addToCart({{ $product->id }}, {{ $quantity }}, '{{ $notes }}')"
                class="rouded-lg bg-blue-600 text-lg text-white font-bold rounded-md py-2 px-4 mt-3 disabled:opacity-60"
                disabled>
                Agregar al carrito
            </button>
        @endif
        {{-- <a role="button" href="{{ route('pay', ['product' => $product, 'quantity' => $quantity, 'notes' => $notes]) }}" class="rouded-lg bg-blue-600 text-lg text-white font-bold rounded-md py-2 px-4 mt-3">
            Comprar ahora
        </a> --}}

    </section>
</div>
