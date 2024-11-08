@extends('admin.layouts.main')

@section('container')
    <div class="overflow-x-auto border shadow rounded-xl ml-4 p-4 bg-white w-full">
        @if (session()->has('success'))
            <div role="alert" class="alert alert-success w-3/5 mx-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @error('password')
            <div role="alert" class="alert alert-error w-3/5 mx-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ $message }}</span>
            </div>
        @enderror

        <button class="btn" onclick="my_modal_5.showModal()">Change Pw Admin</button>
        <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box w-full">
                <h3 class="text-lg font-bold">Change Pw Admin</h3>
                <p class="py-2">Press ESC key to close</p>
                <div class="modal-action w-full">
                    <form method="POST" class="w-full" action="{{ url('change-pw-admin') }}">
                        @csrf
                        <!-- if there is a button in form, it will close the modal -->

                        <div class="flex flex-col w-full">
                            <label class="form-control w-full ">
                                <div class="label">
                                    <span class="label-text">New Password</span>
                                </div>
                                <input type="text" placeholder="Type here" name="password"
                                    class="input input-bordered w-full " />
                            </label>
                            <button class="btn btn-primary mt-3">Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </dialog>

        <table class=" table w-full">
            <thead class="">
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Alamat</td>
                    <td>Status</td>
                    <td>No WA</td>
                    <td>Email</td>
                    <td>Tanggal Daftar</td>
                    <td>Action</td>
                </tr>
            </thead>


            <tbody>

                @foreach ($members as $item)
                    <tr class="hover">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_lengkap }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->no_wa }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                        <td class="flex gap-3">
                            {{-- <a class="bg-yellow-400 p-1 rounded" href="{{ url('members/' . $item->id . '/edit') }}"> <i
                                    class="fa-regular fa-pen-to-square text-blue-600"></i>
                            </a> --}}

                            <a class="bg-yellow-500 p-1 rounded hover:bg-slate-500"
                                href="{{ url('members/' . $item->id . '/edit') }}">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </a>



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
                                    <h3 class="text-lg font-bold">Anda akan menghapus data member
                                        {{ $item->judul }} !</h3>

                                    <p>Tekan ESC untuk batal</p>
                                    <div class="modal-action">
                                        <form method="post" action="{{ url('members/' . $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
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

            </tbody>

        </table>
    </div>
@endsection
