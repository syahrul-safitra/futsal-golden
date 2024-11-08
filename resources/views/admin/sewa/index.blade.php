@extends('admin.layouts.main')

@section('container')
    <div class="overflow-x-auto border shadow rounded-xl ml-4 p-4 bg-white w-full">
        <table class=" table w-full">
            @if (session()->has('success'))
                <div role="alert" class="alert alert-success">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @error('bukti_pembayaran')
                <div role="alert" class="alert alert-error">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ $message }}</span>
                </div>
            @enderror

            <div class=" flex mb-4">

                <!-- Open the modal using ID.showModal() method -->
                <button class="btn" onclick="my_modal_5.showModal()">Cetak Laporan</button>
                <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
                    <div class="modal-box">
                        <h3 class="text-lg font-bold">Cetak Laporan</h3>
                        <p class="py-2">Press ESC key to close</p>
                        <div class="modal-action">
                            <form method="POST" action="{{ url('laporan-a') }}">
                                @csrf
                                <!-- if there is a button in form, it will close the modal -->

                                <div class="flex flex-col w-full">
                                    <label class="form-control w-full ">
                                        <div class="label">
                                            <span class="label-text">Tanggal Awal</span>
                                        </div>
                                        <input type="date" placeholder="Type here" name="tanggal_awal"
                                            class="input input-bordered w-full " />
                                    </label>
                                    <label class="form-control w-full ">
                                        <div class="label">
                                            <span class="label-text">Tanggal Akhir</span>
                                        </div>
                                        <input type="date" placeholder="Type here" name="tanggal_akhir"
                                            class="input input-bordered w-full " />
                                    </label>
                                    <button class="btn btn-primary mt-3">Cetak</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </dialog>

                {{-- <form action="" id="form-bulan" method="post" class="   ">

                    <div class=" mt-3 w-[600px] flex flex-row gap-5">
                        <div>
                            <select name="bulan"
                                class="  border-solid border-2 border-gray-300 w-[200px] text-black font-bold text-[15px] py-2 px-1 mb-1 ml-0 pointer-events-auto rounded-md">
                                <option value="all" selected="">ALL</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>

                        <div class=" ">

                        </div>
                        <div class=" block">
                            <input type="submit" name="export" value="Export to Excel"
                                class=" cursor-pointer bg-yellow-400 text-white w-[200px] font-bold text-[15px] px-1 mb-1 pointer-events-auto rounded-md">
                            <input type="submit" name="submit2" value="Filter"
                                class=" cursor-pointer bg-yellow-400 text-white w-[200px] font-bold text-[15px] px-1 mb-1 pointer-events-auto rounded-md">
                        </div>
                    </div>
                </form> --}}
            </div>

            <thead class="">
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Waktu Mulai</td>
                    <td>Waktu Akhir</td>
                    <td>Status Pembayaran</td>
                    <td>Status Booking</td>
                    <td>Keterangan</td>
                    <td>Bukti Pembayaran</td>
                    <td class="text-center">Aksi</td>
                </tr>
            </thead>


            @foreach ($data as $item)
                <tr class="hover">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->member->nama_lengkap }}</td>
                    <td>{{ date('d-m-Y H:i', strtotime($item->waktu_mulai)) }}</td>
                    <td>{{ date('d-m-Y H:i', strtotime($item->waktu_akhir)) }}</td>
                    <td>
                        <div
                            class="badge {{ $item->status_pembayaran == 'belum_dikonfirmasi' ? 'badge-warning' : 'badge-success' }} gap-2">
                            {{ $item->status_pembayaran }}
                        </div>
                    </td>
                    <td>
                        <div
                            class="badge {{ $item->status_booking == 'pending' ? 'badge-warning' : 'badge-success' }} gap-2">
                            {{ $item->status_booking }}
                        </div>
                    </td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <div class="flex items-center">
                            <a href="{{ url(asset('bukti_pembayaran/' . $item->bukti_pembayaran)) }}">
                                <img src="{{ asset('bukti_pembayaran/' . $item->bukti_pembayaran) }}"
                                    class="rounded-3xl w-10 h-10 cursor-pointer image-link" alt="struk" /></a>
                        </div>
                    </td>

                    <td class="flex gap-4">

                        <a href={{ 'https://api.whatsapp.com/send?phone=' . $item->member->no_wa }}
                            class="bg-green-500 p-1 rounded hover:bg-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                            </svg>
                        </a>

                        @if ($item->status_booking == 'pending')
                            <button class="bg-blue-400 p-1 rounded hover:bg-slate-500"
                                onclick="konfirmasi_pembayaran{{ $item->id }}.showModal()">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </button>
                        @endif

                        <dialog id="konfirmasi_pembayaran{{ $item->id }}" class="modal modal-konfirmasi">
                            <div class="modal-box w-11/12 max-w-3xl">
                                <h3 class="text-lg font-bold">Konfirmasi pembayaran.</h3>
                                <p>Tekan ESC untuk close </p>
                                <div class="modal-action">
                                    <form method="post" action="{{ url('konfirmasi-pembayaran/' . $item->id) }}"
                                        method="POST">
                                        @csrf
                                        <!-- if there is a button, it will close the modal -->
                                        <button class="btn btn-primary" type="submit">Konfirmasi</button>
                                        {{-- <div class="btn btn-close-konfirmasi">ESC</div> --}}
                                    </form>
                                </div>
                            </div>
                        </dialog>



                        <!-- Open the modal using ID.showModal() method -->
                        <button class="bg-yellow-500 p-1 rounded hover:bg-slate-500"
                            onclick="changeFile{{ $item->id }}.showModal()">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>
                        <dialog id="changeFile{{ $item->id }}" class="modal modal-bottom sm:modal-middle modal-file">
                            <div class="modal-box">
                                <h3 class="text-lg font-bold">Ubah bukti pembayaran</h3>
                                <p>Tekan ESC untuk close</p>
                                <div class="modal-action">
                                    <form method="post" action="{{ url('change-bukti/' . $item->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="file"
                                            class="file-input file-input-bordered file-input-info w-full mb-4 input-file"
                                            name="bukti_pembayaran" accept="image/*" />

                                        <button class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </dialog>


                        <button class="bg-red-400 p-1 rounded hover:bg-slate-500"
                            onclick="my_modal_4{{ $item->id }}.showModal()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                        <dialog id="my_modal_4{{ $item->id }}" class="modal">
                            <div class="modal-box w-11/12 max-w-3xl">
                                <h3 class="text-lg font-bold">Anda akan menghapus data booking
                                    {{ $item->judul }} !</h3>

                                <p>Tekan ESC untuk batal</p>
                                <div class="modal-action">
                                    <form method="post" action="{{ url('delete-data-jadwal/' . $item->id) }}"
                                        method="POST">
                                        @csrf
                                        <!-- if there is a button, it will close the modal -->
                                        <button class="btn btn-error" type="submit">Hapus</button>
                                        {{-- <button class="btn">ESC</button> --}}
                                    </form>
                                </div>
                            </div>
                        </dialog>
                    </td>

                </tr>
            @endforeach

        </table>
    </div>

    <script>
        // const imageLinks = document.querySelectorAll('.image-link');
        // const modalImageContainer = document.querySelector('.modal-image-container');

        // imageLinks.forEach((imageLink) => {
        //     imageLink.addEventListener('click', (e) => {
        //         e.preventDefault();
        //         modalImageContainer.classList.remove('hidden'); // Menampilkan modal
        //     });
        // });

        // const closeModal = modalImageContainer.querySelector('.close-modal');
        // closeModal.addEventListener('click', () => {
        //     modalImageContainer.classList.add('hidden'); // Menyembunyikan modal
        // });

        // const modalKonfirmasi = document.querySelector('.modal-konfirmasi');
        // const btnKonfirmasi = document.querySelector('.btn-close-konfirmasi');

        // btnKonfirmasi.addEventListener('click', (e) => {
        //     e.preventDefault();
        //     modalKonfirmasi.close();
        // })
    </script>
@endsection
