<div>
    <h1 class="font-bold text-gray-700 text-xl my-4 text-center">Tabla de órdenes</h1>
    <div class="w-11/12 mx-auto overflow-x-auto">
        <div class="inline-block min-w-full py-2 align-middle">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-black">
                        <tr class="text-white">
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold sm:pl-6">#</th>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold">
                                Cliente
                            </th>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold">
                                Creada el
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">Correo
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold">
                                Status</th>
                            {{-- <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                <span class="sr-only">Despachado</span>
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse ($orders as $order)
                            <tr wire:click="show({{$order}})" class="cursor-pointer hover:bg-gray-200">
                                <td
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 sm:pl-6">
                                    {{ $order->id }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $order->name }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $order->created_at->isoFormat('DD MMM, YYYY | hh:mm a') }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm">
                                    {{ $order->email }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-lg">
                                    <span class="flex justify-center">
                                        @if ($order->shipped_at)
                                            <i class="fa-solid fa-circle-check text-green-500"
                                                title="No despachado"></i>
                                        @else
                                            <i class="fa-solid fa-circle-xmark text-red-500" title="Despachado"></i>
                                        @endif
                                    </span>
                                </td>
                                {{-- <td class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
    
                                    </td> --}}
                            </tr>
                        @empty
                            <p class="my-4 text-sm text-gray-500 text-center">No hay órdenes para mostrar</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
