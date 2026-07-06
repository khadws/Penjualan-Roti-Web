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
            <h1 class="text-[25px] font-semibold">Tambah Produk</h1>
        </div>
        @include('layouts.sideadmin')
        <div class="my-[6%] px-[20px] pl-[25%] pr-[2%] w-full flex justify-center rounded-2xl">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="w-full flex flex-col gap-3">
                    @csrf
                    
                    <div class="flex flex-col">
                        <label for="name" class="font-semibold">Nama Produk:</label>
                        <input type="text" class="bg-gray-200 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300" id="name" name="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="flex flex-col">
                        <label for="description" class="font-semibold">Deskripsi Produk:</label>
                        <textarea class="bg-gray-200 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300" id="description" name="description" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="flex flex-col">
                        <label for="price" class="font-semibold">Harga:</label>
                        <input type="number" class="bg-gray-200 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300" id="price" name="price" value="{{ old('price') }}" step="0.01" required>
                    </div>

                    <div class="flex flex-col">
                        <label for="stock" class="font-semibold">Stok:</label>
                        <input type="number" class="bg-gray-200 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300" id="stock" name="stock" value="{{ old('stock') }}" required>
                    </div>

                    <div class="flex flex-col">
                        <label for="image" class="font-semibold">Gambar Produk:</label>
                        <input type="file" class="bg-gray-200 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300" id="image" name="image" required>
                    </div>

                    <div class="flex justify-between gap-3 w-full">
                        <div class="flex flex-col w-full">
                            <label for="kategory" class="font-semibold">Kategory</label>
                            <select name="kategory" id="kategory" class="bg-gray-200 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300" >
                                <option value="cake">Cake</option>
                                <option value="roti">Breads</option>
                                <option value="donat">Donuts</option>   
                                <option value="rekomendasi">Rekomendasi</option>
                            </select>
                        </div>
                        <div class="w-1/2">
                            <button type="submit" class="w-full mt-6 bg-[#5d4434] text-white font-medium py-2 px-2 rounded-md transition duration-200 ease-in-out">Tambah Produk</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>