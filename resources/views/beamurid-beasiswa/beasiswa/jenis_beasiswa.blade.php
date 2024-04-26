@extends('layout.template', ['selectedMenu' => 0])

@section("title", "BeaMurid - Jenis Beasiswa")

@section("content")
    <div class="px-4 sm:px-8 mt-16 mb-12 flex justify-center">
            <div class="flex flex-col justify-center items-center">
                <div class="mb-5 flex flex-col gap-1">
                    <p class="font-semibold text-2xl">Jenis Beasiswa</p>
                    <p class="text-lg">Temukan berbagai beasiswa yang dapat kamu dapatkan di sini.</p>
                </div>
                @include('components.beasiswa.list', ["jenisBeasiswa" => $jenisBeasiswa, "center"=>true])
                <div class="flex justify-center my-10">
                    {{$jenisBeasiswa->links()}}
                </div>
            </div>
    </div>
@endsection 
