@extends('member.layouts.main')

@section('container')
    <div class="flex items-center justify-center mt-16 mb-8">
        <div class="w-1/2 justify-center">
            <div class="relative">
                <div class="absolute flex  left-0 top-1/2 -translate-y-1/2 transform">
                    <p class="text-xs md:text-xl  mt-10 text-gray-900 font-bold">Validasi Item</p>
                </div>
                <div class="absolute flex right-0 top-1/2 -translate-y-1/2 transform">
                    <p class=" text-xs md:text-xl  mt-10 text-gray-900 font-bold">Paymen</p>
                </div>
                <div class="h-1 bg-gray-300 rounded-full w-full">
                    <div class="h-1 bg-red-500 rounded-full" style="width: 100%;"></div>
                </div>
            </div>

        </div>
    </div>


    <div class="container mx-auto px-4 py-8">
        <form action="{{ url('field_b') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="bg-white  p-8 grid grid-rows-1 md:grid-cols-2 gap-4">

                <div class=" p-10 rounded-lg shadow-md border   ">
                    <h2 class=" text-3xl font-bold text-gray-800 mb-4">Customer Detail 2</h2>

                    <input type="hidden" name="member_id" value="{{ $dataCostumer->id }}">
                    <input type="hidden" name="waktu_awal" value="{{ $waktuAwal }}">
                    <input type="hidden" name="waktu_akhir" value="{{ $waktuAkhir }}">
                    @php
                        $timeBooking = date('H:i:s', strtotime($waktuAwal));
                        $timeLimit = date('14:00:00');
                        $harga = 80000;
                        $hargaAsli = 80000;
                        $potongan = false;
                    @endphp
                    @if ($dataCostumer->status == 'pelajar(siswa)' && $timeBooking <= $timeLimit)
                        @php
                            $harga = 50000;
                            $potongan = true;
                        @endphp
                        <input type="hidden" name="harga" value="{{ $harga }}">
                    @else
                        <input type="hidden" name="harga" value="{{ $harga }}">
                    @endif



                    <div class=" mt-4 grid grid-rows-1 md:grid-cols-2 gap-4">
                        <div class=" mt-4">
                            <label for="" class="block text-gray-700  mb-2">Customer Name<span
                                    class="text-red-500">*</span></label>
                            <input type="text" readonly value="{{ $dataCostumer->nama_lengkap }}"
                                class="file-input file-input-bordered file-input-warning w-full p-5"
                                placeholder=" Nama Lengkap">
                        </div>
                        <div class=" mt-4">
                            <label for="" class="block text-gray-700  mb-2">Customer WA Number<span
                                    class="text-red-500">*</span></label>
                            <input type="text" readonly value="{{ $dataCostumer->no_wa }}"
                                class="file-input file-input-bordered file-input-warning w-full p-5" placeholder=" 0812345">
                        </div>

                    </div>

                    <div class=" mt-4">
                        <label for="" class="block text-gray-700  mb-2">Email <span
                                class="text-red-500">*</span></label>
                        <input type="text" value="{{ $dataCostumer->email }}" readonly
                            class="file-input file-input-bordered file-input-warning w-full p-5 " placeholder="Email">

                    </div>
                    <div class=" mt-4">
                        <label for="" class="block text-gray-700  mb-2">Notes <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="keterangan"
                            class="file-input file-input-bordered file-input-warning w-full p-5 " placeholder="Keterangan">

                    </div>
                </div>

                <div class=" p-10 rounded-lg shadow-md border ">
                    <h2 class="  text-3xl font-bold text-gray-800">Pembayaran</h2>

                    <div class=" ">
                        <img src="{{ asset('img/bsi.jpeg') }}" alt="" class="w-[50%] mb-6">
                        <label for="" class="text-sm md:text-xl block text-gray-900 font-bold md:-mt-5">NO REK
                            : 7174889087</label>
                        <label for="" class="text-sm md:text-xl block text-gray-900 font-bold">Atas Nama : icho
                            hendra
                            saputra</label>

                    </div>
                    <div class=" mt-[60px] ">
                        <label for="ijaza" class="block text-gray-700 font-bold mb-2">Uploud Bukti Pembayaran <span
                                class="text-red-500">*</span></label>
                        <input type="file" name="bukti_pembayaran"
                            class="file-input file-input-bordered file-input-warning w-full " required>
                    </div>
                </div>

            </div>

            <div class=" p-8">
                <div class="p-10 rounded-lg shadow-md border ">
                    <div>
                        <h2 class="text-xl text-gray-800 mb-2">Football Field B</h2>
                        <h2 class="text-sm text-gray-800">Futsal Ball</h2>
                        <h2 class="text-md text-green-600 font-bold">{{ date('D', strtotime($waktuAwal)) }},
                            {{ date('d M Y', strtotime($waktuAwal)) }} ◦
                            {{ date('H:i', strtotime($waktuAwal)) }} - {{ date('H:i', strtotime($waktuAkhir)) }}</h2>
                    </div>

                    <div class=" mt-4  gap-4">
                        <div class=" text-sm md:text-base flex justify-between mt-10">
                            <strong>Harga Lapangan :</strong>
                            <strong
                                class="text-red-500 {{ $potongan ? 'line-through' : '' }}">{{ formatRp($hargaAsli) }}</strong>

                        </div>
                        @if ($potongan)
                            <div class=" text-sm md:text-base flex justify-between mt-10">
                                <strong>Harga Lapangan untuk siswa :</strong>
                                <strong class="text-green-500">Rp. 50,000</strong>

                            </div>
                        @endif
                    </div>

                    <hr class="border-t-2 border-gray-300 my-4">



                    <div class=" mt-4  gap-4">
                        <div class=" text-sm md:text-base flex justify-between mt-10">
                            <strong>Total Bayar :
                                <br>
                                <strong class=" text-orange-500">Bayar Penuh</strong>
                            </strong>
                            @if ($potongan)
                                <div class=" text-sm md:text-base flex justify-between mt-10">
                                    <strong class="text-green-500">{{ formatRp($harga) }}</strong>

                                </div>
                            @else
                                <strong>
                                    <strong class=" text-sm md:text-xl  text-orange-500">{{ formatRp($harga) }}</strong>
                                </strong>
                            @endif

                        </div>
                    </div>


                </div>
            </div>

            <button id="continueButton"
                class="fixed w-[88%] left-1/2 bottom-5 transform -translate-x-1/2 bg-orange-400 text-white font-bold py-2 px-4 rounded shadow-lg transition duration-100 ease-in-out hover:bg-orange-500"
                onclick="openModal()">Lanjutkan</button>

        </form>
    </div>
@endsection
