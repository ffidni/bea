<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Library\HelperLib;
use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view("mahasiswa");
    }

    public function register()
    {
        return view("beamurid-akademis.register");

    }

    public function registerProcess(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nim' => 'required|unique:mahasiswa,nim',
            'nama_mahasiswa' => 'required',
            'email' => 'required|email|unique:mahasiswa,email',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required|in:l,p',
            'avatar' => 'required|image|mimes:png,jpg,jpeg|max:10240',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $inputData = $request->only([
                "nim",
                "no_hp",
                "nama_mahasiswa",
                "email",
                "jenis_kelamin",
            ]);
            $avatar = $request->file('avatar');
            $inputData['avatar'] = HelperLib::uploadFile($avatar, "avatar", "avatar");
            $mahasiswa = Mahasiswa::create($inputData);
            $password = bcrypt($request->password);
            User::create(["mahasiswa_id" => $mahasiswa->mahasiswa_id, "password" => $password, "status" => $request->has("status") ? "verified" : "verifing"], );
            return redirect()->route('akademis.dashboard');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to register Mahasiswa. Please try again.');
        }
    }

    public function hasil_beasiswa()
    {
        return view("beamurid-beasiswa.beasiswa.hasil_beasiswa");
    }

    public function get_mahasiswa(Request $request)
    {
        $inputData = $request->only(["nama_mahasiswa", "email", "no_hp"]);

        $record = Mahasiswa::where('nama_mahasiswa', $inputData['nama_mahasiswa'])
            ->where('email', $inputData['email'])
            ->where('no_hp', $inputData['no_hp'])->with('transkipNilai')
            ->first();
        return response()->json(["data" => $record]);

    }

    public function cek_hasil_beasiswa(Request $request)
    {
        $request->validate([
            'credential' => 'required|string',
        ], [
            'credential.required' => 'NIM, email, atau nomor HP harus diisi.',
            'credential.string' => 'NIM, email, atau nomor HP harus berupa teks.',
        ]);

        $credential = $request->input('credential');

        $mahasiswa = Pendaftaran::leftJoin('mahasiswa', 'pendaftaran.mahasiswa_id', '=', 'mahasiswa.mahasiswa_id')
            ->where(function ($query) use ($credential) {
                $query->orWhere('mahasiswa.nim', $credential)
                    ->orWhere('mahasiswa.email', $credential)
                    ->orWhere('mahasiswa.no_hp', $credential);
            })
            ->select('pendaftaran.*', 'mahasiswa.*')
            ->first();

        if ($mahasiswa) {
            return view("beamurid-beasiswa.beasiswa.hasil_beasiswa_detail", compact('mahasiswa'));
        } else {
            return redirect()->back()->with('error', 'Tidak ditemukan data Mahasiswa untuk kredensial yang diberikan.');
        }
    }

    public function login()
    {
        return view("login");
    }
}
