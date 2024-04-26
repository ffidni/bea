
@extends('layout.template')

@section("title", "BeaMurid - Beasiswa Seenaknya")

@section("content")
    <div class="">
        <div class="flex px-4 h-screen sm:flex-row-reverse justify-center sm:items-center flex-col sm:gap-20">
            <lottie-player src="{{asset('images/graduation.json')}}" background="transparent" speed="1" loop autoplay class="w-52 h-52 sm:hidden"></lottie-player> <!-- Adjusted height for mobile screens -->
            <lottie-player src="{{asset('images/graduation.json')}}" background="transparent" speed="1" loop autoplay class="hidden w-52 h-52 sm:block" style="width:400px; height:400px;"></lottie-player> <!-- Adjusted height for mobile screens -->
            <div class="flex flex-col sm:text-left">
                <p class="font-bold text-blue-600 text-4xl">Buka Potensimu,<br>Taklukan Dunia</p>
                <p class="mt-5 sm:w-96">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni pariatur et, perspiciatis dolores repellendus facere. Delectus dicta aut fugit architecto vitae consequatur doloribus sint, eum accusamus quaerat ea illo magni?</p>
                <div class="flex mt-6 sm:justify-center">
                    <a class="btn-primary sm:w-full"><i class="fa fa-paper-plane pr-2"></i>Daftar Sekarang!</a>
                </div>
            </div>
        </div>
        
        <div class="py-10 bg-blue-800 fade-on-scroll">
            <div class="flex gap-3 justify-center">
                <p class="font-bold text-2xl text-white">Jenis Beasiswa</p>
                <a href="{{route('jenis_beasiswa.index')}}" class="font-medium rounded-xl bg-blue-400 px-2 py-1 text-slate-100 text-sm pointer">Lihat Selengkapnya</a>
            </div>
            @include('components.beasiswa.list', ["jenisBeasiswa" => $jenisBeasiswa, "center" => true])
        </div>
    </div>
@endsection