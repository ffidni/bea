@extends("layout.akademis_template", ["selectedMenu" => 1])

    
    @section("content")
    <div class="container mx-auto px-4 py-8 w-fit my-2">
            <h2 class="text-2xl font-bold mb-4">Edit Mahasiswa</h2>
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-fit">
                <form method="POST" action="{{ route('akademis.update_mahasiswa_process') }}" enctype="multipart/form-data" class="flex gap-5 flex-col lg:grid lg:grid-cols-2 items-center" >
                    @csrf
                    <div class="input-container lg:w-full">
                        <div class="relative bg-inherit ">
                            <input type="text" id="nim" name="nim" class="peer input w-full @error('login') border-red-500 @enderror" placeholder="NIM" value="{{ old('nim') ?? $mahasiswa->nim }}"/>
                            <label for="nim" class="label">NIM</label>
                        </div>
                        
                        @error('nim')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-container  lg:w-full">
                        <div class="relative bg-inherit ">
                            <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" class="peer input w-full @error('nama_mahasiswa') border-red-500 @enderror" placeholder="Nama" value="{{ old('nama_mahasiswa') ?? $mahasiswa->nama_mahasiswa }}"/>
                            <label for="nama_mahasiswa" class="label">Nama</label>
                        </div>
                        
                        @error('nama_mahasiswa')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-container  lg:w-full">
                        <div class="relative bg-inherit ">
                            <input type="text" id="email" name="email" class="peer input w-full @error('email') border-red-500 @enderror" placeholder="Email" value="{{ old('email') ?? $mahasiswa->email }}"/>
                            <label for="email" class="label">Email</label>
                        </div>
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-container  lg:w-full">
                        <div class="relative bg-inherit ">
                            <input type="text" id="no_hp" name="no_hp" class="peer input w-full @error('no_hp') border-red-500 @enderror" placeholder="Email" value="{{ old('no_hp') ?? $mahasiswa->no_hp }}"/>
                            <label for="no_hp" class="label">Nomor HP</label>
                        </div>
                        @error('no_hp')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-center gap-3">
                        <img src="{{ asset($mahasiswa->avatar) }}" alt="Current Avatar" class="w-20 h-20 rounded-full mb-4">
                        <div class="input-container  lg:w-full">
                            <div class="relative bg-inherit ">
                                <input type="file" id="avatar" name="avatar" class="peer input w-full py-2" placeholder="Foto" value="{{ old('avatar') ?? $mahasiswa->avatar }}"/>
                                <label for="avatar" class="label">Foto PAS</label>
                            </div>
                            @error('avatar')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="input-container  lg:w-full">
                        <div class="relative bg-inherit ">
                            <select id="jenis_kelamin" name="jenis_kelamin" class="peer input w-full" value="{{ old('jenis_kelamin') ?? $mahasiswa->jenis_kelamin }}">
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="l" {{ $mahasiswa->jenis_kelamin == 'l' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="p" {{ $mahasiswa->jenis_kelamin == 'p' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            <label for="jenis_kelamin" class="label">Semester saat ini</label>
                        </div>
                        @error('jenis_kelamin')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-container  lg:w-full col-span-2">
                        <div class="relative bg-inherit ">
                            <input type="password" id="password" name="password" class="peer input w-full @error('password') border-red-500 @enderror" placeholder="Password" value="{{old('password') ?? $mahasiswa->password}}"/>
                            <label for="password" class="label">Password</label>
                        </div>
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex lg:justify-center w-full col-span-2">
                        <button type="submit" id="login-btn" class="btn-primary bg-amber-400 hover:bg-amber-500 mt-1 w-full">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection