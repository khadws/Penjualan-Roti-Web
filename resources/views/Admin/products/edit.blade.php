<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,600;1,700&display=swap"
        rel="stylesheet" />

    <title>Edit Product</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script src="https://unpkg.com/feather-icons"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="h-fit">
    @include('layouts.navbaradmin')
    <div class="flex">
        <div class="nama-top w-full bg-[#F1C5A6] px-20 py-3 fixed top-0 left-80">
            <h1 class="text-[25px] font-semibold">Edit Produk</h1>
        </div>
        @include('layouts.sideadmin')
        <div class="my-[2%] py-[30px] pl-[25%] pr-[2%] w-full h-screen">
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                enctype="multipart/form-data" class="space-y-6 px-6 mb-5">
                @csrf
                @method('PUT')
                {{-- nama --}}
                <div class="flex flex-col">
                    <label for="name" class="mb-2 text-lg font-semibold">Nama Produk:</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}"
                        class="bg-gray-200 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                        placeholder="Enter product name">
                </div>

                {{-- Deskripsi --}}
                <div class="flex flex-col">
                    <label for="description" class="mb-2 text-lg font-semibold">Deskripsi Produk:</label>
                    <input type="text" id="description" name="description"
                        value="{{ old('description', $product->description) }}"
                        class="bg-gray-200 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300">
                </div>

                {{-- harga --}}
                <div class="flex flex-col">
                    <label for="price" class="mb-2 text-lg font-semibold">Harga:</label>
                    <input type="number" id="price" name="price" min="0"
                        value="{{ old('price', $product->price) }}"
                        class="bg-gray-200 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                        placeholder="Enter product price">
                </div>

                {{-- harga --}}
                <div class="flex flex-col">
                    <label for="stock" class="mb-2 text-lg font-semibold">Stok:</label>
                    <input type="number" id="stock" name="stock" min="0"
                        value="{{ old('stock', $product->stock) }}"
                        class="bg-gray-200 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                        placeholder="Enter product stock">
                </div>

                {{-- image --}}
                <div class="flex flex-col">
                    <label for="image" class="font-semibold">Gambar Produk:</label>
                    <input type="file" id="image" name="image"
                        class="w-full bg-gray-200 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300">
                </div>
                <div class="flex justify-between gap-12">
                    <div class="flex flex-col w-full">
                        <label for="kategory" class="font-semibold">Kategory</label>
                        <select name="kategory" id="kategory"
                            class="bg-gray-200 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300">
                            <option value="cake">Cake</option>
                            <option value="roti">Breads</option>
                            <option value="donat">Donuts</option>
                            <option value="rekomendasi">Rekomendasi</option>
                        </select>

                        <button type="submit"
                            class="w-full bg-[#5d4434] text-white font-medium py-2 px-2 my-6 rounded-md transition duration-200 ease-in-out">
                            Update
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</body>
