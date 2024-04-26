@extends('layout.auth_template')

@section('title', "BeaMurid - Login")

@section("content")
    <div class="flex justify-center items-center h-full" style="height: 85vh;">
        <div class="flex flex-col justify-center items-center gap-8 mt-12 sm:flex-row py-10">
            <div class="flex flex-col items-center">
                <lottie-player src="{{asset('images/login.json')}}" background="transparent" speed="1" loop autoplay class="w-96"></lottie-player>
                <div class="relative sm:bottom-16 flex flex-col items-center">
                    <p class="text-xl font-semibold ">Masuk</p>
                    <p class="text-lg text-center">Silakan masuk dengan akun<br>Anda untuk melanjutkan.</p>
    
                </div>
            </div>
            <div class="flex flex-col items-center gap-3">
                <div class="flex flex-col border px-3 py-5 rounded-lg gap-5 items-center">
   
                    <form method="POST" action="{{ route('akademis.loginProcess') }}" class="flex gap-5 flex-col">
     
                        @csrf
                        <div class="input-container">
                            <div class="relative bg-inherit">
                                <input type="text" id="username" name="username" class="peer input w-full @error('username') border-red-500 @enderror" placeholder="NIM / Email / Nomor HP" value="{{ old('username') }}"/>
                                <label for="username" class="label">NIM / Email / Nomor HP</label>
                            </div>
                            @error('username')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-container">
                            <div class="relative bg-inherit">
                                <input type="password" id="password" name="password" class="peer input w-full @error('password') border-red-500 @enderror" placeholder="Password" value="{{old('password')}}"/>
                                <label for="password" class="label">Password</label>
                            </div>
                            @error('login')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" id="login-btn" class="btn-primary bg-amber-400 hover:bg-amber-500 mt-1">Masuk</button>
                    </form>
    
                </div>
            <p class="text-amber-400 ">Belum punya akun? <a class="text-blue-500" href="/akademis/register">Daftar</a></p>

            </div>
        </div>
    </div>
@endsection