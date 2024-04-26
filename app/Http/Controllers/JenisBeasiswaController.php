<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JenisBeasiswa;
use Illuminate\Http\Request;

class JenisBeasiswaController extends Controller
{
    public function index()
    {
        $jenisBeasiswa = JenisBeasiswa::paginate(10);
        return view("beamurid-beasiswa.beasiswa.jenis_beasiswa", compact("jenisBeasiswa"));
    }

    public function get_beasiswa_by_id($id)
    {
        $jenisBeasiswa = JenisBeasiswa::find($id);
        return response()->json(["data" => $jenisBeasiswa]);
    }
}
