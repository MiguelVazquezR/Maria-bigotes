<div>
    <section class="flex items-center justify-center mt-7">
        <p class="ml-2 border-b-2 border-black">
            Producto seleccionado: <span class="text-blue-500">{{ $product->name }}</span>
        </p>
    </section>

    <section class="mt-4">
        <p>{{ $product->description }}</p>
        <div class="mt-3 w-full">
            <x-jet-label value="Indicaciones especiales" />
            <textarea wire:model.defer="notes" class="input" rows="5" placeholder="Ejemplo: Sin queso"></textarea>
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

        <p class="my-2 font-semibold">Total: ${{ number_format($total,2) }}</p>

        <button class="rouded-lg bg-blue-600 text-lg text-white font-bold rounded-md py-2 px-4 mt-3">
            Agregar al carrito
        </button>
        <button class="rouded-lg bg-blue-600 text-lg text-white font-bold rounded-md py-2 px-4 mt-3">
            Comprar ahora
        </button>

    </section>
</div>
