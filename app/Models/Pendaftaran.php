<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = "pendaftaran";
    protected $primaryKey = "pendaftaran_id";
    protected $fillable = [
        "mahasiswa_id",
        "jenis_beasiswa_id",
        "semester",
        "ipk",
        "berkas",
        "status_ajuan",
        "photo",
    ];

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, "mahasiswa_id");
    }
    public function jenis_beasiswa()
    {
        return $this->hasOne(JenisBeasiswa::class, "jenis_beasiswa_id");
    }
}
