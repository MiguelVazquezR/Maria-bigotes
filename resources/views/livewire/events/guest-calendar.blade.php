<div class="relative">
    <div id="spinner" wire:loading.flex
        class="absolute top-0 right-0 w-full h-full bg-gray-200 bg-opacity-30 justify-center items-center"
        style="display: none;">
        <x-spinner size="16" />
    </div>

    <div id="guest-calendar"></div>

    <x-jet-dialog-modal wire:model="open_modal">
        <x-slot name="title">
            <p class="font-bold text-xl">Reservar</p>
        </x-slot>
        <x-slot name="content">
            <form wire:submit.prevent>
                <div>
                    <x-jet-label value="Nombre de quien reserva" />
                    <input wire:model.defer="name" class="input" type="text" required />
                    <x-input-error for="name" />
                </div>
                <div class="mt-3">
                    <x-jet-label value="Número de teléfono" />
                    <input wire:model.defer="phone_number" class="input" type="text" required />
                    <x-input-error for="phone_number" />
                </div>
                <div class="mt-3">
                    <x-jet-label value="Dirección del evento (calle, número, colonia)" />
                    <input wire:model.defer="address" class="input" type="text" required />
                    <x-input-error for="address" />
                </div>
                <div class="mt-3">
                    <x-jet-label value="Código postal" />
                    <input wire:model.defer="postal_code" class="input" type="number" required />
                    <x-input-error for="postal_code" />
                </div>
                <div class="mt-3">
                    <x-jet-label value="Hora del servicio" />
                    <select wire:model.defer="event_start" class="input" required>
                        <option value="">-- Seleccione --</option>
                        <option value="13:00">1pm a 2pm</option>
                        <option value="14:00">2pm a 3pm</option>
                        <option value="15:00">3pm a 4pm</option>
                        <option value="16:00">4pm a 5pm</option>
                        <option value="17:00">5pm a 6pm</option>
                        <option value="18:00">6pm a 7pm</option>
                        <option value="19:00">7pm a 8pm</option>
                        <option value="20:00">8pm a 9pm</option>
                        <option value="21:00">9pm a 10pm</option>
                    </select>
                    <x-input-error for="event_start" />
                </div>
                <div class="mt-3">
                    <x-jet-label value="Tipo de evento" />
                    <select wire:model.defer="event_type_id" class="input" required>
                        <option value="">-- Seleccione --</option>
                        @foreach ($events as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="event_type_id" />
                </div>
                <div class="mt-3">
                    <x-jet-label value="Tipo de servicio" />
                    <select wire:model="service_type_id" class="input" required>
                        <option value="">-- Seleccione --</option>
                        @foreach ($services as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <p class="text-blue-700">{{ App\Models\ServiceType::find($service_type_id)?->name }}</p>
                    <x-input-error for="service_type_id" />
                </div>
                <div class="mt-3">
                    <x-jet-label value="Platillos" />
                    <select wire:model.defer="pack_type_id" class="input" required>
                        <option value="">-- Seleccione --</option>
                        @foreach ($packs as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <x-input-error for="pack_type_id" />
                </div>
                <div class="mt-3">
                    <x-jet-label value="Número exacto de invitados" />
                    <input wire:model.defer="number_invites" type="number" min="20" step="1"
                        class="input">
                    <x-input-error for="number_invites" />
                </div>
                <div class="flex items-start mt-3">
                    <input wire:model.defer="requirements_read" id="requirements_read"
                        aria-describedby="requirements_read" type="checkbox"
                        class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-blue-300 h-4 w-4 rounded">
                    <label for="requirements_read" class="text-sm ml-3 font-medium text-gray-900">
                        He leido los <a href="/" class="text-blue-400 underline">requisitos</a> para saber si
                        pueden servir mi
                        evento.
                    </label>
                </div>
                <div class="flex items-start mt-3">
                    <input wire:model.defer="taste_our_specials" id="taste_our_specials"
                        aria-describedby="taste_our_specials" type="checkbox"
                        class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-blue-300 h-4 w-4 rounded">
                    <label for="taste_our_specials" class="text-sm ml-3 font-medium text-gray-900">
                        He probado sus pizzas, pastas, ensaladas, tablas de quesos y carnes frías.
                    </label>
                </div>
                <div class="mt-3">
                    <x-jet-label value="¿Cómo te enteraste de nosotros?" />
                    <select wire:model.defer="how_hear_about_us" class="input" required>
                        <option value="">-- Seleccione --</option>
                        <option>Recomendación</option>
                        <option>Soy cliente del restaurante</option>
                        <option>De otro evento que asistí</option>
                        <option>Internet</option>
                        <option>Redes sociales</option>
                        <option>Otro</option>
                    </select>
                    <x-input-error for="how_hear_about_us" />
                </div>
                <div class="mt-3">
                    <p class="text-sm text-gray-700">Si no encontraste una opción en la lista acerca de tu evento, por
                        favor háznoslo saber aquí, así como cualquier otro comentario. O si quisieras ser más específico
                        con tu número de invitados. Gracias &#128516;</p>
                    <textarea wire:model.defer="comments" rows="5" class="input" placeholder="Ingresa cualquier comentario"></textarea>
                    <x-input-error for="comments" />
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <button wire:click="store" wire:loading.attr="diasbled" wire:target="store"
                class="btn-primary mr-2">Enviar</button>
            <button wire:click="$set('open_modal', false)" class="btn-secondary">Cancelar</button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
