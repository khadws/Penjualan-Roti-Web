<x-app-layout>
    @include('layouts.navigation')
    <div class="flex justify-center items-center py-[6%] px-[6%]">
        <div class="w-[1000vh] h-[95vh] flex rounded-lg gap-[30px] justify-between py-10 px-10 bg-[#F1C5A6]">
                <div class="flex flex-col gap-[30px]">
                    <div class="flex flex-col px-4 bg-[#E3AC84] w-[500px] h-full rounded-lg shadow-lg">
                        <h1 class="py-5 font-semibold text-[20px]">Data Pemesan</h1>
                        <form id="paymentForm" action="{{route('pay.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="total" value="{{ $total }}">
                            <div class="flex flex-col gap-4">
                                <div class="flex flex-col">
                                    <label class="font-medium">Nama Penerima</label>
                                    <input type="text" name="recipient_name" value="{{ $user->name }}"class="w-full h-[5vh] border-2 bg-transparent rounded-lg py-2 px-3 text-sm" placeholder="Masukkan nama penerima" required>
                                </div>
                                <div class="flex flex-col">
                                    <label class="font-medium">Alamat Penerima</label>
                                    <input type="text" name="recipient_address" value="{{ $user->address }}" class="w-full h-[5vh] border-2 bg-transparent rounded-lg py-2 px-3 text-sm" placeholder="Masukkan alamat penerima" required>
                                </div>
                                <div class="flex flex-col">
                                    <label class="font-medium">Kecamatan</label>
                                    <select id="kecamatan" name="kecamatan_id" class="w-full h-[5vh] border-2 bg-transparent rounded-lg py-2 px-3 text-sm">
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                    
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function () {
                                            const kecamatanSelect = document.getElementById("kecamatan");
                                    
                                            // Fetch data kecamatan dari endpoint
                                            fetch('/kecamatans')
                                                .then(response => response.json())
                                                .then(data => {
                                                    if (data.length > 0) {
                                                        let options = '<option value="">Pilih Kecamatan</option>';
                                                        data.forEach(kecamatan => {
                                                            options += `<option value="${kecamatan.id}">${kecamatan.nama_kecamatan}</option>`;
                                                        });
                                                        kecamatanSelect.innerHTML = options;
                                                    } else {
                                                        kecamatanSelect.innerHTML = '<option value="">Data kecamatan tidak tersedia</option>';
                                                    }
                                                })
                                                .catch(error => {
                                                    console.error("Error fetching kecamatan:", error);
                                                    kecamatanSelect.innerHTML = '<option value="">Gagal memuat kecamatan</option>';
                                                });
                                        });
                                    </script>
                                </div>
                                <div class="flex flex-col">
                                    <label class="font-medium">No. Telepon</label>
                                    <input type="text" name="recipient_phone" value="{{ $user->phone }}" class="w-full h-[5vh] border-2 bg-transparent rounded-lg py-2 px-3 text-sm" placeholder="Masukkan nomor telepon" required>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h1 class="py-1 font-semibold text-[18px]">Bukti Pembayaran</h1>
                                <p class="font-bold my-3">Transfer ke rekening ini :
                                    <span class="font-normal text-[18px]">BCA 1080781453</span>
                                </p>
                                <input type="file" name="payment_proof" class="w-full h-[6vh] border-2 rounded-lg py-2 px-2" accept="image/*" required>
                            </div>
                            
                            @foreach ($cartItems as $item)
                                <input type="hidden" name="product_id[]" value="{{ $item['id'] }}">
                            @endforeach

                            <input type="hidden" name="amount" value="50000">
                            <button type="submit" class="bg-[#E3AC84] font-medium text-black w-full border-2 px-4 py-2 rounded mt-7 shadow-lg hover:bg-[#E3AC84]">
                                bayar
                            </button> 
                        </form>
                        {{-- <form id="cancelOrderForm" action="{{ route('order.cancel') }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-red-500 font-medium text-white w-full border-2 px-4 py-2 rounded mt-3 shadow-lg hover:bg-red-600">
                                Batalkan Pesanan
                            </button>
                        </form> --}}
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
    
                        @if($errors->any())
                            <div class="alert alert-danger">
                                {{ implode(', ', $errors->all()) }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="flex flex-col gap-6">
                    <div class="flex flex-col justify-start items-center py-[3px] px-5 bg-[#E3AC84] w-[680px] h-[40vh] rounded-lg shadow-xl overflow-y-scroll">
                        <div class="flex w-full">
                            <h1 class="flex items-center font-semibold w-full text-[20px] pb-7 pt-3">Checkout Produk</h1>
                        </div>
                        @foreach($cartItems as $item)
                            <div class="w-full flex items-center shadow-xl bg-white rounded-lg py-3 px-3 mb-4">
                                <div class="flex px-2 py-2 w-[150px]">
                                    <img src="{{ asset('storage/' . $item['image']) }}" class="rounded-lg shadow-lg" alt="{{ $item['name'] }}">
                                </div>
                                <div class="flex flex-col px-6 py-3 h-full w-[250px]">
                                    <p class="text-[18px] font-semibold">{{ $item['name'] }}</p>
                                    <p class="text-[14px] font-medium">{{ $item['description'] }}</p>
                                    <p class="font-medium">x{{ $item['quantity'] }}</p>
                                </div>
                                <div class="flex flex-col px-3 py-3 h-full w-[250px] justify-between items-end">
                                    <p class="font-medium">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="bg-[#E3AC84] w-[680px] h-[40vh] rounded-lg shadow-xl py-5">
                        <h1 class="py-3 px-4 font-bold text-[20px]">Rincian Pesanan</h1>
                        <div class="flex flex-col w-full px-6">
                            <div class="flex justify-between items-center h-10">
                                <p class="py-1 font-normal text-[19px]">Subtotal</p>
                                <p class="py-1 font-normal text-[19px]">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</p>
                            </div>
                            <div class="flex justify-between items-center h-10">
                                <p class="py-1 font-normal text-[19px]">Diskon</p>
                                <p class="py-1 font-normal text-[19px]">Rp {{ number_format($diskon, 0, ',', '.') }}</p>
                            </div>
                            <div class="flex justify-between items-center h-10">
                                <p class="py-1 font-normal text-[19px]">Ongkir</p>
                                <p class="py-1 font-normal text-[19px]">Rp {{ number_format($ongkir, 0, ',', '.') }}</p>
                            </div>
                            <div class="flex justify-between items-center h-10 mt-3">
                                <p class="py-1 font-semibold text-[20px]">TOTAL</p>
                                <p class="py-1 font-semibold text-[20px]">Rp {{ number_format($total, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
    
    <script>
        document.getElementById('pay-button').addEventListener('click', function(e) {
            e.preventDefault();
            
            const data = {
            amount: {{$total}},
            first_name: "{{ $user->name }}",
            email: "{{ $user->email }}",
            phone: "{{ $user->phone }}",
            address: "{{ $user->address}}",
        };
        
            // Kirim request ke backend untuk mendapatkan Snap Token
            fetch("{{ route('payment.create') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                // Tampilkan popup Midtrans
                snap.pay(data.snapToken, {
                    autoCloseDelay: 0,
                    onSuccess: function (result) {
                        alert("Pembayaran berhasil! Anda akan diarahkan ke halaman utama.");
                        window.location.href = "{{ route('dashboard') }}";  // Redirect ke home
                    },
                    onPending: function(result) {
                        alert("Payment pending!");
                        console.log(result);
                    },
                    onError: function(result) {
                        alert("Payment failed!");
                        console.log(result);
                    }
                });
            })
            .catch(err => console.error(err));
        });
    </script>

</x-app-layout>
