<x-app-layout>
    @include('layouts.navigation')
    <div class="container-profile">
        @include('layouts.sidebar')
            <div class="content-pesanan w-[300%]">
                <div class="tabs bg-[#8B5E3C] justify-center my-auto rounded-[3px] flex gap-[30px] py-[6px]">
                    <p class="text-center text-[17px] font-semibold w-full">Status Pesanan</p>
                </div>
                <div class="product-container my-2">
                    <div id="untuk-dikirim" class="product-box active">
                        <table class="w-full shadow rounded-lg h-fit">
                            <thead>
                                <tr class="text-center text-[14px]">
                                    <th class="border p-2">No.</th>
                                    <th class="border p-2">Produk</th>
                                    <th class="border p-2">Jumlah</th>
                                    <th class="border p-2">Harga</th>
                                    <th class="border p-2">Tanggal Pesanan</th>
                                    <th class="border p-2">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-[#8B5E3C] sm:bg-[#8B5E3C] md:bg-[#EAB89D] lg:bg-[#8B5E3C]">
                                @foreach($orders as $index => $order)
                                    <tr class="text-center text-[14px]">
                                        <td class="border p-2 sm:p-3 md:p-4">{{ $index + 1 }}</td>
                                        <td class="border p-2 sm:p-3 md:p-4">{{ $order->product->name ?? 'Produk tidak ditemukan' }}</td>
                                        <td class="border p-2 sm:p-3 md:p-4">{{ $order['quantity']}}</td>
                                        <td class="border p-2 sm:p-3 md:p-4">Rp {{ number_format($order['amount'], 0, ',', '.') }}</td>
                                        <td class="border p-2 sm:p-3 md:p-4">{{$order->created_at->format('d-m-Y H:i')}}</td>
                                        <td class="border p-2 sm:p-3 md:p-4">
                                            <div class="p-2 flex items-center justify-between">
                                                <span class="p-2 rounded-md font-semibold"></span>
                                                    @if($order->status == 'approved')
                                                        <span class="text-green-500 font-semibold p-2 rounded-md">Disetujui</span>
                                                    @elseif($order->status == 'rejected')
                                                        <span class="text-red-500 font-semibold p-2 rounded-md">Ditolak</span>
                                                    @elseif($order->status == 'shipped')
                                                        <span class="text-blue-500 font-semibold p-2 rounded-md">Dikirim</span>
                                                    @elseif($order->status == 'pending')
                                                        <span class="text-white font-semibold p-2 rounded-md">Pending</span>
                                                    @else
                                                        <span class="text-white font-semibold p-2 rounded-md">Selesai</span>
                                                    @endif
                                                </span>
                                                @if(in_array($order->status, ['approved', 'shipped']))
                                                    <form action="{{ route('pesanan.diterima', $order->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="bg-green-400 p-[8px] rounded-md font-semibold sm:w-full">
                                                            Sudah Diterima
                                                        </button>
                                                    </form>
                                                @else
                                                    <span class="pr-3"></span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>                           
                        </table>
                    </div>
                </div>
            </div>
    </div>
</x-app-layout>