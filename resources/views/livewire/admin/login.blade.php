<div>
    <h1 class="text-xl font-bold">Zona de administrador</h1>
    <input wire:model.defer="password" class="h-[2rem] w-full px-3 py-1 outline-none mt-2 border border-gray-400 focus:ring rounded-md shadow-md placeholder:text-gray-400" type="password" placeholder="Password">
    <button wire:click="auth" wire:loading.attr="disabled" wire:target="auth" class="px-3 py-1 bg-blue-600 text-white font-bold rounded-md mt-3 disabled:opacity-50">
        <i wire:loading wire:target="auth" class="fa-solid fa-pizza-slice animate-spin mr-2"></i>
        <span wire:loading wire:target="auth">Autenticando...</span>
        <span wire:loading.remove wire:target="auth">Ingresar</span>
    </button>
</div>
