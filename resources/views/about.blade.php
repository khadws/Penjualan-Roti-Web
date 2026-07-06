<x-app-layout>
  <body>
    @include('layouts.navigation')
    <div class="about">
      <h2>Tentang Kami</h2>

      <div class="row-about">
        <p class="isi-1">
          <span>Delicious Cake.</span>
          Delicious Cake adalah toko Roti yang berada di Jl. Simo Pomahan Baru
          19 No. 7. RT 14 RW 05, Kelurahan Simomulyo, Kecamatan Sukomanunggal,
          Kota. Surabaya, Jawa Timur, Indonesia. Delicious Cake adalah salah satu pelopor
          bisnis roti modern di Surabaya. Didirikan pada tahun 2026. Produk kami
          sehat, bergizi dan terjangkau oleh semua orang.
        </p>
        <p class="isi-2">
          <span>Visi dan Misi. </span>Visi kami adalah menjadi toko kue
          terkemuka yang dikenal akan kualitas dan kelezatan produknya, serta
          memberikan pengalaman manis yang tak terlupakan bagi setiap pelanggan.
          Misi kami adalah Menyediakan Kue Berkualitas, Menggunakan bahan-bahan
          terbaik dan resep yang teruji untuk menghasilkan kue yang lezat dan
          berkualitas tinggi. Inovasi Rasa dan Desain Selalu berinovasi dengan
          menciptakan rasa dan desain kue yang unik, sesuai dengan tren dan
          permintaan pelanggan.
        </p>
        <img src="../img/cake/3.jpeg" alt="kue" class="about-img" />
        <img src="../img/cake/3.jpeg" alt="kue" class="about-img-1" />
      </div>
    </div>
    <script>
      feather.replace();
    </script>
    <script src="js/script.js"></script>
    @include('layouts.footer')
  </body>
</x-app-layout>
