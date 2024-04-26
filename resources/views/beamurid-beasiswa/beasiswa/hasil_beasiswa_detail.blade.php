@extends('layout.template')

@section('title', "BeaMurid - Hasil Beasiswa")

@section("content")

    @php
        $status_ajuan = "verified";
        $status_message = "";
        $animation_size = null;
        $gap = "my-6";
        switch($status_ajuan) {
            case "verified":
                $status_message = "Permohonan Beasiswa Disetujui!";
                $animation_size = "w-52 h-52";
                break;
            case "verifing":
                $status_message = "Sedang Dalam Proses Verifikasi...";
                $animation_size = "w-60 sm:w-80 md:w-96 sm:h-80 md:h-40";
                break;
            case "denied":
                $status_message = "Permohonan Beasiswa Ditolak!";
                $animation_size = "relative sm:right-0 sm:bottom-20 right-20 w-80 h-80";
                $gap = "";
                break;
        }
  
    @endphp

    <div class="py-14 px-5 ">
        <div class="flex flex-col items-center">
            <lottie-player src="{{ asset($status_ajuan == 'verifing' ? 'images/waiting.json' : ($status_ajuan == 'verified' ? 'images/congratulations.json' : 'images/denied.json')) }}" background="transparent" speed="1" loop autoplay class="{{$animation_size}}"></lottie-player>
            <p class="font-medium text-xl mt-5 mb-10 text-center {{$status_ajuan == 'denied' ? 'relative bottom-40' : ''}}">
                {{$status_message}}
            </p>
        </div>
        <div class="flex flex-col sm:flex-row sm:justify-center sm:items-start sm:gap-6">

            <div class="flex flex-col">
                <div class="my-1 flex flex-col items-center px-5 py-4 border rounded-lg border-gray-600 shadow-xl {{$status_ajuan == 'denied' ? 'relative bottom-40' : ''}}">
                    <h2 class="text-lg font-semibold mb-2 text-center">Detail Mahasiswa :</h2>
                    <ul>
                        <div class="flex justify-center my-5">
                        <img src="{{asset($mahasiswa->photo)}}" alt="No Photo" class="w-32 rounded-lg">
    
                        </div>
                        <li><strong>Nama:</strong> {{ $mahasiswa->nama_mahasiswa }}</li>
                        <li><strong>Email:</strong> {{ $mahasiswa->email }}</li>
                        <li><strong>NIM:</strong> {{ $mahasiswa->nim }}</li>
                    </ul>
                </div>
            </div>
            <div class="{{$gap}} sm:my-0 flex flex-col gap-2 border px-5 py-4 shadow-2xl rounded-lg border-gray-600">
                <div class="max-w-prose">
                    <h2 class="text-lg font-semibold mb-2">Keterangan :</h2>
                    <p class="text-lg block">
                        @if ($mahasiswa->keterangan)
                            {!! $mahasiswa->keterangan !!}
                        @else
                            @switch($status_ajuan)
                                @case("verified")
                                Selamat! Permohonan beasiswa Anda telah disetujui. Silakan menunggu informasi lebih lanjut mengenai proses selanjutnya.
                                    @break
                                @case("verifing")
                                Permohonan beasiswa Anda sedang dalam proses verifikasi. Kami akan segera memberikan informasi lebih lanjut kepada Anda. Terima kasih atas kesabaran Anda.
                                    @break
                                @case("denied")
                                Maaf, permohonan beasiswa Anda telah ditolak. Silakan hubungi kami jika Anda memiliki pertanyaan atau ingin informasi lebih lanjut mengenai keputusan ini.
                                    @break
                            @endswitch
                        @endif
                    </p>
                </div>
            </div>
        </div>

    </div>
@endsection
