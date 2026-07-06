<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk - Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,600;1,700&display=swap" rel="stylesheet"/>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <!-- Feather icon -->
        <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navbaradmin')
    
    <div class="container">
        <nav class="sidebar">
            
            <div class="sidebar-side">
                <a href="dashboard" class="bg-[#F1C5A6] ">Dashboard</a>   
                <a href="products" class="bg-[#E3AC84]">Produk</a>
                <a href="orders" class="bg-[#F1C5A6]">Pesanan</a> 
                <a href="users" class="bg-[#F1C5A6]">Pengguna</a>
                </div>
        </nav>
    </div>
    <div class="main-contentt">
        <h1 class="text-add font-semibold">Daftar Produk</h1>
    
        <a class="btn-add" href="{{ route('admin.products.create') }}">Tambah Produk</a>
    
        <ul class="product-list mt-3">
            @foreach($products as $product)
                <li class="product-item">
                    <div class="flex gap-3 items-center">
                        <img src="{{asset('storage/' . $product->image)}}" alt="" class="w-20 h-20 rounded-md ">
                        <span class="product-name">{{ $product->name }}</span>
                    </div>
                    
                    <div class="product-actions">
                        <span class="product-price">Rp {{ $product->price }}</span>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <script> 
        feather.replace();
    </script>    
</body>
</html>
