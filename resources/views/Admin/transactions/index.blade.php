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
                <h1 class="text-[25px] font-semibold">Kelola Transaksi</h1>
            </div>
            @include('layouts.sideadmin')
            <div class="flex flex-col pl-[23%] w-full">
                <div class=" mt-[70px] py-[1.5%] pr-[2%] pl-[2%] w-full">
                        <table class="w-full shadow rounded-lg font-md">
                            <thead>
                                <tr class="text-center text-[14px] font-semibold">
                                    <th class="border p-2">No.</th>
                                    <th class="border p-2">Nama Produk</th>
                                    <th class="border p-2">Nama penerima</th>
                                    <th class="border p-2">Alamat</th>
                                    <th class="border p-2">No.Telp</th>
                                    <th class="border p-2">Harga</th>
                                    <th class="border p-2">Bukti Pembayaran</th>
                                    <th class="border p-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-[#F1C5A6]">
                                @foreach ($transactions as $index => $order)
                                    <tr class="text-center text-[14px]">
                                        <td class="border p-2 sm:p-3 md:p-4">{{ $index +1 }}</td>
                                        <td class="border p-2 sm:p-3 md:p-4">{{ $order->product->name }}</td> <!-- Menampilkan nama produk -->
                                        <td class="border p-2 sm:p-3 md:p-4">{{ $order->recipient_name}}</td>
                                        <td class="border p-2 sm:p-3 md:p-4">{{ $order->recipient_address}}</td>
                                        <td class="border p-2 sm:p-3 md:p-4">{{ $order->recipient_phone}}</td>
                                        <td class="border p-2 sm:p-3 md:p-4">Rp{{ number_format($order->amount, 2, ',', '.') }}</td>
                                        <td class="border p-2 sm:p-3 md:p-4">
                                            @if($order->payment_proof)
                                                <a href="{{ Storage::url($order->payment_proof) }}" target="_blank" class="hover:text-gray-600">Lihat Bukti</a>
                                            @else
                                                Belum Diupload
                                            @endif
                                        </td>
                                        <td class="border p-2 sm:p-3 md:p-4 h-full flex justify-center gap-2">
                                            @if($order->status == 'shipped')
                                                <span class="text-black font-semibold">Menunggu</span>
                                            @elseif($order->status == 'received')
                                                <span class="text-black font-semibold">Done</span>
                                            @elseif($order->status == 'pending')
                                                <form action="{{ route('admin.transactions.updateStatus', ['id' => $order->id, 'status' => 'approved']) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success bg-green-400 hover:bg-green-500 p-[5px] rounded-[5px]">Approve</button>
                                                </form>
                                                <form action="{{ route('admin.transactions.updateStatus', ['id' => $order->id, 'status' => 'rejected']) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger bg-red-400 hover:bg-red-500 p-[5px] rounded-[5px]">Reject</button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.transactions.updateStatus', ['id' => $order->id, 'status' => 'shipped']) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn bg-blue-400 hover:bg-blue-500 text-md p-[5px] rounded-[5px] w-full">Kirim</button> 
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    <div class="container mx-auto mt-3">
                        @if (session('success'))
                            <p class="text-green-600 bg-green-100 p-4 rounded-lg mb-4">{{ session('success') }}</p>
                        @elseif (session('error'))
                            <p class="text-red-600 bg-red-100 p-4 rounded-lg mb-4">{{ session('error') }}</p>
                        @endif
                    </div>
                </div>
            </dv>
        </div>
        
        
    </body>
    </html>
