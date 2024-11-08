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

            @error('file')
                <div role="alert" class="alert alert-error">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ $message }}</span>
                </div>
            @enderror

            <thead class="">
                <tr>
                    <td>No</td>
                    <td>Keterangan</td>
                    <td>Gambar </td>
                    <td class="text-center">Aksi</td>
                </tr>
            </thead>

            {{-- Gamabar 1 --}}
            <tr class="hover">
                <td>1</td>
                <td>Gambar 1</td>
                <td>
                    {{-- @dd($) --}}
                    <div class="flex items-center">
                        <a href="{{ url(asset('img/' . $data[0]->gambar1)) }}">
                            <img src="{{ asset('img/' . $data[0]->gambar1) }}"
                                class="rounded-3xl w-10 h-10 cursor-pointer image-link" alt="struk" /></a>
                    </div>
                </td>

                <td class="flex gap-4">
                    <!-- Open the modal using ID.showModal() method -->
                    <button class="bg-yellow-500 p-1 rounded hover:bg-slate-500" onclick="galeri1.showModal()">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </button>
                    <dialog id="galeri1" class="modal modal-bottom sm:modal-middle modal-file">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Ganti Gambar</h3>
                            <p>Tekan ESC untuk close</p>
                            <div class="modal-action">
                                <form method="post" action="{{ url('change-gambar/' . $data[0]->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="gambar" value="gambar1">
                                    <input type="file"
                                        class="file-input file-input-bordered file-input-info w-full mb-4 input-file"
                                        name="file" accept="image/*" />

                                    <button class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                </td>

            </tr>

            {{-- Gamabar 2 --}}
            <tr class="hover">
                <td>2</td>
                <td>Gambar 2</td>
                <td>
                    {{-- @dd($) --}}
                    <div class="flex items-center">
                        <a href="{{ url(asset('img/' . $data[0]->gambar2)) }}">
                            <img src="{{ asset('img/' . $data[0]->gambar2) }}"
                                class="rounded-3xl w-10 h-10 cursor-pointer image-link" alt="struk" /></a>
                    </div>
                </td>

                <td class="flex gap-4">
                    <!-- Open the modal using ID.showModal() method -->
                    <button class="bg-yellow-500 p-1 rounded hover:bg-slate-500" onclick="galeri1.showModal()">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </button>
                    <dialog id="galeri1" class="modal modal-bottom sm:modal-middle modal-file">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Ganti Gambar</h3>
                            <p>Tekan ESC untuk close</p>
                            <div class="modal-action">
                                <form method="post" action="{{ url('change-gambar/' . $data[0]->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="gambar" value="gambar2">
                                    <input type="file"
                                        class="file-input file-input-bordered file-input-info w-full mb-4 input-file"
                                        name="file" accept="image/*" />

                                    <button class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                </td>

            </tr>

            {{-- Gamabar 3 --}}
            <tr class="hover">
                <td>3</td>
                <td>Gambar 3</td>
                <td>
                    {{-- @dd($) --}}
                    <div class="flex items-center">
                        <a href="{{ url(asset('img/' . $data[0]->gambar3)) }}">
                            <img src="{{ asset('img/' . $data[0]->gambar3) }}"
                                class="rounded-3xl w-10 h-10 cursor-pointer image-link" alt="struk" /></a>
                    </div>
                </td>

                <td class="flex gap-4">
                    <!-- Open the modal using ID.showModal() method -->
                    <button class="bg-yellow-500 p-1 rounded hover:bg-slate-500" onclick="galeri1.showModal()">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </button>
                    <dialog id="galeri1" class="modal modal-bottom sm:modal-middle modal-file">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Ganti Gambar</h3>
                            <p>Tekan ESC untuk close</p>
                            <div class="modal-action">
                                <form method="post" action="{{ url('change-gambar/' . $data[0]->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="gambar" value="gambar3">
                                    <input type="file"
                                        class="file-input file-input-bordered file-input-info w-full mb-4 input-file"
                                        name="file" accept="image/*" />

                                    <button class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                </td>

            </tr>

            {{-- Gamabar 5 --}}
            <tr class="hover">
                <td>4</td>
                <td>Gambar 4</td>
                <td>
                    {{-- @dd($) --}}
                    <div class="flex items-center">
                        <a href="{{ url(asset('img/' . $data[0]->gambar4)) }}">
                            <img src="{{ asset('img/' . $data[0]->gambar4) }}"
                                class="rounded-3xl w-10 h-10 cursor-pointer image-link" alt="struk" /></a>
                    </div>
                </td>

                <td class="flex gap-4">
                    <!-- Open the modal using ID.showModal() method -->
                    <button class="bg-yellow-500 p-1 rounded hover:bg-slate-500" onclick="galeri1.showModal()">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </button>
                    <dialog id="galeri1" class="modal modal-bottom sm:modal-middle modal-file">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Ganti Gambar</h3>
                            <p>Tekan ESC untuk close</p>
                            <div class="modal-action">
                                <form method="post" action="{{ url('change-gambar/' . $data[0]->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="gambar" value="gambar4">
                                    <input type="file"
                                        class="file-input file-input-bordered file-input-info w-full mb-4 input-file"
                                        name="file" accept="image/*" />

                                    <button class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                </td>
            </tr>

            {{-- Gamabar 5 --}}
            <tr class="hover">
                <td>5</td>
                <td>Gambar 5</td>
                <td>
                    {{-- @dd($) --}}
                    <div class="flex items-center">
                        <a href="{{ url(asset('img/' . $data[0]->gambar5)) }}">
                            <img src="{{ asset('img/' . $data[0]->gambar5) }}"
                                class="rounded-3xl w-10 h-10 cursor-pointer image-link" alt="struk" /></a>
                    </div>
                </td>

                <td class="flex gap-4">
                    <!-- Open the modal using ID.showModal() method -->
                    <button class="bg-yellow-500 p-1 rounded hover:bg-slate-500" onclick="galeri1.showModal()">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </button>
                    <dialog id="galeri1" class="modal modal-bottom sm:modal-middle modal-file">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Ganti Gambar</h3>
                            <p>Tekan ESC untuk close</p>
                            <div class="modal-action">
                                <form method="post" action="{{ url('change-gambar/' . $data[0]->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="gambar" value="gambar5">
                                    <input type="file"
                                        class="file-input file-input-bordered file-input-info w-full mb-4 input-file"
                                        name="file" accept="image/*" />

                                    <button class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                </td>
            </tr>

            {{-- Gamabar 6 --}}
            <tr class="hover">
                <td>6</td>
                <td>Gambar 6</td>
                <td>
                    {{-- @dd($) --}}
                    <div class="flex items-center">
                        <a href="{{ url(asset('img/' . $data[0]->gambar6)) }}">
                            <img src="{{ asset('img/' . $data[0]->gambar6) }}"
                                class="rounded-3xl w-10 h-10 cursor-pointer image-link" alt="struk" /></a>
                    </div>
                </td>

                <td class="flex gap-4">
                    <!-- Open the modal using ID.showModal() method -->
                    <button class="bg-yellow-500 p-1 rounded hover:bg-slate-500" onclick="galeri1.showModal()">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </button>
                    <dialog id="galeri1" class="modal modal-bottom sm:modal-middle modal-file">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Ganti Gambar</h3>
                            <p>Tekan ESC untuk close</p>
                            <div class="modal-action">
                                <form method="post" action="{{ url('change-gambar/' . $data[0]->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="gambar" value="gambar6">
                                    <input type="file"
                                        class="file-input file-input-bordered file-input-info w-full mb-4 input-file"
                                        name="file" accept="image/*" />

                                    <button class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                </td>
            </tr>

            {{-- Gamabar 7 --}}
            <tr class="hover">
                <td>7</td>
                <td>Gambar 7</td>
                <td>
                    {{-- @dd($) --}}
                    <div class="flex items-center">
                        <a href="{{ url(asset('img/' . $data[0]->gambar7)) }}">
                            <img src="{{ asset('img/' . $data[0]->gambar7) }}"
                                class="rounded-3xl w-10 h-10 cursor-pointer image-link" alt="struk" /></a>
                    </div>
                </td>

                <td class="flex gap-4">
                    <!-- Open the modal using ID.showModal() method -->
                    <button class="bg-yellow-500 p-1 rounded hover:bg-slate-500" onclick="galeri1.showModal()">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </button>
                    <dialog id="galeri1" class="modal modal-bottom sm:modal-middle modal-file">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Ganti Gambar</h3>
                            <p>Tekan ESC untuk close</p>
                            <div class="modal-action">
                                <form method="post" action="{{ url('change-gambar/' . $data[0]->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="gambar" value="gambar7">
                                    <input type="file"
                                        class="file-input file-input-bordered file-input-info w-full mb-4 input-file"
                                        name="file" accept="image/*" />

                                    <button class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                </td>
            </tr>

            {{-- Gamabar 8 --}}
            <tr class="hover">
                <td>8</td>
                <td>Gambar 8</td>
                <td>
                    {{-- @dd($) --}}
                    <div class="flex items-center">
                        <a href="{{ url(asset('img/' . $data[0]->gambar8)) }}">
                            <img src="{{ asset('img/' . $data[0]->gambar8) }}"
                                class="rounded-3xl w-10 h-10 cursor-pointer image-link" alt="struk" /></a>
                    </div>
                </td>

                <td class="flex gap-4">
                    <!-- Open the modal using ID.showModal() method -->
                    <button class="bg-yellow-500 p-1 rounded hover:bg-slate-500" onclick="galeri1.showModal()">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </button>
                    <dialog id="galeri1" class="modal modal-bottom sm:modal-middle modal-file">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Ganti Gambar</h3>
                            <p>Tekan ESC untuk close</p>
                            <div class="modal-action">
                                <form method="post" action="{{ url('change-gambar/' . $data[0]->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="gambar" value="gambar8">
                                    <input type="file"
                                        class="file-input file-input-bordered file-input-info w-full mb-4 input-file"
                                        name="file" accept="image/*" />

                                    <button class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                </td>
            </tr>

            {{-- Gamabar 9 --}}
            <tr class="hover">
                <td>9</td>
                <td>Gambar 9</td>
                <td>
                    {{-- @dd($) --}}
                    <div class="flex items-center">
                        <a href="{{ url(asset('img/' . $data[0]->gambar9)) }}">
                            <img src="{{ asset('img/' . $data[0]->gambar9) }}"
                                class="rounded-3xl w-10 h-10 cursor-pointer image-link" alt="struk" /></a>
                    </div>
                </td>

                <td class="flex gap-4">
                    <!-- Open the modal using ID.showModal() method -->
                    <button class="bg-yellow-500 p-1 rounded hover:bg-slate-500" onclick="galeri1.showModal()">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </button>
                    <dialog id="galeri1" class="modal modal-bottom sm:modal-middle modal-file">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Ganti Gambar</h3>
                            <p>Tekan ESC untuk close</p>
                            <div class="modal-action">
                                <form method="post" action="{{ url('change-gambar/' . $data[0]->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="gambar" value="gambar9">
                                    <input type="file"
                                        class="file-input file-input-bordered file-input-info w-full mb-4 input-file"
                                        name="file" accept="image/*" />

                                    <button class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                </td>
            </tr>

            {{-- Gamabar 10 --}}
            <tr class="hover">
                <td>10</td>
                <td>Gambar 10</td>
                <td>
                    {{-- @dd($) --}}
                    <div class="flex items-center">
                        <a href="{{ url(asset('img/' . $data[0]->gambar10)) }}">
                            <img src="{{ asset('img/' . $data[0]->gambar10) }}"
                                class="rounded-3xl w-10 h-10 cursor-pointer image-link" alt="struk" /></a>
                    </div>
                </td>

                <td class="flex gap-4">
                    <!-- Open the modal using ID.showModal() method -->
                    <button class="bg-yellow-500 p-1 rounded hover:bg-slate-500" onclick="galeri1.showModal()">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </button>
                    <dialog id="galeri1" class="modal modal-bottom sm:modal-middle modal-file">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Ganti Gambar</h3>
                            <p>Tekan ESC untuk close</p>
                            <div class="modal-action">
                                <form method="post" action="{{ url('change-gambar/' . $data[0]->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="gambar" value="gambar10">
                                    <input type="file"
                                        class="file-input file-input-bordered file-input-info w-full mb-4 input-file"
                                        name="file" accept="image/*" />

                                    <button class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                </td>
            </tr>

            {{-- Gamabar 11 --}}
            <tr class="hover">
                <td>11</td>
                <td>Gambar 11</td>
                <td>
                    {{-- @dd($) --}}
                    <div class="flex items-center">
                        <a href="{{ url(asset('img/' . $data[0]->gambar11)) }}">
                            <img src="{{ asset('img/' . $data[0]->gambar11) }}"
                                class="rounded-3xl w-10 h-10 cursor-pointer image-link" alt="struk" /></a>
                    </div>
                </td>

                <td class="flex gap-4">
                    <!-- Open the modal using ID.showModal() method -->
                    <button class="bg-yellow-500 p-1 rounded hover:bg-slate-500" onclick="galeri1.showModal()">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </button>
                    <dialog id="galeri1" class="modal modal-bottom sm:modal-middle modal-file">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Ganti Gambar</h3>
                            <p>Tekan ESC untuk close</p>
                            <div class="modal-action">
                                <form method="post" action="{{ url('change-gambar/' . $data[0]->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="gambar" value="gambar11">
                                    <input type="file"
                                        class="file-input file-input-bordered file-input-info w-full mb-4 input-file"
                                        name="file" accept="image/*" />

                                    <button class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                </td>
            </tr>

            {{-- Gamabar 12 --}}
            <tr class="hover">
                <td>12</td>
                <td>Gambar 12</td>
                <td>
                    {{-- @dd($) --}}
                    <div class="flex items-center">
                        <a href="{{ url(asset('img/' . $data[0]->gambar12)) }}">
                            <img src="{{ asset('img/' . $data[0]->gambar12) }}"
                                class="rounded-3xl w-10 h-10 cursor-pointer image-link" alt="struk" /></a>
                    </div>
                </td>

                <td class="flex gap-4">
                    <!-- Open the modal using ID.showModal() method -->
                    <button class="bg-yellow-500 p-1 rounded hover:bg-slate-500" onclick="galeri1.showModal()">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </button>
                    <dialog id="galeri1" class="modal modal-bottom sm:modal-middle modal-file">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Ganti Gambar</h3>
                            <p>Tekan ESC untuk close</p>
                            <div class="modal-action">
                                <form method="post" action="{{ url('change-gambar/' . $data[0]->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="gambar" value="gambar12">
                                    <input type="file"
                                        class="file-input file-input-bordered file-input-info w-full mb-4 input-file"
                                        name="file" accept="image/*" />

                                    <button class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                </td>
            </tr>

            {{-- Gamabar 13 --}}
            <tr class="hover">
                <td>13</td>
                <td>Gambar 13</td>
                <td>
                    {{-- @dd($) --}}
                    <div class="flex items-center">
                        <a href="{{ url(asset('img/' . $data[0]->gambar13)) }}">
                            <img src="{{ asset('img/' . $data[0]->gambar13) }}"
                                class="rounded-3xl w-10 h-10 cursor-pointer image-link" alt="struk" /></a>
                    </div>
                </td>

                <td class="flex gap-4">
                    <!-- Open the modal using ID.showModal() method -->
                    <button class="bg-yellow-500 p-1 rounded hover:bg-slate-500" onclick="galeri1.showModal()">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </button>
                    <dialog id="galeri1" class="modal modal-bottom sm:modal-middle modal-file">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Ganti Gambar</h3>
                            <p>Tekan ESC untuk close</p>
                            <div class="modal-action">
                                <form method="post" action="{{ url('change-gambar/' . $data[0]->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="gambar" value="gambar13">
                                    <input type="file"
                                        class="file-input file-input-bordered file-input-info w-full mb-4 input-file"
                                        name="file" accept="image/*" />

                                    <button class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                </td>
            </tr>

            {{-- Gamabar 14 --}}
            <tr class="hover">
                <td>14</td>
                <td>Gambar 14</td>
                <td>
                    {{-- @dd($) --}}
                    <div class="flex items-center">
                        <a href="{{ url(asset('img/' . $data[0]->gambar14)) }}">
                            <img src="{{ asset('img/' . $data[0]->gambar14) }}"
                                class="rounded-3xl w-10 h-10 cursor-pointer image-link" alt="struk" /></a>
                    </div>
                </td>

                <td class="flex gap-4">
                    <!-- Open the modal using ID.showModal() method -->
                    <button class="bg-yellow-500 p-1 rounded hover:bg-slate-500" onclick="galeri1.showModal()">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </button>
                    <dialog id="galeri1" class="modal modal-bottom sm:modal-middle modal-file">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Ganti Gambar</h3>
                            <p>Tekan ESC untuk close</p>
                            <div class="modal-action">
                                <form method="post" action="{{ url('change-gambar/' . $data[0]->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="gambar" value="gambar14">
                                    <input type="file"
                                        class="file-input file-input-bordered file-input-info w-full mb-4 input-file"
                                        name="file" accept="image/*" />

                                    <button class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                </td>
            </tr>

            {{-- Gamabar 15 --}}
            <tr class="hover">
                <td>15</td>
                <td>Gambar 15</td>
                <td>
                    {{-- @dd($) --}}
                    <div class="flex items-center">
                        <a href="{{ url(asset('img/' . $data[0]->gambar15)) }}">
                            <img src="{{ asset('img/' . $data[0]->gambar15) }}"
                                class="rounded-3xl w-10 h-10 cursor-pointer image-link" alt="struk" /></a>
                    </div>
                </td>

                <td class="flex gap-4">
                    <!-- Open the modal using ID.showModal() method -->
                    <button class="bg-yellow-500 p-1 rounded hover:bg-slate-500" onclick="galeri1.showModal()">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </button>
                    <dialog id="galeri1" class="modal modal-bottom sm:modal-middle modal-file">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Ganti Gambar</h3>
                            <p>Tekan ESC untuk close</p>
                            <div class="modal-action">
                                <form method="post" action="{{ url('change-gambar/' . $data[0]->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="gambar" value="gambar15">
                                    <input type="file"
                                        class="file-input file-input-bordered file-input-info w-full mb-4 input-file"
                                        name="file" accept="image/*" />

                                    <button class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                </td>
            </tr>



        </table>
    </div>
@endsection
