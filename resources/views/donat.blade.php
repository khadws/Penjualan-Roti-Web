<x-app-layout>
  @include('layouts.navigation')
  <div class="text-kategori">
    <h1>Donat</h1>
  </div>
  <style>
    .pilihan-card-menu img {
    border-radius: 8px 8px 0 0;
  }
  .row-menu {
    flex-wrap:wrap;
    align-items:center;
  }
  .pilihan-card-menu {
    box-shadow: 0px 2px 4px #323232;
  }
  </style>
  <div class="flex justify-center px-[20px] py-[20px] row-menu">
    @foreach ($products as $product)
        <div class="bg-[#F1C5A6] rounded-[8px] m-[40px] w-[15%] pilihan-card-menu" 
            data-name="{{ $product->name }}" 
            data-price="{{ number_format($product->price, 2, ',', '.') }}" 
            data-description="{{ $product->description }}"
            data-main-image="{{ asset('storage/' . $product->image) }}" >
              <a href="{{ route('detail.show', $product->id) }}">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-[100%] pilihan-card-img-menu" />
                <h3 class="text-black text-left font-bold ml-[10px] pt-[10px] pr-[5px] text-[15px]">{{ $product->name }}</h3>
                <p class="text-black ml-[10px] mb-[20px] font-semibold">Rp {{ number_format($product->price, 2, ',', '.') }}</p>
              </a>
        </div>
    @endforeach
  </div>
  @include('layouts.footer')
</x-app-layout>
