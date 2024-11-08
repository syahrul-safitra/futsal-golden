@extends('member.layouts.main')

@section('container')
    <div class="md:mx-20 md:my-5">
        <div class="hero min-h-full h-[300px] " style="background-image: url(../img/bg.jpeg)">
            <div class="hero-overlay bg-opacity-60"></div>
            <div class="hero-content text-neutral-content text-center">
                <h1 class="text-5xl font-bold">PROFIL FUTSAL GOLDEN</h1>
            </div>
        </div>
    </div>
    <div class="hero  min-h-screen">
        <div class="hero-content flex-col lg:flex-row-reverse w-[80%]">
            <img src="../img/bg.jpeg" class="  max-w-sm rounded-lg shadow-2xl" />
            <div>
                <h1 class="text-5xl font-bold">Profil Lapangan Futsal Golden</h1>


                <p class="py-6 text-justify">

                    Lapangan Futsal Golden terletak di No. 01 RT 02, Kenali Besar,
                    Kec. Kota Baru, Kota Jambi, telah beroperasi sejak 20 Maret 2011 dan
                    menjadi salah satu tempat futsal favorit di Kota Jambi.
                    Dengan dua lapangan futsal yang masing-masing memiliki permukaan semen dan matras,
                    lapangan ini menyediakan fasilitas lengkap seperti ruang ganti yang nyaman,
                    area parkir luas.
                    Kami menawarkan harga sewa yang terjangkau dan lokasi yang strategis,
                    menjadikannya pilihan ideal untuk rekreasi maupun turnamen futsal.
                    Jam operasional kami buka setiap hari dari pukul 09.00 hingga 22.00 WIB,
                    dan Anda dapat melakukan reservasi untuk memastikan ketersediaan lapangan.
                </p>

            </div>
        </div>
    </div>
@endsection
