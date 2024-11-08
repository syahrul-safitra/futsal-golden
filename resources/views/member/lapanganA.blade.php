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
                    <a href="{{ url('field_b') }}">
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

            <div class="collapse bg-success">
                <div class="collapse-title text-md font-medium">Untuk siswa (sd-sma) bermain pada pukul 09:00 - 14:00 akan
                    mendapatkan potongan harga menjadi Rp.50.000</div>
            </div>
            <h1 class="pt-8 mb-10 font-bold text-3xl">Jadwal Lapangan 1 <span class="text-orange-500">Futsal Ball</span>
            </h1>

            <div class="overflow-x-auto">
                <div class="grid grid-cols-6 gap-4 min-w-max">
                    <div class="bg-white border rounded-lg shadow-md p-4 text-center">
                        <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $tanggal1->format('d-M') }}</h2>
                        <p class="text-sm text-orange-500 font-bold">{{ $tanggal1->format('D') }}</p>
                    </div>
                    <div class="bg-white border rounded-lg shadow-md p-4 text-center">
                        <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $tanggal2->format('d-M') }}</h2>
                        <p class="text-sm text-orange-500 font-bold">{{ $tanggal2->format('D') }}</p>
                    </div>
                    <div class="bg-white border rounded-lg shadow-md p-4 text-center">
                        <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $tanggal3->format('d-M') }}</h2>
                        <p class="text-sm text-orange-500 font-bold">{{ $tanggal3->format('D') }}</p>
                    </div>
                    <div class="bg-white border rounded-lg shadow-md p-4 text-center">
                        <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $tanggal4->format('d-M') }}</h2>
                        <p class="text-sm text-orange-500 font-bold">{{ $tanggal4->format('D') }}</p>
                    </div>
                    <div class="bg-white border rounded-lg shadow-md p-4 text-center">
                        <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $tanggal5->format('d-M') }}</h2>
                        <p class="text-sm text-orange-500 font-bold">{{ $tanggal5->format('d-M') }}</p>
                    </div>
                    <div class="bg-white border rounded-lg shadow-md p-4 text-center">
                        <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $tanggal6->format('d-M') }}</h2>
                        <p class="text-sm text-orange-500 font-bold">{{ $tanggal6->format('D') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- jamm 6-7 -->
        <div class="container mx-auto px-4 sm:px-16 my-10">
            <div class="overflow-x-auto">
                <div class="grid grid-cols-6 gap-4 min-w-max">

                    <div class="flex flex-col gap-4">

                        @foreach ($jamMain as $key => $item)
                            @php
                                $data = $dataTanggal1->where(
                                    'waktu_mulai',
                                    '=',
                                    $tanggal1->format('Y-m-d' . ' ' . $item),
                                );
                                $satuJam = date('H:i', strtotime('+1 hour', strtotime($item)));

                            @endphp


                            @if ($data->isEmpty())
                                <div class="rounded-lg border shadow-xl bg-white p-4 cursor-pointer transition duration-200 ease-in-out hover:shadow-xl"
                                    onclick=" toggleSelection(this)" data-jam="{{ $item }}"
                                    data-akunId="{{ Auth::guard('member')->user()->id }}"
                                    data-tanggal="{{ $tanggal1->format('d-m-Y') }}">
                                    <div class="flex items-center">
                                        <div class="text-green-500 font-bold text-2xl mr-2">+</div>
                                        <div class="text-gray-700 font-bold text-lg">{{ $tanggal1->format('d-M') }}</div>
                                    </div>
                                    <div class="text-gray-900 font-semibold mt-2">
                                        {{ date('H:i', strtotime($item)) . '-' . $satuJam }}</div>
                                    <div class="text-gray-900 font-bold text-2xl mt-2">Rp 130,000</div>
                                    <div class="text-green-500 mt-2 font-bold status">Available</div> <!-- Status -->
                                </div>
                            @else
                                {{-- @dd($data->first()); --}}
                                {{-- @dd($data); --}}
                                @if ($data->first()->status_booking == 'pending')
                                    <div class="rounded-lg border shadow-xl bg-yellow-400 p-4 cursor-pointer transition duration-200 ease-in-out hover:shadow-xl"
                                        data-jam="{{ $item }}" data-tanggal="{{ $tanggal1->format('d-m-Y') }}">
                                        <div class="flex items-center">
                                            <div class=" text-white font-bold text-2xl mr-2">-</div>
                                            <div class="text-gray-700 font-bold text-lg">{{ $tanggal1->format('d-M') }}
                                            </div>
                                        </div>
                                        <div class="text-gray-900 font-semibold mt-2">
                                            {{ date('H:i', strtotime($item)) . '-' . $satuJam }}</div>
                                        <div class="text-gray-900 font-bold text-2xl mt-2">Rp 100,000</div>
                                        <div class=" mt-2 font-bold status">Pandding</div> <!-- Status -->
                                    </div>
                                @else
                                    {{-- @endif --}}
                                    <div class="rounded-lg border shadow-xl bg-red-500 p-4 cursor-pointer transition duration-200 ease-in-out hover:shadow-xl"
                                        data-jam="{{ $item }}" data-tanggal="{{ $tanggal1->format('d-m-Y') }}">
                                        <div class="flex items-center">
                                            <div class="text-black font-bold text-2xl mr-2">-</div>
                                            <div class="text-black-700 font-bold text-lg">{{ $tanggal1->format('d-M') }}
                                            </div>
                                        </div>
                                        <div class="text-gray-900 font-semibold mt-2">
                                            {{ date('H:i', strtotime($item)) . '-' . $satuJam }}</div>
                                        <div class="text-gray-900 font-bold text-2xl mt-2">Rp 100,000</div>
                                        <div class="text-black mt-2 font-bold status">Booked</div> <!-- Status -->
                                    </div>
                                @endif
                            @endif
                        @endforeach

                    </div>

                    {{-- Data Tanggal 2 --}}
                    <div class="flex flex-col gap-4">

                        @foreach ($jamMain as $key => $item)
                            @php
                                $data = $dataTanggal2->where(
                                    'waktu_mulai',
                                    '=',
                                    $tanggal2->format('Y-m-d' . ' ' . $item),
                                );
                                $satuJam = date('H:i', strtotime('+1 hour', strtotime($item)));

                            @endphp

                            @if ($data->isEmpty())
                                <div class="rounded-lg border shadow-xl bg-white p-4 cursor-pointer transition duration-200 ease-in-out hover:shadow-xl"
                                    onclick=" toggleSelection(this)" data-jam="{{ $item }}"
                                    data-akunId="{{ Auth::guard('member')->user()->id }}"
                                    data-tanggal="{{ $tanggal2->format('d-m-Y') }}">
                                    <div class="flex items-center">
                                        <div class="text-green-500 font-bold text-2xl mr-2">+</div>
                                        <div class="text-gray-700 font-bold text-lg">{{ $tanggal2->format('d-M') }}</div>
                                    </div>
                                    <div class="text-gray-900 font-semibold mt-2">
                                        {{ date('H:i', strtotime($item)) . '-' . $satuJam }}</div>
                                    <div class="text-gray-900 font-bold text-2xl mt-2">Rp. 130.000</div>
                                    <div class="text-green-500 mt-2 font-bold status">Available</div> <!-- Status -->
                                </div>
                            @else
                                @if ($data->first()->status_booking == 'pending')
                                    <div class="rounded-lg border shadow-xl bg-yellow-400 p-4 cursor-pointer transition duration-200 ease-in-out hover:shadow-xl"
                                        onclick=" toggleSelection(this)">
                                        <div class="flex items-center">
                                            <div class=" text-white font-bold text-2xl mr-2">-</div>
                                            <div class="text-gray-700 font-bold text-lg">{{ $tanggal2->format('d-M') }}
                                            </div>
                                        </div>
                                        <div class="text-gray-900 font-semibold mt-2">
                                            {{ date('H:i', strtotime($item)) . '-' . $satuJam }}</div>
                                        <div class="text-gray-900 font-bold text-2xl mt-2">Rp. 130.000</div>
                                        <div class=" mt-2 font-bold status">Pandding</div> <!-- Status -->
                                    </div>
                                @else
                                    {{-- @endif --}}
                                    <div class="rounded-lg border shadow-xl bg-red-500 p-4 cursor-pointer transition duration-200 ease-in-out hover:shadow-xl"
                                        onclick=" toggleSelection(this)">
                                        <div class="flex items-center">
                                            <div class="text-black font-bold text-2xl mr-2">-</div>
                                            <div class="text-black-700 font-bold text-lg">{{ $tanggal2->format('d-M') }}
                                            </div>
                                        </div>
                                        <div class="text-gray-900 font-semibold mt-2">
                                            {{ date('H:i', strtotime($item)) . '-' . $satuJam }}</div>
                                        <div class="text-gray-900 font-bold text-2xl mt-2">Rp. 130.000</div>
                                        <div class="text-black mt-2 font-bold status">Booked</div> <!-- Status -->
                                    </div>
                                @endif
                            @endif
                        @endforeach

                    </div>
                    <!-- Add more cards here -->



                    {{-- Data Tanggal 3 --}}
                    <div class="flex flex-col gap-4">

                        @foreach ($jamMain as $key => $item)
                            @php
                                $data = $dataTanggal3->where(
                                    'waktu_mulai',
                                    '=',
                                    $tanggal3->format('Y-m-d' . ' ' . $item),
                                );
                                $satuJam = date('H:i', strtotime('+1 hour', strtotime($item)));

                            @endphp


                            @if ($data->isEmpty())
                                <div class="rounded-lg border shadow-xl bg-white p-4 cursor-pointer transition duration-200 ease-in-out hover:shadow-xl"
                                    onclick=" toggleSelection(this)" data-jam="{{ $item }}"
                                    data-akunId="{{ Auth::guard('member')->user()->id }}"
                                    data-tanggal="{{ $tanggal3->format('d-m-Y') }}">
                                    <div class="flex items-center">
                                        <div class="text-green-500 font-bold text-2xl mr-2">+</div>
                                        <div class="text-gray-700 font-bold text-lg">{{ $tanggal3->format('d-M') }}</div>
                                    </div>
                                    <div class="text-gray-900 font-semibold mt-2">
                                        {{ date('H:i', strtotime($item)) . '-' . $satuJam }}</div>
                                    <div class="text-gray-900 font-bold text-2xl mt-2">Rp. 130.000</div>
                                    <div class="text-green-500 mt-2 font-bold status">Available</div> <!-- Status -->
                                </div>
                            @else
                                @if ($data->first()->status_booking == 'pending')
                                    <div
                                        class="rounded-lg border shadow-xl bg-yellow-400 p-4 cursor-pointer transition duration-200 ease-in-out hover:shadow-xl">
                                        <div class="flex items-center">
                                            <div class=" text-white font-bold text-2xl mr-2">-</div>
                                            <div class="text-gray-700 font-bold text-lg">{{ $tanggal3->format('d-M') }}
                                            </div>
                                        </div>
                                        <div class="text-gray-900 font-semibold mt-2">
                                            {{ date('H:i', strtotime($item)) . '-' . $satuJam }}</div>
                                        <div class="text-gray-900 font-bold text-2xl mt-2">Rp. 130.000</div>
                                        <div class=" mt-2 font-bold status">Pandding</div> <!-- Status -->
                                    </div>
                                @else
                                    {{-- @endif --}}
                                    <div
                                        class="rounded-lg border shadow-xl bg-red-500 p-4 cursor-pointer transition duration-200 ease-in-out hover:shadow-xl">
                                        <div class="flex items-center">
                                            <div class="text-black font-bold text-2xl mr-2">-</div>
                                            <div class="text-black-700 font-bold text-lg">{{ $tanggal3->format('d-M') }}
                                            </div>
                                        </div>
                                        <div class="text-gray-900 font-semibold mt-2">
                                            {{ date('H:i', strtotime($item)) . '-' . $satuJam }}</div>
                                        <div class="text-gray-900 font-bold text-2xl mt-2">Rp. 130.000</div>
                                        <div class="text-black mt-2 font-bold status">Booked</div> <!-- Status -->
                                    </div>
                                @endif
                            @endif
                        @endforeach

                    </div>


                    {{-- Data Tanggal 4 --}}
                    <div class="flex flex-col gap-4">

                        @foreach ($jamMain as $key => $item)
                            @php
                                $data = $dataTanggal4->where(
                                    'waktu_mulai',
                                    '=',
                                    $tanggal4->format('Y-m-d' . ' ' . $item),
                                );
                                $satuJam = date('H:i', strtotime('+1 hour', strtotime($item)));

                            @endphp


                            @if ($data->isEmpty())
                                <div class="rounded-lg border shadow-xl bg-white p-4 cursor-pointer transition duration-200 ease-in-out hover:shadow-xl"
                                    onclick=" toggleSelection(this)" data-jam="{{ $item }}"
                                    data-akunId="{{ Auth::guard('member')->user()->id }}"
                                    data-tanggal="{{ $tanggal4->format('d-m-Y') }}">
                                    <div class="flex items-center">
                                        <div class="text-green-500 font-bold text-2xl mr-2">+</div>
                                        <div class="text-gray-700 font-bold text-lg">{{ $tanggal4->format('d-M') }}</div>
                                    </div>
                                    <div class="text-gray-900 font-semibold mt-2">
                                        {{ date('H:i', strtotime($item)) . '-' . $satuJam }}</div>
                                    <div class="text-gray-900 font-bold text-2xl mt-2">Rp. 130.000</div>
                                    <div class="text-green-500 mt-2 font-bold status">Available</div> <!-- Status -->
                                </div>
                            @else
                                @if ($data->first()->status_booking == 'pending')
                                    <div
                                        class="rounded-lg border shadow-xl bg-yellow-400 p-4 cursor-pointer transition duration-200 ease-in-out hover:shadow-xl">
                                        <div class="flex items-center">
                                            <div class=" text-white font-bold text-2xl mr-2">-</div>
                                            <div class="text-gray-700 font-bold text-lg">{{ $tanggal4->format('d-M') }}
                                            </div>
                                        </div>
                                        <div class="text-gray-900 font-semibold mt-2">
                                            {{ date('H:i', strtotime($item)) . '-' . $satuJam }}</div>
                                        <div class="text-gray-900 font-bold text-2xl mt-2">Rp. 130.000</div>
                                        <div class=" mt-2 font-bold status">Pandding</div> <!-- Status -->
                                    </div>
                                @else
                                    {{-- @endif --}}
                                    <div
                                        class="rounded-lg border shadow-xl bg-red-500 p-4 cursor-pointer transition duration-200 ease-in-out hover:shadow-xl">
                                        <div class="flex items-center">
                                            <div class="text-black font-bold text-2xl mr-2">-</div>
                                            <div class="text-black-700 font-bold text-lg">{{ $tanggal4->format('d-M') }}
                                            </div>
                                        </div>
                                        <div class="text-gray-900 font-semibold mt-2">
                                            {{ date('H:i', strtotime($item)) . '-' . $satuJam }}</div>
                                        <div class="text-gray-900 font-bold text-2xl mt-2">Rp. 130.000</div>
                                        <div class="text-black mt-2 font-bold status">Booked</div> <!-- Status -->
                                    </div>
                                @endif
                            @endif
                        @endforeach

                    </div>

                    {{-- Data Tanggal 5 --}}
                    <div class="flex flex-col gap-4">
                        @foreach ($jamMain as $key => $item)
                            @php
                                $data = $dataTanggal5->where(
                                    'waktu_mulai',
                                    '=',
                                    $tanggal5->format('Y-m-d' . ' ' . $item),
                                );
                                $satuJam = date('H:i', strtotime('+1 hour', strtotime($item)));

                            @endphp


                            @if ($data->isEmpty())
                                <div class="rounded-lg border shadow-xl bg-white p-4 cursor-pointer transition duration-200 ease-in-out hover:shadow-xl"
                                    onclick=" toggleSelection(this)" data-jam="{{ $item }}"
                                    data-akunId="{{ Auth::guard('member')->user()->id }}"
                                    data-tanggal="{{ $tanggal5->format('d-m-Y') }}">
                                    <div class="flex items-center">
                                        <div class="text-green-500 font-bold text-2xl mr-2">+</div>
                                        <div class="text-gray-700 font-bold text-lg">{{ $tanggal5->format('d-M') }}</div>
                                    </div>
                                    <div class="text-gray-900 font-semibold mt-2">
                                        {{ date('H:i', strtotime($item)) . '-' . $satuJam }}</div>
                                    <div class="text-gray-900 font-bold text-2xl mt-2">Rp. 130.000</div>
                                    <div class="text-green-500 mt-2 font-bold status">Available</div> <!-- Status -->
                                </div>
                            @else
                                @if ($data->first()->status_booking == 'pending')
                                    <div
                                        class="rounded-lg border shadow-xl bg-yellow-400 p-4 cursor-pointer transition duration-200 ease-in-out hover:shadow-xl">
                                        <div class="flex items-center">
                                            <div class=" text-white font-bold text-2xl mr-2">-</div>
                                            <div class="text-gray-700 font-bold text-lg">{{ $tanggal5->format('d-M') }}
                                            </div>
                                        </div>
                                        <div class="text-gray-900 font-semibold mt-2">
                                            {{ date('H:i', strtotime($item)) . '-' . $satuJam }}</div>
                                        <div class="text-gray-900 font-bold text-2xl mt-2">Rp. 130.000</div>
                                        <div class=" mt-2 font-bold status">Pandding</div> <!-- Status -->
                                    </div>
                                @else
                                    {{-- @endif --}}
                                    <div
                                        class="rounded-lg border shadow-xl bg-red-500 p-4 cursor-pointer transition duration-200 ease-in-out hover:shadow-xl">
                                        <div class="flex items-center">
                                            <div class="text-black font-bold text-2xl mr-2">-</div>
                                            <div class="text-black-700 font-bold text-lg">{{ $tanggal5->format('d-M') }}
                                            </div>
                                        </div>
                                        <div class="text-gray-900 font-semibold mt-2">
                                            {{ date('H:i', strtotime($item)) . '-' . $satuJam }}</div>
                                        <div class="text-gray-900 font-bold text-2xl mt-2">Rp. 130.000</div>
                                        <div class="text-black mt-2 font-bold status">Booked</div> <!-- Status -->
                                    </div>
                                @endif
                            @endif
                        @endforeach

                    </div>

                    {{-- Data Tanggal 6 --}}
                    <div class="flex flex-col gap-4">
                        @foreach ($jamMain as $key => $item)
                            @php
                                $data = $dataTanggal6->where(
                                    'waktu_mulai',
                                    '=',
                                    $tanggal6->format('Y-m-d' . ' ' . $item),
                                );
                                $satuJam = date('H:i', strtotime('+1 hour', strtotime($item)));

                            @endphp


                            @if ($data->isEmpty())
                                <div class="rounded-lg border shadow-xl bg-white p-4 cursor-pointer transition duration-200 ease-in-out hover:shadow-xl"
                                    onclick=" toggleSelection(this)" data-jam="{{ $item }}"
                                    data-akunId="{{ Auth::guard('member')->user()->id }}"
                                    data-tanggal="{{ $tanggal6->format('d-m-Y') }}">
                                    <div class="flex items-center">
                                        <div class="text-green-500 font-bold text-2xl mr-2">+</div>
                                        <div class="text-gray-700 font-bold text-lg">{{ $tanggal6->format('d-M') }}</div>
                                    </div>
                                    <div class="text-gray-900 font-semibold mt-2">
                                        {{ date('H:i', strtotime($item)) . '-' . $satuJam }}</div>
                                    <div class="text-gray-900 font-bold text-2xl mt-2">Rp. 130.000</div>
                                    <div class="text-green-500 mt-2 font-bold status">Available</div> <!-- Status -->
                                </div>
                            @else
                                @if ($data->first()->status_booking == 'pending')
                                    <div
                                        class="rounded-lg border shadow-xl bg-yellow-400 p-4 cursor-pointer transition duration-200 ease-in-out hover:shadow-xl">
                                        <div class="flex items-center">
                                            <div class=" text-white font-bold text-2xl mr-2">-</div>
                                            <div class="text-gray-700 font-bold text-lg">{{ $tanggal6->format('d-M') }}
                                            </div>
                                        </div>
                                        <div class="text-gray-900 font-semibold mt-2">
                                            {{ date('H:i', strtotime($item)) . '-' . $satuJam }}</div>
                                        <div class="text-gray-900 font-bold text-2xl mt-2">Rp. 130.000</div>
                                        <div class=" mt-2 font-bold status">Pandding</div> <!-- Status -->
                                    </div>
                                @else
                                    {{-- @endif --}}
                                    <div
                                        class="rounded-lg border shadow-xl bg-red-500 p-4 cursor-pointer transition duration-200 ease-in-out hover:shadow-xl">
                                        <div class="flex items-center">
                                            <div class="text-black font-bold text-2xl mr-2">-</div>
                                            <div class="text-black-700 font-bold text-lg">{{ $tanggal6->format('d-M') }}
                                            </div>
                                        </div>
                                        <div class="text-gray-900 font-semibold mt-2">
                                            {{ date('H:i', strtotime($item)) . '-' . $satuJam }}</div>
                                        <div class="text-gray-900 font-bold text-2xl mt-2">Rp. 130.000</div>
                                        <div class="text-black mt-2 font-bold status">Booked</div> <!-- Status -->
                                    </div>
                                @endif
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/sweetalert.min.js') }}"></script>

    <script>
        function toggleSelection(element) {
            let tanggal = element.getAttribute('data-tanggal')
            let jam = element.getAttribute('data-jam')
            let akunId = element.getAttribute('data-akunId');

            swal({
                    title: "Konfirmasi!",
                    text: `Anda akan memesan lapangan untuk tanggal ${tanggal} dan jam mulai ${jam} hingga 1 jam kedepan!`,
                    icon: "info",
                    buttons: true,
                    // dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = `pembayaran/${tanggal}/${jam}/${akunId}`;
                    }
                });
        }
    </script>
@endsection
