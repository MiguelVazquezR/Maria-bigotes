<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar producto del menú
        </h2>
    </x-slot>
    <form wire:submit.prevent="update" class="mt-6 px-4">
        <input wire:model.defer="product.name" type="text" class="input" placeholder="Nombre">
        <x-input-error for="product.name" />

        <textarea wire:model.defer="product.description" class="input" placeholder="Descripción"></textarea>
        <x-input-error for="product.description" />

        <input wire:model.defer="product.price" type="number" step="0.10" class="input" placeholder="Precio">
        <x-input-error for="product.price" />

        <select wire:model.defer="product.category_id" class="input">
            <option value="0" selected disabled>-- Seleccione --</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{ $category->name }}</option>
            @endforeach
        </select>
        <button type="submit" wire:loading.attr="disabled" wire:target="update" class="btn-primary mt-3 mr-2">
            <i wire:loading wire:target="update" class="fa-solid fa-pizza-slice animate-spin mr-2"></i>
            <span wire:loading wire:target="update">Guardando...</span>
            <span wire:loading.remove wire:target="update">Guardar cambios</span>
        </button>
        <a href="{{ route('menu.admin.index') }}" role="button" class="btn-secondary">Cancelar</a>
    </form>
</div>
