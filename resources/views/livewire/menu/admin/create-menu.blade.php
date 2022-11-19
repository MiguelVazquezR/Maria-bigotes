<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear nuevo producto
        </h2>
    </x-slot>
    <form wire:submit.prevent="store" class="mt-6 px-4">
        <input wire:model.defer="name" type="text" class="input" placeholder="Nombre">
        <x-input-error for="name" />

        <textarea wire:model.defer="description" class="input" placeholder="Descripción"></textarea>
        <x-input-error for="description" />

        <input wire:model.defer="price" type="number" step="0.10" class="input" placeholder="Precio">
        <x-input-error for="price" />

        <select wire:model.defer="category_id" class="input">
            <option value="0" selected disabled>-- Seleccione --</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{ $category->name }}</option>
            @endforeach
        </select>

        <div class="mt-2">
            <input wire:model.defer="image" type="file" class="input" id="{{$image_id}}">
            <x-input-error for="image" />
        </div>
        
        <button type="submit" wire:loading.attr="disabled" wire:target="store" class="btn-primary mt-3 mr-2">
            <i wire:loading wire:target="store" class="fa-solid fa-pizza-slice animate-spin mr-2"></i>
            <span wire:loading wire:target="store">Guardando...</span>
            <span wire:loading.remove wire:target="store">Crear</span>
        </button>
        <a href="{{ route('menu.admin.index') }}" role="button" class="btn-secondary">Cancelar</a>
    </form>
</div>
