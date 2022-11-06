<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar promoción
        </h2>
    </x-slot>
    <form wire:submit.prevent="update" class="mt-6 px-4">
        <input wire:model.defer="promo.title" type="text" class="input" placeholder="Título">
        <x-input-error for="promo.title" />

        <textarea wire:model.defer="promo.description" class="input" placeholder="Descripción"></textarea>
        <x-input-error for="promo.description" />

        <button type="submit" wire:loading.attr="disabled" wire:target="update" class="btn-primary mt-3 mr-2">
            <i wire:loading wire:target="update" class="fa-solid fa-pizza-slice animate-spin mr-2"></i>
            <span wire:loading wire:target="update">Guardando...</span>
            <span wire:loading.remove wire:target="update">Guardar cambios</span>
        </button>
        <a href="{{ route('promo.admin.index') }}" role="button" class="btn-secondary">Cancelar</a>
    </form>
</div>
