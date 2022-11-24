<div class="relative">
    <div id="spinner" wire:loading.flex
        class="absolute top-0 right-0 w-full h-full bg-gray-200 bg-opacity-30 justify-center items-center"
        style="display: none;">
        <x-spinner size="16" />
    </div>

    <div id="guest-calendar" style="font-size: 10px;"></div>

    @if ($show_event)
        @if ($is_auth)
            <div class="text-xs text-gray-700 mb-20 mt-2 bg-white rounded-md px-4 py-2 shadow-lg">
                <div>
                    <x-jet-label value="Nombre de quien reserva" />
                    <p class="text-[10px] tetx-gray-500">{{ $name }}</p>
                </div>
                <div>
                    <x-jet-label value="Número de teléfono" />
                    <p class="text-[10px] tetx-gray-500">{{ $phone_number }}</p>
                </div>
                <div>
                    <x-jet-label value="Dirección del evento (calle, número, colonia)" />
                    <p class="text-[10px] tetx-gray-500">{{ $address }}</p>
                </div>
                <div>
                    <x-jet-label value="Código postal" />
                    <p class="text-[10px] tetx-gray-500">{{ $postal_code }}</p>
                </div>
                <div>
                    <x-jet-label value="Fecha del servicio" />
                    <p class="text-[10px] tetx-gray-500">{{ $event_start . ' -- ' . $event_end }}</p>
                </div>
                <div>
                    <x-jet-label value="Tipo de evento" />
                    <p class="text-[10px] tetx-gray-500">{{ $event_type_id }}</p>
                </div>
                <div>
                    <x-jet-label value="Tipo de servicio" />
                    <p class="text-[10px] tetx-gray-500">{{ $service_type_id }}</p>
                </div>
                <div>
                    <x-jet-label value="Platillos" />
                    <p class="text-[10px] tetx-gray-500">{{ $pack_type_id }}</p>
                </div>
                <div>
                    <x-jet-label value="Número exacto de invitados" />
                    <p class="text-[10px] tetx-gray-500">{{ $number_invites }}</p>
                </div>
                <div>
                    <x-jet-label value="Comentarios" />
                    <p class="text-[10px] tetx-gray-500">{{ $comments ?? '--' }}</p>
                </div>
                <div class="text-right">
                    <button wire:click="$set('show_confirmation_modal', true)" class="btn-danger mt-3">Eliminar
                        reservación</button>
                </div>
            </div>
        @else
            <p class="text-xs text-red-700 mb-20 mt-2 bg-red-200 rounded-md px-4 py-2 shadow-lg">
                Nombre o número de teléfono incorrectos. No podemos mostrarle la información del evento seleccionado.
            </p>
        @endif

    @endif

    <x-jet-confirmation-modal wire:model="show_confirmation_modal">
        <x-slot name="title">
            Eliminar reservación
        </x-slot>
        <x-slot name="content">
            ¿Seguro(a) que desea eliminarla reservación?
        </x-slot>
        <x-slot name="footer">
            <div class="flex justify-end">
                <button wire:click="delete" class="mr-2 btn-danger">Continuar</button>
                <button wire:click="$set('show_confirmation_modal', false)" class="btn-secondary">Cancelar</button>
            </div>
        </x-slot>
    </x-jet-confirmation-modal>

    {{-- create modal --}}
    <x-jet-dialog-modal wire:model="open_modal">
        <x-slot name="title">
            <p class="font-bold text-xl">Reservar el <span
                    class="text-blue-700">{{ $event_date?->isoFormat('dddd DD MMM, YYYY') }}</span></p>
        </x-slot>
        <x-slot name="content">
            @if ($is_event)
                <p>Lo sentimos, el día ya está reservado.</p>
            @else
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
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                            He leido los <a href="/" class="text-blue-400 underline">requisitos</a> para saber
                            si
                            pueden servir mi
                            evento.
                        </label>
                    </div>
                    <x-input-error for="requirements_read" />
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
                        <p class="text-sm text-gray-700">Si no encontraste una opción en la lista acerca de tu evento,
                            por
                            favor háznoslo saber aquí, así como cualquier otro comentario. O si quisieras ser más
                            específico
                            con tu número de invitados. Gracias &#128516;</p>
                        <textarea wire:model.defer="comments" rows="5" class="input" placeholder="Ingresa cualquier comentario"></textarea>
                        <x-input-error for="comments" />
                    </div>
                </form>
            @endif

        </x-slot>
        <x-slot name="footer">
            @if (!$is_event)
                <button wire:click="store" wire:loading.attr="disabled" wire:target="store"
                    class="btn-primary mr-2">Enviar</button>
            @endif
            <button wire:click="$set('open_modal', false)" class="btn-secondary">Cancelar</button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- auth modal --}}
    <x-jet-dialog-modal wire:model="open_auth_modal">
        <x-slot name="title">
            <p class="font-bold text-xl">Verficar propietario de reservación</p>
        </x-slot>
        <x-slot name="content">

            <form wire:submit.prevent>
                <div>
                    <x-jet-label value="Nombre o teléfono de quien reservó" />
                    <input wire:model.defer="auth_data" class="input" type="text" required />
                    <x-input-error for="auth_data" />
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <button wire:click="verify" wire:loading.attr="disabled" wire:target="verify"
                class="btn-primary mr-2">Verificar</button>
            <button wire:click="$set('open_auth_modal', false)" class="btn-secondary">Cancelar</button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
