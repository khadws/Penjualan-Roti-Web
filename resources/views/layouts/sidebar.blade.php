<div class="sidebar bg-[#8B5E3C] py-[6%] pl-[40px] fixed left-[0] top-0 w-[350px] h-screen">
    <div class="flex flex-col gap-[27px]">
        {{-- profil --}}
        <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.edit') ? 'bg-[#6E472C]' : '' }} flex w-full hover:bg-orange-200 transition">
            <div class="flex w-full gap-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                Profil
            </div>
        </a>

        {{-- pesanan --}}
        <a href="{{ route('profile.pesanan') }}" class="{{ request()->routeIs('profile.pesanan') ? 'bg-[#6E472C]' : '' }} flex w-full hover:bg-orange-200 transition">
            <div class="flex w-full gap-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                Pesanan
            </div>
        </a>

        {{-- riwayat --}}
        <a href="{{ route('profile.riwayat') }}" class="{{ request()->routeIs('profile.riwayat') ? 'bg-[#6E472C]' : '' }} flex w-full hover:bg-orange-200 transition">
            <div class="flex w-full gap-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                Riwayat
            </div>
        </a>
    </div>
</div>

<script>
    feather.replace();
</script>
