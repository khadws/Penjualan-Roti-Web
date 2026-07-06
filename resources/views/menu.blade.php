<x-app-layout>
    @include('layouts.navigation')
  <div class="text">
    <h1>Cake</h1> {{-- Halaman khusus untuk kategori roti --}}
  </div>

  <div class="row-menu">
    @foreach ($products as $product)
        <div class="pilihan-card-menu" 
            data-name="{{ $product->name }}" 
            data-price="{{ number_format($product->price, 2, ',', '.') }}" 
            data-description="{{ $product->description }}"
            data-main-image="{{ asset('storage/' . $product->image) }}" >
            <a href="detail" class="card">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="pilihan-card-img-menu" />
                <h3 class="pilihan-card-tittle-menu">{{ $product->name }}</h3>
                <p class="pilihan-card-harga-menu">Rp {{ number_format($product->price, 2, ',', '.') }}</p>
            </a>
        </div>
    @endforeach
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil semua tombol beli yang berupa <a>
        const buyLinks = document.querySelectorAll('.card');
    
        // Tambahkan event listener untuk setiap tombol <a>
        buyLinks.forEach(link => {
            link.addEventListener('click', function (event) {
                // Hentikan aksi default link
                event.preventDefault();
    
                // Ambil elemen pilihan-card-menu terdekat
                const productCard = link.closest('.pilihan-card-menu');
    
                // Ambil data dari atribut data di product-card
                const productName = productCard.dataset.name;
                const productPrice = productCard.dataset.price;
                const productDescription = productCard.dataset.description;
                const mainImage = productCard.dataset.mainImage;
    
                // Buat query string untuk redirect
                const queryString = `?name=${encodeURIComponent(productName)}&price=${encodeURIComponent(productPrice)}&description=${encodeURIComponent(productDescription)}&mainImage=${encodeURIComponent(mainImage)}`;
    
                // Set href link dan redirect ke halaman detail produk dengan query string
                window.location.href = `/detail${queryString}`;
            });
        });
    });
    </script>
    
    <script src="js/script.js"></script>
    @include('layouts.footer')
</x-app-layout>
    