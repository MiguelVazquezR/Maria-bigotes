<div>
    <h1 class="text-2xl font-bold text-center">PROMOCIONES</h1>

    <section class="bg-white dark:bg-gray-900">
        @forelse ($promos as $promo)
            <div class="container px-6 py-10 mx-auto">
                <img class="object-cover w-full h-56 rounded-lg lg:w-64"
                    src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                    alt="">

                <div class="flex flex-col justify-between py-3 lg:mx-6">
                    <h1 class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">{{ $promo->title }}
                    </h1>
                    <p class="text-sm text-gray-500">{{ $promo->description }}</p>
                    <small
                        class="text-sm text-gray-500 dark:text-gray-300">{{ $promo->created_at->isoFormat('DD MMMM, YYYY - hh:mm a') }}</small>
                </div>
            </div>
        @empty
            <p class="text-gray-500 text-center text-sm mt-6">No hay promociones para mostrar</p>
        @endforelse
    </section>

    {{ $promos->links() }}
</div>
