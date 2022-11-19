<div>
    <a href="{{ route('cart.show') }}" class="px-5 py-2 relative">
        @if ($items_number)
            <div
                class="rounded-full w-6 h-6 bg-blue-500
                text-white p-1 flex justify-center items-center
                  text-xs absolute top-0 right-0 border-2 border-white">
                {{ $items_number }}
            </div>
        @endif
        <i class="fas fa-shopping-cart text-2xl text-white"></i>
    </a>
</div>
