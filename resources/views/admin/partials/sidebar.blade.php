<div class="flex h-screen w-16 flex-col justify-between border-e bg-white">
    <!-- Sidebar Content -->
    <div>

        <div class="border-t border-gray-100">
            <div class="px-2">

                <div class="border-t border-gray-100">
                    <div class="px-2">

                        <ul class="space-y-1 border-t border-gray-100 pt-4">
                            <li>
                                <a href="{{ url('jadwal-lapangan-a') }}"
                                    class="group relative flex justify-center rounded px-2 py-1.5 text-gray-500 hover:bg-gray-50 hover:text-gray-700">

                                    <div>
                                        <i class="fa-solid fa-folder-open"></i>
                                    </div>

                                    <span
                                        class=" z-50 invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded bg-gray-900 px-2 py-1.5 text-xs font-medium text-white group-hover:visible">
                                        Sewa Lapangan A
                                    </span>
                                </a>
                            </li>


                        </ul>
                    </div>
                    <div class="px-2">

                        <ul class="space-y-1 border-t border-gray-100 pt-4">
                            <li>
                                <a href="{{ url('jadwal-lapangan-b') }}"
                                    class="group relative flex justify-center rounded px-2 py-1.5 text-gray-500 hover:bg-gray-50 hover:text-gray-700">

                                    <div>
                                        <i class="fa-solid fa-folder-open"></i>
                                    </div>

                                    <span
                                        class=" z-50 invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded bg-gray-900 px-2 py-1.5 text-xs font-medium text-white group-hover:visible">
                                        Sewa Lapangan B
                                    </span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    {{-- <div class="px-2">

                        <ul class="space-y-1 border-t border-gray-100 pt-4">
                            <li>
                                <a href="jadwal1.php"
                                    class="group relative flex justify-center rounded px-2 py-1.5 text-gray-500 hover:bg-gray-50 hover:text-gray-700">

                                    <div>
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>

                                    <span
                                        class=" z-50 invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded bg-gray-900 px-2 py-1.5 text-xs font-medium text-white group-hover:visible">
                                        Jadwal
                                    </span>
                                </a>
                            </li>


                        </ul>
                    </div> --}}
                    <div class="px-2">

                        <ul class="space-y-1 border-t border-gray-100 pt-4">
                            <li>
                                <a href="{{ url('galery') }}"
                                    class="group relative flex justify-center rounded px-2 py-1.5 text-gray-500 hover:bg-gray-50 hover:text-gray-700">

                                    <div>
                                        <i class="fa-solid fa-images"></i>
                                    </div>

                                    <span
                                        class=" z-50 invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded bg-gray-900 px-2 py-1.5 text-xs font-medium text-white group-hover:visible">
                                        Galery
                                    </span>
                                </a>
                            </li>


                        </ul>
                    </div>
                    <div class="px-2">

                        <ul class="space-y-1 border-t border-gray-100 pt-4">
                            <li>
                                <a href="{{ url('members') }}"
                                    class="group relative flex justify-center rounded px-2 py-1.5 text-gray-500 hover:bg-gray-50 hover:text-gray-700">

                                    <div>
                                        <i class="fa-solid fa-users-line"></i>
                                    </div>

                                    <span
                                        class=" z-50 invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded bg-gray-900 px-2 py-1.5 text-xs font-medium text-white group-hover:visible">
                                        Member
                                    </span>
                                </a>
                            </li>


                        </ul>
                    </div>
                </div>
                <!-- Add other sidebar items here -->
            </div>
        </div>
    </div>

    <div class="sticky inset-x-0 bottom-0 border-t border-gray-100 bg-white p-2">
        <form action="{{ url('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="group relative flex w-full justify-center rounded-lg px-2 py-1.5 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 opacity-75" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span
                    class="invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded bg-gray-900 px-2 py-1.5 text-xs font-medium text-white group-hover:visible">Logout</span>
            </button>
        </form>
    </div>
</div>
