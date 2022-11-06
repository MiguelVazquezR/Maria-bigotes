<div>
    @forelse ($rates as $rate)
        <section class="relative bg-white py-6 px-6 rounded-3xl w-4/5 mx-auto mt-8 mb-4 shadow-xl">
            <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-blue-500 left-4 -top-6">
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="mt-2">
                <p class="text-xl font-semibold my-2">{{$rate->name . ' ' . $rate->last_names}}</p>
                <div class="flex items-center space-x-2 text-gray-400 text-sm border-b pb-2 mb-2"  title="Correo electrónico">
                    <i class="fa-regular fa-envelope"></i>
                    <p>{{ $rate->email ?? '--' }}</p>
                </div>
                <div class="flex items-center space-x-2 text-gray-400 text-sm" title="Comentarios">
                    <i class="fa-regular fa-comment"></i>
                    <p>{{ $rate->comments }}</p>
                </div>
                <div class="flex space-x-2 text-gray-400 text-sm my-3" title="Creado el">
                    <i class="fa-solid fa-calendar-days"></i>
                    <p>{{ $rate->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </section>
    @empty
        <p class="text-gray-500 text-center text-sm">No hay calificaciones para mostrar</p>        
    @endforelse

    <div class="px-8 py-2">
        {{ $rates->links() }}
    </div>
</div>
