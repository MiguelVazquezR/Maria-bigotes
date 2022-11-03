<div>
  
      <a href="{{route('order-now')}}" class="shadow-md shadow-gray-600 border border-gray-500 w-11/12 mx-auto flex justify-center items-center text-xl rounded-lg border px-5 py-2 mt-3">
        <i class="fa-solid fa-motorcycle mr-4"></i>
        <span class="uppercase">Pide ahora</span>
      </a>
      <div class="grid grid-cols-3 gap-4 mt-6">
        <a class="flex flex-col items-center mt-5">
          <p class="uppercase mb-1 text-sm">Pago móvil</p>
          <i class="fa-solid fa-money-bill text-4xl"></i>
        </a>
        <a :href="route('order-now')" class="flex flex-col items-center mt-5">
          <p class="uppercase mb-1 text-sm">Menú</p>
          <i class="fa-solid fa-utensils text-4xl"></i>
        </a>
        <a href="{{route('promos')}}" class="flex flex-col items-center mt-5">
          <p class="uppercase mb-1 text-sm">Promociones</p>
          <i class="fa-solid fa-dollar-sign text-4xl"></i>
        </a>
        <a href="{{route('contact')}}" class="flex flex-col items-center mt-5">
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
        <button class="flex flex-col items-center mt-5">
          <p class="uppercase mb-1 text-sm">Calificanos</p>
          <i class="fa-solid fa-pen-to-square text-4xl"></i>
        </button>
        <button class="flex flex-col items-center mt-5">
          <p class="uppercase mb-1 text-sm">Instagram</p>
          <i class="fa-brands fa-instagram text-4xl"></i>
        </button>
        <button class="flex flex-col items-center mt-5">
          <p class="uppercase mb-1 text-sm">WhatsApp</p>
          <i class="fa-brands fa-whatsapp text-4xl"></i>
        </button>
        <button class="flex flex-col items-center mt-5">
          <p class="uppercase mb-1 text-sm">Facebook</p>
          <i class="fa-brands fa-facebook text-4xl"></i>
        </button>
        <button class="flex flex-col items-center mt-5">
          <p class="uppercase mb-1 text-sm">Página web</p>
          <i class="fa-solid fa-globe text-4xl"></i>
        </button>
        <button class="flex flex-col items-center mt-5">
          <p class="uppercase mb-1 text-sm">Ubicación</p>
          <i class="fa-solid fa-location-dot text-4xl"></i>
        </button>
      </div>
    </section>
</div>
