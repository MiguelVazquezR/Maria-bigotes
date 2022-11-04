<div>
    <span class="absolute inset-0 bg-gray-500 opacity-75 flex justify-center items-center" wire:loading wire:target="equis">
        <i class="fa-solid fa-pizza-slice text-white text-4xl animate-spin"></i>
    </span>
    <a href="{{ route('order-now') }}"
        class="shadow-md shadow-gray-600 border border-gray-500 w-11/12 mx-auto flex justify-center items-center text-xl rounded-lg border px-5 py-2 mt-3">
        <i class="fa-solid fa-motorcycle mr-4"></i>
        <span class="uppercase">Pide ahora</span>
    </a>
    <div class="grid grid-cols-3 gap-4 mt-6">
        <a class="flex flex-col items-center mt-5">
            <p class="uppercase mb-1 text-sm">Pago móvil</p>
            <i class="fa-solid fa-money-bill text-4xl"></i>
        </a>
        <button wire:click="goTo('menu')" class="flex flex-col items-center mt-5">
            <p class="uppercase mb-1 text-sm">Menú</p>
            <i class="fa-solid fa-utensils text-4xl"></i>
        </button>
        <a href="{{ route('promos') }}" class="flex flex-col items-center mt-5">
            <p class="uppercase mb-1 text-sm">Promociones</p>
            <i class="fa-solid fa-dollar-sign text-4xl"></i>
        </a>
        <a href="{{ route('contact') }}" class="flex flex-col items-center mt-5">
            <p class="uppercase mb-1 text-sm">Contáctanos</p>
            <i class="fa-solid fa-address-book text-4xl"></i>
        </a>
        <button class="flex flex-col items-center mt-5">
            <p class="uppercase mb-1 text-sm">Galería</p>
            <i class="fa-solid fa-image text-4xl"></i>
        </button>
        <button class="flex flex-col items-center mt-5">
            <p class="uppercase mb-1 text-sm">Código QR</p>
            <i class="fa-solid fa-qrcode text-4xl"></i>
        </button>
        <a href="{{ route('rate.create') }}" class="flex flex-col items-center mt-5">
            <p class="uppercase mb-1 text-sm">Calificanos</p>
            <i class="fa-solid fa-pen-to-square text-4xl"></i>
        </a>
        <a href="https://www.instagram.com/mariabigotespizzas/" target="_blank" class="flex flex-col items-center mt-5">
            <p class="uppercase mb-1 text-sm">Instagram</p>
            <i class="fa-brands fa-instagram text-4xl"></i>
        </a>
        <a href="https://api.whatsapp.com/send?phone=5213333682773" target="_blank"
            class="flex flex-col items-center mt-5">
            <p class="uppercase mb-1 text-sm">WhatsApp</p>
            <i class="fa-brands fa-whatsapp text-4xl"></i>
        </a>
        <a href="https://www.facebook.com/mariabigotespizzas" target="_blank" class="flex flex-col items-center mt-5">
            <p class="uppercase mb-1 text-sm">Facebook</p>
            <i class="fa-brands fa-facebook text-4xl"></i>
        </a>
        <a href="https://www.mariabigotes.com/" target="_blank" class="flex flex-col items-center mt-5">
            <p class="uppercase mb-1 text-sm">Página web</p>
            <i class="fa-solid fa-globe text-4xl"></i>
        </a>
        <a href="https://www.google.com.mx/maps/place/MARIA+BIGOTES+-PIZZAS+A+LA+LE%C3%91A/@20.624529,-103.414714,15z/data=!4m2!3m1!1s0x0:0x948a33a9a314aaa1?sa=X&ved=0ahUKEwiZtve569jaAhXxp1kKHSMOCLAQ_BIIhgEwDg"
            target="_blank" class="flex flex-col items-center mt-5">
            <p class="uppercase mb-1 text-sm">Ubicación</p>
            <i class="fa-solid fa-location-dot text-4xl"></i>
        </a>
    </div>
</div>
