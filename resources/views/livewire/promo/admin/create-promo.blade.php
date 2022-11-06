<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear nueva promo
        </h2>
    </x-slot>
    <form wire:submit.prevent="store" class="mt-6 px-4">
        <input wire:model.defer="title" type="text" class="input" placeholder="Título">
        <x-input-error for="title" />

        <textarea wire:model.defer="description" class="input" placeholder="Descripción"></textarea>
        <x-input-error for="description" />
        
        <button type="submit" wire:loading.attr="disabled" wire:target="store" class="btn-primary mt-3 mr-2">
            <i wire:loading wire:target="store" class="fa-solid fa-pizza-slice animate-spin mr-2"></i>
            <span wire:loading wire:target="store">Guardando...</span>
            <span wire:loading.remove wire:target="store">Crear</span>
        </button>
        <a href="{{ route('promo.admin.index') }}" role="button" class="btn-secondary">Cancelar</a>
    </form>
</div>
