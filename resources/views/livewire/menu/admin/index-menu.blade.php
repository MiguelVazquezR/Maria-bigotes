<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Menú
            </h2>
            <a role="button" href="{{ route('menu.admin.create') }}" class="btn-primary">+ Nuevo</a>
        </div>
    </x-slot>
    <div class="mx-auto">
        <div class="flex items-center justify-center">
            <div class="w-11/12 lg:w-1/3 py-4 px-3">
                @forelse ($products as $product)
                    <div class="bg-gray-100 border border-gray-300 shadow-xl rounded-lg overflow-hidden mb-6 relative">
                        <div class="bg-cover bg-center h-56 p-4"
                            style="background-image: url({{ $product->getFirstMedia()->getUrl() }})">
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
                            </div>
                        </div>
                        <a href="{{ route('menu.admin.edit', $product) }}"
                            class="flex justify-center items-center w-8 h-8 rounded-full bg-white absolute top-1 opacity-75 right-11"
                            title="Editar"><i class="fa-solid fa-pencil text-blue-600"></i></a>
                        <button wire:click="prepareItemToDelete({{ $product }})"
                            class="w-8 h-8 rounded-full bg-white absolute top-1 opacity-75 right-1" title="Eliminar"><i
                                class="fa-solid fa-trash-can text-red-600"></i></button>
                    </div>
                @empty
                    <p class="text-gray-500 text-center text-sm mt-6 bg-gray-100">No hay productos en el menú para mostrar</p>
                @endforelse
            </div>
        </div>
    </div>

    <x-jet-confirmation-modal wire:model="show_confirmation_modal">
        <x-slot name="title">
            Eliminar elemento del menú
        </x-slot>
        <x-slot name="content">
            ¿Seguro(a) que desea eliminar este elemento del menú? 
            También se eliminará de las ordenes que lo contengan 
        </x-slot>
        <x-slot name="footer">
            <div class="flex justify-end">
                <button wire:click="deleteItem" class="mr-2 btn-danger">Continuar</button>
                <button wire:click="$set('show_confirmation_modal', false)" class="btn-secondary">Cancelar</button>
            </div>
        </x-slot>
    </x-jet-confirmation-modal>

    <div class="px-8 py-2">
        {{ $products->links() }}
    </div>
</div>
