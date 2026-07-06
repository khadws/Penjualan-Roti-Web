<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,600;1,700&display=swap" rel="stylesheet"/>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <!-- Feather icon -->
        <script src="https://unpkg.com/feather-icons"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{asset('css/admin.css')}}">
        

</head>
<body class="h-fit">
        @include('layouts.navbaradmin')
    <div class="flex">
        <div class="nama-top w-full bg-[#F1C5A6] px-20 py-3 fixed top-0 left-80">
            <h1 class="text-[25px] font-semibold">Manajemen Produk</h1>
        </div>
        @include('layouts.sideadmin')
        <div class="mt-[5%] py-7 pl-[25%] pr-[2%] w-full">
            <div class="bg-[#F1C5A6] px-6 py-4 rounded-lg">
                
                <div class="flex justify-between mb-4">
                    <h1 class="text-[24px] font-semibold flex items-center px-3 py-2"> Kelola Produk </h1>
                    <a class="flex items-center py-[10px] px-[20px] text-[16px] font-bold text-black bg-[#E3AC84] rounded-[5px]" href="{{ route('admin.products.create') }}">Tambah Produk</a>
                </div>
                @if($products->isEmpty())
                    <div class="text-center py-5">
                        <p class="text-gray-600 font-semibold">Tidak Ada Produk, Tambahkan Produk!</p>
                    </div>
                @else
                    <ul class="product-list mt-3">
                        @foreach($products as $product)
                            <div class="flex justify-between bg-[#E3AC84] p-3 mb-3 rounded-lg">
                                <div class="flex items-center">
                                    <span class="rounded-lg overflow-clip w-20 h-20"> 
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                    </span>
                                    <div class="flex flex-col">
                                        <span class="font-semibold w-48 ml-5">{{ $product->name }}</span>
                                        <span class="ml-5">{{ $product->description }}</span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="product-price">Rp {{ number_format($product->price, 2, ',', '.') }}</span>
                                    
                                    <div class="product-actions">
                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn-edit">Edit</a>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </ul>
                </div>
        </div> 
    </div>
</body>
</html>