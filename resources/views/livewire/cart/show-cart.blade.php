<div>
    <div class="flex justify-between items-center mt-5">
        <h1 class="font-bold">Carrito</h1>
        <div class="flex justify-end">
            <a role="button" class="btn-primary" href="#">Comprar (${{ number_format($total, 2) }})</a>
        </div>
    </div>
    <div class="mx-auto">
        <div class="flex items-center justify-center">
            <div class="max-w-sm w-full sm:w-1/2 lg:w-1/3 py-4 px-3">
                @foreach ($cart_items as $index => $item)
                    <div class="bg-gray-100 border border-gray-300 shadow-xl rounded-lg overflow-hidden mb-6 relative">
                        <div class="bg-cover bg-center h-56 p-4"
                            style="background-image: url(https://images.unsplash.com/photo-1475855581690-80accde3ae2b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80)">
                        </div>
                        <div class="p-4">
                            <p class="uppercase tracking-wide text-sm font-bold text-gray-700">{{ $item['product']->name }}</p>
                            <p class="text-lg text-gray-900">
                                ${{ $item['product']->price }} x {{ $item['quantity'] }} = ${{ $item['product']->price * $item['quantity'] }}
                            </p>
                            <p class="text-gray-700 text-xs">Especificaciones: {{ $item['notes'] != '' ? $item['notes'] : '--' }}</p>
                        </div>
                        <div class="flex py-2 px-4 border-t border-gray-300 text-gray-700">
                            <div class="flex-1 inline-flex items-center">
                                <i class="fa-solid fa-utensils mr-3"></i>
                                <p>{{ $item['product']->category->name }}</p>
                            </div>
                        </div>
                        <a href="{{ route('cart.edit', ['index' => $index]) }}" class="flex justify-center items-center w-8 h-8 rounded-full bg-white absolute top-1 opacity-75 right-11" title="Editar"><i class="fa-solid fa-pencil text-blue-600"></i></a>
                        <button class="w-8 h-8 rounded-full bg-white absolute top-1 opacity-75 right-1" title="Eliminar"><i class="fa-solid fa-trash-can text-red-600"></i></button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>