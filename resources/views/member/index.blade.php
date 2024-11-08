@extends('member.layouts.main')

@section('container')
    <div class="md:mx-20 md:my-5">
        <section class="text-gray-600 body-font">
            <div class="container mx-auto flex px-5 py-10 md:flex-row flex-col items-center">
                <div
                    class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                    <h1 class="title-font sm:text-[45px] text-3xl font-medium text-gray-900">
                        Main <strong class=" text-orange-500">Futsal</strong>
                    </h1>
                    <h1 class="title-font mt-0 md:mt-6 sm:text-[45px] text-3xl mb-4 font-medium text-gray-900">
                        Jadi Makin Mudah!
                    </h1>
                    <p class="my-8 text-xl font-semibold text-slate-450">Nikmati Kemudahan Pesan Lapangan, Ajak Tim, dan
                        Rasakan <strong class=" text-orange-500 italic">#Aksi Tanpa Batas</strong> — Kunjungi Web Kami
                        Sekarang dan Bawa Keseruan Futsal Ke Genggamanmu!</p>
                    <div class="flex justify-center">
                        <a href="{{ url('field_a') }}">
                            <button
                                class="inline-flex text-white bg-orange-400 border-0 py-2 px-6 focus:outline-none hover:bg-orange-600 rounded-md text-lg">Pesan
                                Sekarang</button>
                        </a>
                    </div>
                </div>
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                    <img class="object-cover object-center w-[400px]" alt="hero" src="{{ asset('img/LOGO.PNG') }}">
                </div>
            </div>
        </section>
    </div>



    <div class=" md:mx-20 md:my-5 ">

        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-col text-star w-full mb-10">
                    <h3 class="text-2xl font-bold">Galery <strong class=" text-orange-500">Futsal Ball</strong></h3>
                </div>
                <div class="flex flex-wrap -m-4">

                    <div class="lg:w-1/3 sm:w-1/2 p-4">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center rounded-xl"
                                src="{{ asset('img/' . $data->gambar1) }}">
                            <div
                                class="px-8 py-10 relative z-10 w-full h-56 rounded-xl border-4 border-gray-200 bg-white opacity-0 hover:opacity-80">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">Futsal
                                    Ball</h2>
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Lapangan 2</h1>
                                <p class="leading-relaxed">Photo booth fam kinfolk cold-pressed sriracha leggings
                                    jianbing microdosing tousled waistcoat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/3 sm:w-1/2 p-4">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center rounded-xl"
                                src="{{ asset('img/' . $data->gambar2) }}">
                            <div
                                class=" px-8 py-10 relative z-10 w-full h-56 rounded-xl border-4 border-gray-200 bg-white opacity-0 hover:opacity-80">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">THE
                                    SUBTITLE</h2>
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Holden Caulfield</h1>
                                <p class="leading-relaxed">Photo booth fam kinfolk cold-pressed sriracha leggings
                                    jianbing microdosing tousled waistcoat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/3 sm:w-1/2 p-4">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center rounded-xl"
                                src="{{ asset('img/' . $data->gambar3) }}">
                            <div
                                class="px-8 py-10 relative z-10 w-full h-56 rounded-xl border-4 border-gray-200 bg-white opacity-0 hover:opacity-80">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">FutsaL
                                    Ball</h2>
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Lapangan 1</h1>
                                <p class="leading-relaxed">Pertandingan melawan thailand dan di menang kan oleh
                                    indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <hr class="border-t-2 border-gray-300 my-4">
@endsection
