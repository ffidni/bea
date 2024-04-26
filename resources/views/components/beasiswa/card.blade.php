<div class="flex flex-col border rounded-md px-5 py-3 w-96 h-48 sm:w-96 justify-around pointer hover:bg-slate-200 bg-white">
    <div>
        <div class="text-gray-900 font-bold text-lg mb-2">{{$beasiswa->jenis_beasiswa}}</div>
        <p class="text-gray-700 text-base">{{$beasiswa->keterangan}}</p>
    </div>

    <div class="flex flex-col mt-3 bg-blue-200 p-2 rounded">
        <div class="flex justify-between">
            <p class="text-sm font-medium text-blue-600">Pendaftaraan Dibuka :</p>
            <p class="text-sm font-medium text-blue-600">{{$beasiswa->openAt}}</p>
        </div>
        <div class="flex justify-between">
            <p class="text-sm font-medium text-red-500">Pendaftaraan Ditutup :</p>
            <p class="text-sm font-medium text-red-500">{{$beasiswa->endAt}}</p>
        </div>
    </div>
</div>