<div class=" md:mx-20 md:my-5">
    <div class="navbar bg-base-100">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/profile') }}">Profile</a></li>

                    <li><a href="{{ url('/lihat-galeri') }}">Galery</a></li>
                    <li><a href="{{ url('field_a') }}">Field</a></li>
                    <li><a href="{{ url('sewa-for-event-a') }}">Sewa untuk event</a></li>

                    <li><a href="{{ url('/contact') }}">Kontak</a></li>
                </ul>
            </div>
            <div class="avatar">
                <div class="w-12 rounded-full">
                    <img src="{{ asset('img/LOGO.PNG') }}" class="hidden md:block" />
                </div>
                <a class="btn btn-ghost text-xl text-orange-500 font-bold">Futsal Ball</a>
            </div>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/profile') }}">Profile</a></li>

                <li><a href="{{ url('/lihat-galeri') }}">Galery</a></li>
                <li><a href="{{ url('field_a') }}">Field</a></li>
                <li><a href="{{ url('sewa-for-event-a') }}">Sewa untuk event</a></li>

                <li><a href="{{ url('/contact') }}">Kontak</a></li>
            </ul>
        </div>
        <div class=" navbar-end ">


            @if (Auth::guard('member')->check())
                <div class="dropdown dropdown-end me-2">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <a href="{{ url('history/' . Auth::guard('member')->user()->id) }}">
                                <i class=" text-xl pt-2 fa-solid fa-cart-shopping"></i>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="relative dropdown dropdown-end">
                    <div tabindex="0" role="button">
                        <div class="avatar online">
                            <div class="w-10 rounded-full">
                                <img src="{{ asset('foto_member/' . Auth::guard('member')->user()->foto) }}" />
                            </div>
                        </div>
                    </div>
                    <ul tabindex="0"
                        class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                        <li><a id="profileToggle" class="cursor-pointer">Profil</a></li>
                        <li>
                            <form action="{{ url('logout') }}" method="post">
                                @csrf
                                <button class="cursor-pointer">Logout</button>
                            </form>
                        </li>
                    </ul>

                    <!-- Card Profil -->
                    <div id="profileCard"
                        class="hidden absolute top-12 right-0 w-64 p-6 shadow-md bg-slate-100 rounded-lg z-50 max-w-xs">
                        <img src="{{ asset('foto_member/' . Auth::guard('member')->user()->foto) }}"
                            alt="Profile Picture" class="w-32 h-32 mx-auto rounded-full mb-3">
                        <div class="space-y-4 text-center">
                            <h2 class="text-xl font-semibold">{{ Auth::guard('member')->user()->nama_lengkap }}</h2>
                            <p class="text-xs">{{ Auth::guard('member')->user()->email }}</p>

                        </div>
                    </div>
                </div>
                {{-- </div> --}}
            @else
                <div class="relative dropdown dropdown-end ml-3">
                    <div tabindex="0" role="button">
                        <a href="{{ url('login') }}" class="btn btn-neutral">Login</a>
                    </div>
                </div>
            @endif

        </div>

        <script>
            document.getElementById('profileToggle').addEventListener('click', function() {
                const profileCard = document.getElementById('profileCard');
                profileCard.classList.toggle('hidden');
            });

            document.addEventListener('click', function(event) {
                const profileCard = document.getElementById('profileCard');
                const profileToggle = document.getElementById('profileToggle');

                // Cek apakah klik terjadi di luar kartu profil dan tombol toggle
                if (!profileCard.contains(event.target) && !profileToggle.contains(event.target)) {
                    profileCard.classList.add('hidden');
                }
            });
        </script>
    </div>
</div>
