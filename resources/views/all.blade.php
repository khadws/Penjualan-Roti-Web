<x-app-layout>
  @include('layouts.navigation')
    <div class="flex text-[25px] font-bold text-left mt-[6%] ml-[5%]">
      <h1>Semua Kue</h1> 
    </div>
    <style>
    .row-menu {
      flex-wrap:wrap;
      align-items:center;
    }
    .pilihan-card-menu {
      box-shadow: 0px 0px 0px 2px white;
    }
    .pilihan-card-menu img{
      box-shadow: 0px 0px 0px 3px black;
    }
    </style>
    <div class="flex justify-center px-[20px] py-[20px] row-menu">
      @foreach ($products as $product)
          <div class="bg-white rounded-[8px] m-[40px] w-[18%] pilihan-card-menu" 
              data-name="{{ $product->name }}" 
              data-price="{{ number_format($product->price, 2, ',', '.') }}" 
              data-description="{{ $product->description }}"
              data-main-image="{{ asset('storage/' . $product->image) }}" >
                <a href="{{ route('detail.show', $product->id) }}">
                  <div class="p-1 rounded-lg">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-[100%] rounded-lg" />
                  </div>
                  <h3 class="text-black text-left font-bold ml-[10px] pt-[10px] pr-[5px] text-[18px]">{{ $product->name }}</h3>
                  <p class="text-black ml-[10px] mb-[20px] font-semibold">Rp {{ number_format($product->price, 2, ',', '.') }}</p>
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
    @include('layouts.footer')
  </x-app-layout>
  