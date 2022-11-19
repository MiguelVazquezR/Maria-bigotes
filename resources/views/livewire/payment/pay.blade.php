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
        @livewire('payment.process-payment', ['total' => $total])
    @endif
</div>