@extends('layout.template')

@section('title', "BeaMurid - Hasil Beasiswa")

@section("content")
    <div class="flex items-center justify-center" style="height: 88.8vh">
        <div class="flex flex-col justify-center items-center gap-16 sm:flex-row">
            <div class="flex flex-col items-center">
                <lottie-player src="{{asset('images/checking.json')}}" background="transparent" speed="1" loop autoplay class="w-60"></lottie-player>
                <div class="relative flex flex-col items-center">
                    <p class="text-xl font-semibold ">Cek Hasil Beasiswa</p>
                    <p class="text-lg text-center">Silakan masukan data yang diperlukan<br>untuk mendapatkan hasil.</p>
    
                </div>
            </div>
                <form method="POST" action="{{ route('mahasiswa.cek_hasil') }}" class="flex flex-col gap-5 border px-3 py-5 rounded-lg">
                    @csrf
                    <div class="input-container">
                        <div class="relative bg-inherit">
                            <input type="text" id="credential" name="credential" class="peer input w-full @error('credential') border-red-500 @enderror" placeholder="Username / Email / No HP" value="{{ old('crededntial') }}"/>
                            <label for="credential" class="label">NIM / Email / Nomor HP</label>
                        </div>
                        @error('credential')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                         @enderror
                         @if(session('error'))
                         <span class="text-red-500 text-sm">{{ session('error') }}</span>
                        @endif
                    </div>
    
                <button type="submit" id="login-btn" class="btn-primary bg-amber-400 hover:bg-amber-500 mt-1">Cek Hasil</button>
                    
                </form>
        </div>
    </div>
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session("success") }}' + "\nLihat hasil beasiswa mu di halaman hasil beasiswa!",
            
        });
    </script>
    @endif
@endsection