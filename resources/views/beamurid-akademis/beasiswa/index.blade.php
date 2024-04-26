@extends("layout.akademis_template", ["selectedMenu" => 2])
@section("content")

<div class="container w-full md:w-4/5 xl:w-3/5 mx-auto px-2 flex flex-col gap-5 my-10">

    <div class="p-8 mt-6 lg:mt-0 rounded-lg shadow bg-white">
        <h2 class="font-bold text-lg mb-4">Jenis Beasiswa</h2>
        <table id="beasiswaTable" class="stripe hover" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
            <thead>
                <tr>
                    <th>Jenis Beasiswa</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jenisBeasiswa as $beasiswa)
                <tr>
                    <td>{{ $beasiswa->jenis_beasiswa }}</td>
                    <td>{{ $beasiswa->keterangan }}</td>
                    <td class="flex justify-center items-center gap-3">
                        <button class="text-blue-500 hover:text-blue-700" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="text-red-500 hover:text-red-700" title="Delete">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<script>
    $(document).ready(function() {
        $('#beasiswaTable').DataTable({
            responsive: true
        });

    });
</script>

@endsection
