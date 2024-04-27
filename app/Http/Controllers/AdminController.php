<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Library\HelperLib;
use App\Models\Admin;
use App\Models\JenisBeasiswa;
use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use App\Models\TranskipNilai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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

    public function addMahasiswaProcess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|string|unique:mahasiswa,nim',
            'email' => 'required|email|unique:mahasiswa,email',
            'no_hp' => 'required|string|unique:mahasiswa,no_hp',
            'nama_mahasiswa' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'password' => 'required|string',
            'avatar' => 'required|image|mimes:png,jpg,jpeg|max:10240',
        ], [
            'avatar.mimes' => 'Berkas syarat harus berformat PNG, JPG, atau JPEG.',
            'avatar.max' => 'Berkas syarat tidak boleh lebih dari 10MB.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $inputData = $request->only([
            "nim",
            "nama_mahasiswa",
            "email",
            "no_hp",
            "jenis_kelamin",
        ]);


        $photo = $request->file('avatar');
        $inputData['avatar'] = HelperLib::uploadFile($photo, "avatar", "avatar");
        $mahasiswa = Mahasiswa::create($inputData);
        if (!$mahasiswa) {
            return redirect()->back()->withErrors(["error" => "Mahasiswa tidak ditemukan di sistem akademi kami."])->withInput();
        }
        User::create([
            "password" => bcrypt($request->password),
            "mahasiswa_id" => $mahasiswa->mahasiswa_id,
            "status" => "verified",
        ]);

        Session::flash("success", "Mahasiswa berhasil didaftarkan!");
        return redirect()->route('akademis.mahasiswa');
    }

    public function editMahasiswa($slug)
    {
        $id = decrypt($slug);
        $mahasiswa = Mahasiswa::find($id);
        return view("beamurid-akademis.mahasiswa.update", compact("mahasiswa", "slug"));
    }

    public function editMahasiswaProcess(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'nim' => 'required|string',
            'email' => 'required|email',
            'no_hp' => 'required|string',
            'nama_mahasiswa' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'password' => 'required|string',
        ], [
            'avatar.mimes' => 'Berkas syarat harus berformat PNG, JPG, atau JPEG.',
            'avatar.max' => 'Berkas syarat tidak boleh lebih dari 10MB.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $inputData = $request->only([
            "nim",
            "nama_mahasiswa",
            "email",
            "no_hp",
            "jenis_kelamin",
        ]);


        $photo = $request->file('avatar');
        if ($photo) {
            $inputData['avatar'] = HelperLib::uploadFile($photo, "avatar", "avatar");
        }
        $mahasiswa = Mahasiswa::where("mahasiswa_id", $request->mahasiswa_id)->first();
        if (!$mahasiswa) {
            return redirect()->back()->withErrors(["error" => "Mahasiswa tidak ditemukan di sistem akademi kami."])->withInput();
        }
        Mahasiswa::where("mahasiswa_id", $mahasiswa->mahasiswa_id)->update($inputData);
        User::where("mahasiswa_id", $mahasiswa->mahasiswa_id)->update(["password" => $request->password]);
        Session::flash("success", "Mahasiswa berhasil diupdate!");
        return redirect()->route('akademis.mahasiswa');
    }

    public function removeMahasiswa($slug)
    {
        $id = decrypt($slug);
        $mahasiswa = Mahasiswa::where("mahasiswa_id", $id)->first();
        if (!$mahasiswa) {
            return redirect()->back()->withErrors(["error" => "Mahasiswa tidak ditemukan di sistem akademi kami."])->withInput();
        }
        Mahasiswa::where("mahasiswa_id", $id)->delete();
        Session::flash("success", "Mahasiswa berhasil dihapus!");
        return redirect()->route('akademis.mahasiswa');
    }

    public function pendaftaran()
    {
        $pendaftaran = Pendaftaran::with("mahasiswa", "jenis_beasiswa")->get();
        return view("beamurid-akademis.pendaftaran.index", compact("pendaftaran"));

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

    public function editPendaftaranProcess(Request $request)
    {
    }

    public function removePendaftaran($slug)
    {

    }

    public function nilai()
    {
        return view("beamurid-akademis.nilai.index");

    }

    public function addNilai()
    {
        $nilai = TranskipNilai::with("mahasiswa")->get();
        return view("beamurid-akademis.nilai.create", compact("nilai"));
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
