@extends("layout.akademis_template", ["selectedMenu" => 1])
@section("content")

<div class="container w-full md:w-4/5 xl:w-3/5 mx-auto px-2 flex flex-col gap-5 my-10">

    <div class="p-8 mt-6 lg:mt-0 rounded-lg shadow bg-white">
        <div class="flex justify-between gap-3 mb-8">
            <h2 class="font-bold text-lg mb-4">Daftar Mahasiswa</h2>
            <a href="/akademis/add-mahasiswa" class="bg-blue-500 text-white rounded-lg flex justify-center gap-2 px-3 font-medium text-sm items-center pointer hover:bg-blue-600">
                <i class="fas fa-add"></i>
                Tambah
            </a>
        </div>
        <table id="mahasiswaTable" class="stripe hover" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mahasiswa as $mahasiswa)
                <tr>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                    <td>{{ $mahasiswa->email }}</td>
                    <td>{{ $mahasiswa->no_hp }}</td>
                    <td>{{ $mahasiswa->jenis_kelamin }}</td>
                    <td class="flex justify-center items-center gap-3">
                        <a class="text-blue-500 hover:text-blue-700" title="Edit" href="{{route('akademis.update_mahasiswa', encrypt($mahasiswa->mahasiswa_id))}}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="text-red-500 hover:text-red-700" title="Delete" href="{{route('akademis.remove_mahasiswa', encrypt($mahasiswa->mahasiswa_id))}}">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="p-8 mt-6 lg:mt-0 rounded-lg shadow bg-white">

        <div class="flex justify-between gap-3 mb-8">
            <h2 class="font-bold text-lg mb-4">Daftar Nilai Mahasiswa</h2>
            <a class="bg-blue-500 text-white rounded-lg flex justify-center gap-2 px-3 font-medium text-sm items-center pointer hover:bg-blue-600">
                <i class="fas fa-add"></i>
                Tambah
            </a>
        </div>
        <table id="nilaiTable" class="stripe hover" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
            <thead>
                <tr>
                    <th>Nama Mahasiswa</th>
                    <th>Semester 1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nilai as $nilai)
                <tr>
                    <td>{{ $nilai->nama_mahasiswa }}</td>
                    <td>{{ $nilai->nilai_semester1 }}</td>
                    <td>{{ $nilai->nilai_semester2 }}</td>
                    <td>{{ $nilai->nilai_semester3 }}</td>
                    <td>{{ $nilai->nilai_semester4 }}</td>
                    <td>{{ $nilai->nilai_semester5 }}</td>
                    <td>{{ $nilai->nilai_semester6 }}</td>
                    <td>{{ $nilai->nilai_semester7 }}</td>
                    <td>{{ $nilai->nilai_semester8 }}</td>
                    <td class="flex justify-center items-center gap-3">
                        <button class="text-blue-500 hover:text-blue-700" title="Edit">
                        <a class="text-blue-500 hover:text-blue-700" title="Edit" href="{{route('akademis.update_mahasiswa', encrypt($nilai->transkip_nilai_id))}}">
                            <i class="fas fa-edit"></i>
                        </a>
                        </button>
                        <a class="text-red-500 hover:text-red-700" title="Delete" href="{{route('akademis.remove_nilai', encrypt($nilai->transkip_nilai_id))}}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </div>

</div>

<script>
    $(document).ready(function() {
        // Initialize DataTable for Mahasiswa Table
        $('#mahasiswaTable').DataTable({
            responsive: true
        });

        // Initialize DataTable for Nilai Table
        $('#nilaiTable').DataTable({
            responsive: true
        });
    });
</script>

@endsection
