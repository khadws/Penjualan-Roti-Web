<x-app-layout>
    @include('layouts.navigation')

    <div class="flex flex-col items-center justify-center min-h-screen bg-green-100">
        <div class="bg-white p-8 rounded-lg shadow-md text-center">
            <h1 class="text-2xl font-bold text-green-600">Pembayaran Berhasil!</h1>
            <p class="text-gray-600 mt-4">Terima kasih telah melakukan pembayaran. Pesanan Anda akan segera diproses.</p>
            <a href="{{ route('home') }}" class="mt-6 inline-block bg-green-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-green-600">
                Kembali ke Beranda
            </a>
        </div>
    </div>

    @include('layouts.footer')
</x-app-layout>
