@extends('layout.auth_template')

@section('title', "BeaMurid - Register")

@section("content")
    <div class="flex justify-center items-center h-full" style="height: 85vh">
        <div class="flex flex-col justify-center items-center gap-10 sm:gap-24 mt-12 sm:flex-row py-10">
            <div class="flex flex-col items-center gap-10">
                <lottie-player src="{{asset('images/register.json')}}" background="transparent" speed="1" loop autoplay class="w-56"></lottie-player>
                <div class="flex flex-col items-center gap-1">
                    <p class="text-xl font-semibold ">Daftar Sebagai Mahasiswa</p>
                    <p class="text-lg text-center">Silakan melengkapi data diri<br>untuk membuat akun.</p>
    
                </div>
            </div>
            <div class="flex flex-col items-center gap-3">
                <div class="flex flex-col border px-3 py-5 rounded-lg gap-5 items-center">
                    <form method="POST" action="{{ route('akademis.registerProcess') }}" enctype="multipart/form-data" class="flex gap-5 flex-col lg:grid lg:grid-cols-2 " >
                        @csrf
                        <div class="input-container lg:w-56">
                            <div class="relative bg-inherit ">
                                <input type="text" id="nim" name="nim" class="peer input w-full @error('login') border-red-500 @enderror" placeholder="NIM" value="{{ old('nim') }}"/>
                                <label for="nim" class="label">NIM</label>
                            </div>
                            
                            @error('nim')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-container  lg:w-56">
                            <div class="relative bg-inherit ">
                                <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" class="peer input w-full @error('nama_mahasiswa') border-red-500 @enderror" placeholder="Nama" value="{{ old('nama_mahasiswa') }}"/>
                                <label for="nama_mahasiswa" class="label">Nama</label>
                            </div>
                            
                            @error('nama_mahasiswa')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-container  lg:w-56">
                            <div class="relative bg-inherit ">
                                <input type="text" id="email" name="email" class="peer input w-full @error('email') border-red-500 @enderror" placeholder="Email" value="{{ old('email') }}"/>
                                <label for="email" class="label">Email</label>
                            </div>
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-container  lg:w-56">
                            <div class="relative bg-inherit ">
                                <input type="text" id="no_hp" name="no_hp" class="peer input w-full @error('no_hp') border-red-500 @enderror" placeholder="Email" value="{{ old('no_hp') }}"/>
                                <label for="no_hp" class="label">Nomor HP</label>
                            </div>
                            @error('no_hp')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-container  lg:w-56">
                            <div class="relative bg-inherit ">
                                <input type="file" id="avatar" name="avatar" class="peer input w-full py-2" placeholder="Foto" value="{{ old('avatar') }}"/>
                                <label for="avatar" class="label">Foto PAS</label>
                            </div>
                            @error('avatar')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-container  lg:w-56">
                            <div class="relative bg-inherit ">
                                <select id="jenis_kelamin" name="jenis_kelamin" class="peer input w-full" value="{{ old('jenis_kelamin') }}">
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="l">Laki-Laki</option>
                                    <option value="p">Perempuan</option>
                                </select>
                                <label for="jenis_kelamin" class="label">Semester saat ini</label>
                            </div>
                            @error('jenis_kelamin')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-container  lg:w-full col-span-2">
                            <div class="relative bg-inherit ">
                                <input type="password" id="password" name="password" class="peer input w-full @error('password') border-red-500 @enderror" placeholder="Password"/>
                                <label for="password" class="label">Password</label>
                            </div>
                            @error('password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex lg:justify-center w-full col-span-2">
                            <button type="submit" id="login-btn" class="btn-primary bg-amber-400 hover:bg-amber-500 mt-1 w-full">Daftar</button>
                        </div>
                    </form>

                </div>
                <p class="text-amber-400">Sudah punya akun? <a class="text-blue-500" href="/akademis/login">Login</a></p>

            </div>
        </div>
    </div>
@endsection