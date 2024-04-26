<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\JenisBeasiswa;
use App\Models\Mahasiswa;
use App\Models\TranskipNilai;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view("beamurid-akademis.index");
    }


    public function admin()
    {
        $admin = Admin::all();
        return view("beamurid-akademis.admin.index", compact("admin"));
    }

    public function beasiswa()
    {
        $jenisBeasiswa = JenisBeasiswa::all();
        return view("beamurid-akademis.beasiswa.index", compact("jenisBeasiswa"));
    }

    public function addBeasiswa()
    {
        return view("beamurid-akademis.beasiswa.create");
    }

    public function addBeasiswaProcess()
    {

    }

    public function editBeasiswa()
    {
        return view("beamurid-akademis.beasiswa.create");
    }

    public function editBeasiswaProcess()
    {

    }

    public function removeBeasiswa()
    {

    }

    public function mahasiswa()
    {
        $mahasiswa = Mahasiswa::all();
        $nilai = TranskipNilai::leftJoin('mahasiswa', 'transkip_nilai.mahasiswa_id', '=', 'mahasiswa.mahasiswa_id')->get();
        return view("beamurid-akademis.mahasiswa.index", compact("mahasiswa", "nilai"));
    }

    public function addMahasiswa()
    {
        return view("beamurid-akademis.mahasiswa.create");
    }

    public function addMahasiswaProcess()
    {

    }

    public function editMahasiswa($slug)
    {
        $id = decrypt($slug);
        $mahasiswa = Mahasiswa::find($id);
        return view("beamurid-akademis.mahasiswa.update", compact("mahasiswa"));
    }

    public function editMahasiswaProcess()
    {

    }

    public function removeMahasiswa()
    {

    }

    public function pendaftaran()
    {
        return view("beamurid-akademis.pendaftaran.index");

    }

    public function addPendaftaran()
    {
        return view("beamurid-akademis.pendaftaran.create");
    }

    public function addPendaftaranProcess()
    {

    }

    public function editPendaftaran()
    {
        return view("beamurid-akademis.pendaftaran.create");
    }

    public function editPendaftaranProcess()
    {

    }

    public function removePendaftaran()
    {

    }

    public function nilai()
    {
        return view("beamurid-akademis.nilai.index");

    }

    public function addNilai()
    {
        return view("beamurid-akademis.nilai.create");
    }

    public function addNilaiProcess()
    {

    }

    public function editNilai()
    {
        return view("beamurid-akademis.nilai.create");
    }

    public function editNilaiProcess()
    {

    }

    public function removeNilai()
    {

    }

}
