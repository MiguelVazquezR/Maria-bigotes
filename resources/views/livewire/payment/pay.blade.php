<div>
    @if ($loading)
        <x-loading-state />
    @else
        <div class="flex justify-between items-center">
            <h1 class="font-bold text-xl">Realizar pago</h1>
        </div>
        <div class="mx-auto">
            <div class="flex items-center justify-center">
                <div class="max-w-sm w-full sm:w-1/2 lg:w-1/3 py-4 px-3 border-b border-gray-400">
                    <div class="grid grid-cols-2 gap-2">
                        @foreach ($cart_items as $index => $item)
                            <div class="text-xs text-gray-700">
                                <span class="text-sm font-bold">{{ $item['product']['name'] }}</span> <br>
                                <p>Especificaciones: {{ $item['notes'] != '' ? $item['notes'] : '--' }}</p>
                            </div>
                            <p class="text-sm text-gray-700 text-right mb-1">
                                ${{ $item['product']['price'] }} x {{ $item['quantity'] }} =
                                ${{ $item['product']['price'] * $item['quantity'] }}
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
            <p class="font-bold text-right mt-1">Total ${{ number_format($total, 2) }}</p>
        </div>
        {{-- stripe --}}
        <div class="border-2 border-gray-300 rounded-md px-4 py-2 my-4 dark:bg-slate-800 dark:text-gray-300">
            <div class="lg:flex justify-between items-center">
                <h1 class="mb-3 font-bold">Método de Pago</h1>
                <img src="{{ asset('images/we-accept.png') }}" class="h-8" />
            </div>
            <form id="card-form">
                <div class="mt-3">
                    <x-jet-label class="dark:text-gray-300" value="Nombre de titular" />
                    <input id="card-holder-name" class="input w-full mb-3 dark:text-gray-300" type="text"
                        placeholder="Ingrese el nombre del titular de la tarjeta" required />
                </div>

                <!-- Stripe Elements Placeholder -->
                <x-jet-label class="dark:text-gray-300" value="Tarjeta" />
                <div class="w-full mb-3 border rounded-md p-3 dark:bg-indigo-400">
                    <div id="card-element"></div>

                    <span class="text-red-500 italic text-sm" id="card-error"></span>
                </div>

                <button id="card-button" class="btn-primary">Procesar pago</button>
            </form>
        </div>
    @endif
</div>

<script>
    const stripe = Stripe(this.publicKey);

    const elements = stripe.elements();
    const cardElement = elements.create("card");

    cardElement.mount("#card-element");

    // payment method
    const cardHolderName = document.getElementById("card-holder-name");
    // const cardButton = document.getElementById("card-button");
    const cardForm = document.getElementById("card-form");

    cardForm.addEventListener("submit", async (e) => {
        e.preventDefault();

        const {
            paymentMethod,
            error
        } = await stripe.createPaymentMethod(
            "card",
            cardElement, {
                billing_details: {
                    name: cardHolderName.value
                },
            }
        );

        if (error) {
            document.getElementById("card-error").textContent = error.message;
        } else {
            // The card has been verified successfully...
        }
    });
</script>
