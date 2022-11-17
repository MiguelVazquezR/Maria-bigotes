<div>
    <h1 class="font-bold text-2xl ml-4 text-center">Menú</h1>
    <div class="mx-auto">
        <div class="flex items-center justify-center">
            <div class="max-w-sm w-full sm:w-1/2 lg:w-1/3 py-4 px-3">
                @foreach ($products as $product)
                    <div class="bg-gray-100 border border-gray-300 shadow-xl rounded-lg overflow-hidden mb-6">
                        <div class="bg-cover bg-center h-56 p-4"
                            style="background-image: url(https://images.unsplash.com/photo-1475855581690-80accde3ae2b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80)">
                        </div>
                        <div class="p-4">
                            <p class="uppercase tracking-wide text-sm font-bold text-gray-700">{{ $product->name }}</p>
                            <p class="text-xl text-gray-900">${{ $product->price }}</p>
                            <p class="text-gray-700 text-xs">{{ $product->description }}</p>
                        </div>
                        <div class="flex py-2 px-4 border-t border-gray-300 text-gray-700">
                            <div class="flex-1 inline-flex items-center">
                                <i class="fa-solid fa-utensils mr-3"></i>
                                <p>{{ $product->category->name }}</p>
                                <a href="{{ route('selected-product', $product->id) }}" class="btn-primary ml-10">Seleccionar</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
