@extends("layout.akademis_template", ["selectedMenu" => 4])
@section("content")

<div class="container w-full md:w-4/5 xl:w-3/5 mx-auto px-2 flex flex-col gap-5 my-10">

    <div class="p-8 mt-6 lg:mt-0 rounded-lg shadow bg-white">
        <h2 class="font-bold text-lg mb-4">Daftar Pendaftar Beasiswa</h2>
        <table id="beasiswaTable" class="stripe hover" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
            <thead>
                <tr>
                    <th>Mahasiswa</th>
                    <th>Jenis Beasiswa</th>
                    <th>Semester</th>
                    <th>IPK</th>
                    <th>FOTO PAS</th>
                    <th>Berkas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendaftaran as $pd)
                <tr>
                    <td>{{ $pd->pendaftaran_id }}</td>
                    <td>{{ $pd->jenis_beasiswa->nama_beasiswa}}</td>
                    <td>{{ $pd->semester }}</td>
                    <td>{{ $pd->ipk }}</td>
                    <td>
                        <img src="{{asset($pd->photo)}}" alt="none" class="w-16">
                    </td>
                    <td>
                        <a href="{{asset($pd->berkas)}}">Lihat Berkas</a>
                    </td>
                    <td>{{ $pd->status_ajuan }}</td>
                    @if($pd->status_ajuan == "verifing")
                    <td class="flex justify-center items-center gap-3">
                        <button class="text-blue-500 hover:text-blue-700" title="Edit">
                            <i class="fas fa-check"></i>
                            <p>Terima</p>
                        </button>
                        <button class="text-red-500 hover:text-red-700" title="Delete">
                            <i class="fas fa-close"></i>
                            <p>Tolak</p>

                        </button>
                    </td>
                    @endif
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
