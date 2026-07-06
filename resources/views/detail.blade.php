<x-app-layout>
    @include('layouts.navigation')
    <main class="product-detail ">
        <div class="main-image-container ">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="main-product-image" id="productImage">
        </div>
        
        <div class="bg-[#6E472C] py-6 px-6 w-[100%] max-w-[650px] rounded-lg my-auto">
            <h1 id="productName" class="product-title">{{ $product->name }}</h1>
            <div class="price-container">
                <p id="productPrice">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            </div>
            <div class="bg-black description">
                <h1> Deskripsi </h1>
                <p id="productDescription">{{ $product->description }}</p>
            </div>

            {{-- quantity --}}
            <div class="quantity-container flex items-center gap-3 my-4">
                <button type="button" class="quantity-decrement px-3 py-1 bg-white text-black text-center rounded">-</button>
                <span class="quantity-value px-5">1</span>
                <button type="button" class="quantity-increment px-3 py-1 bg-white text-black text-center rounded">+</button>
            </div>

            <div class="button-container gap-8 items-center w-full mt-[60px]">
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="quantity" id="quantity-input" value="1">
                    <input type="hidden" id="selected_items" name="selected_items">
                    <button type="submit" class="bg-[#8B5E3C] buy-button w-full mr-[200px]">Masukkan Keranjang</button>
                </form>
            </div>
        </div>
    </main>
    @include('layouts.footer')
</x-app-layout>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const decrementButton = document.querySelector(".quantity-decrement");
        const incrementButton = document.querySelector(".quantity-increment");
        const quantityValue = document.querySelector(".quantity-value");
        const quantityInput = document.getElementById("quantity-input");

        decrementButton.addEventListener("click", function() {
            let quantity = parseInt(quantityValue.textContent);
            if (quantity > 1) {
                quantity--;
                quantityValue.textContent = quantity;
                quantityInput.value = quantity;
            }
        });

        incrementButton.addEventListener("click", function() {
            let quantity = parseInt(quantityValue.textContent);
            quantity++;
            quantityValue.textContent = quantity;
            quantityInput.value = quantity;
        });
    });
</script>