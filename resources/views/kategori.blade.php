<x-app-layout>
  <body>
    @include('layouts.navigation')
    <!-- Card -->
    <div class="text-kategori">
      <h1>Kategori</h1>
    </div>
      <div class="row-kategori">
        <div class="pilihan-card-kategori">
          <a href="roti">
          <img src="img/roti/kategori-roti.jpg" alt="Cherry" class="pilihan-card-img-kategori" />
          <h3 class="pilihan-card-tittle-kategori">Breads</h3>
          </a>
        </div>
        <div class="pilihan-card-kategori">
          <a href="cake">
          <img src="img/cake/kategori-cake.jpg" alt="Cherry" class="pilihan-card-img-kategori" />
          <h3 class="pilihan-card-tittle-kategori">Cake</h3>
          </a>
        </div>
        <div class="pilihan-card-kategori">
          <a href="donat">
          <img src="img/donat/kategori-donut.jpg" alt="Cherry" class="pilihan-card-img-kategori" />
          <h3 class="pilihan-card-tittle-kategori">Donut</h3>
          </a>
        </div>
      </div>
    <script>
      feather.replace();
    </script>
    <script src="js/script.js"></script>
    @include('layouts.footer')
  </body>
</x-app-layout>
