<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Promociones
            </h2>
            <a role="button" href="{{ route('promo.admin.create') }}" class="btn-primary">+ Nuevo</a>
        </div>
    </x-slot>
    <section>
        @forelse ($promos as $promo)
            <div class="container w-11/12 mt-5 mx-auto relative">
                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{ $promo->getFirstMedia()->getUrl() }}">

                <div class="flex flex-col justify-between py-3 lg:mx-6">
                    <h1 class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">{{ $promo->title }}
                    </h1>
                    <p class="text-sm text-gray-500">{{ $promo->description }}</p>
                    <small class="text-sm text-gray-500 dark:text-gray-300">creado el:
                        {{ $promo->created_at->isoFormat('DD MMMM, YYYY') }}</small>
                </div>
                <a href="{{ route('promo.admin.edit', $promo) }}"
                    class="flex justify-center items-center w-8 h-8 rounded-full bg-white absolute top-1 opacity-75 right-11"
                    title="Editar"><i class="fa-solid fa-pencil text-blue-600"></i></a>
                <button wire:click="prepareItemToDelete({{ $promo }})"
                    class="w-8 h-8 rounded-full bg-white absolute top-1 opacity-75 right-1" title="Eliminar"><i
                        class="fa-solid fa-trash-can text-red-600"></i></button>
            </div>
        @empty
            <p class="text-gray-500 text-center text-sm mt-6 bg-gray-100">No hay promociones para mostrar</p>
        @endforelse
    </section>

    <x-jet-confirmation-modal wire:model="show_confirmation_modal">
        <x-slot name="title">
            Eliminar promoción
        </x-slot>
        <x-slot name="content">
            ¿Seguro(a) que desea eliminar esta promoción?
        </x-slot>
        <x-slot name="footer">
            <div class="flex justify-end">
                <button wire:click="deleteItem" class="mr-2 btn-danger">Continuar</button>
                <button wire:click="$set('show_confirmation_modal', false)" class="btn-secondary">Cancelar</button>
            </div>
        </x-slot>
    </x-jet-confirmation-modal>

    <div class="px-8 py-2">
        {{ $promos->links() }}
    </div>
</div>
