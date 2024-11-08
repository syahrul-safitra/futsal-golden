@extends('member.layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="container mx-auto my-5">
            <div role="alert" class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="container mx-auto my-5">
            <div role="alert" class="alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif
    <div class=" flex justify-center gap-10 ">
        <div class="flex justify-center">
            <div class="max-w-xs rounded-md shadow-md bg-gray-50 text-gray-800">
                <img src="../img/bg.jpeg" alt=""
                    class="object-cover object-center w-full rounded-t-md h-52 bg-gray-500">
                <div class="flex flex-col justify-between p-6 space-y-4">
                    <div class="space-y-2">
                        <h2 class="text-xl font-bold ">Lapangan 1 (Matras)</h2>
                        <p class="text-gray-800">{{ formatRp(130000) }}</p>
                    </div>
                    <a href="">
                        <button type="button"
                            class="flex items-center justify-center w-full p-2 font-bold tracking-wide rounded-md border border-orange-500 bg-orange-500 text-white transition hover:bg-transparent hover:text-orange-500 focus:outline-none focus:ring active:text-orange-500">Lihat
                            Jadwal</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="max-w-xs rounded-md shadow-md bg-gray-50  text-gray-800">
                <img src="../img/bg3.png" alt=""
                    class=" opacity-60 object-cover object-center w-full rounded-t-md h-52 bg-gray-500">
                <div class="flex flex-col justify-between p-6 space-y-4">
                    <div class="space-y-2">
                        <h2 class="text-xl font-bold ">Lapangan 2 (Semen)</h2>
                        <p class="text-gray-800">{{ formatRp(80000) }}</p>
                    </div>
                    <a href="{{ url('sewa-for-event-b') }}">
                        <button type="button"
                            class="flex items-center justify-center w-full p-2 font-bold tracking-wide rounded-md border border-orange-500 bg-transparent text-orange-500 transition hover:bg-orange-500 hover:text-white focus:outline-none focus:ring active:text-white">Lihat
                            Jadwal</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="">

        <!-- tanggal -->
        <div class="container mx-auto px-4 sm:px-16 mt-10">
            <div role="alert" class="alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <span>Penyewaan lapangan untuk 2 hari dengan harga {{ formatRp(2500000) }}, dengan waktu bermain dari pagi
                    hingga
                    magrib! </span>
            </div>
            <h1 class="pt-8 mb-10 font-bold text-3xl">Jadwal Lapangan 1 <span class="text-orange-500">Futsal Ball</span>
            </h1>

            <div class="overflow-x-auto">
                <div class="grid grid-cols-6 gap-4 min-w-max">

                    {{-- Taggal 1 --}}
                    @if ($dataTanggal1->isEmpty())
                        {{-- @php
                                $data = $dataTanggal1->where('waktu_mulai', '=', $tanggal2->format('Y-m-d' . ' ' . $item));
                                $satuJam = date('H:i', strtotime('+1 hour', strtotime($item)));

                            @endphp --}}

                        <div class="bg-white border  cursor-pointer rounded-lg shadow-md p-4 text-center"
                            onclick=" toggleSelection(this)" data-akunId="{{ Auth::guard('member')->user()->id }}"
                            data-tanggal="{{ $tanggal1->format('d-m-Y') }}">
                            <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $tanggal1->format('d-M') }}</h2>
                            <p class="text-sm text-orange-500 font-bold">{{ $tanggal1->format('D') }}</p>
                        </div>
                    @else
                        <div class="bg-red-400 border rounded-lg shadow-md p-4 text-center">
                            <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $tanggal1->format('d-M') }}</h2>
                            <p class="text-sm text-orange-500 font-bold">{{ $tanggal1->format('D') }}</p>
                        </div>
                    @endif

                    {{-- Tanggal 2 --}}
                    @if ($dataTanggal2->isEmpty())
                        <div class="bg-white border cursor-pointer rounded-lg shadow-md p-4 text-center"
                            onclick=" toggleSelection(this)" data-akunId="{{ Auth::guard('member')->user()->id }}"
                            data-tanggal="{{ $tanggal2->format('d-m-Y') }}">
                            <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $tanggal2->format('d-M') }}</h2>
                            <p class="text-sm text-orange-500 font-bold">{{ $tanggal2->format('D') }}</p>
                        </div>
                    @else
                        <div class="bg-red-500 border rounded-lg shadow-md p-4 text-center">
                            <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $tanggal2->format('d-M') }}</h2>
                            <p class="text-sm text-orange-500 font-bold">{{ $tanggal2->format('D') }}</p>
                        </div>
                    @endif

                    {{-- Tanggal 3 --}}
                    @if ($dataTanggal3->isEmpty())
                        <div class="bg-white border cursor-pointer rounded-lg shadow-md p-4 text-center"
                            onclick=" toggleSelection(this)" data-akunId="{{ Auth::guard('member')->user()->id }}"
                            data-tanggal="{{ $tanggal3->format('d-m-Y') }}">
                            <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $tanggal3->format('d-M') }}</h2>
                            <p class="text-sm text-orange-500 font-bold">{{ $tanggal3->format('D') }}</p>
                        </div>
                    @else
                        <div class="bg-red-500 border rounded-lg shadow-md p-4 text-center">
                            <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $tanggal3->format('d-M') }}</h2>
                            <p class="text-sm text-orange-500 font-bold">{{ $tanggal3->format('D') }}</p>
                        </div>
                    @endif

                    {{-- Tanggal 4 --}}
                    @if ($dataTanggal4->isEmpty())
                        <div class="bg-white border cursor-pointer rounded-lg shadow-md p-4 text-center"
                            onclick=" toggleSelection(this)" data-akunId="{{ Auth::guard('member')->user()->id }}"
                            data-tanggal="{{ $tanggal4->format('d-m-Y') }}">
                            <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $tanggal4->format('d-M') }}</h2>
                            <p class="text-sm text-orange-500 font-bold">{{ $tanggal4->format('D') }}</p>
                        </div>
                    @else
                        <div class="bg-red-500 border rounded-lg shadow-md p-4 text-center">
                            <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $tanggal4->format('d-M') }}</h2>
                            <p class="text-sm text-orange-500 font-bold">{{ $tanggal4->format('D') }}</p>
                        </div>
                    @endif

                    {{-- Tanggal 5 --}}
                    @if ($dataTanggal5->isEmpty())
                        <div class="bg-white border cursor-pointer rounded-lg shadow-md p-4 text-center"
                            onclick=" toggleSelection(this)" data-akunId="{{ Auth::guard('member')->user()->id }}"
                            data-tanggal="{{ $tanggal5->format('d-m-Y') }}">
                            <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $tanggal5->format('d-M') }}</h2>
                            <p class="text-sm text-orange-500 font-bold">{{ $tanggal5->format('D') }}</p>
                        </div>
                    @else
                        <div class="bg-red-500 border rounded-lg shadow-md p-4 text-center">
                            <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $tanggal5->format('d-M') }}</h2>
                            <p class="text-sm text-orange-500 font-bold">{{ $tanggal5->format('D') }}</p>
                        </div>
                    @endif

                    {{-- Tanggal 6 --}}
                    @if ($dataTanggal6->isEmpty())
                        <div class="bg-white border cursor-pointer rounded-lg shadow-md p-4 text-center"
                            onclick=" toggleSelection(this)" data-akunId="{{ Auth::guard('member')->user()->id }}"
                            data-tanggal="{{ $tanggal6->format('d-m-Y') }}">
                            <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $tanggal6->format('d-M') }}</h2>
                            <p class="text-sm text-orange-500 font-bold">{{ $tanggal6->format('D') }}</p>
                        </div>
                    @else
                        <div class="bg-red-500 border rounded-lg shadow-md p-4 text-center">
                            <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $tanggal6->format('d-M') }}</h2>
                            <p class="text-sm text-orange-500 font-bold">{{ $tanggal6->format('D') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- jamm 6-7 -->
        <div class="container mx-auto px-4 sm:px-16 my-10">
            <div class="overflow-x-auto">
                <div class="grid grid-cols-6 gap-4 min-w-max">


                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/sweetalert.min.js') }}"></script>

    <script>
        function toggleSelection(element) {
            let tanggal = element.getAttribute('data-tanggal')
            // let jam = element.getAttribute('data-jam')
            let akunId = element.getAttribute('data-akunId');

            swal({
                    title: "Konfirmasi!",
                    text: `Anda akan memesan lapangan untuk 2 hari dari tanggal ${tanggal} hingga besok dengan jadwal bermain dari pagi hingga pukul 19:00.`,
                    icon: "info",
                    buttons: true,
                    // dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = `event-pembayaran-a/${tanggal}/${akunId}`;
                    }
                });
        }
    </script>
@endsection
