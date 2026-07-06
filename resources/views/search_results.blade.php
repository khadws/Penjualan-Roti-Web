<x-app-layout>
    @include('layouts.navigation')
    <div class="mt-[6%]">
        <h1 class="font-semibold text-lg flex justify-center">Hasil Pencarian untuk "{{ $query }}"</h1>
        @if($products->isEmpty())
            <p class="font-semibold text-lg flex justify-center">Tidak ada produk yang ditemukan.</p>
        @else
            <div class="flex flex-wrap justify-center align-center">
                @foreach ($products as $product)
                    <div class="flex flex-col bg-[#F1C5A6] m-[30px] w-[16%] h-[342px] rounded-[8px]" 
                        data-name="{{ $product->name }}" 
                        data-price="{{ number_format($product->price, 2, ',', '.') }}" 
                        data-description="{{ $product->description }}"
                        data-main-image="{{ asset('storage/' . $product->image) }}" >
                        <a href="{{ route('detail.show', $product->id) }}">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="pilihan-card-img-kategori" />
                            <h3 class="pilihan-card-tittle-kategori">{{ $product->name }}</h3>
                            <p class="pilihan-card-harga-kategori">Rp {{ number_format($product->price, 2, ',', '.') }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
