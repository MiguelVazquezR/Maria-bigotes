<div>
    @if ($loading)
        <x-loading-state />
    @else
        <form wire:submit.prevent="update" class="mt-6 px-4">
            <div>
                <p>{{ $product->name }}</p>
            </div>

            <input wire:model="quantity" type="number" step="1" class="input" placeholder="Cantidad">
            <x-input-error for="quantity" />

            <textarea wire:model.defer="notes" class="input" placeholder="Especficaciones"></textarea>
            <x-input-error for="notes" />

            <p class="my-2 font-semibold">Total: ${{ number_format($total, 2) }}</p>

            <button type="submit" wire:loading.attr="disabled" wire:target="update" class="btn-primary mt-3 mr-2">
                <i wire:loading wire:target="update" class="fa-solid fa-pizza-slice animate-spin mr-2"></i>
                <span wire:loading wire:target="update">Guardando...</span>
                <span wire:loading.remove wire:target="update">Guardar cambios</span>
            </button>
            <a href="{{ route('cart.show') }}" role="button" class="btn-secondary">Cancelar</a>
        </form>
    @endif
</div>
