<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,600;1,700&display=swap" rel="stylesheet"/>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Admin Pengaturan</title>
</head>
<body>
    <div class="flex">
        <div class="nama-top w-full bg-[#F1C5A6] px-20 py-3 fixed top-0 left-80">
            <h1 class="text-[25px] font-semibold">Pengaturan Footer</h1>
        </div>
        @include('layouts.sideadmin')

        <div class="flex flex-col gap-10 my-[6%] px-[20px] pl-[25%] pr-[2%] w-full flex justify-center rounded-2xl">
            <div>
                @include('layouts.footer')
            </div>

            <form action="{{route ('admin.setting.update')}}" method="POST" class="w-full bg-[#F1C5A6] px-4 py-4 rounded-lg">
                @csrf

                <div class="form-group">
                    <label for="nama_toko" class="font-semibold">Nama Toko:</label>
                    <input type="text" class="form-control rounded-lg" id="nama_toko" name="nama_toko" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi_toko" class="font-semibold">Deskripsi Toko:</label>
                    <textarea class="form-control" id="deskripsi_toko" name="deskripsi_toko" required></textarea>
                </div>

                <div class="form-group">
                    <label for="email_toko" class="font-semibold">Email:</label>
                    <input type="text" class="form-control rounded-lg" id="email_toko" name="email_toko" required>
                </div>

                <div class="form-group">
                    <label for="nomor_toko" class="font-semibold">No.Telepon:</label>
                    <input type="number" class="form-control rounded-lg" id="nomor_toko" name="nomor_toko" required>
                </div>

                <div class="form-group">
                    <label for="alamat_toko" class="font-semibold">Alamat:</label>
                    <input type="text" class="form-control rounded-lg" id="alamat_toko" name="alamat_toko" required>
                </div>
                
                <div class="form-group">
                    <label for="kota" class="font-semibold">Kota:</label>
                    <input type="text" class="form-control rounded-lg" id="kota" name="kota" required>
                </div>
                <div class="form-group">
                    <label for="link_instagram" class="font-semibold">Instagram:</label>
                    <input type="text" class="form-control rounded-lg" id="link_instagram" name="link_instagram" required>
                </div>
                <div class="form-group">
                    <label for="link_youtube" class="font-semibold">Youtube:</label>
                    <input type="text" class="form-control rounded-lg" id="link_youtube" name="link_youtube" required>
                </div>
                <button type="submit" class="btn bg-[#5d4434] mt-10 text-white ">Simpan</button>
            </form>
        </div>
    </div>
</body>
</html>