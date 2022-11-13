<div>
    <div class="flex justify-between mt-5">
        <span class="uppercase">Pide Ahora</span>
        <i class="fa-solid fa-cart-plus text-2xl"></i>
    </div>

    <section class="flex flex-col mt-7 space-y-2">
        @foreach ($categories as $category)
            <select wire:model="selected_product"
                class="border border-gray-400 rounded-md shadow-md uppercase outline-none"
                onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                <option selected value="">--
                {{ $category->name }} --</option>
                @foreach ($category->products as $product)
                    <option value="{{ route('selected-product', $product->id)}}">{{ $product->name }}</option>
                @endforeach
            </select>
        @endforeach
    </section>

</div>
