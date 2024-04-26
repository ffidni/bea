<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Library\HelperLib;
use App\Models\JenisBeasiswa;
use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PendaftaranController extends Controller
{
    public function index()
    {
        $jenisBeasiswa = JenisBeasiswa::all();
        return view("beamurid-beasiswa.pendaftaran", compact("jenisBeasiswa"));
    }

    public function daftar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_mahasiswa' => 'required|string',
            'email' => 'required|email',
            'no_hp' => 'required|string',
            'semester' => 'required|integer',
            'ipk' => 'required|numeric',
            'jenis_beasiswa_id' => 'required|integer',
            'berkas' => 'required|file|mimes:pdf,jpg,jpeg,zip|max:10240',
            'photo' => 'required|image|mimes:png,jpg,jpeg|max:10240',
        ], [
            'photo.mimes' => 'Berkas syarat harus berformat PNG, JPG, atau JPEG.',
            'photo.max' => 'Berkas syarat tidak boleh lebih dari 10MB.',
            'berkas.mimes' => 'Berkas syarat harus berformat PDF, JPG, atau ZIP.',
            'berkas.max' => 'Berkas syarat tidak boleh lebih dari 10MB.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $inputData = $request->only([
            "nama_mahasiswa",
            "email",
            "no_hp",
            "semester",
            "jenis_beasiswa_id",
            "ipk",
        ]);

        $mahasiswa = Mahasiswa::where("email", $inputData['email'])->first();
        if (!$mahasiswa) {
            return redirect()->back()->withErrors(["error" => "Mahasiswa tidak ditemukan di sistem akademi kami."])->withInput();
        }

        $inputData['mahasiswa_id'] = $mahasiswa->mahasiswa_id;

        $berkas = $request->file('berkas');
        $photo = $request->file('photo');
        $inputData['berkas'] = HelperLib::uploadFile($berkas, "berkas", "berkas");
        $inputData['photo'] = HelperLib::uploadFile($photo, "avatar", "photo");
        Pendaftaran::create($inputData);

        Session::flash("success", "Pendaftaran beasiswa berhasil diajukan!");
        return redirect()->route('mahasiswa.beasiswa.hasil_beasiswa');
    }
}
