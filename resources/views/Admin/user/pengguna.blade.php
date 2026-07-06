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
                <h1 class="text-[25px] font-semibold">Kelola Pengguna</h1>
            </div>
            @include('layouts.sideadmin')
            <div class="flex flex-col pl-[23%] w-full">
                <div class="mt-[70px] py-[1.5%] pr-[2%] pl-[2%] w-full">
                    <table class="w-full shadow rounded-lg font-md">
                        <thead>
                            <tr class="text-[14px]">
                                <th class="border p-2">No.</th>
                                <th class="border p-2">Username</th>
                                <th class="border p-2">Email</th>
                                <th class="border p-2">Tanggal Pendaftaran</th>
                                <th class="border p-2">Tanggal Pembaruan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-[#F1C5A6] text-[14px]">
                            @foreach ($user as $index => $user)
                                <tr class="text-center">
                                    <td class="border p-2">{{$index +1}}</td>
                                    <td class="border p-2">{{ $user->name}}</td>
                                    <td class="border p-2">{{ $user->email}}</td>
                                    <td class="border p-2">{{ $user->created_at->format('d-m-Y H:i')}}</td>
                                    <td class="border p-2 flex gap-3 justify-center items-center">{{ $user->updated_at->format('d-m-Y H:i')}}<form action="{{ route('admin.user.pengguna.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-success bg-red-400 hover:bg-red-500 p-[5px] rounded-[5px]">Hapus</button>
                                    </form>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
    </html>