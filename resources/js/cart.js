Livewire.on('addToCart', (product_id, quantity, notes) => {
    let cart = JSON.parse(localStorage.getItem('m_b_cart')) ?? [];
    cart.push({
        product_id: product_id,
        quantity: quantity,
        notes: notes,
    });
    let cart_to_JSON = JSON.stringify(cart);
    localStorage.setItem('m_b_cart', cart_to_JSON);
    Livewire.emit('getCartItemsNumber');
});

Livewire.on('getCartItemsNumber', () => {
    let cart = JSON.parse(localStorage.getItem('m_b_cart')) ?? [];
    Livewire.emitTo('cart.cart', 'syncCartItemsNumber', cart.length);
});

Livewire.on('getCartItems', (emit_to) => {
    let cart = JSON.parse(localStorage.getItem('m_b_cart')) ?? [];
    Livewire.emitTo(emit_to, 'syncCartItems', cart);
});

Livewire.on('updateCartItem', (quantity, notes, index) => {
    let cart = JSON.parse(localStorage.getItem('m_b_cart')) ?? [];
    cart[index].quantity = quantity;
    cart[index].notes = notes;
    let cart_to_JSON = JSON.stringify(cart);
    localStorage.setItem('m_b_cart', cart_to_JSON);
});