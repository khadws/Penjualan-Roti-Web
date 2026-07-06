<x-app-layout>
  <body>
    @include('layouts.navigation')
    <!-- hero section start -->
    <section class="hero" id="home">
      <h1>Delicious <span>Cake</span>.</h1>
      <p>
        Rasakan kelezatan luar biasa dari kue kami, dibuat dengan bahan terbaik
        dan penuh cinta.
      </p>
      <a href="kategori">Beli Sekarang </a>
    </section>

    <section id="rekom" class="rekom">
      <div class="flex text-[30px] text-center justify-center pt-[3%]">
        <h1 class="font-semibold">Rekomendasi Untuk Anda</h1>
      </div>
      <div class="flex justify-center px-[20px] py-[20px] row-menu">
        @foreach ($products as $product)
            <div class="bg-white rounded-[8px] m-[40px] w-[18%] pilihan-card-menu" 
                data-name="{{ $product->name }}" 
                data-price="{{ number_format($product->price, 2, ',', '.') }}" 
                data-description="{{ $product->description }}"
                data-main-image="{{ asset('storage/' . $product->image) }}" >
                  <a href="{{ route('detail.show', $product->id) }}">
                    <div class="p-2 rounded-lg">
                      <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-[100%] pilihan-card-img-menu" />
                    </div>
                    <h3 class="text-black text-left font-bold ml-[10px] pt-[10px] pr-[5px] text-[15px]">{{ $product->name }}</h3>
                    <p class="text-black ml-[10px] mb-[20px] font-semibold">Rp {{ number_format($product->price, 2, ',', '.') }}</p>
                  </a>
            </div>
        @endforeach
      </div>
    </section>
    
    <script>
      feather.replace();
      
      const menuGaris = document.querySelector("#menu-garis");
      const sidebar = document.querySelector("#sidebar");
      menuGaris.onclick = () => {
        sidebar.classList.toggle("active");
      };
    </script>
    <script src="js/script.js"></script>
    @include('layouts.footer')
  </body>
</x-app-layout>
