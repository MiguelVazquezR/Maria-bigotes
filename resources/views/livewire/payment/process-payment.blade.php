<div>
    {{-- stripe --}}
    <div class="border-2 border-gray-300 rounded-md px-4 py-2 my-4 dark:bg-slate-800 dark:text-gray-300 relative">
        <div id="spinner" class="absolute top-0 right-0 w-full h-full bg-gray-100 bg-opacity-30 justify-center items-center" style="display: none;">
            <x-spinner size="16" />
        </div>
        <div class="lg:flex justify-between items-center">
            <h1 class="mb-3 font-bold">Método de Pago</h1>
            <img src="{{ asset('images/we-accept.png') }}" class="h-8" />
        </div>
        <form id="card-form">
            <div class="mt-3">
                <x-jet-label class="dark:text-gray-300" value="Correo electrónico" />
                <input id="email" class="input w-full mb-3 dark:text-gray-300" type="email"
                    placeholder="Ingrese un correo al que tenga acceso" required />
            </div>
            <div class="mt-3">
                <x-jet-label class="dark:text-gray-300" value="Nombre de titular de la tarjeta" />
                <input id="card-holder-name" class="input w-full mb-3 dark:text-gray-300" type="text"
                    placeholder="Ingrese el nombre del titular de la tarjeta" required />
            </div>

            <!-- Stripe Elements Placeholder -->
            <x-jet-label class="dark:text-gray-300" value="Tarjeta" />
            <div class="w-full mb-3 border rounded-md p-3 dark:bg-indigo-400">
                <div id="card-element"></div>

                <span class="text-red-500 italic text-sm" id="card-error"></span>
            </div>

            <button id="card-button" wire:loading.attr="disabled" wire:target="paymentMethodCreated"
                class="btn-primary">
                <i wire:loading wire:target="paymentMethodCreated"
                    class="fa-solid fa-pizza-slice animate-spin mr-2"></i>
                <span wire:loading wire:target="paymentMethodCreated">Procesando...</span>
                <span wire:loading.remove wire:target="paymentMethodCreated">Procesar pago</span>
            </button>
            {{-- <button id="card-button" class="btn-primary">Procesar pago</button> --}}
        </form>
    </div>

    <script>
        const stripe = Stripe("{{ config('services.stripe.key') }}");

        const elements = stripe.elements();
        const cardElement = elements.create("card");

        cardElement.mount("#card-element");

        // payment method
        const cardHolderName = document.getElementById("card-holder-name");
        // const cardButton = document.getElementById("card-button");
        const cardForm = document.getElementById("card-form");

        cardForm.addEventListener("submit", async (e) => {
            e.preventDefault();
            document.getElementById('spinner').style.display = 'flex';
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
                document.getElementById('spinner').style.display = 'none';
                document.getElementById("card-error").textContent = error.message;
            } else {
                axios.post('/process-payment', {
                    paymentMethod: paymentMethod.id,
                    email: document.getElementById('email').value,
                    name: document.getElementById('card-holder-name').value,
                    total: {{ $total }},
                }).then((response) => { 
                    if(response.data.success)
                        localStorage.removeItem('m_b_cart');
                        
                    window.location.replace(response.data.route);
                 });
            }
        });
    </script>
</div>
