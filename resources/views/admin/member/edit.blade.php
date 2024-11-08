<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    @vite('resources/css/app.css')

    <link rel="stylesheet" href="{{ asset('fontawasom/css/all.css') }}">

</head>

<body class=" ">
    <div class="flex">
        <div class=" bg-gray-100 w-full">
            <br />
            <h2 class="text-1xl font-bold text-[#f7af2e] flex justify-center items-center">EDIT USER</h2>

            <form action="{{ url('members/' . $member->id) }}" method="post"
                class="max-w-md mx-auto p-4 bg-white shadow-md rounded" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Nama</span>
                    </div>
                    <input type="text" placeholder="Type here" name="nama_lengkap"
                        class="input input-bordered w-full" value="{{ @old('nama_lengkap', $member->nama_lengkap) }}" />
                    @error('nama_lengkap')
                        <div class="label">
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        </div>
                    @enderror
                </label>

                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Alamat</span>
                    </div>
                    <input type="text" placeholder="Type here" name="alamat"
                        value="{{ @old('alamat', $member->alamat) }}" class="input input-bordered w-full" />
                    @error('alamat')
                        <div class="label">
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        </div>
                    @enderror
                </label>

                <div class="col-span-6">
                    <label for="no_wa" class="block text-sm font-medium text-gray-700">
                        Status
                    </label>

                    <select class="select select-bordered w-full " name="status">
                        <option value="pelajar(siswa)" @selected($member->status == 'pelajar(siswa)')>Siswa (sd-sma)</option>
                        <option value="mahasiswa" @selected($member->status == 'mahasiswa')>Mahasiswa</option>
                        <option value="bekerja" @selected($member->status == 'bekerja')>Pekerja</option>
                        <option value="dll" @selected($member->status == 'dll')>Dll</option>
                    </select>
                    @error('status')
                        <div class="label">
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">No WA</span>
                    </div>
                    <input type="number" placeholder="Type here" name="no_wa" min="0"
                        class="input input-bordered w-full" value="{{ @old('no_wa', $member->no_wa) }}" />
                    @error('no_wa')
                        <div class="label">
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        </div>
                    @enderror
                </label>

                <div class="col-span-6">
                    <label for="gambar" class="block text-sm font-medium text-gray-700">
                        Foto Pribadi
                    </label>

                    <input type="file" id="gambar" name="foto" min="0"
                        class="file-input mt-1 file-input-bordered w-full" accept="image/*" />
                    @error('foto')
                        <div class="label">
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Email</span>
                    </div>
                    <input type="text" placeholder="Type here" value="{{ @old('email', $member->email) }}"
                        name="email" class="input input-bordered w-full" />
                    @error('email')
                        <div class="label">
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        </div>
                    @enderror
                </label>

                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Password</span>
                    </div>
                    <input type="text" placeholder="Type here" name="password" class="input input-bordered w-full" />
                    @error('password')
                        <div class="label">
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        </div>
                    @enderror
                </label>

                <div class="flex gap-4 mt-5">
                    <a class="btn btn-secondary btn-sm" href="{{ url('members') }}">Batal</a>
                    <button class="btn btn-primary btn-sm">Simpan</button>

                </div>
            </form>
        </div>

    </div>

</body>


</html>
