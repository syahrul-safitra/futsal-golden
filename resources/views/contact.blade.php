@extends('member.layouts.main')

@section('container')
    <div class="hero min-h-screen">
        <section class="py-6  dark:text-gray-900">
            <div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="py-6 md:py-0 md:px-6">
                        <h1 class="text-4xl font-bold mb-5">Hubungi Kami</h1>
                        <div class="space-y-4">
                            <p class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5 mr-2 sm:mr-6">
                                    <path fill-rule="evenodd"
                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span>No. 01 RT 02., Kenali Besar, Kec. Kota Baru, Kota Jambi, Jambi 36361
                                </span>
                            </p>
                            <p class="flex items-center hover:text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5 mr-2 sm:mr-6">
                                    <path
                                        d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z">
                                    </path>
                                </svg>
                                <a href="https://wa.me/+6282306643191" class=" "><span>082269062220</span></a>
                            </p>
                            <p class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5 mr-2 sm:mr-6">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                                <span>contact@business.com</span>
                            </p>
                        </div>
                    </div>

                    <div class="py-6 md:py-0 md:px-6">
                        <h1 class="text-4xl font-bold mb-5">Location</h1>

                        <div class="">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255246.15125939576!2d103.55291199999999!3d-1.621273!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e258805203e8b5f%3A0xb1b315ff2d1d9559!2sGolden%20Futsal%20Jambi!5e0!3m2!1sid!2sid!4v1730962534781!5m2!1sid!2sid"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                </div>
        </section>
    </div>
@endsection
