<nav class="navbar justify-between">
    <p class="navbar-logo">Delicious Cake.</p>
    <div class="navbar-nav">
        <a href="{{ url('dashboard')}}" >Beranda</a>
        <a href="{{ url('kategori') }}">Kategori</a>
        <a href="{{ url('allcake') }}">Semua</a>
        <a href="{{ url('about')}}">Tentang Kami</a>
    </div>   
    <div class="navbar-extra flex items-center">

        <input class="h-[30px] w-[200px] text-sm rounded-lg" type="text" id="search-input" placeholder="Search..." aria-label="Search">
        
        <a href="{{route('cart.index')}}" id="shopping-cart" aria-label="Shopping Cart">
            <i class="feather-cart" data-feather="shopping-cart"></i>
        </a>

        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="inline-flex items-center px-3 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-black hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    <div>{{ Auth::user()->name }}</div>
                    <div class="ms-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</nav>
<script>
feather.replace();
</script>
<script>
    document.getElementById('search-input').addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const query = this.value;
            if (query) {
                window.location.href = `/search?query=${encodeURIComponent(query)}`;
            }
        }
    });
</script>


