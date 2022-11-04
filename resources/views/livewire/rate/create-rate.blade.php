<div>
    <h1 class="font-bold text-2xl ml-4 text-center">Califícanos</h1>
    <input type="text" wire:model.defer="name"
        class="input"
        placeholder="Nombre(s)">
    <x-input-error for="name" />
    <input type="text" wire:model.defer="last_names"
        class="h-[2rem] w-full px-3 py-1 outline-none mt-2 border border-gray-400 focus:ring rounded-md shadow-md placeholder:text-gray-400"
        placeholder="Apellidos">
    <x-input-error for="last_names" />
    <input type="email" wire:model.defer="email"
        class="h-[2rem] w-full px-3 py-1 outline-none mt-2 border border-gray-400 focus:ring rounded-md shadow-md placeholder:text-gray-400"
        placeholder="Correo">
    <x-input-error for="email" />
    <textarea rows="4" wire:model.defer="comments"
        class="border w-full px-3 py-1 outline-none mt-2 border-gray-400 focus:ring rounded-md shadow-md placeholder:text-gray-400"
        placeholder="Comentarios"></textarea>
    <x-input-error for="comments" />
    <button wire:click="send" wire:loading.attr="disabled" wire:target="send"
        class="px-3 py-1 bg-blue-600 text-white font-bold rounded-md mt-3 disabled:opacity-50">
        <i wire:loading wire:target="send" class="fa-solid fa-pizza-slice animate-spin mr-2"></i>
        <span wire:loading wire:target="send">Enviando...</span>
        <span wire:loading.remove wire:target="send">Enviar</span>
    </button>
</div>
