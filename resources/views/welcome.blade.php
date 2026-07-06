<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Landing</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <!-- Feather icon -->
  <script src="https://unpkg.com/feather-icons"></script>

    <!-- My Style -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <!-- Navbar Awal -->
    @include('layouts.navnolog')
    <!-- Navbar akhir -->

    <!-- hero section start -->
    <section class="hero" id="home">
      <h1>Delicious <span>Cake</span>.</h1>
      <p>
        Rasakan kelezatan luar biasa dari kue kami, dibuat dengan bahan terbaik
        dan penuh cinta.
      </p>
    </section>
    <!-- hero section end -->

    {{-- rekomendasi section --}}
    
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
</html>
