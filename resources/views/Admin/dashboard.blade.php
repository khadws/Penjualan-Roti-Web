<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,600;1,700&display=swap" rel="stylesheet"/>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <!-- Feather icon -->
        <script src="https://unpkg.com/feather-icons"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <title>Admin Dashboard</title>
</head>
<body>
    @include('layouts.navbaradmin')
    <div class="flex ">
        <div class="nama-top w-full bg-[#F1C5A6] px-20 py-3 fixed top-0 left-80">
            <h1 class="text-[25px] font-semibold">Dashboard</h1>
        </div>
        @include('layouts.sideadmin')
        <div class="main-content mt-[5%] py-[20px] pl-[25%] pr-[2%] w-full h-fit mt-9">
            <section class="cards">
                <div class="card">
                    <h3>Total Produk</h3>
                    <p>{{$productCount}}</p>
                </div>
                <div class="card">
                    <h3>Total Pesanan</h3>
                    <p>{{$orderCount}}</p>
                </div>
                <div class="card">
                    <h3>Total Pengguna</h3>
                    <p>{{$userCount}}</p>
                </div>
            </section>
        </div>
    </div>

    <script> 
        feather.replace();
    </script>
</body>
</html>