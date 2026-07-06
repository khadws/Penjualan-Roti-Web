<x-app-layout>
    @include('layouts.navigation')
    <div class="container mx-auto my-20 px-20">
        @if (session('success'))
            <div class="alert alert-success mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (!empty($cart) && count($cart) > 0)
            <div class="overflow-x-auto rounded-lg">
                <div class="w-full shadow-lg rounded-lg space-y-3">
                    <!-- Header -->
                    <div class="bg-[#F1C5A6] text-black grid grid-cols-5 px-4 py-2">
                        <div class="font-bold">Image</div>
                        <div class="font-bold">Nama Kue</div>
                        <div class="font-bold">Jumlah</div>
                        <div class="font-bold">Harga</div>
                        <div class="font-bold">Total</div>
                    </div>

                    <!-- Body -->
                    <form action="{{ route('pay') }}" method="POST">
                        @csrf
                        @foreach ($cart as $item)
                            <div class="product-row bg-[#F1C5A6] text-black grid grid-cols-5 items-center py-4"
                                data-id="{{ $item['id'] }}">
                                <!-- Image -->
                                <div class="flex justify-center items-center w-full">
                                    <div class="w-[80px] flex justify-center">
                                        <input type="checkbox" class="product-checkbox" value="{{ $item['id'] }}"
                                            data-price="{{ $item['price'] }}" data-quantity="{{ $item['quantity'] }}">
                                    </div>
                                    <div class="w-1/2">
                                        <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}"
                                            class="w-20 rounded-md">
                                    </div>
                                </div>
                                <!-- Nama Kue -->
                                <div class="px-4">{{ $item['name'] }}</div>
                                <!-- Jumlah -->
                                <div>
                                    <button type="button"
                                        class="quantity-decrement px-2 py-1 bg-[#E3AC84] text-black rounded"
                                        data-id="{{ $item['id'] }}">
                                        -
                                    </button>
                                    <span class="quantity-value px-4">{{ $item['quantity'] }}</span>
                                    <button type="button"
                                        class="quantity-increment px-2 py-1 bg-[#E3AC84] text-black rounded"
                                        data-id="{{ $item['id'] }}">
                                        +
                                    </button>
                                </div>
                                <!-- Harga -->
                                <div class="px-4">Rp {{ number_format($item['price'], 0, ',', '.') }}</div>
                                <!-- Total -->
                                <div class="px-4 product-total">Rp
                                    {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</div>
                            </div>
                        @endforeach

                        <!-- Bagian Aksi -->
                        <div class="flex justify-end items-center gap-5 mt-4">

                            <input type="hidden" id="selected_items" name="selected_items">
                            <button id="delete-selected" type="button"
                                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 w-[150px]"
                                disabled>Hapus</button>

                            <button type="submit" id="pay-button"
                                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 w-[150px]"
                                disabled>CheckOut</button>

                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="flex items-center justify-center">
                <p class="text-center text-gray-700">Your cart is empty!</p>
            </div>
        @endif
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const checkboxes = document.querySelectorAll(".product-checkbox");
            const deleteButton = document.getElementById("delete-selected");
            const payButton = document.getElementById("pay-button");
            const selectedItemsInput = document.getElementById("selected_items");

            // Menghitung total harga dari produk yang dipilih
            function updateButtonsState() {
                const selectedProductIds = Array.from(checkboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.value);

                deleteButton.disabled = selectedProductIds.length === 0;
                payButton.disabled = selectedProductIds.length === 0;
                selectedItemsInput.value = selectedProductIds.join(",");
            }

            // Tambahkan event listener pada setiap checkbox
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener("change", updateButtonsState);
            });

            // Mengatur event untuk tombol "Hapus Produk Terpilih"
            deleteButton.addEventListener("click", function() {
                const selectedProductIds = Array.from(checkboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.value);

                if (selectedProductIds.length > 0) {
                    fetch("/cart/delete-selected", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify({ product_ids: selectedProductIds })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                selectedProductIds.forEach(id => {
                                    const row = document.querySelector(`.product-row[data-id="${id}"]`);
                                    if (row) row.remove();
                                });

                                updateButtonsState(); // Update tombol setelah produk dihapus
                            } else {
                                alert("Gagal menghapus produk. Silakan coba lagi.");
                            }
                        });

                }
            });

            payButton.addEventListener("click", function(event) {
                const selectedProductIds = Array.from(checkboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.value);

                if (selectedProductIds.length === 0) {
                    event.preventDefault(); // Cegah submit jika tidak ada produk terpilih
                    alert("Pilih setidaknya satu produk untuk checkout.");
                } else {
                    selectedItemsInput.value = JSON.stringify(selectedProductIds);
                }
            });

            // Event untuk tombol tambah/kurang kuantitas
            const quantityRows = document.querySelectorAll('.product-row');
            quantityRows.forEach(row => {
                const decrementButton = row.querySelector(".quantity-decrement");
                const incrementButton = row.querySelector(".quantity-increment");
                const quantityValue = row.querySelector(".quantity-value");
                const price = parseFloat(row.querySelector(".product-checkbox").getAttribute("data-price"));

                // Fungsi untuk memperbarui kuantitas
                const updateQuantity = (quantity) => {
                    fetch(`/cart/update/${row.getAttribute("data-id")}`, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                                    .content
                            },
                            body: JSON.stringify({
                                quantity
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                quantityValue.textContent = quantity;
                                const totalPrice = price * quantity;
                                row.querySelector(".product-total").textContent = "Rp " + totalPrice
                                    .toLocaleString("id-ID");
                                updateButtonsState();

                                // Kirim data yang diperbarui ke session melalui AJAX
                                fetch("/cart/update-session", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/json",
                                            "X-CSRF-TOKEN": document.querySelector(
                                                'meta[name="csrf-token"]').content
                                        },
                                        body: JSON.stringify({
                                            id: row.getAttribute("data-id"),
                                            quantity: quantity
                                        })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (!data.success) {
                                            alert("Gagal memperbarui data di sesi.");
                                        }
                                    });
                            } else {
                                alert("Gagal memperbarui kuantitas.");
                            }
                        });
                };

                decrementButton.addEventListener("click", function() {
                    let quantity = parseInt(quantityValue.textContent);
                    if (quantity > 1) {
                        updateQuantity(--quantity);
                    }
                });

                incrementButton.addEventListener("click", function() {
                    let quantity = parseInt(quantityValue.textContent);
                    updateQuantity(++quantity);
                });
            });
        });
    </script>
</x-app-layout>
