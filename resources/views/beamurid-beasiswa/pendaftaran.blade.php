@extends("layout.template", ["selectedMenu" => 1])

@section("title", "BeaMurid - Pendaftaran")

@section("content")
    <div class="mb-10 mt-5">
        <div class="flex flex-col justify-center items-center gap-16 md:flex-row">

            <div class="flex flex-col items-center">
                <lottie-player src="{{asset('images/college-jumping.json')}}" background="transparent" speed="1" loop autoplay class="w-80"></lottie-player>

                <div class="max-w-prose mt-8">
                    <p class="text-xl font-semibold">Pendaftaran Beasiswa</p>
                    <p class="text-lg">Lengkapi data dirimu dan lampirkan ketentuan syarat untuk mendaftar berdasarkan beasiswa yang kamu pilih.</p>
                    <p class="text-sm mt-1 text-amber-600 font-medium">Pastikan nama, alamat surel, dan nomor HP mu<br>sudah terdaftar di <a href="/akademis/login" class="text-blue-500 underline pointer">sistem akademis</a> kami!</p>
                    
                </div>
                <div role="status" class="hidden mt-5" id="beasiswa-loading">
                    <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                </div>
                <div id="beasiswa-detail" class="hidden  mt-5">

                </div>


            </div>
            <form method="POST" id="form" action="{{route('pendaftaran.daftar')}}" enctype="multipart/form-data" class="flex flex-col gap-5 border px-3 py-5 rounded-lg ">
                @csrf


                <div class="input-container">
                    <div class="relative bg-inherit">
                        <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" class="peer input w-full" placeholder="Name"/>
                        <label for="nama_mahasiswa" class="label">Nama</label>
                    </div>
                    @error('nama_mahasiswa')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="input-container">
                    <div class="relative bg-inherit">
                        <input type="text" id="email" name="email" class="peer input w-full" placeholder="Email"/>
                        <label for="email" class="label">Email</label>
                    </div>
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="input-container">
                    <div class="relative bg-inherit">
                        <input type="text" id="no_hp" name="no_hp" class="peer input w-full" placeholder="Nomor HP"/>
                        <label for="no_hp" class="label">Nomor HP</label>
                    </div>
                    @error('no_hp')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="input-container">
                    <div class="relative bg-inherit">
                        <select id="semester" name="semester" class="peer input w-full">
                            <option value="" disabled selected>Pilih Semester</option>
                            <option value="1">Semester 1</option>
                            <option value="2">Semester 2</option>
                            <option value="3">Semester 3</option>
                            <option value="4">Semester 4</option>
                            <option value="5">Semester 5</option>
                            <option value="6">Semester 6</option>
                            <option value="7">Semester 7</option>
                            <option value="8">Semester 8</option>
                        </select>
                        <label for="semester" class="label">Semester saat ini</label>
                    </div>
                    @error('semester_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="input-container">
                    <div class="relative bg-inherit">
                        <input readonly type="text" id="ipk" name="ipk" class="peer input w-full" placeholder="IPK"/>
                        <label for="ipk" class="label">IPK</label>
                    </div>
                    @error('ipk')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="input-container">
                    <div class="relative bg-inherit">
                        <select id="beasiswa" name="jenis_beasiswa_id" class="peer input w-full">
                            <option value="" disabled selected>Pilih Beasiswa</option>
                            @foreach($jenisBeasiswa as $beasiswa)
                                <option value="{{$beasiswa->jenis_beasiswa_id}}">{{$beasiswa->jenis_beasiswa}}</option>
                            @endforeach
                        </select>
                        <label for="beasiswa" class="label">Pilihan Beasiswa</label>
                    </div>
                    @error('jenis_beasiswa_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="input-container">
                    <div class="relative bg-inherit">
                        <input type="file" id="photo" name="photo" class="peer input w-full py-2" placeholder="Foto"/>
                        <label for="photo" class="label">Foto PAS</label>
                    </div>
                    @error('photo')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-container">
                    <div class="relative bg-inherit">
                        <input type="file" id="berkas_syarat" name="berkas" class="peer input w-full py-2" placeholder="Berkas Syarat"/>
                        <label for="berkas_syarat" class="label">Berkas Syarat</label>
                    </div>
                    @error('berkas_syarat')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                
                <button type="submit" id="daftar-btn" class="btn-primary bg-amber-400 hover:bg-amber-500 mt-1">Daftar</a>
            </form>
        </div>
    </div>
    <script>
    function checkIPK(ipk) {
        if (ipk < 3) {
            $('#beasiswa').prop('disabled', true);
            $('#berkas_syarat').prop('disabled', true);
            $('#photo').prop('disabled', true);
            $('#daftar-btn').addClass("btn-disabled");
            $('#daftar-btn').prop("disabled", true);
        } else {
            $('#beasiswa').prop('disabled', false);
            $('#berkas_syarat').prop('disabled', false);
            $('#photo').prop('disabled', false);
            $('#daftar-btn').prop("disabled", false);
            $('#daftar-btn').removeClass("btn-disabled");
        }
    }
        $("#semester").change((event) => {
            let semesterId = $(event.target).val();
            console.log(semesterId);
            let nama_mahasiswa = $("#nama_mahasiswa").val();
            let email = $("#email").val();
            let no_hp = $("#no_hp").val();
            $.ajax({
                url: "/api/get-mahasiswa/",
                type: 'GET',
                data: {nama_mahasiswa, email, no_hp},
                dataType: 'json', 
                success: function(response) {
                    const transkipNilai = response.data.transkip_nilai;
                    const ipk = transkipNilai[`nilai_semester${semesterId}`];
                    $('#ipk').val(ipk);
                    checkIPK(ipk); 
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });

        });
        $("#beasiswa").change((event) => {
            let beasiswaId = $(event.target).val()
            $("#beasiswa-loading").removeClass("hidden");
            $("#beasiswa-detail").addClass("hidden");
            $.ajax({
                url: "/api/jenis-beasiswa/"+beasiswaId,
                type: 'GET',
                dataType: 'json', 
                success: function(response) {
                    console.log('Data received:', response);
                
                var beasiswaData = response.data;

                 $("#beasiswa-loading").addClass("hidden");
                 $("#beasiswa-detail").removeClass("hidden");
                 var beasiswaCard = `
                    <div class="flex flex-col border rounded-md px-5 py-3 w-96 h-48 sm:w-96 justify-around pointer hover:bg-slate-200 bg-white">
                        <div>
                            <div class="text-gray-900 font-bold text-lg mb-2">${beasiswaData.jenis_beasiswa}</div>
                            <p class="text-gray-700 text-base">${beasiswaData.keterangan}</p>
                        </div>

                        <div class="flex flex-col mt-3 bg-blue-200 p-2 rounded">
                            <div class="flex justify-between">
                                <p class="text-sm font-medium text-blue-600">Pendaftaraan Dibuka :</p>
                                <p class="text-sm font-medium text-blue-600">${beasiswaData.openAt}</p>
                            </div>
                            <div class="flex justify-between">
                                <p class="text-sm font-medium text-red-500">Pendaftaraan Ditutup :</p>
                                <p class="text-sm font-medium text-red-500">${beasiswaData.endAt}</p>
                            </div>
                        </div>
                    </div>
                 `;
            $("#beasiswa-detail").html(beasiswaCard);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    </script>
@endsection
