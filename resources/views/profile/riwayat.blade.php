<x-app-layout>
    @include('layouts.navigation')
    <div class="container-profile">
        @include('layouts.sidebar')
        <div class="w-[300%]">
            <div class="tabs bg-[#F1C5A6] justify-center my-auto rounded-[3px] flex gap-[30px] py-[6px]">
                <p class=" text-center text-[17px] font-semibold w-full">Riwayat Pemesanan</p>
            </div>
            <div class="flex flex-col w-full my-2 justify-center gap-4">
                    {{-- <table class="w-full shadow rounded-lg h-fit">
                        <thead>
                            <tr>
                                <th class="border p-2">No.</th>
                                <th class="border p-2">Produk</th>
                                <th class="border p-2">Jumlah</th>
                                <th class="border p-2">Harga</th>
                                <th class="border p-2">Tanggal Pesanan</th>
                                <th class="border p-2">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-[#F1C5A6]">
                            @foreach($orders as $index => $order)
                                <tr class="text-center">
                                    <td class="border p-2">{{ $index + 1 }}</td>
                                    <td class="border p-2 flex justify-center items-center gap-8">
                                        <img src="{{ $order->product ? asset('storage/' . $order->product->image) : asset('default-image.jpg') }}" 
                                            alt="{{ $order->product->name ?? 'Produk tidak ditemukan' }}" 
                                            class="w-[70px] rounded-md">
                                            <span>{{ $order->product->name }}</span>
                                    </td>
                                    <td class="border p-2">{{ $order['quantity'] }}</td>
                                    <td class="border p-2">Rp {{ number_format($order['amount'], 0, ',', '.') }}</td>
                                    <td class="border p-2">{{ $order->created_at->format('d-m-Y H:i')}}
                                    </td>
                                    <td class="border p-2">
                                        <span class="text-blue-500 font-semibold">Selesai</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                <div class="w-full p-2 bg-[#F1C5A6]">
                    @foreach($orders as $index => $order)
                    <div class="flex justify-between bg-[#E3AC84] px-5 py-3 mb-3 rounded-lg">
                        <div class=" flex gap-4">
                            <div class="flex items-center p-2 ml-3">
                                <p class="p-2">{{ $index + 1 }}</p>
                            </div>
                            <div class="flex items-center">
                                <span class="rounded-lg overflow-clip w-20 h-20"> 
                                    <img src="{{ asset('storage/' . $order->product->image) }}" alt="{{ $order->product->name }}">
                                </span>
                                <div class="flex flex-col">
                                    <span class="font-semibold w-[180px] ml-5">{{ $order->product->name }}</span>
                                    <span class="product-price w-20 ml-5">Rp{{ number_format($order['amount'], 2, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center mr-7">
                            <div class="flex items-center justify-end">
                                {{ $order->created_at->format('d-m-Y H:i')}}
                            </div>
                            <div class="flex items-center justify-end">
                                <span class="text-black font-semibold">Selesai</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
