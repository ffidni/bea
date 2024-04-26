<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = "mahasiswa";
    protected $primaryKey = "mahasiswa_id";
    protected $fillable = [
        "nim",
        "nama_mahasiswa",
        "email",
        "no_hp",
        "jenis_kelamin",
        "avatar",
    ];

    public function transkipNilai()
    {
        return $this->hasOne(TranskipNilai::class, 'mahasiswa_id');
    }
}
